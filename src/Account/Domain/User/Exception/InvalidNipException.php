<?php

declare(strict_types=1);

namespace App\Account\Domain\User\Exception;

final class InvalidNipException extends \Exception
{
    public static function invalidNipException(string $nip): self
    {
        return new self(\sprintf('Invalid NIP number %s ,should contains 10 character', $nip));
    }
}
