<?php

use App\User;
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
        $user = new User();
        $user->name = 'Administrator';
        $user->username = 'admin';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('password');
        $user->save();        
    }
}
