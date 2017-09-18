<?php

namespace App\Http\Middleware;

use Closure;
use App\Cart;
use Auth;
class CartQuantity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if( Auth::check())
        {
             $cart_items = Cart::where('member_id', Auth::user()->id)->get(['amount']);
             
             $Quantity=$cart_items->sum(['amount']);
            view()->share('Quantity',$Quantity);
         }

        return $next($request);
    }
}
