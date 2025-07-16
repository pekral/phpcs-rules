<?php

declare(strict_types = 1);

namespace Example;

final class OperatorExample
{

    public function sum(int $a, int $b): int
    {
        $result = $a;
        $result += $b;

        return $result;
    }

    public function negate(bool $flag): bool
    {
        return ! $flag;
    }

} 