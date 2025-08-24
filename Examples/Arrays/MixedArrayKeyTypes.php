<?php

declare(strict_types = 1);

namespace Example\Arrays;

final class MixedArrayKeyTypes
{

    public function getStringKeysArray(): array
    {
        return [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];
    }

    public function getNumericKeysArray(): array
    {
        return [
            0 => 'first',
            1 => 'second',
            2 => 'third',
        ];
    }

    public function getImplicitNumericKeysArray(): array
    {
        return [
            'first',
            'second',
            'third',
        ];
    }

}
