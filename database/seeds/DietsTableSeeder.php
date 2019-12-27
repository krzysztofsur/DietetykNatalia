<?php

use Illuminate\Database\Seeder;
use App\Diets;

class DietsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diets = new Diets();
        $diets->title = "title";
        $diets->dateFrom = "2019-11-11";
        $diets->dateTo = "2019-11-20";
        $diets->userid = 3;
        $diets->save();
    }
}
