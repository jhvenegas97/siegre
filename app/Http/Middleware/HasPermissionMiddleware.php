<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class HasPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $existsInArray = false;
        foreach($permissions as $permission){
            if(in_array($permission,Auth::user()->getAllPermissions()->pluck('name')->toArray())){
                $existsInArray = true;
                break;
            }
        }
        if(Auth::check() && $existsInArray) {
            return $next($request);
        }

        return response()->json([
            'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS.'
        ],401);
    }
}
