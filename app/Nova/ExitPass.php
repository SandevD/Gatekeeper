<?php

namespace App\Nova;

use App\Nova\Abstract\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Oneduo\NovaTimeField\Time;

class ExitPass extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ExitPass>
     */
    public static $model = \App\Models\ExitPass::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static function label()
    {
        return "Exit Pass";
    }

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return $request->user()->status == 1;
    }

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['user'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'user.name', 'description', 'reason_type'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Name', 'user', User::class)
                ->sortable()
                ->withSubtitles()
                ->showCreateRelationButton()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview()
                ->withMeta([
                    'belongsToId' => $request->user()->id,
                ]),

            Select::make('Reason Type', 'reason_type')->options([
                'Personal' => 'Personal',
                'Official' => 'Official',
            ]),

            //'School Visit' => 'School Visit',

            BelongsTo::make('Checkpoint', 'checkpoint', Building::class)
                ->nullable()
                ->hide()
                ->sortable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview()
                ->hideFromIndex()
                ->dependsOn(
                    ['reason_type'],
                    function (BelongsTo $field, NovaRequest $request, FormData $formData) {
                        if ($formData->reason_type === 'School Visit') {
                            $field->show();
                        }
                    }
                ),

            Text::make('Description')
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Time::make(__('Time'), 'time')
                ->required(),

            Date::make('Date')
                ->sortable()
                ->required()
                ->default(now())
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $model->{$attribute} = today();
                })
                ->readonly(),

            BelongsTo::make('Approved By', 'leader', User::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Text::make(__('Approved At'), function ($model) {
                return $model->approved_at;
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Boolean::make('Approved', 'status')->onlyOnIndex(),

            Text::make(__('Check Out'), function ($model) {
                return $model->check_out;
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Text::make(__('Check Out Note'), function ($model) {
                return $model->check_out_note;
            })
                ->onlyOnDetail()
                ->canSee(function ($request) {
                    return $request->user()->isAdmin() || $request->user()->isLeader();
                }),

            Text::make(__('Check In'), function ($model) {
                return $model->check_in;
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Text::make(__('Check In Note'), function ($model) {
                return $model->check_in_note;
            })
                ->onlyOnDetail()
                ->canSee(function ($request) {
                    return $request->user()->isAdmin() || $request->user()->isLeader();
                }),

            Text::make(__('Checkpoint In'), function ($model) {
                return $model->checkpoint_in;
            })
                ->onlyOnDetail(),

            Text::make(__('Checkpoint Out'), function ($model) {
                return $model->checkpoint_out;
            })
                ->onlyOnDetail(),
        ];
    }

    /**
     * Get the menu that should represent the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Nova\Menu\MenuItem
     */
    public function menu(Request $request)
    {
        if ($request->user()->isAdmin()) {
            return parent::menu($request)->withBadge(function () {
                return static::$model::count();
            });
        }

        if ($request->user()->isGatekeeper()) {
            return parent::menu($request)->withBadge(function () {
                return static::$model::where('status', 1)->where('date', today())->count();
            });
        }

        if ($request->user()->isSchool()) {
            return parent::menu($request)->withBadge(function () {
                return static::$model::where('status', 1)->where('date', today())->count();
            });
        }

        if ($request->user()->isStaff()) {
            return parent::menu($request)->withBadge(function () use ($request) {
                return static::$model::where('user_id', $request->user()->id)->count();
            });
        }

        if ($request->user()->isLeader() || $request->user()->isHR()) {
            return parent::menu($request)->withBadge(function () use ($request) {
                return static::$model::whereHas('user', function ($query) use ($request) {
                    $query->where('department_id', $request->user()->department_id);
                })->count();
            });
        }

        if ($request->user()->isGuest()) {
            return parent::menu($request)->withBadge(function () {
                return 0;
            });
        }
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->isGatekeeper()) {
            $current_time = Carbon::now()->subHours(2)->format('H:i:s');
            $query->where('date', today())->where('status', 1)->where('time', '>=', $current_time);
        }

        if ($request->user()->isStaff()) {
            return $query->where('user_id', $request->user()->id);
        }

        if ($request->user()->isLeader() || $request->user()->isHR()) {
            return $query->whereHas('user', function ($query) use ($request) {
                $query->where('department_id', $request->user()->department_id);
            });
        }
    }

    /**
     * Build a relatable query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableBuildings(NovaRequest $request, $query, Field $field)
    {
        if ($request->user()->isStaff()) {
            return $query->whereNot('id', $request->user()->department->building_id);
        }
    }


    /**
     * Build a relatable query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableUsers(NovaRequest $request, $query, Field $field)
    {
        if ($request->user()->isStaff() || $request->user()->isLeader()) {
            return $query->where('id', $request->user()->id);
        }
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        $filters = [];

        if ($request->user()->isAdmin()) {
            $filters[] = new Filters\FromDate;
            $filters[] = new Filters\ToDate;
            $filters[] = new Filters\SBU;
        }

        if ($request->user()->isLeader() || $request->user()->isHR()) {
            $filters[] = new Filters\FromDate;
            $filters[] = new Filters\ToDate;
        }

        return $filters;
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            (new Actions\CheckOut($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('This will activate the exit pass.')
                ->confirmButtonText('Activate')
                ->canRun(function ($request, $model) {
                    if ($request->user()->isGatekeeper()) {
                        if (!$model->check_out && ($request->user()->building_id == $model->user->department->building_id)) {
                            return $request->user()->isAdmin() || $request->user()->isGatekeeper();
                        }
                    } else {
                        return $request->user()->isAdmin();
                    }
                }),

            (new Actions\CheckpointIn($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('Enter the checkpoint.')
                ->confirmButtonText('Checkpoint In')
                ->canRun(function ($request, $model) {
                    if ($request->user()->isGatekeeper()) {
                        if ($model->check_out && !$model->checkpoint_in && !$model->checkpoint_out && !$model->check_in && ($model->checkpoint_id == $request->user()->building_id)) {
                            return $request->user()->isAdmin() || $request->user()->isGatekeeper();
                        }
                    } else {
                        return $request->user()->isAdmin();
                    }
                }),

            (new Actions\CheckpointOut($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('Exit the checkpoint.')
                ->confirmButtonText('Checkpoint Out')
                ->canRun(function ($request, $model) {
                    if ($request->user()->isGatekeeper()) {
                        if ($model->check_out && $model->checkpoint_in && !$model->checkpoint_out && !$model->check_in && ($model->checkpoint_id == $request->user()->building_id)) {
                            return $request->user()->isAdmin() || $request->user()->isGatekeeper();
                        }
                    } else {
                        return $request->user()->isAdmin();
                    }
                }),

            (new Actions\CheckIn($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('This will close the exit pass.')
                ->confirmButtonText('Deactivate')
                ->canRun(function ($request, $model) {

                    if ($request->user()->isAdmin()) {
                        return $request->user()->isAdmin();
                    }

                    if ($model->checkpoint_id && $model->check_out && $model->checkpoint_in && $model->checkpoint_out && !$model->check_in && ($request->user()->building_id == $model->user->department->building_id)) {
                        return $request->user()->isGatekeeper();
                    }
                    if ($model->check_out && !$model->check_in && ($request->user()->building_id == $model->user->department->building_id)) {
                        return $request->user()->isGatekeeper();
                    }
                }),

            (new Actions\Approve($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('This will make the exit pass approved.')
                ->confirmButtonText('Approve')
                ->canRun(function ($request, $model) {
                    if ($model->status == 0 && $model->user_id != $request->user()->id) {
                        return $request->user()->isAdmin() || $request->user()->isLeader();
                    }
                }),

            ExportAsCsv::make()->nameable()->withFormat(function ($model) {
                return [
                    'Date' => $model->date->format('Y-m-d'),
                    'Name' => $model->user->name ?? '-',
                    'SBU' => $model->user->department->name ?? '-',
                    'Reason' => $model->reason ?? '-',
                    'Type' => $model->reason_type ?? '-',
                    'Approved By' => $model->leader->name ?? '-',
                    'Approved At' => $model->approved_at ?? '-',
                    'Check Out' => $model->check_out ?? '-',
                    'Check In' => $model->check_in ?? '-',
                ];
            }),
        ];
    }
}
