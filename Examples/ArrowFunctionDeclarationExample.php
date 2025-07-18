<?php

declare(strict_types = 1);

namespace Example;

final class ArrowFunctionDeclarationExample
{

    public function foo(): int
    {
        $fn = static fn (int $a) => $a * 2;

        return $fn(3);
    }

} 