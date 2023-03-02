<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class kirimEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_email)
    {
        $this->data_email = $data_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject($this->data_email['subject'])
            ->from($this->data_email['sender_name'])
            ->view('mail.kirimEmailPassword');
    }
}
