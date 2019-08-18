<?php

use App\UserRequest;

use Illuminate\Database\Seeder;

class UserRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $table = new UserRequest();
        $table->title='test'; 
        $table->email='mail@mail.pl'; 
        $table->fname='imie'; 
        $table->lname='nazwisko'; 
        $table->message='daj żyć :D'; 
        $table->save();
    }
}
