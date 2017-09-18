<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnRediaBookStore extends Mailable
{
    use Queueable, SerializesModels;
    use App\Cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart=$cart;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('orders@anredia.com')
        ->view('mail.orderplaced')->with([
            'amount'=>$this->cart->amount,
            'price'=>$this->cart->price,
            'total'=>$this->cart->amount
        ]);
            
    }
}
