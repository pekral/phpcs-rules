<?php

declare(strict_types = 1);

namespace Example;

use stdClass;

final class NewWithParenthesesExample
{

    public function foo(): stdClass
    {
        return new stdClass();
    }

} 