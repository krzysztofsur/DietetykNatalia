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
        
        $create = new UserRelationships();
        //$create->measurement("natka@example.com");
        // $user->email="natka@example.com";
        // $user->name="natt";
        // $create->createAll(json_encode($user));
        $tab= [
            "email" => "natka@example.com",
            "fname" => "Katt",
            "lname" => "Gaww",
        ];
        //$name=$create->measurement($tab);
        $name = "natt";
        //$test= bcrypt();
        $user = User::find(3);
        $personalData= $user->personaldata;
        $name=\App\Classes\WebHelper::initialization()->getGender($personalData->sex);

        //$test= $this->salt("1234567899", $name);
        //var_dump($tab["test2"]);
        return view('home',['test' => $name]);
    }

    function salt($password, $name)
    {
        return $name;
    }


}
