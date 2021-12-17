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
            $a->title = "The admins first post";
            $a->contents = "This is a brand new blog for general posting about life at university";
            $a->user_id = 1; //first user
            $a->save();

            $a = new Post;
            $a->title = "Maintenance Updates";
            $a->contents = "There will be downtime tomorrow from 3pm until 4pm. Sorry for any inconveniences";
            $a->user_id = 1; //first user
            $a->save();

            $a = new Post;
            $a->title = "New Post!";
            $a->contents = "Hello world! Welcome to my blog";
            $a->user_id = 2; //second user
            $a->save();
    
            $a = new Post;
            $a->title = "Laravel blog post";
            $a->contents = "Today has been a hard days work on my laravel project!";
            $a->user_id = 2; //second user
            $a->save();

            $a = new Post;
            $a->title = "New GPU";
            $a->contents = "Brand new PC graphics card has arrived, I'm so excited to begin using it for games :)";
            $a->user_id = 2; //second user
            $a->save();

            $a = new Post;
            $a->title = "Welcome to my blog";
            $a->contents = "Wishing everyone a warm welcome to my blog. I will be updating you all regularly";
            $a->user_id = 3; //third user
            $a->save();
    
            $a = new Post;
            $a->title = "Web Development Progress";
            $a->contents = "Managed to get alot done today on my laravel project, really happy with the result so far. Will keep updating here.";
            $a->user_id = 3; //third user
            $a->save();

            $a = new Post;
            $a->title = "New Minecraft World";
            $a->contents = "So I've decided to start playing again, god knows how long ill be this time! Just hoping for a good playthrough with the new content in the recent update!";
            $a->user_id = 3; //third user
            $a->save();

            $posts = Post::factory()->count(10)->create();

    }
}
