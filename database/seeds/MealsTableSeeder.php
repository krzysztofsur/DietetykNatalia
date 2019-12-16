<?php

use App\Meals;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test="zaqw";
        $meals = new Meals();
        $meals->name = 'natka';
        $meals->recipe = 'natka@example.com';
        $meals->save();
        $meals->products()->attach(1,['weight'=>100, 'unit'=>$test]);
    }
}
