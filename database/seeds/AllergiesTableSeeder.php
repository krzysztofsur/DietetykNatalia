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
            $allergies -> userid = '1';
            $allergies -> name = 'Allergies'.$i;
            $allergies -> save();
        };
    }
}
