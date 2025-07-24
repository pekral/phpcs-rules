<?php

declare(strict_types = 1);

namespace Example\Variables;

final class DuplicateAssignmentToVariable
{

    public function foo(): int
    {
        $a = 1;

        return $a + 1;
    }

} 