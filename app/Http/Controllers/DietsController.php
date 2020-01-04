<?php

namespace App\Http\Controllers;

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
        $diets = Diets::where('userid','=', $idUser)->paginate(2);
        return view('Users.Diets.index', ['idUser'=>$idUser,'diets'=>$diets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUser)
    {
        $diets = Diets::where('userid','=', $idUser)->paginate(2);
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

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateTo);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dateFrom);
        return $to->diffInDays($from);
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
        //return $id;
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
    public function select($idUser,$id)
    {
        //return $id;
        return Diets::find($id);
    }
}
