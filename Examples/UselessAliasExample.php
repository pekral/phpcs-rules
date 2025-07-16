<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

final class UselessAliasExample
{

    public function getDateTime(): DateTime
    {
        return new DateTime();
    }

} 