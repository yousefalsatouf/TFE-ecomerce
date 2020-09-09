<?php

namespace App\Listeners;

use App\Events\SendBillEvent;
use Illuminate\Support\Facades\Mail;

class SendBillListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendBillEvent $event)
    {
        //
        //dd($event->user[0]->email);
        Mail::to($event->user->email)->send( new \App\Mail\SendBillMail($event->user, $event->order));
    }
}
