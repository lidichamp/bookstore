<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class CartController extends Controller
{
   public function postAddToCart(Request $request)
 {
   dd($request->all());
   /** $rules=array(

      'amount'=>'required|numeric',
      'book'=>'required|numeric|exists:books,id'
    );

    $validator = Validator::make(Request::all(), $rules);

      if ($validator->fails())
      {
          return redirect()->back()->with('error','The book could not added to your cart!');
      }
dump('iya');*/

$this->validate($request, [
       'amount'=>'required|numeric',
      'book'=>'required|numeric|exists:books,id'
    ]);
      $member_id = Auth::user()->id;
      $book_id = $request->book;
      $amount = $request->amount;

      $book = Book::find($book_id);
      $total = $amount*$book->price;

       $count = Cart::where('book_id','=',$book_id)->where('member_id','=',$member_id)->count();

       if($count){


          return redirect()->back()->with('error','The book already in your cart.');
       }

      Cart::create(
        array(
        'member_id'=>$member_id,
        'book_id'=>$book_id,
        'amount'=>$amount,
        'total'=>$total
        ));

      return redirect('cart');
  }


  public function getIndex(){

    $member_id = Auth::user()->id;

    $cart_books=Cart::with('Books')->where('member_id','=',$member_id)->get();

    $cart_total=Cart::with('Books')->where('member_id','=',$member_id)->sum('total');

    if(!$cart_books){

      return redirect('index')->with('error','Your cart is empty');
    }
    
    return view('cart')
          ->with('cart_books', $cart_books)
          ->with('cart_total',$cart_total);
  }

  public function getDelete($id){

    $cart = Cart::find($id)->delete();

    return redirect('cart');
  }

}