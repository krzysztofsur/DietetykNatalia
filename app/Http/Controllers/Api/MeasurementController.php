<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeasurementController extends Controller
{
    public function show()
   {
    $data = array(
        [
            'firstname'=>'jon',
            'lastname'=>'snow'
        ],
        [
            'name'=>'mon',
            'last'=>'gon'
        ]
    );

    return response($data); 
       
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


