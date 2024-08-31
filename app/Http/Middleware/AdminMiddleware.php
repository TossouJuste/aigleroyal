<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est connecté et est un administrateur
        if (auth()->user() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Redirige vers la page d'accueil si l'utilisateur n'est pas un administrateur
        return redirect('/');
    }
}
