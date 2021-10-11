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
//        Более простой метод проверки
//        $user = Auth::user();
//        if(!Auth::user()){
//            abort(403);
//        }
//        $today = Carbon::now();
//        $create = Carbon::parse($user->created_at);
//        if($today->diffInDays($create)>3){
//            abort(404);
//        }


        $user = Auth::user();
        $nowDate = Carbon::today();
        $timeRegistration = $user['created_at'];
        $activityTime = $nowDate ->subDays(3);

        if($timeRegistration > $activityTime){
            return $next($request) ;
        }else{
            abort(404);
        }
    }

}
