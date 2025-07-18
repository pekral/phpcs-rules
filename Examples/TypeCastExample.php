<?php

declare(strict_types = 1);

namespace Example;

final class TypeCastExample
{

    public function foo(float $a): int
    {
        return (int) $a;
    }

} 