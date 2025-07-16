<?php

declare(strict_types = 1);

namespace Example;

final class VariableExample
{

    public function getLength(string $text): int
    {
        return strlen($text);
    }

} 