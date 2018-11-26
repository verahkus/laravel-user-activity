<?php

return [

    'enabled'                       =>  env('USER_ACTIVITY_ENABLED', true),
    'defaultUserModel'              =>  'App\User',
    'defaultMiddlewareAuth'         =>  'web',
    'timeLogout'                    =>  env('USER_ACTIVITY_TIME_LOGOUT', 3000),
    'idleWait'                      =>  env('USER_ACTIVITY_IDLE_WAIT', 5000),
    'timerAjax'                     =>  env('USER_ACTIVITY_TIMER_AJAX', 5000),

];