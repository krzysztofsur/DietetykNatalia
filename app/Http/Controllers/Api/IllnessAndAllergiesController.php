<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\IllnessAndAllergies;

class IllnessAndAllergiesController extends Controller
{
    public function show($id)
    {
        $PersonalData = DB::table('illness_and_allergies')->where('userid', $id)->first();
        return response(['user'=>$PersonalData]);
    }

    public function update(Request $request,$id)
    {
        $data = IllnessAndAllergies::where('userid', $id)->first();

        $data -> illnessid = $request->illnessid;
        $data -> allergiesid = $request->allergiesid;
        $data -> save();
        return response(['user'=>$data]);
    }
}
