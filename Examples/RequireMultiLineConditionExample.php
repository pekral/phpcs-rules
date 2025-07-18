<?php

declare(strict_types = 1);

namespace Example;

final class RequireMultiLineConditionExample
{

    public function foo(int $a, int $b, int $c): bool
    {
        return 
            $a > 0 &&
            $b > 0 &&
            $c > 0
        ;
    }

} 