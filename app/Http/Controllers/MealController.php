<?php

namespace App\Http\Controllers;

use App\Meals;
use App\Product;
use App\ProductsHasMeals;
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
        if ($request->ajax()) {
        $meal = new Meals();
        $meal->name = $request->name;
        $meal->save();
        return $meal->id;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Meals::find($id);
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
        if ($request->ajax()) {
        $meal = Meals::find($id);
        $meal->name = $request->name;
        $meal->recipe= $request->mealRecipe;
        $meal->save();
        return $id." ".$request->name." ".$request->mealRecipe;
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meals::find($id);
        foreach ($meal->products as $product){
            $product->pivot->delete();
        };
        $meal->delete();
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

            $meal->products()->attach($request->productId ,['weight'=>$request->weight, 'unit'=>$test]);


        };
    }

    public function editIngredient(Request $request,$id)
    {
        $edit = ProductsHasMeals::find($id);
        $edit->product_id=$request->productId;
        $edit->weight=$request->weight;
        $edit->save();
    }

    public function deleteIngredient($id)
    {
        ProductsHasMeals::find($id)->delete();
    }

    public function showIngredient($id)
    {
        $meal = Meals::find($id);
        $array = [];
        $tmparr=[
            "name"=> "",
            "weight"=>1,
            "unit"=>"",
            "id"=>1
        ];
        foreach ($meal->products as $product){
            $tmparr["name"]=$product->name;
            $tmparr["weight"]=$product->pivot->weight;
            $tmparr["unit"]=$product->pivot->unit;
            $tmparr["id"]=$product->pivot->id;
            array_push($array, $tmparr);
        };
        return $array;
    }
    public function selectIngredient($id)
    {
        $name =Product::find(ProductsHasMeals::find($id)->product_id)->name;
        return ["weight"=>ProductsHasMeals::find($id)->weight,"name"=>$name];

    }
}
