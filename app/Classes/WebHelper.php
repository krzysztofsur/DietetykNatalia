<?php

namespace App\Classes;

class WebHelper{
    public static function initialization()
    {
        return new WebHelper();
    }

    public function getGender($gender)
    {
        if($gender=="male"){
            return "kobieta";
        }else{
            return "mężczyzna";
        }
    }
}