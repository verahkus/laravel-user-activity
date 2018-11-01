<?php

namespace Verahkus\UserActivity\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

class ActivityUserMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    dd(Auth::user());
//    ActivityUser::dispatch(Auth::user(),$request->server(),true);
    return $next($request);
  }
}
