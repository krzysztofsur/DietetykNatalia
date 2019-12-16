<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\UserRelationships;
use App\Meals;

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
        
        $meal = Meals::find(3);
        $array = [];
        $tmparr=[
            "name"=> "",
            "weight"=>1,
            "unit"=>"",
        ];
        //$meal->products()->attach($request->productId ,['weight'=>$request->weight, 'unit'=>$test]);
        foreach ($meal->products as $product){
            $tmparr["name"]=$product->name;
            $tmparr["weight"]=$product->pivot->weight;
            $tmparr["unit"]=$product->pivot->unit;
            array_push($array, $tmparr);
        };
        var_dump($array);
        foreach($array as $arr){
            echo $arr["name"];
            echo $arr["weight"];
            echo "<br>";
        }




        //$test= $this->salt("1234567899", $name);
        //var_dump($tab["test2"]);
        //return view('home',['test' => $name]);
    }

    function salt($password, $name)
    {
        return $name;
    }


}
