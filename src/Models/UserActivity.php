<?php

namespace Verahkus\UserActivity\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $fillable = [
        'page',
        'ip',
        'user_agent',
        'server'
    ];
}
