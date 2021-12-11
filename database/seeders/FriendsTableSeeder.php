<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;


class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('friend_users')->insert([
            'user_id' => 1,
            'friend_id' => 2,
        ]);

        $users = User::all();

        // Populate the pivot table
        User::all()->each(function ($user) use ($users) { 


            //$random = array(random(rand(1, 3))->except($user->id));
            //$users = array_diff($users, $random);


            $user->friends()->attach(
                $users->random(rand(1, 3))->except($user->id)->pluck('id')->toArray()  //A user is friends with any random 3 users except themself
               // $random->pluck('id')->toArray()

            ); 
        });
    }
}
