<?php

declare(strict_types = 1);

namespace Example;

final class PhpExample
{

    public function castToInt(float $value): int
    {
        return (int) $value;
    }

    public function getReference(): void
    {
        $a = 1;
        $b = &$a;
        unset($b);
    }

} 