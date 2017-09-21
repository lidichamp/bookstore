<?php

namespace App\Http\Controllers;
use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getIndex()
    {
        
        $authors = Author::with('books')->get();
        $books = Book::with('author')->get();
       
        
        return view('author_list', compact('authors','books') );
    }
   
    
}
