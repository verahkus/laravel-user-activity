<?php

namespace Verahkus\UserActivity;

use Illuminate\Support\Facades\Blade;
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
        //конфиг
        $this->publishes([
            __DIR__ . '/Config/user-activity.php' => config_path('user-activity.php'),
        ]);
        //миграции
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        //роуты
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        //вьюхи
        $this->loadViewsFrom(__DIR__.'/views', 'user-activity');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/user-activity'),
        ]);
        //шаблон вьюхи с js кодом
        Blade::directive('user_activity', function () {
            return "<?php echo \$__env->make('user-activity::timer')->render(); ?>";
        });
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