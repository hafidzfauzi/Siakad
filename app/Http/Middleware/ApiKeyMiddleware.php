<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apikey = $request->header('X-API-KEY');

        if ($apikey !== env('API_KEY')) {
            return response()->json(['status' => false, 'message' => 'Unauthorized - Invalid API Key'], 403);
        }
        return $next($request);
    }
}
