<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Services\Message;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            return response()->json(['message' => Message::tokenExpiredException(), 'status' => 400]);

        } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            return response()->json(['message' => Message::tokenInvalidException(), 'status' => 400]);

        } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
            return response()->json(['message' => Message::jwtException(), 'status' => 400]);

        } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\BlacklistedException) {
            return response()->json(['message' => Message::blacklistedException(), 'status' => 400]);
        }

        return parent::render($request, $exception);
    }
}
