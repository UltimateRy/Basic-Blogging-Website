<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $a = new Post;
            $a->contents = "This is the first post on the site.";
            $a->user_id = 1; //first user
            $a->save();
    
            //$users = User::factory()->count(10)->create();
        
    }
}
