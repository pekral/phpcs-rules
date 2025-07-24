<?php

declare(strict_types = 1);

namespace Example\Whitespace;

final class DisallowTabIndent
{

    public function foo(): void
    {
        // Indentation uses spaces, not tabs
        echo 'spaces only';
    }

} 