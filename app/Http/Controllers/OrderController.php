<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function postOrder(Request $request)
  {
    $rules=array(

      'address'=>'required'
    );

  $validator = Validator::make($request->all(), $rules);

      if ($validator->fails())
      {
        return redirect()->back()->with('error','Address field is required!');
          
      }

      $member_id = Auth::user()->id;
      $address = Input::get('address');

       $cart_books = Cart::with('Books')->where('member_id','=',$member_id)->get();

       $cart_total=Cart::with('Books')->where('member_id','=',$member_id)->sum('total');

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


  public function getIndex(){

    $member_id = Auth::user()->id;

    if(Auth::user()->admin){

      $orders=Order::all();

    }else{

      $orders=Order::with('orderItems')->where('member_id','=',$member_id)->get();
    }

    if(!$orders){

      return Redirect::route('index')->with('error','There is no order.');
    }
    
    return View::make('order')
          ->with('orders', $orders);
  }

}
