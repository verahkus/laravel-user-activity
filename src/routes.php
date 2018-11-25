<?php

Route::group(['middleware' => config('user-activity.defaultMiddlewareAuth')], function () {
    Route::post('/user/last-activity','\Verahkus\UserActivity\Controllers\UserActivityController@userLastActivity');
});
