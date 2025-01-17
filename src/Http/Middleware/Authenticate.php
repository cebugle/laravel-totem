<?php

namespace Cebugle\Totem\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cebugle\Totem\Totem;

class Authenticate
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response
     */
    public function handle($request, $next)
    {
        return Totem::check($request) ? $next($request) : abort(403);
    }
}
