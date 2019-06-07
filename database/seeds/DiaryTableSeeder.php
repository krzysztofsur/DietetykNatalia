<?php

use App\Diary;
use Illuminate\Database\Seeder;

class DiaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diary = new Diary();
        $diary -> userid = '1';
            $diary -> date = '2019-06-05';
            $diary -> wakeup = '11:01:01' ;
            $diary -> sleeptime = '23:23:23' ;
            $diary -> breakfast1 = '{"breakfast1": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }';
            $diary -> breakfast2 = '{"breakfast2": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }';
            $diary -> dinner = '{"dinner": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }' ;
            $diary -> tea = '{"tea": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }' ;
            $diary -> supper = '{"supper": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }' ;
            $diary -> snacks = '{"snacks": { "time" : "8:00", "characteristic" : "lala", "quantity" : "100"} }' ;
            $diary -> save();
    }
}
