<?php

namespace Verahkus\UserActivity;

use Verahkus\UserActivity\Controllers\UserActivityController;
use Illuminate\Support\ServiceProvider;

class UserActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/user-activity.php' => config_path('user-activity.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('UserActivityController', UserActivityController::class);
//        $this->app->make(UserActivityController::class);
    }
}
