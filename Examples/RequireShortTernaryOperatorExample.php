<?php

declare(strict_types = 1);

namespace Example;

final class RequireShortTernaryOperatorExample
{

    public function foo(?int $a): int
    {
        return $a ?: 0;
    }

} 