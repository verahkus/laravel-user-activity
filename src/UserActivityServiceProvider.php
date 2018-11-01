<?php
namespace Verahkus\UserActivity;

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

  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
//        $this->app->make('Verahkus\UserActivity\ChangeModelController');
  }
}
