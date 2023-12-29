<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Abstract\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Oneduo\NovaTimeField\Time;

class Overtime extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Overtime>
     */
    public static $model = \App\Models\Overtime::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return $request->user()->status == 1 && ($request->user()->isAdmin() || $request->user()->isLeader() || $request->user()->isStaff() || $request->user()->isStaff());
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'user.name'
    ];

    /**
     * Get the displayable label of the resource.
     */
    public static function label()
    {
        return "Overtime";
    }

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['user'];

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

            Trix::make('Reason', 'description')
                ->rules('max:255')
                ->hideFromIndex(),

            BelongsTo::make('Work Place', 'workplace', Building::class)
                ->sortable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview(),

            DateTime::make('Start From', 'start_time')
                ->required(),

            DateTime::make('End At', 'end_time')
                ->required(),

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
                return $model->approved_at?->format('g:i:s A') ?? '---';
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Text::make(__('Started At'), function ($model) {
                return $model?->started_at?->format('g:i:s A') ?? '---';
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Text::make(__('Ended At'), function ($model) {
                return $model?->ended_at?->format('g:i:s A') ?? '---';
            })
                ->hideWhenCreating()->hideWhenUpdating(),

            Boolean::make('Approved', 'status')->onlyOnIndex(),
        ];
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
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
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
        return [];
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
            ExportAsCsv::make(),

            (new Actions\ApproveOvertime($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('By proceeding you will be approving requested overtime for the employee.')
                ->confirmButtonText('Approve')
                ->canRun(function ($request, $model) {
                    if ($model->status == 0 && $model->start_time->format('Y-m-d H:i:s') >= now()->format('Y-m-d H:i:s') && $model->user_id != $request->user()->id) {
                        return $request->user()->isAdmin() || $request->user()->isLeader();
                    }
                }),

            (new Actions\StartOvertime($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('By proceeding you will activate overtime.')
                ->confirmButtonText('Activate')
                ->canRun(function ($request, $model) {
                    if ($model->status == 1 && !$model->started_at && !$model->ended_at) {
                        return $request->user()->isStaff() || $request->user()->isAdmin();
                    }
                }),

            (new Actions\EndOvertime($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('By proceeding you will end overtime.')
                ->confirmButtonText('Deactivate')
                ->canRun(function ($request, $model) {
                    if ($model->status == 1 && $model->started_at && !$model->ended_at) {
                        return $request->user()->isStaff() || $request->user()->isAdmin();
                    }
                }),
        ];
    }
}
