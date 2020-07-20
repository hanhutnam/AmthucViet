<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$sub,$content,$email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$sub,$content,$email)
    {
        $this->name = $name;
        $this->sub = $sub;
        $this->content = $content;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->sub)->view('emails.contact');
    }
}
