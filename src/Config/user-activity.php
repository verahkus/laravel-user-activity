<?php

return [

    'enabled'                       =>  env('USER_ACTIVITY_ENABLED', true),
    'defaultUserModel'              =>  'App\User',
    'defaultMiddlewareAuth'         =>  'web',
    'timeLogout'                    =>  env('USER_ACTIVITY_TIME_LOGOUT', 3000),

];