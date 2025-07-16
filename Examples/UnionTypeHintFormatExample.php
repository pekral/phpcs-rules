<?php

declare(strict_types = 1);

namespace Example;

final class UnionTypeHintFormatExample
{

    public function foo(int|string $value): int|string
    {
        return $value;
    }

} 