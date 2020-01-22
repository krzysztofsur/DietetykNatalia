<?php

namespace App\Http\Controllers;

use App\DietDays;
use App\User;
use App\Diets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DietsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUser)
    {
        //simplePaginate
        $diets = Diets::where('userid','=', $idUser)->paginate(20);
        return view('Users.Diets.index', ['idUser'=>$idUser,'diets'=>$diets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUser)
    {
        $diets = Diets::where('userid','=', $idUser)->paginate(20);
        return response(['diets'=>$diets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idUser, Request $request)
    {
        if ($request->ajax()) {
        $diets = new Diets();
        $diets->title = $request->title;
        $diets->dateFrom = $request->dateFrom;
        $diets->dateTo = $request->dateTo;
        $diets->userid = $idUser;
        $diets->save();
        $idDiet = $diets->id;

        
        //$table =\App\Classes\WebHelper::initialization()->mealsTable($request->meals);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateTo);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateFrom);
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateFrom);

        for ($i=0; $i < $to->diffInDays($from)+1; $i++) { 
            $dietDay = new DietDays();
            $dietDay->day=$date;
            $dietDay->table=\App\Classes\WebHelper::initialization()->mealsTable();
            $dietDay->dietid=$idDiet;
            $dietDay->save();
            $date->addDays();
            
        }



        return $to->diffInDays($from);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idUser ,$id)
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
    public function update(Request $request,$idUser, $id)
    {
        $diet= Diets::find($id);
        $diet->title = $request->title;
        $diet->dateTo = $request->dateTo;
        $diet->dateFrom = $request->dateFrom;
        $diet->save();
        
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateTo);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateFrom);
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateFrom);

        $size=sizeof($diet->dietDays);
        $diff_in_days = $to->diffInDays($from)+1;

        if($size<$diff_in_days){
            for ($i=0; $i < $diff_in_days-$size; $i++) { 
                $dietDay= new DietDays();
                $dietDay->day=$date;
                $dietDay->table=\App\Classes\WebHelper::initialization()->mealsTable();
                $dietDay->dietid=$id;
                $dietDay->save();
            }
        }else{
            for ($i=$diff_in_days; $i < $size; $i++) { 
                $diet->dietDays[$i]->delete();
            }
        }
        $diet = Diets::find($id);
        foreach ($diet->dietDays as $dietDay){
            $dietDay1 = DietDays::find($dietDay->id);
            $dietDay1->day=$date;
            $dietDay1->table=\App\Classes\WebHelper::initialization()->mealsTable();
            $dietDay1->dietid=$id;
            $dietDay1->save();
            $date->addDays();
        };
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUser, $id)
    {
        $diet = Diets::find($id);
        foreach ($diet->dietDays as $dietDay){
            $dietDay->delete();
        };
        $diet->delete();
    }
    public function select($idUser,$id)
    {
        return Diets::find($id);
    }
}
