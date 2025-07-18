<?php

declare(strict_types = 1);

namespace Example;

final class EarlyExitExample
{

    public function foo(int $a): int
    {
        if ($a < 0) {
            return 0;
        }

        return $a;
    }

} 