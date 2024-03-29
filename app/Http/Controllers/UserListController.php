<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles_has_users', 'users.id', '=', 'roles_has_users.user_id')
            ->join('roles', 'roles_has_users.role_id', '=', 'roles.id')
            ->select('users.*')
            ->where('roles.name', '=', 'User')
            ->paginate(10);

        //$users = DB::table('users')->where('updated_at', 'desc')->paginate(10);
        return view('Users.List.index',  ['users' => $users]);
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
        $user = User::find($id);
        $personalData= $user->personaldata;
        $years = Carbon::parse($personalData->birthdate)->age;
        $gender=\App\Classes\WebHelper::initialization()->getGender($personalData->sex);

        $measurement= $user->measurement;
        
        return view('Users.List.show',  
        [
            'user' => $user,
            'personalData' => $personalData, 
            'measurement' => $measurement, 
            'age'=>$years,
            'gender'=>$gender
        ]);
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
        //
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
