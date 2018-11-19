<?php

return [

    'enabled'                       =>  env('USER_ACTIVITY_ENABLED', true),
    'defaultUserModel'              =>  'App\User',
    'defaultMiddlewareAuth'         =>  'web',
    'timeLogout'                    =>  '3000',

];