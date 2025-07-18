<?php

declare(strict_types = 1);

namespace Example\PHP;

final class ForbiddenClasses
{

    public function foo(): void
    {
        // Does not use forbidden classes
        echo 'ok';
    }

} 