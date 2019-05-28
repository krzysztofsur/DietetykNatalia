<?php

use App\Measurement;
use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = new Measurement();
        $measurements -> userid = 2;
        $measurements -> weight = 164.5;
        $measurements -> height = 52;
        $measurements -> waist = 1;
        $measurements -> stomach = 1;
        $measurements -> hips= 1;
        $measurements -> neck = 1;
        $measurements -> wrist = 1;
        $measurements -> thigh = 1;
        $measurements -> biceps = 1;
        $measurements -> chest = 1;
        $measurements -> save();
            
    }
  
}
