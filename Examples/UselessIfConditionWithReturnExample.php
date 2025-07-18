<?php

declare(strict_types = 1);

namespace Example;

final class UselessIfConditionWithReturnExample
{

    public function isPositive(int $a): bool
    {
        return $a > 0;
    }

} 