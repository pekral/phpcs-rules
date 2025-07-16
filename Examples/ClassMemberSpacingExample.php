<?php

declare(strict_types = 1);

namespace Example;

final class ClassMemberSpacingExample
{

    public function __construct(private int $number)
    {
    }

    public function getNumber(): int
    {
        return $this->number;
    }

} 