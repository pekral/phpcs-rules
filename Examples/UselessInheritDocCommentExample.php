<?php

declare(strict_types = 1);

namespace Example;

interface Base
{

    public function foo(): void;

}

final class UselessInheritDocCommentExample implements Base
{

    public function foo(): void
    {
        // intentionally left blank
    }

} 