<?php

declare(strict_types = 1);

namespace Example\Classes;

class Base
{

    public function foo(): void {
        // Next time
    }

}

final class ParentCallSpacing extends Base
{

    public function foo(): void
    {
        // intentionally left blank
    }

} 