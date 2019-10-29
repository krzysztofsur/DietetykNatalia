<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('Product.index',  ['products' => $products,'categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->take(100)->get();
        return response(['products'=>$products]);
        // "(^.^)";
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
            $table = new Product();
            $table->name = $request->name;
            $table->protein = $request->protein;
            $table->categories_id = $request->category;
            $table->carbohydrates= $request->carbohydrates;
            $table->fats= $request->fats;
            $table->ca= $request->ca;
            $table->k= $request->k;
            $table->fe= $request->fe;
            $table->na= $request->na;
            $table->blonnik= $request->blonnik;
            $table->vitamin_c= $request->vitamin_c;
            $table->kwasy_nasycone= $request->kwasy_nasycone;
            $table->kwasy_nienasycone= $request->kwasy_nienasycone;
            $table->cholesterol= $request->cholesterol;
            $table->vitamin_b12= $request->vitamin_b12;
            $table->calories= $request->calory;
            $table->unit= $request->unit;
            $table->save();
            
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
     //   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $table = Product::where('id', $request->id)->first();
        $table->name = $request->name;
        $table->protein = $request->protein;
        $table->categories_id = $request->category;
        $table->carbohydrates= $request->carbohydrates;
        $table->fats= $request->fats;
        $table->ca= $request->ca;
        $table->k= $request->k;
        $table->fe= $request->fe;
        $table->na= $request->na;
        $table->blonnik= $request->blonnik;
        $table->vitamin_c= $request->vitamin_c;
        $table->kwasy_nasycone= $request->kwasy_nasycone;
        $table->kwasy_nienasycone=$request->kwasy_nienasycone;
        $table->cholesterol= $request->cholesterol;
        $table->vitamin_b12= $request->vitamin_b12;
        $table->calories= $request->calory;
        $table->unit= $request->unit;
        $table->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Product::find($id);
        $recipe->delete();
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query_cat=$request->get('query_cat');
            $query=$request->get('query');
            if($query_cat==0){
                $products = DB::table('products')
                    ->where('name', 'like', '%'.$query.'%')
                    ->take(100)
                    ->get();
            }else{
                $products = DB::table('products')
                    ->where('categories_id', '=', $query_cat)
                    ->where('name', 'like', '%'.$query.'%')
                    ->take(100)
                    ->get();
            };
            return response(['products'=>$products]);
        };
        
    }
}
