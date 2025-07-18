<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

final class ForbiddenClassesExample
{

    public function foo(): DateTime
    {
        return new DateTime();
    }

} 