<?php

namespace App\Http\Middleware;

use Closure;

class Maintence
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
        abort(503);
        //return $next($request);
    }
}
