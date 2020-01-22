<?php

namespace App\Http\Controllers;

use App\ApiAuths;
use Illuminate\Http\Request;
use App\Classes\UserRelationships;
use Carbon\Carbon;

class addObj{};
class HomeController extends Controller
{


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
