<?php

declare(strict_types = 1);

namespace Example;

final class UselessParameterDefaultValueExample
{

    public function foo(int $a): int
    {
        return $a;
    }

} 