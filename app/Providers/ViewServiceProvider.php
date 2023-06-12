<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Facades\View::composer('layouts.user', function (View $view) {
            $view->with('activeSchedule', auth()->user()->schedules()->where([['is_canceled', false], ['is_fulfilled', false], ['schedule_time', '>', Carbon::now()]])->get());
        });
    }
}
