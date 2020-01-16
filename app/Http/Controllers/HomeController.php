<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\UserRelationships;
use App\DietDays;
use App\Diets;
use App\Meals;
use App\User;
class addObj{};
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$user = User::find(3);
        //$personalData= $user->personaldata;
        //$name=\App\Classes\WebHelper::initialization()->getGender($personalData->sex);
        $name=100* \App\Classes\WebHelper::initialization()->unitConverter("szczypta");
         //$to = \Carbon\Carbon::createFromFormat('Y-m-d', '2019-9-30')->addDays();
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d', '2015-5-6');
        // $diff_in_days = $to->diffInDays($from);
        // $name=$diff_in_days; // Output: 1
        
        
        $diet = DietDays::find(179);
        $json=json_decode($diet->table);
        $objadd = new addObj(); 
        $objadd->id=1;
        array_push($json[1]->meals, $objadd);
        print_r($json);
        $diet->table=json_encode($json);
        $diet->save();
        // foreach ($json as $keys) {
        //     foreach($keys->meals as $key){
        //         echo $key->id;
        //         $key->meal= Meals::find($key->id);
        //         echo $key->meal->name;
        //     }

        // }
        

        //var_dump($newdiet);
        //return view('home',['test' => $diff_in_days]);
    }



}
