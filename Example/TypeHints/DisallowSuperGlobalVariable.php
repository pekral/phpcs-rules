<?php

declare(strict_types = 1);

namespace Example\TypeHints;

final class DisallowSuperGlobalVariable
{

    public function foo(): int
    {
        return 1;
    }

} 