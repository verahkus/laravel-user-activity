<?php

namespace Verahkus\UserActivity\Controllers;

use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{

    /**
     * @param (int) $user_id
     * @return \Illuminate\Contracts\Auth\Access\Authorizable
     */
    protected function getUser($user_id)
    {
        return (is_null($user_id))? Auth::user(): User::find((int)$user_id);
    }

    protected function getTimeLogout($user)
    {
        return Carbon::parse($user->last_activity)->addSeconds(config('user-activity.timeLogout'));
    }

    protected function getLogout($user)
    {
        return ($this->getTimeLogout($user) < Carbon::now())? true:false;
    }

    public function userLastActivity($user_id=null)
    {
        $user = $this->getUser($user_id);

        return response()->json([
            'last_time'=>$user->last_activity,
            'time_logout'=>$this->getTimeLogout($user)->toDateTimeString(),
            'logout'=>$this->getLogout($user)
        ]);
    }
}
