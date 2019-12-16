<?php

namespace App\Classes;

use App\Measurement;
use App\PersonalData;
use App\User;

class UserRelationships
{
    function createAll($user)
    {
        $this->measurement($user);
        $this->personalData($user);
    }

    function measurement($user)
    {
        $measurements = new Measurement();
        $measurements->userid = User::select('id')->where('email', $user["email"])->first()->id;
        $measurements -> save();

    }
    function personalData($user)
    {
        $personalData = new PersonalData();
        $personalData->userid = User::select('id')->where('email', $user["email"])->first()->id;
        $personalData->firstname =$user["fname"];
        $personalData->lastname =$user["lname"];
        $personalData->sex ='male';
        $personalData -> save();
    }
}