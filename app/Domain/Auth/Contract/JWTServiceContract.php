<?php

namespace App\Domain\Auth\Contract;

interface JWTServiceContract
{
    public function encode(array $data, int $exp, int $iat): string;
    public function decode(string $token): array;
    public function verify(string $token): bool;
}
