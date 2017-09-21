<?php

namespace App\Mail;
use App\Order;
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
    public function __construct(Order $rder)
    {
        $this->rder=$rder;
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        {
        return $this->from('orders@anredia.com')
        ->view('mail.orderplaced')->with([
            'orderd'=>$this->rder
          
            
        ]);
        
        }  
    }
}
