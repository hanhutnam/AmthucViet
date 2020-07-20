<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetpasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail,$link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail,$link)
    {
        $this->mail = $mail;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset mật khẩu')->view('emails.resetpassword');
    }
}
