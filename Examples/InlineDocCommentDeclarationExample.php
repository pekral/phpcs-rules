<?php

declare(strict_types = 1);

namespace Example;

final class InlineDocCommentDeclarationExample
{

    public function foo(): void
    {
        /** @var int $bar */
        $bar = 1;
        echo $bar;
    }

} 