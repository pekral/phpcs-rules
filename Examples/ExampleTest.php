<?php

declare(strict_types = 1);

namespace Example;

final class ExampleTest
{

    private string $greeting = 'Hello';

    public function sayHello(string $name): string
    {
        return sprintf('%s, %s!', $this->greeting, $name);
    }

} 