<?php

declare(strict_types = 1);

namespace Example;

final class ClassStructureExample
{

    private int $number = 0;

    public function __construct()
    {
        // intentionally left blank
    }

    public function getNumber(): int
    {
        return $this->number;
    }

} 