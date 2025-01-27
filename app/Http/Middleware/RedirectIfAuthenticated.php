<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                
                if (in_array($user->role, ['admin', 'superadmin'])) {
                    return redirect('/dashboard/categories'); 
                }

                return redirect('/'); 
            }
        }

        return $next($request);
    }
}
