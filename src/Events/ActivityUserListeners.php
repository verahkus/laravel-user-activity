<?php

namespace Verahkus\UserActivity\Events;

use Verahkus\UserActivity\Events\ActivityUser;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ActivityUserListeners implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  ActivityUserEvent  $event
   * @return void
   */
  public function handle(ActivityUser $event)
  {
    $tmp_user = $event->user;
    $tmp_user->update(['last_activity'=>Carbon::now()]);

    dd($tmp_user);
//    if ($event->writeActivity) {
//      $this->writeActivity($event->user,$event->request);
//    }
//    $expiresAt = Carbon::now()->addMinutes(5);
//    Cache::tags(['users_online'])->put('user-is-online-' .$tmp_user->id, $tmp_user->id, $expiresAt);
  }

  /**
   * @author verahkus <dev@verahkus.ru>
   * запись посещения в базу (user_activity)
   * @param $user
   * @param $data
   */
  public function writeActivity($user, $data) {
    $user->activity()->create([
      'page' => $data['REQUEST_URI'],
      'ip' => $data['REMOTE_ADDR'],
      'user_agent' => $data['HTTP_USER_AGENT'],
      'server' => collect($data),
    ]);
  }
}
