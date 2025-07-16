<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

final class UnusedUsesExample
{

    public function getDateTime(): DateTime
    {
        return new DateTime();
    }

} 