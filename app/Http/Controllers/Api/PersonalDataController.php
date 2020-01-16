<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PersonalData;

class PersonalDataController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PersonalData = DB::table('personal_data')->where('userid', $id)->first();
        return response(['user'=>$PersonalData]);
    }

    public function update(Request $request,$id)
    {
        $PersonalData = PersonalData::where('userid', $id)->first();

        $PersonalData -> firstname =  $request->firstname;
        $PersonalData -> lastname =$request->lastname;
        $PersonalData -> phone = $request->phone;
        //$PersonalData -> sex = 'female';
        $PersonalData -> birthdate = $request->birthdate;
        $PersonalData->save();
        return response(['user'=>$PersonalData]);
    }
}
