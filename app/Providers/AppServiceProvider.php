<?php

namespace App\Providers;

use App\Models\ExitPass;
use App\Observers\ExitPassObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->observers();
    }

    private function observers() {
        ExitPass::observe(ExitPassObserver::class);
    }
}
