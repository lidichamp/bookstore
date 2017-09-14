<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnRediaBookStore extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->amount = $data['amount'];
        $this->price = $data['price'];
        $this->total = $data['total'];
        
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
            'amount'=>$order_books->amount,
            'price'=>$order_books->Books->price,
            'total'=>$order_books->Books->price*$order_books->amount
        ]);
            
    }
}
