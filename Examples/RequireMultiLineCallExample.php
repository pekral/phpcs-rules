<?php

declare(strict_types = 1);

namespace Example;

final class RequireMultiLineCallExample
{

    public function foo(): int
    {
        return max(1, 2, 3, 4);
    }

} 