<?php

namespace Verahkus\UserActivity\Traits;

use Carbon\Carbon;
use ReflectionClass;
use Verahkus\UserActivity\Models\UserActivity;

trait UserActivityTrait
{
    public function activity()
    {
        return $this->hasMany(UserActivity::class,'user_id');
    }
}
