<?php

declare(strict_types = 1);

namespace Example;

final class RequireTrailingCommaInDeclarationExample
{

    public function foo(int $a, int $b,): int {
        return $a + $b;
    }

} 