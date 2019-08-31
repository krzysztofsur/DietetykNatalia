<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UserRequest;

class FrontPageController extends Controller
{
    public function contact()
    {
        return view('FrontPage/contact');
    }

    public function userRequest()
    {
        return view('FrontPage/request');
    }
    public function userRequestSend(Request $request)
    {
        //return $request->title;
        if ($request->ajax()) {

            $request->validate([
                'title' => 'required|min:5|max:255',
                'email' => 'required',
                'message' => 'required|min:20',
                'fname' => 'required',
                'lname' => 'required',
            ]);
                $userRequest = new UserRequest();
                $userRequest->email = $request->email;
                $userRequest->title = $request->title;
                $userRequest->fname = $request->fname;
                $userRequest->lname = $request->lname;
                $userRequest->message = $request->message;
                $userRequest->save();
        }
        return "(^.^)";
    }
}
