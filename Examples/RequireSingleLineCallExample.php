<?php

declare(strict_types = 1);

namespace Example;

final class RequireSingleLineCallExample
{

    public function foo(): int
    {
        return max(1, 2);
    }

} 