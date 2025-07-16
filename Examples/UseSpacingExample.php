<?php

declare(strict_types = 1);

namespace Example;

use DateTime;
use Exception;

final class UseSpacingExample
{

    public function foo(): void
    {
        new DateTime();
        new Exception();
    }

} 