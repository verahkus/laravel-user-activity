<?php

Route::group(['middleware' => config('user-activity.defaultMiddlewareAuth')], function () {
    Route::get('/user/get-last-activity','\Verahkus\UserActivity\Controllers\UserActivityController@getUserLastActivity');
});
