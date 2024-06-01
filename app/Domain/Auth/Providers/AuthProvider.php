<?php

namespace App\Domain\Auth\Providers;

use App\Domain\Auth\Contract\AuthServiceContract;
use App\Domain\Auth\Contract\JWTServiceContract;
use App\Domain\Auth\Services\AuthService;
use App\Domain\Auth\Services\JWTService;
use Exception;
use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * @var array<string, mixed>
     */
    public array $bindings = [
        JWTServiceContract::class => JWTService::class,
        AuthServiceContract::class => AuthService::class
    ];

    public function register()
    {
        /**
         * @var string|null
         */
        $secret = env('JWT_SECRET');
        if (is_null($secret)) {
            throw new Exception('Please, inform a JWT_SECRET!');
        }
        $this->app->when(JWTService::class)->needs('$secret_key')->give($secret);
    }
}
