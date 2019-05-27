<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class AuthController extends Controller
{
    public function register(Request $request)
   {
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed',
        ]);

        $validatedData['password']= bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user, 'access_token'=>$accessToken]); 
   }


   public function login(Request $request)
   {
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message'=>'Sprawdź poprawność danych']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=> auth()->user(), 'access_token'=>$accessToken]); 
   }
   public function test()
   {
    $data = array(
        [
            'name'=>'jon',
            'last'=>'snow'
        ],
        [
            'name'=>'mon',
            'last'=>'gon'
        ]
    );

    return response($data); 
       
   }
}
