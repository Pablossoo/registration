<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Logger;

use Psr\Log\LoggerInterface;

final class FileLogger implements LoggerInterface
{
    //tutaj jeszcze powinniśmy dostarczyć ściezkę i plik który chcemy używać - mozna z zewnętątrz przez jakiś serwis
    public function emergency(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        //najbardziej trywialna implementacja loggera :)
        \file_put_contents('user.log', $message);
    }
}
