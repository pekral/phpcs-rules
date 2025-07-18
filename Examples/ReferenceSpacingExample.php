<?php

declare(strict_types = 1);

namespace Example;

final class ReferenceSpacingExample
{

    public function foo(): void
    {
        $a = 1;
        $b = &$a;
        echo $b;
    }

} 