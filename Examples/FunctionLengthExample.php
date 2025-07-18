<?php

declare(strict_types = 1);

namespace Example;

final class FunctionLengthExample
{

    public function foo(): int
    {
        $a = 1;
        $b = 2;

        return $a + $b;
    }

} 