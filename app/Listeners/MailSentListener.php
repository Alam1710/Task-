<?php

namespace App\Listeners;

use App\Events\MailSentEvent;
use App\Jobs\SentMailJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailSentListener
{

   
    public User $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MailSentEvent  $event
     * @return void
     */
    public function handle(MailSentEvent $event)
    {
        $delay = now()->addSeconds(5);
        SentMailJob::dispatch($event->user)->delay($delay);
    }
}
