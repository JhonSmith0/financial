<?php

namespace App\Domain\Auth\Contract;

interface JWTServiceContract
{
    /**
     * @param array<mixed, mixed> $data
     */
    public function encode(array $data, int $exp, int $iat): string;
    /**
     * @return array<mixed, mixed>
     */
    public function decode(string $token): array;
    public function verify(string $token): bool;
}
