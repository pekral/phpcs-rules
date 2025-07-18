<?php

declare(strict_types = 1);

namespace Example;

final class UnusedParameterExample
{

    public function foo(int $a): int
    {
        return $a;
    }

} 