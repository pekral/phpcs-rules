<?php

declare(strict_types = 1);

namespace Example;

final class RequireNowdocExample
{

    public function foo(): string
    {
        return <<<'NOW'
Line 1
Line 2
NOW;
    }

} 