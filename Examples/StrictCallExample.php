<?php

declare(strict_types = 1);

namespace Example;

final class StrictCallExample
{

    public function foo(): int
    {
        return strlen('abc');
    }

} 