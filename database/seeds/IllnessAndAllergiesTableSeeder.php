<?php

use Illuminate\Database\Seeder;
use App\IllnessAndAllergies;

class IllnessAndAllergiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $illnessandallergies = new IllnessAndAllergies();
        $illnessandallergies -> userid = '1';
        $illnessandallergies -> illnessid = '1,2,3,4';
        $illnessandallergies -> allergiesid = '0,3';
        $illnessandallergies -> save();
    
        
    }
}
