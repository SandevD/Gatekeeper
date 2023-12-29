<?php

namespace App\Nova\Metrics;

use App\Models\ExitPass;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class ReasonPerExitPass extends Partition
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
            return $this->count($request, ExitPass::class, 'reason_type');
        }

        if($request->user()->isLeader() || $request->user()->isHR()){
            return $this->count($request, ExitPass::whereHas('user', function ($query) use ($request) {
                $query->where('department_id', $request->user()->department_id);
            }), 'reason_type');
        }

        if($request->user()->isGatekeeper() || $request->user()->isHR()){
            return $this->count($request, ExitPass::where('date', today()), 'reason_type');
        }

        if($request->user()->isStaff()){
            return $this->count($request, ExitPass::where('user_id', $request->user()->id), 'reason_type');
        }
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
        return 'reason-per-exit-pass';
    }
}
