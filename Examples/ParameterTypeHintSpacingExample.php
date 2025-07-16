<?php

declare(strict_types = 1);

namespace Example;

final class ParameterTypeHintSpacingExample
{

    public function foo( int $number ): void
    {
        // intentionally left blank
        unset($number);
    }

} 