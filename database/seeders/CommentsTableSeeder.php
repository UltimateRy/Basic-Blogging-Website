<?php

namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $a = new Comment;
        $a->contents = "Thanks so much for developing this blog site";
        $a->user_id = 2; //first user
        $a->post_id = 1; //first post
        $a->save();

        $a = new Comment;
        $a->contents = "No problem. Take all the time you need to get it right :)";
        $a->user_id = 3; //first user
        $a->post_id = 2; //first post
        $a->save();

        $comments = Comment::factory()->count(10)->create();

    }
}
