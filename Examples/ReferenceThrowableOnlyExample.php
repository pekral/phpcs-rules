<?php

declare(strict_types = 1);

namespace Example;

use RuntimeException;
use Throwable;

final class ReferenceThrowableOnlyExample
{

    public function foo(): string
    {
        try {
            throw new RuntimeException('Error!');
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

} 