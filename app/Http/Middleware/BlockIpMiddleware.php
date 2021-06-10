<?php

namespace App\Http\Middleware;

use Closure;

class BlockIpMiddleware
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
        if (in_array($request->ip(), config('blacklist.ips'))) {
            return response()->json(['message' => 'Server Error'], 500);;
        }
        return $next($request);
    }
}
