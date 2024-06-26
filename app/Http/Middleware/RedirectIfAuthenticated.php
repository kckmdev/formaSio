<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
                
                //redirection user avec isUser
                if (auth()->user()->isUser()) {
                    return redirect()->route('user.dashboard')->with('statut', 'Vous êtes connecté en tant qu\'utilisateur');
                }
    
                //redirection admin avec isAdmin
                if (auth()->user()->isAdmin()) {
                    return redirect()->route('admin.dashboard')->with('status', 'Vous êtes connecté en tant qu\'administrateur');
                }
        }

        return $next($request);
    }
}
