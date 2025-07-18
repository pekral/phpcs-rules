<?php

declare(strict_types = 1);

namespace Example;

final class DisallowDirectMagicInvokeCallExample
{

    public function foo(): int
    {
        $fn = static fn () => 42;

        return $fn();
    }

} 