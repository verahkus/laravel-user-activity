<?php

Route::group(['middleware' => config('user-activity.defaultMiddlewareAuth')], function () {
    Route::post('/user/last-activity','\Verahkus\UserActivity\Controllers\UserActivityController@userLastActivity')->name('user-last-activity');
    Route::post('/user/set-activity','\Verahkus\UserActivity\Controllers\UserActivityController@userSetActivity')->name('user-set-activity');
});
