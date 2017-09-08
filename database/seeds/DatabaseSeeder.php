<?php

use Illuminate\Database\Seeder;

use App\Book;
Class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */public function run()
  {
    Eloquent::unguard();

    $this->call('UsersTableSeeder');
    $this->command->info('Users table seeded!');
    $this->call('AuthorsTableSeeder');
    $this->command->info('authors table seeded!');
    $this->call('BooksTableSeeder');
    $this->command->info('Books table seeded!');
  }
}




