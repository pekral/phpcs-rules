<?php

declare(strict_types = 1);

namespace Example;

final class ArrayAccessExample
{

    public function getFirst(array $arr): mixed
    {
        return $arr[0] ?? null;
    }

} 