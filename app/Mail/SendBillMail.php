<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBillMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->user->name;
        $order = $this->order;

        return $this->from("admin@sportClub.be")
            ->subject('sportClub :  your prove payment')
            ->view('mails.sendBill', compact('name', 'order'));
    }
}
