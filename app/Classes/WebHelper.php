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
    public function unitConverter($unit)
    {
        switch ($unit) {
            case 'szkl':
                $resoult= 250;
                break;
            case 'lyzka':
                $resoult= 15;
                break;
            case 'lyzeczka':
                $resoult= 5;
                break;
            case 'szczypta':
                $resoult= 5/8;
                break;
            default:
                $resoult= 1;
                break;
        }
        return $resoult/100;
    }
    public function mealsTable($type)
    {
        switch ($type) {
            case 'test':
                return "test";
                break;
            case 'value':
                return "value";
                break;
            default:
                # code...
                break;
        }
    }
}