<?php

namespace App\Http\Controllers\Api;

use App\ApiAuths;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
   public function passwordChange(Request $request, $id) 
   {
       if ($request->password==$request->check) {
           $user= User::find($id);
           $user->password= bcrypt($request->password);
           $user->save();
           return response(['message'=>$request->password]);
       }
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
        return response("tubfd");
   }

   public function logowanie(Request $request)
   {
        $today =Carbon::today();
        $user =User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password))
        {
            $auth= ApiAuths::where('userid', $user->id)->where('date', $today)->first();
            if($auth=='')
            {
                $table= new ApiAuths();
                $table->userid=$user->id;
                $table->date=$today;
                $table->token=Str::random(64);
                $table->save();
                return response(['id' => $user->id, 'token'=>$table->token]);
            }else
            {
                return response(['id' => $user->id, 'token' =>$auth->token]);
            }
        }
   }
}
