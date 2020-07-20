<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMails extends Mailable
{
    use  Queueable, SerializesModels;
    
    public $carts,$total,$customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $carts,$total,$customer)
    {
        $this->carts =  $carts;
        $this->total = $total;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Đơn hàng của bạn từ Ẩm Thực Việt')->view('emails.order');
    }
}
