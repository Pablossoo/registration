<?php

namespace App\Account\Domain\User\Exception;

class InvalidNipException extends \Exception
{
   public static function invalidNipException(string $nip) {
       return new self(sprintf('Invalid NIP number %s ,should contains 10 character', $nip));
   }
}