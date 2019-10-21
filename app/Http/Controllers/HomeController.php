<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
       // ['recipes' => $recipes]
        $name = "natt";
        //$test= bcrypt();
        $test= $this->salt("1234567899", $name);

        return view('home',['test' => $test]);
    }

    function salt($password, $name)
    {
        return $name;
    }


}
