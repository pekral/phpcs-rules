<?php

declare(strict_types = 1);

namespace Example;

final class BlockControlStructureSpacingIncorrectLinesCountBeforeControlStructureExample
{

    public function foo(bool $flag): int
    {
        $result = 0;

        if ($flag) {
            $result = 1;
        }

        return $result;
    }

} 