<?php

declare(strict_types = 1);

namespace Example;

final class DisallowCommentAfterCodeExample
{

    public function foo(): int
    {
        // This is a valid comment
        return 1;
    }

} 