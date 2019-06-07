<?php

use Illuminate\Database\Seeder;
use App\Allergies;

class AllergiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $allergies = new Allergies();
            $allergies -> name = 'Allergies'.$i;
            $allergies -> save();
        };
    }
}
