<?php

declare(strict_types = 1);

namespace Example\Whitespace;

final class ScopeIndent
{

    public function foo(): void
    {
        if (true) {
            echo 'indented';
        }
    }

} 