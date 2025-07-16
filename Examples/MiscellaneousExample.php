<?php

declare(strict_types = 1);

namespace Example;

final class MiscellaneousExample
{

    public function calculate(int $a, int $b): int
    {
        // Jednoduchá funkce bez zakázaných funkcí
        return $a * $b + ($a - $b);
    }

} 