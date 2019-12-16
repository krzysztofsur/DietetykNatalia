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

        $measurements -> save();
        $measurements->user()->attach(User::where('email', 'natka@example.com')->first());
            
    }
  
}
