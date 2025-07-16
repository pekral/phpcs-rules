<?php

declare(strict_types = 1);

namespace Example;

use RuntimeException;
use Throwable;

final class ExceptionExample
{

    public function tryCatchExample(): string
    {
        try {
            throw new RuntimeException('Error!');
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

} 