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
   * @param \Verahkus\UserActivity\Events\ActivityUser|ActivityUserEvent $event
   */
  public function handle(ActivityUser $event)
  {
    $tmp_user = $event->user;
    $tmp_user->update(['last_activity'=>Carbon::now()]);

    dd($tmp_user);
  }
}
