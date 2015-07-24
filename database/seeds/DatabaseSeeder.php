<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('PostTableSeeder');

        Model::reguard();
    }
}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        //Truncate any existing records in the posts table.
        App\Post::truncate();

        //Call the Post model factory, 20 times, creating the resulting rows in the database.
        factory(App\Post::class, 20)->create();
    }
}