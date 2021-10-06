<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChackTimeCreatedUser
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
        $user = Auth::user();
        $time = $user['created_at'];
        $current = Carbon::now();
        if($current->diffInDays($time)>3){
            return $next($request) ;
        }else{
            return 'Прошло больше 3 дней!';
        }
    }

}
