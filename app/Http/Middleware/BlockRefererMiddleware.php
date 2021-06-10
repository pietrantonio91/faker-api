<?php

namespace App\Http\Middleware;

use Closure;

class BlockRefererMiddleware
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
        $ref = $_SERVER['HTTP_REFERER'] ?? null;

        if (strpos($ref, 'worldnamegenerator.com')) {
            return response()->json(['message' => 'Server Error'], 500);;
        }
        return $next($request);
    }
}
