<?php
use App\Book;
use Illuminate\Database\Seeder;
Class BooksTableSeeder extends Seeder {

  public function run()
  {
  
  Book::create(array(
    'title'=>'Requiem',
    'isbn'=>97800,
    'price'=>13.40,
    'cover'=>'requiem.jpg',
    'author_id'=>1
   ));
  Book::create(array(
    'title'=>'Twilight',
    'isbn'=>97803,
    'price'=>15.40,
    'cover'=>'twilight.jpg',
    'author_id'=>2
  ));
  Book::create(array(
    'title'=>'Deception Point',
    'isbn'=>97806,
    'price'=>16.40,
    'cover'=>'deception.jpg',
    'author_id'=>3
  ));

  }
     
}