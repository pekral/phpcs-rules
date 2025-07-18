<?php

declare(strict_types = 1);

namespace Example;

final class DuplicateAssignmentToVariableExample
{

    public function foo(): int
    {
        $a = 1;
        $b = 2;

        return $a + $b;
    }

} 