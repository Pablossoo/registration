<?php

namespace App\Account\Domain\ValueObject;

use App\Account\Domain\User\Exception\InvalidPeselException;

final class Pesel
{
    private const MINIMUM_LENGTH_CHARACTER = 11;
    public readonly string $pesel;

    public function __construct(string $pesel)
    {
        if (!$this->validate($pesel)) {
            throw InvalidPeselException::invalidPeselException($pesel);
        }
        $this->pesel = $pesel;
    }

    private function validate(string $nip): bool
    {
        return strlen($nip) === self::MINIMUM_LENGTH_CHARACTER;
    }
}