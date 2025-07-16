<?php

declare(strict_types = 1);

namespace Example;

use DateTime;
use Throwable;

final class NamespaceExample
{

    public function getDateTime(): DateTime
    {
        return new DateTime();
    }

    public function handleException(Throwable $e): string
    {
        return $e->getMessage();
    }

} 