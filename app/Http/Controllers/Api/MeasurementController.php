<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Measurement;

class MeasurementController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PersonalData = DB::table('measurements')->where('userid', $id)->first();
        return response(['user'=>$PersonalData]);
    }

    public function update(Request $request,$id)
    {
        $measurements = Measurement::where('userid', $id)->first();

        $measurements -> weight = $request->weight;
        $measurements -> height = $request->height;
        $measurements -> waist = $request->waist;
        $measurements -> stomach = $request->stomach;
        $measurements -> hips= $request->hips;
        $measurements -> neck = $request->neck;
        $measurements -> wrist = $request->wrist;
        $measurements -> thigh = $request->thigh;
        $measurements -> biceps = $request->biceps;
        $measurements -> chest = $request->chest;
        $measurements -> save();
        return response(['user'=>$measurements]);
    }
}
