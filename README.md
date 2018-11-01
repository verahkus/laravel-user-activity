1. Open your config/app.php and add the following to the providers array:
```
Verahkus\UserActivity\UserActivityServiceProvider::class,
```

2. Run the command below to publish the package config file config/user-activity.php:
```
php artisan vendor:publish --provider="Verahkus\UserActivity\UserActivityServiceProvider"
```
3. Open you Kernel.php and add in $routeMiddleware array:
```
    protected $routeMiddleware = [
        ...,
        'active-user' => \Verahkus\UserActivity\Middleware\ActivityUserMiddleware::class
    ];
```
4. Open you EventServiceProvider.php and add in $listen array:
```
    protected $listen = [
      ...,
      'Verahkus\UserActivity\Events\ActivityUser' => [
        'Verahkus\UserActivity\Events\ActivityUserListeners',
      ]
    ];
```
5. Open you User.php and add in $fillable array:
```
    protected $fillable = [
        ...,
        'last_activity'
    ];
```

   