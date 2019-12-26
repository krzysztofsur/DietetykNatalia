<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\UserRelationships;
use App\Meals;
use App\User;

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
        // $to = \Carbon\Carbon::createFromFormat('Y-m-d', '2015-5-5');
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d', '2015-5-6');
        // $diff_in_days = $to->diffInDays($from);
        // $name=$diff_in_days; // Output: 1

        //var_dump($tab["test2"]);
        return view('home',['test' => $name]);
    }



}
