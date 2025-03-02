<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Message;
use Exception;
use Closure;

class ApiProtectedRoute extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $exception) {

            if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['message' => Message::tokenExpiredException()], 400);

            } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['message' => Message::tokenInvalidException()], 400);

            } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
                return response()->json(['message' => Message::jwtException()], 400);

            } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\BlacklistedException) {
                return response()->json(['message' => Message::blacklistedException()], 400);
            }
        }
        return $next($request);
    }
}
