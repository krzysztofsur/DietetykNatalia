<?php

use App\PersonalData;
use Illuminate\Database\Seeder;

class PersonalDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personaldata = new PersonalData();
        $personaldata->userid = '1';
        $personaldata->firstname = 'Katka';
        $personaldata->lastname = 'Gaweł';
        $personaldata->phone = '111111111';
        $personaldata->sex = 'female';
        $personaldata->birthdate = '2011-11-11';
        $personaldata->save();

        $personaldata = new PersonalData();
        $personaldata->userid = '2';
        $personaldata->firstname = 'Katka2';
        $personaldata->lastname = 'Gaweł2';
        $personaldata->phone = '111111111';
        $personaldata->sex = 'female';
        $personaldata->birthdate = '2011-11-11';
        $personaldata->save();

    }
}