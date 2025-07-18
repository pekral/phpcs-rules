<?php

declare(strict_types = 1);

namespace Example;

final class DisallowImplicitArrayCreationExample
{

    public function getArray(): array
    {
        $arr = [];
        $arr[] = 1;

        return $arr;
    }

} 