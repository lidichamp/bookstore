<?php
use App\Author;
use Illuminate\Database\Seeder;
Class AuthorsTableSeeder extends Seeder {
 
    public function run()
    {
DB::table('authors')->delete();

        Author::create(array(
            'name' => 'Tobi',
            'surname'=>'Adeoye'
        ));

        Author::create(array(
            'name' => 'damilola',
            'surname'=>'omidire'
        ));

        Author::create(array(
            'name' => 'Toyin',
            'surname'=>'Dolapo'
        ));

    }
    }