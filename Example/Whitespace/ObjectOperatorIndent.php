<?php

declare(strict_types = 1);

namespace Example\Whitespace;

class Helper
{

    public function getValue(): int
    {
        return 42;
    }

}

final class ObjectOperatorIndent
{

    public function foo(): int
    {
        $helper = new Helper();

        return $helper
            ->getValue();
    }

} 