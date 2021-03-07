<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ComprobarAdmin
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
        $id = Auth::user()->id;
        $usuario = User::findOrFail($id);
        if ($usuario->rol != "ADMIN") {
            return redirect("/")->withErrors(["La página a la que has intentado entrar requiere permisos de administrador"]);
        } else {
            return $next($request);
        }
    }
}
