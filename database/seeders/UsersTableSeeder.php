<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            $a->username = "JohnTheDoe99";
            $a->name = "John Doe";
            $a->email = "JohnDoe@gmail.com";
            $a->password = "JohnDoePassword";
            $a->save();

            $users = User::factory()->count(10)->create();
    }
}
