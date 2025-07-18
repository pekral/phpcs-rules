<?php

declare(strict_types = 1);

namespace Example;

final class RequireNullCoalesceOperatorExample
{

    public function foo(?int $a): int
    {
        return $a ?? 0;
    }

} 