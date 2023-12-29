<?php

namespace App\Nova\Metrics;

use App\Models\ExitPass;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class ExitPassesPerDay extends Trend
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
            return $this->countByDays($request, ExitPass::class);
        }

        if ($request->user()->isLeader() || $request->user()->isHR()) {
            return $this->countByDays($request, ExitPass::whereHas('user', function ($query) use ($request) {
                $query->where('department_id', $request->user()->department_id);
            }));
        }

        if ($request->user()->isGatekeeper() || $request->user()->isHR()) {
            return $this->countByDays($request, ExitPass::class);
        }

        if ($request->user()->isStaff()) {
            return $this->countByDays($request, ExitPass::where('user_id', $request->user()->id));
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
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
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

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'exit-passes-per-day';
    }
}
