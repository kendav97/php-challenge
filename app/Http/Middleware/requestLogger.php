<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class requestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $service = $request->path();
        $request_body = json_encode(['args' => $request->all(), 'body' => $request->getContent()]);
        $ip = $request->ip();
        
        $response = $next($request);
        
        $user_id = Auth::guard('api')->user()->id ?? null;
        $http_response_code = $response->getStatusCode();
        $response_body = $response->getContent();

        Log::create([
            'user_id' => $user_id,
            'service' => $service,
            'request_body' => $request_body,
            'http_response_code' => $http_response_code,
            'response_body' => $response_body,
            'ip' => $ip,
        ]);

        return $response;
    }
}
