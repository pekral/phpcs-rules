<?php

declare(strict_types = 1);

namespace Example;

final class ParameterTypeHintExample
{

    public function setNumber(int $number): void
    {
        // intentionally left blank
        unset($number);
    }

} 