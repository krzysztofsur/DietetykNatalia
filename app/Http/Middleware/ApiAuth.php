<?php

namespace App\Http\Middleware;

use App\ApiAuths;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $today =Carbon::today();
        $headers = apache_request_headers();

        //$tmp=ApiAuths::where('token','=', $request->token)->where('date','=', $today)->first();
        // if($headers['token']=="zaq"){
        //     return $next($request);
        // }
        $tmp=ApiAuths::where('token','=', $request->header('token'))->where('date','=', $today)->first();
        if($tmp!= ''){  
            return $next($request); 
        };
        return response(['error'=>$request->header('token')]);
    }
}
