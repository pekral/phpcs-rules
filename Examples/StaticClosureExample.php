<?php

declare(strict_types = 1);

namespace Example;

final class StaticClosureExample
{

    public function foo(): int
    {
        $fn = static fn (int $a): int => $a * 2;

        return $fn(3);
    }

} 