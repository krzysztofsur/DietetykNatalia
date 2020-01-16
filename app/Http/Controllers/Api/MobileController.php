<?php

namespace App\Http\Controllers\Api;

use App\DietDays;
use App\Diets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meals;
use App\Product;
use Carbon\Carbon;

// [{"name":"Sniadanie","meals":[{"id":"2"},{"id":"2"}]},{"name":"Obiad","meals":[{"id":"3"},{"id":"1"}]},{"name":"Podwieczorek","meals":[{"id":"4"}]},{"name":"Kolacja","meals":[{"id":"4"}]}]
class tmpObj{}
class MobileController extends Controller
{
    public function productList($id)
    {
        $tomorrow =Carbon::tomorrow()->toDateString();
        $diets= Diets::where('userid', '=', $id)->where('confirmed', '=', '1')->first();
        if($diets!=''){
            $dietD=DietDays::where('dietid','=',$diets->id)->where('day','=',$tomorrow)->first();
            if($dietD!=''){
                $arr = array();
                $productArray=array();
                $result=array();
                $json=json_decode($dietD->table);
                foreach ($json as $keys) {
                    foreach($keys->meals as $key){
                        $key->meal= Meals::find($key->id);
                        array_push($arr, $key->meal->id);
                    }
                }
                $vals = array_count_values($arr);
                foreach ($vals as $key => $value) {
                    $meal=Meals::find($key);
                    foreach ($meal->products as $product) {
                        if(array_key_exists($product->pivot->product_id,$productArray)){
                            $productArray[$product->pivot->product_id]=$productArray[$product->pivot->product_id]+($product->pivot->weight*$value);
                        }else{
                            $productArray[$product->pivot->product_id]=($product->pivot->weight*$value);
                        }
                    }
                }
                foreach ($productArray as $key => $value) {
                    $product=Product::find($key);
                    $help=$product->name.' '.$value.'g';
                    array_push($result,$help);
                }
                return $result;
            }else{return "Koniec diety";}
        }else{return "Nie ma aktywnej diety";}
    }
    
    public function dietList($id)
    {
        $tmpObj= new tmpObj();
        $result=array();
        $today =Carbon::today();
        $diets= Diets::where('userid', '=', $id)->where('confirmed', '=', '1')->first();
        if($diets!=''){
            $dietD=DietDays::where('dietid','=',$diets->id)->where('day','=',$today)->first();
            if($dietD!=''){
                $tmpObj= new tmpObj();
                $tmpObj->id=$dietD->id;
                $tmpObj->day=$dietD->day;
                array_push($result,$tmpObj);
                $today->addDays();
                while(count($result)<=6 && DietDays::where('dietid','=',$diets->id)->where('day','=',$today)->first()!=''){
                    $dietD=DietDays::where('dietid','=',$diets->id)->where('day','=',$today)->first();
                    $tmpObj= new tmpObj();
                    $tmpObj->id=$dietD->id;
                    $tmpObj->day=$dietD->day;
                    array_push($result,$tmpObj);

                    $today->addDays();
                }
            }else {
                $tmpObj= new tmpObj();
                $tmpObj->id=0;
                $tmpObj->day="Brak diet";
                array_push($result,$tmpObj);
            }
        }else{
            $tmpObj= new tmpObj();
                $tmpObj->id=0;
                $tmpObj->day="Nie ma aktywnej diety";
                array_push($result,$tmpObj);
        }
        return $result;
    }
    public function dietDay($id)
    {
        $diet = DietDays::find($id);
        $json=json_decode($diet->table);
        foreach ($json as $keys) {
            foreach($keys->meals as $key){
                $key->meal= Meals::find($key->id);
            }
        }
        return $json; 
    }
    public function mealInfo($id)
    {
        $meal=Meals::find($id);
        return $meal->products;
    }
    public function todayDiet($id)
    {
        $today =Carbon::today();
        $diets= Diets::where('userid', '=', $id)->where('confirmed', '=', '1')->first();
        if($diets!=''){
            $dietD=DietDays::where('dietid','=',$diets->id)->where('day','=',$today)->first();
            if($dietD!=''){
                $json=json_decode($dietD->table);
                foreach ($json as $keys) {
                    foreach($keys->meals as $key){
                        $key->meal= Meals::find($key->id);
                    }
                }
                return $json;
            }else{
                return "Brak diet";
            }
        }else{
            return "Nie ma aktywnej diety";
        }
    }
}
