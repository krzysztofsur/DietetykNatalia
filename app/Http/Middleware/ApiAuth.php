<?php

namespace App\Http\Middleware;

use App\ApiAuths;
use Carbon\Carbon;
use Closure;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $today =Carbon::today();
        $tmp=ApiAuths::where('token','=', $request->token)->where('date','=', $today)->first();
        if($tmp!==''){
            return $next($request);
        }
    }
}
