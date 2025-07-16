<?php

declare(strict_types = 1);

namespace Example;

final class FunctionExample
{

    public function getGreeting(): string
    {
        $greet = static fn (string $name): string => sprintf('Hello, %s!', $name);

        return $greet('World');
    }

} 