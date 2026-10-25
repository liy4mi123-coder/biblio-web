<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query('autorise') != 1) {
            return response('Accès refusé', 403);
        }

        return $next($request);
    }
}