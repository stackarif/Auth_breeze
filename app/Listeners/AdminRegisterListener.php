<?php

namespace App\Listeners;

use App\Events\AdminRegisterEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminRegisterListener
{
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
     * @param  object  $event
     * @return void
     */
    public function handle(AdminRegisterEvent $event)
    {
        if ($event->admin instanceof MustVerifyEmail && ! $event->admin->hasVerifiedEmail()) {
            $event->admin->sendEmailVerificationNotification();
        }

    }
}
