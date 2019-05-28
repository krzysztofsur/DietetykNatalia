<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalDataController extends Controller
{
    

    public function show()
   {
    $PersonalData= DB::select('select * from personal_data where active = ?', [1]);
    

    return response($PersonalData); 
       
   }


   public function edit()
   {
    $data = array(
        [
            'name'=>'jeeeon',
            'last'=>'sneeefow'
        ],
        [
            'name'=>'mon',
            'last'=>'gon'
        ]
    );

    return response($data); 
       
   }
}
