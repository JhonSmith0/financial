<?php

namespace App\Domain\Auth\Services;

use App\Domain\Auth\Contract\JWTServiceContract;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTService implements JWTServiceContract
{

    public function __construct(
        private string $secret_key
    ) {
    }

    public function encode(array $data, int $exp, int $iat): string
    {
        return JWT::encode([
            ...$data,
            'iat' => $iat,
            'exp' => $exp,
        ], $this->secret_key, 'HS256');
    }

    public function decode(string $token): array
    {
        return (array) JWT::decode($token, new Key($this->secret_key, 'HS256'));
    }

    public function verify(string $token): bool
    {
        try {
            $this->decode($token);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
