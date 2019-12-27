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
        $users = Diets::where('userid','=', $idUser)->paginate(10);
        return view('Users.Diets.index', ['idUser'=>$idUser,'diets'=>$users]);
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
    public function update(Request $request, $id)
    {
        return $id;
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
}
