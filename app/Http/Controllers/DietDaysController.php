<?php

namespace App\Http\Controllers;

use App\DietDays;
use App\Diets;
use App\Meals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addObj{};
class DietDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUser,$idDiet)
    {
        $diets = Diets::find($idDiet)->dietDays;
        
        return view('Users.DietDays.index', ['idUser'=>$idUser,'diets'=>$diets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUser,$idDiet, $id)
    {

        // $diet = DietDays::find($id);
        // $json=json_decode($diet->table);
        // foreach ($json as $keys) {
        //     foreach($keys->meals as $key){
        //         $key->meal= Meals::find($key->id);
        //         echo $key->meal->name;
        //     }
        // }
        // return response(['diet'=>$diet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idUser,$idDiet, $id)
    {
        $meals = DB::table('meals')->take(100)->get();
        $diet = DietDays::find($id);
        $json=json_decode($diet->table);
        foreach ($json as $keys) {
            foreach($keys->meals as $key){
                $key->meal= Meals::find($key->id);
            }
        }
        $i=0;
        return view('Users.DietDays.show', [
            'diet'=>$json,
            'meals'=>$meals,
            'idUser'=>$idUser,
            'idDiet'=>$idDiet,
            'id'=>$id
            ]);

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
        $diet = DietDays::find($request->id);
        $json=json_decode($diet->table);
        $objadd = new addObj(); 
        $objadd->id=$request->id_meal;
        array_push($json[$request->id_table]->meals, $objadd);
        $diet->table=json_encode($json);
        $diet->save();
        return "(^.^)";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // $diet = DietDays::find($id);
        // $json=json_decode($diet->table);

        // unset($json[$request->i]->meals[$request->j]);
        // $diet->table=json_encode($json);
        // $diet->save();
        return "i= ".$request->i." j= ".$request->j." id= ".$id;
    }
}
