<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $a = new User;
            $a->name = "JohnDoe";
            $a->email = "JohnDoe@gmail.com";
            $a->password = "JohnDoe";
            $a->save();

            $users = User::factory()->count(10)->create();


    }
}
