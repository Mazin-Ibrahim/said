<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResponseApi
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
        // dd("mazin");
        // dd($request);
        $response = $next($request);

        if (in_array($response->status(), [200, 201, 404, 401, 422,204])) {
            $response->header('Content-Type', 'application/json');
        }

        return $response;
    }
}