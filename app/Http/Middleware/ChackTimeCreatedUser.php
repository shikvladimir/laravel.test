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
