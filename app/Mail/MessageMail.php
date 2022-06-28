<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mes;
    public $sender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender,$message)
    {
        $this->mes = $message;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lms@scocs.edu.pk',$this->sender)->view('emails.MessageMail');
    }
}
