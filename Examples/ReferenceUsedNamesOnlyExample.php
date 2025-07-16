<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

final class ReferenceUsedNamesOnlyExample
{

    public function foo(): void
    {
        new DateTime();
    }

} 