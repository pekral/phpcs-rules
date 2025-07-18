<?php

declare(strict_types = 1);

namespace Example;

final class DisallowYodaComparisonExample
{

    public function foo(int $a): bool
    {
        return $a === 1;
    }

} 