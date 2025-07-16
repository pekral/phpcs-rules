<?php

declare(strict_types = 1);

namespace Example;

final class WhitespaceExample
{

    public function check(int $a, int $b): bool
    {
        return 
            $a > 0
            && $b > 0
        ;
    }

} 