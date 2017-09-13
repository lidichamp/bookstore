<?php
namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getIndex()
  {
    $books = Book::with('author')->get();

    return view('book_list')->with('books',$books);

  }

}
