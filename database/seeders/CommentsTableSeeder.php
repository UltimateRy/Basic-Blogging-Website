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
        $a->contents = "This is the first comment on the site.";
        $a->user_id = 1; //first user
        $a->post_id = 1; //first post
        $a->save();

        $comments = Comment::factory()->count(10)->create();

    }
}
