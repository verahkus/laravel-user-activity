<?php

namespace Verahkus\UserActivity\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function getUserLastActivity($user_id=null)
    {
        dd(Auth::user());
        $user = (is_null($user_id))? Auth::user(): User::find((int)$user_id);

        dd($user);

//        if (Carbon::parse(Auth::user()->last_time)->addSeconds(env('TIME_LOGOUT'))<Carbon::now()) {
//            $logout = false;
//        } else {
//            $logout=true;
//        }
//
//        return response()->json([
//            'success' => true,
//            'last_time'=>Auth::user()->last_time,
//            'time_logout'=>Carbon::parse(Auth::user()->last_time)->addSeconds(env('TIME_LOGOUT')),
//            'status'=>Auth::user()->status,
//            'status_logout'=>$logout
//        ]);
    }
}
