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
        $personaldata->firstname = 'Katarzyna';
        $personaldata->lastname = 'Gawłowska';
        $personaldata->phone = '510456754';
        $personaldata->sex = 'female';
        $personaldata->birthdate = '1997-12-11';
        $personaldata->save();

        $personaldata = new PersonalData();
        $personaldata->userid = '2';
        $personaldata->firstname = 'Stanisław';
        $personaldata->lastname = 'Kowalski';
        $personaldata->phone = '840578345';
        $personaldata->sex = 'male';
        $personaldata->birthdate = '1960-11-11';
        $personaldata->save();

    }
}