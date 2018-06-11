<?php

namespace App\Http\Middleware;

use Closure;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = func_get_args(); //Obtenemos todos los parametros que se envian a la funcion
        $roles = array_slice($roles,2); //Quitamos los dos parametros $request y $next

        if(auth()->user()->hasRoles($roles)){
            return $next($request);
        }        

        return redirect('/');
        
    }
}
