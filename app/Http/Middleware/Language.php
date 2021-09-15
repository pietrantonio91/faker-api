<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class Language
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
        if ($request->method() === 'GET') {
            $segment = $request->segment(1);

            if (!in_array($segment, config('app.locales'))) {
                $segments = $request->segments();
                $fallback = config('app.fallback_locale');
                $segments = Arr::prepend($segments, $fallback);

                return new RedirectResponse(implode('/', $segments));
            }

            app()->setLocale($segment);
        }

        return $next($request);
    }
}
