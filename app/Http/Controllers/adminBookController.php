<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
class adminBookController extends Controller
{
    public function getIndex()
    {
      
      $authors = Author::get(['id','name','surname']);
      
    return view('admin.add_book',compact('id', 'authors'));
    }
    public function AddBookView()
    {
  
      return view('product');
  
    }
    public function editBook()
    {
  
      $book = Book::with('author')->get();
     
      return view('admin.edit_book')->with('books',$book);
  
    }
    public function Dashboard()
    {
  
      return view('admin.dashboard');
  
    }
    public function storeBook(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
            ]);        
            
       $cover=$request['cover'];
        $bookadd= new Book();
        $bookadd->title= $request['book_title'];
        $bookadd->isbn= $request['book_isbn'];
        $bookadd->price= $request['price'];
        
        $bookadd->cover= Storage::url($cover);
        $bookadd->author_id= $request['author'];
        
    // add other fields
    $bookadd->save();

            
    return redirect('admin/dashboard')->with('message','Your have successfully added author');
    }
    public function getDelete($id){
      
          $book = Book::find($id)->delete();
      
          return redirect('index');
        }
}
