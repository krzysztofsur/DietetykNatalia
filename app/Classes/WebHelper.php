<?php

namespace App\Classes;
class mealObj{};
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
    public function mealsTable()
    {
        $arr= array();
        $meal1Obj = new mealObj();
        $meal2Obj = new mealObj();
        $meal3Obj = new mealObj();
        $meal4Obj = new mealObj();
        $meal1Obj->name='Sniadanie';
        $meal2Obj->name='Obiad';
        $meal3Obj->name='Podwieczorek';
        $meal4Obj->name='Kolacja';
        $meal1Obj->meals=array();
        $meal2Obj->meals=array();
        $meal3Obj->meals=array();
        $meal4Obj->meals=array();
        array_push($arr,$meal1Obj);
        array_push($arr,$meal2Obj);
        array_push($arr,$meal3Obj);
        array_push($arr,$meal4Obj);
        $jsonE = json_encode($arr);
        return $jsonE;
    }
}