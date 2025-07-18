<?php

declare(strict_types = 1);

namespace Example\Numbers;

final class DisallowNumericLiteralSeparator
{

    public function foo(): int
    {
        return 1000000;
    }

} 