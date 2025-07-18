<?php

declare(strict_types = 1);

namespace Example\TypeHints;

final class UnionTypeHintFormat
{

    public function foo(int|string $value): int|string
    {
        return $value;
    }

} 