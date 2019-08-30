<?php

use Illuminate\Database\Seeder;
use App\Illness;
class IllnessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $illness = new Illness();
            $illness -> userid = '1';
            $illness -> name = 'Illness'.$i;
            $illness -> save();
        };
    }
}
