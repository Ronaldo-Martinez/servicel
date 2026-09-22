<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsurePasswordIsUpdated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->must_change_password) {
                // Permitir sólo la ruta para cambiar la contraseña y cerrar sesión
                if (!$request->routeIs('password.force-change', 'password.force-change.update', 'logout')) {
                    return redirect()->route('password.force-change');
                }
            }
        }

        return $next($request);
    }
}
