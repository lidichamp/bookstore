<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;
use App\Book;


class adminAuthorController extends Controller
{
    public function getIndex()
    {
      
        
          
    return view('admin.add_authour');
    }
    public function storeAuthor(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
            ]);         
       
        $authoradd= new Author();
        $authoradd->name= $request['first_name'];
        $authoradd->surname= $request['sur_name'];
    // add other fields
    $authoradd->save();

            
    return redirect('admin/dashboard')->with('message','Your have successfully added author');
    }
    public function editAuthor()
    {
        $authors = Author::with('books')->get();
        $books = Book::with('author')->get();
        
         
         return view('admin.edit_author', compact('authors','books') );
  
    }
    public function editAuthors()
    {
        $authors = Author::with('books')->get();
        $books = Book::with('author')->get();
        
         
         return view('admin.edit_authors', compact('authors','books') );
         
  
    }

    public function SaveEditAuthors(Request $request)
    {
        
        $authoradd= Author::find($id);
        $authoradd->name= $request['first_name'];
        $authoradd->surname= $request['sur_name'];
    // add other fields
    $authoradd->save();
    }
    public function getDelete($id){
        
            $authors = Author::find($id)->delete();
        
            return redirect('author');
          }
           
          
}
