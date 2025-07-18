<?php

declare(strict_types = 1);

namespace Example;

function namedArg(int $a, int $b): int {
    return $a + $b;
}

final class NamedArgumentSpacingExample
{

    public function foo(): int
    {
        return namedArg(a: 1, b: 2);
    }

} 