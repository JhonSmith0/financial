<?php

namespace App\Domain\Auth\Providers;

use App\Domain\Auth\Contract\AuthServiceContract;
use App\Domain\Auth\Contract\JWTServiceContract;
use App\Domain\Auth\Services\AuthService;
use App\Domain\Auth\Services\JWTService;
use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    public $bindings = [
        JWTServiceContract::class => JWTService::class,
        AuthServiceContract::class => AuthService::class,
    ];

    public function register()
    {
        $this->app->when(JWTService::class)->needs('$secret_key')->give(env('JWT_SECRET'));
    }
}
