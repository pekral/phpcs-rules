<?php

declare(strict_types = 1);

namespace Example;

final class DisallowPartiallyKeyedExample
{

    public function getArray(): array
    {
        return [
            0 => 'a',
            1 => 'b',
            2 => 'c',
        ];
    }

} 