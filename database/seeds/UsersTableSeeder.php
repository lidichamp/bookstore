<?php
use App\User;
use Illuminate\Database\Seeder;
Class UsersTableSeeder extends Seeder {
 
    public function run()
    {
  DB::table('users')->delete();
  
User::create(array(
            'email' => 'lidichamp@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Lydia Robert',
            'admin'=>0
        ));
        
  User::create(array(
            'email' => 'lydia.insidify@gmail.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'Lydia Edia',
            'admin'=>1
        ));  

    }
 
}