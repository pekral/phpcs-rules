<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

final class UseDoesNotStartWithBackslashExample
{

    public function foo(): void
    {
        new DateTime();
    }

} 