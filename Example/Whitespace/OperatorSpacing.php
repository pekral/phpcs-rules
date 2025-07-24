<?php

declare(strict_types = 1);

namespace Example\Whitespace;

final class OperatorSpacing
{

    public function foo(int $a, int $b): int
    {
        // Correct spacing around operators
        return $a + $b * 2;
    }

} 