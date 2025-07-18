<?php

declare(strict_types = 1);

namespace Example;

final class ShortListExample
{

    public function foo(): int
    {
        [$a, $b] = [1, 2];

        return $a + $b;
    }

} 