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
            $a->email = "john.doe@gmail.com";
            $a->password = "newpassword";
            $a->role = "Admin";
            $a->save();

            $a = new User;
            $a->username = "abbyt1099";
            $a->name = "Abby Thomas";
            $a->email = "a.thomas@gmail.com";
            $a->password = "newpassword";
            $a->role = "Student";
            $a->save();

            $a = new User;
            $a->username = "bread_smith";
            $a->name = "Bradley Smith";
            $a->email = "bradsmith.new@aol.com";
            $a->password = "newpassword";
            $a->role = "Student";
            $a->save();

            $users = User::factory()->count(10)->create();
    }
}
