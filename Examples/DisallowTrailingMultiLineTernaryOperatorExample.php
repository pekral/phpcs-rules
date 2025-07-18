<?php

declare(strict_types = 1);

namespace Example;

final class DisallowTrailingMultiLineTernaryOperatorExample
{

    public function foo(int $a, int $b, int $c): int
    {
        return $a > $b ? $a : $c;
    }

} 