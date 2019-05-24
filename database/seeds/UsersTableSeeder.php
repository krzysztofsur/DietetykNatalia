<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'natka';
        $user->email = 'natka@example.com';
        $user->password = bcrypt('natka');
        $user->save();
    }
}
