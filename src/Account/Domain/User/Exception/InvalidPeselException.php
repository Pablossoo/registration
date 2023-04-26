<?php

namespace App\Account\Domain\User\Exception;

class InvalidPeselException extends \Exception
{
   public static function invalidPeselException(string $nip) {
       return new self(sprintf('Invalid Pesel number %s ,should contains 11 character', $nip));
   }
}