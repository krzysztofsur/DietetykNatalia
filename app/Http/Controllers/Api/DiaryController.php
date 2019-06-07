<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Diary;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Diary = DB::table('diaries')->where('userid', $id)->get();
        return response(['user'=>$Diary]);

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
        $diary =Diary::where('id', $id)->first();

        $diary -> date = $request->date;
        //$diary -> wakeup = $request->wakeup;
        $diary -> sleeptime = $request->sleeptime;
        //$diary -> breakfast1 = $request->breakfast1;
        //$diary -> breakfast2 = $request->breakfast2;
        //$diary -> dinner = $request->dinner;
        //$diary -> tea = $request->tea;
        //$diary -> supper = $request->supper;
        //$diary -> snacks = $request->snacks;
        $diary -> save();
        return response(['user'=>$diary]);
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
