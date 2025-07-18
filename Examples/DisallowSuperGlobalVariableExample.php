<?php

declare(strict_types = 1);

namespace Example;

final class DisallowSuperGlobalVariableExample
{

    public function foo(string $input): string
    {
        return $input;
    }

} 