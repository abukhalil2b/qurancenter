<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $slug): Response
    {
        $hasPermission = $request->user()->hasPermission($slug);

        if ($hasPermission) {
            return $next($request);
        }
        abort(403);
    }
}
