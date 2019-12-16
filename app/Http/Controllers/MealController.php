<?php

namespace App\Http\Controllers;

use App\Meals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('product_categories')->get();
        $products = DB::table('products')->take(100)->get();
        $meals = DB::table('meals')->take(100)->get();
        return view('Meal.index',['meals'=> $meals,'products' => $products,'categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->ajax()) {
        // $meal = new Meals();
        // $meal->name = $request->name;
        // $meal->save();
        // return $meal->id;
        // };
        return 3;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query=$request->get('query');
            $category = DB::table('meals')
                ->where('name', 'like', '%'.$query.'%')
                ->take(100)
                ->get();
            return response(['meals'=>$category]);
        };
        
    }

    public function addIngredient(Request $request)
    {
        if ($request->ajax()){
            $test="zaqw";
            $meal = Meals::find($request->mealId);
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
            return $array;
            //return "id: ".$meal->products->weight;
            //return "(^.^)";
        };
    }
    public function showProducts()
    {
        $categories = DB::table('product_categories')->get();
        $products = DB::table('products')->take(100)->get();
        return response(['products' => $products,'categories'=> $categories]);
    }


}
