<?php

namespace App\Domain\Auth\Middleware;

use App\Domain\Auth\Contract\AuthServiceContract;
use Closure;
use Illuminate\Http\Request;

class ValidateJWTMiddleware
{

    public function __construct(
        private AuthServiceContract $authService,
    ) {
    }

    public function handle(Request $request, Closure $next): mixed
    {
        /**
         * @var string
         */
        $token = $request->header('Authorization');
        $user = $this->authService->validateUserToken($token);
        set_user($user);
        return $next($request);
    }
}
