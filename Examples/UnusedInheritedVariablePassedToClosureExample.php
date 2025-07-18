<?php

declare(strict_types = 1);

namespace Example;

final class UnusedInheritedVariablePassedToClosureExample
{

    public function foo(): int
    {
        $fn = static fn () => 42;

        return $fn();
    }

} 