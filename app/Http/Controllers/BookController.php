<?php
namespace App\Http\Controllers;
use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getIndex()
  {

    
    $book = Book::with('author')->get();
    // $author = Author::with('books')->get();

    //dd($book->toArray());
    // foreach($author->)
    return view('book_list')->with('books',$book);

  }
 
}
