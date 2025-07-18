<?php

declare(strict_types = 1);

namespace Example;

final class DisallowOneLinePropertyDocCommentExample
{

    /**
     * Property description
     */
    private int $foo;

    public function __construct()
    {
        $this->foo = 1;
    }

} 