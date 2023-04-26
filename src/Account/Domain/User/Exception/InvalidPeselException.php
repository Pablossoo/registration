<?php

namespace App\Account\Domain\User\Exception;

final class InvalidPeselException extends \Exception
{
   public static function invalidPeselException(string $nip): self {
       return new self(sprintf('Invalid Pesel number %s ,should contains 11 character', $nip));
   }
}