<?php

declare(strict_types = 1);

namespace Example;

use DateTime;
use Exception;

final class DisallowGroupUseExample
{

    public function foo(): void
    {
        new DateTime();
        new Exception();
    }

} 