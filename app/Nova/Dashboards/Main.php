<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\ExitPasses;
use App\Nova\Metrics\ExitPassesPerDay;
use App\Nova\Metrics\Info;
use App\Nova\Metrics\NewExitPassesToday;
use App\Nova\Metrics\ReasonPerExitPass;
use App\Nova\Metrics\SBU;
use App\Nova\Metrics\Staff;
use App\Nova\Metrics\StaffPerSBU;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        if (Auth::user()->isAdmin()) {
            return [
                new NewExitPassesToday(),
                new ReasonPerExitPass(),
                new ExitPasses(),
                new ExitPassesPerDay(),
                new Staff(),
                new StaffPerSBU(),
                new SBU()
            ];
        }

        if (Auth::user()->isLeader()) {
            return [
                new NewExitPassesToday(),
                new ReasonPerExitPass(),
                new ExitPasses(),
                new ExitPassesPerDay(),
                new Staff()
            ];
        }

        if (Auth::user()->isHR()) {
            return [
                new NewExitPassesToday(),
                new ReasonPerExitPass(),
                new ExitPasses(),
                new ExitPassesPerDay(),
                new Staff()
            ];
        }

        if (Auth::user()->isStaff()) {
            return [
                new NewExitPassesToday(),
                new ReasonPerExitPass(),
                new ExitPasses(),
                new ExitPassesPerDay()
            ];
        }

        if (Auth::user()->isGatekeeper()) {
            return [
                new NewExitPassesToday(),
                new ReasonPerExitPass(),
            ];
        }

        if (Auth::user()->isGuest()) {
                return [
                    (new Info)->width('full')
                ];
        }
    }
}
