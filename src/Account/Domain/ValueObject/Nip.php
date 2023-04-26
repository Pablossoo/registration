<?php

namespace App\Account\Domain\ValueObject;

use App\Account\Domain\User\Exception\InvalidNipException;

final class Nip
{
    private const MINIMUM_LENGTH_CHARACTER = 10;
    public readonly string $nip;

    public function __construct(string $nip)
    {
        if (!$this->validate($nip)) {
            throw InvalidNipException::invalidNipException($nip);
        }
        $this->nip = $nip;
    }


    private function validate(string $nip): bool
    {
        return strlen($nip) === self::MINIMUM_LENGTH_CHARACTER;
    }
}