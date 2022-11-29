<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach($guards as $guard){
            if(Auth::guard($guard)->check()){
                /** @var User $user */
                $user = Auth::guard($guard);

                if($user->hasRole('admin')){
                    return redirect()->route('admin.index');
                }elseif($user->hasRole('user')){
                    return redirect()->route('user.index');
                }
            }
        }
        return $next($request);
    }
}
