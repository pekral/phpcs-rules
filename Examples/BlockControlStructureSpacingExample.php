<?php

declare(strict_types = 1);

namespace Example;

final class BlockControlStructureSpacingExample
{

    public function foo(bool $flag): int
    {
        if ($flag) {
            return 1;
        }

        return 0;
    }

} 