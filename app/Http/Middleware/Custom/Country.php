<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class Country
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
        if ($request->has('country') && in_array($request->country, ['eg', 'sa', 'ae'])) {
            return $next($request);
        }
        return helperJson(null, 'you should send country', 403);
    }
}
