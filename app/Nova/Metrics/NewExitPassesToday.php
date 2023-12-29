<?php

namespace App\Nova\Metrics;

use App\Models\ExitPass;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class NewExitPassesToday extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        if($request->user()->isAdmin()){
            return $this->count($request, ExitPass::where('date', today()));
        }

        if($request->user()->isLeader() || $request->user()->isHR()){
            return $this->count($request, ExitPass::where('date', today())->whereHas('user', function ($query) use ($request) {
                $query->where('department_id', $request->user()->department_id);
            }));
        }

        if($request->user()->isGatekeeper() || $request->user()->isHR()){
            return $this->count($request, ExitPass::where('date', today()));
        }

        if($request->user()->isStaff()){
            return $this->count($request, ExitPass::where('date', today())->where('user_id', $request->user()->id));
        }
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }
}
