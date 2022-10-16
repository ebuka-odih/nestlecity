<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sendmsg;
    public function __construct($sendmsg)
    {
        //
        $this->sendmsg = $sendmsg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sendmsg = $this->sendmsg;
        return $this->markdown('emails.sendmessage')
            ->from('admin@nestleunion.com')
            ->subject($sendmsg->subject);
    }
}
