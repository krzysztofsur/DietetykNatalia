<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\IllnessAndAllergies;
use App\Allergies;
use App\Illness;

class IllnessAndAllergiesController extends Controller
{
    public function show($id)
    {
        $PersonalData = DB::table('illness_and_allergies')->where('userid', $id)->first();
        $tabIllness = explode(',', $PersonalData->illnessid);
        $tabAllergies = explode(',', $PersonalData->allergiesid);
        $illness='';
        $allergies=array();
        for ($i=0; $i < sizeof($tabIllness) ; $i++) { 
            $ill = Illness::where('id', $tabIllness[$i])->pluck('name');
            
            //array_push($illness, $ill);
            $illness= $illness.$ill;
            

        }
        
        for ($i=0; $i < sizeof($tabAllergies) ; $i++) { 
            $all = Allergies::where('id', $tabAllergies[$i])->pluck('name');
            
            array_push($allergies, $all);

        }
        
        return response(['illness'=> $illness,'allergies'=>$allergies]);
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
