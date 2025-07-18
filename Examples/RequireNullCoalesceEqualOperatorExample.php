<?php

declare(strict_types = 1);

namespace Example;

final class RequireNullCoalesceEqualOperatorExample
{

    public function foo(?int $a): int
    {
        $a ??= 0;

        return $a;
    }

} 