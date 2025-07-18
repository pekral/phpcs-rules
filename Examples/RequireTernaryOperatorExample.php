<?php

declare(strict_types = 1);

namespace Example;

final class RequireTernaryOperatorExample
{

    public function foo(int $a): string
    {
        return $a > 0 ? 'positive' : 'non-positive';
    }

} 