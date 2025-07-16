<?php

declare(strict_types = 1);

namespace Example;

final class NullableTypeForNullDefaultValueExample
{

    public function foo(?int $number = null): void
    {
        // intentionally left blank
        unset($number);
    }

} 