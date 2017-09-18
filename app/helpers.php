<?php
use App\Cart;

 function getCartContents()
  {
    if( Auth::check())
    {
         $cart_items = Cart::where('member_id', Auth::user()->id)->get(['amount']);
         
         $Quantity=$cart_items->sum(['amount']);
         
         return $Quantity;
        
     }
   
    //view()->share('amount', $cart_item->amount);
  }
  ?>