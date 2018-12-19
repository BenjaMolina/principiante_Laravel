<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

class SendAutoresponder
{


    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;
        
        Mail::send('emails.contact', ["msg" => $message], function ($m) use ($message) {
            $m->to($message->email, $message->nombre)
                ->subject("Tu mensaje fue recibido");
        });
    }
}
