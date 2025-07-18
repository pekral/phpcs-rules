<?php

declare(strict_types = 1);

namespace Example;

final class BlockControlStructureSpacingIncorrectLinesCountAfterControlStructureExample
{

    public function foo(bool $flag): int
    {
        if ($flag) {
            return 1;
        }

        return 0;
    }

} 