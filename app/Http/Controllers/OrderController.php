<?php
namespace App\Http\Controllers;
use Validator;
use App\Order;
use Auth;
use App\Cart;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\mail\AnRediaBookStore;
class OrderController extends Controller
{
    public function postOrder(Request $request)
  {
    $rules=array(

      'address'=>'required|email'
      
        
    
    );
    $address = $request->address;
  $validator = Validator::make($request->all(), $rules);

      if ($validator->fails())
      {
        return redirect()->back()->with('error','Address field is required!');
          
      }
      $member_id = Auth::user()->id;

      $cart_data=Cart::where('member_id','=',$member_id)->get();
      if(!$cart_data){
        return redirect('index')->with('error','Your cart is empty');
               
               }
      
      $book_id=$cart_data->pluck('book_id');
      $total=$cart_data->sum('total');
      
      $amount=$cart_data->pluck('amount');
      
      
        
      $order=Order::FirstorCreate(
        array(
        'member_id'=>$member_id,
        'address'=>$address,
        'total'=>$total
        ));

        
        foreach ($cart_data as $order_books) {

          

                  $order->orderItems()->attach($order_books->book_id,array(
                    
                    'amount'=>$order_books->amount,
                    'price'=>$order_books->Books->price,
                    'total'=>$order_books->Books->price*$order_books->amount
                    ));
          
                  }

               $rder=Order::with('orderItems')->find($order->id);
               
               
              
      Cart::where('member_id','=',$member_id)->delete();
      Mail::to($address)->send(new AnRediaBookStore($rder));
      
      return redirect('index')->with('success','Your order processed successfully.');
  }
/*
if(!$cart_books){

         return Redirect::route('index')->with('error','Your cart is empty.');
       }

    $order = Order::create(
        array(
        'member_id'=>$member_id,
        'address'=>$address,
        'total'=>$cart_total
        ));
        
      foreach ($cart_books as $order_books) {

        $order->orderItems()->attach($order_books->book_id, array(
          'amount'=>$order_books->amount,
          'price'=>$order_books->Books->price,
          'total'=>$order_books->Books->price*$order_books->amount
          ));

      }
      
      
      Cart::where('member_id','=',$member_id)->delete();
      Mail::to($address)->send(new AnRediaBookStore($order));
      return Redirect::route('index')->with('success','Your order processed successfully.');
  }
*/

  public function getIndex(){

    $member_id = Auth::user()->id;

    if(Auth::user()->admin){

      $orders=Order::all();

    }else{

      $orders=Order::with('orderItems')->where('member_id','=',$member_id)->get();
     
    }

    if(!$orders){

      return redirect ('index')->with('error','There is no order.');
    }
    
    return View::make('order')
          ->with('orders', $orders);
  }

}
