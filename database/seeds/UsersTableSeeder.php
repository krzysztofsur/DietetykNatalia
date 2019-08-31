<?php

use App\Roles;
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
        $admin =Roles::where('name', 'Admin')->first();
        $master =Roles::where('name', 'Master')->first();
        $user = new User();
        $user->name = 'natka';
        $user->email = 'natka@example.com';
        $user->password = bcrypt('natka');
        $user->save();
        $user->roles()->attach($admin);
        $user->roles()->attach($master);


        $user = new User();
        $user->name = 'user';
        $user->email = 'user@example.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($admin);

    }
}
