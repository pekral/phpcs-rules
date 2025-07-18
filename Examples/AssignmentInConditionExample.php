<?php

declare(strict_types = 1);

namespace Example;

final class AssignmentInConditionExample
{

    public function foo(array $arr): int
    {
        $value = $arr[0] ?? null;

        if ($value !== null) {
            return $value;
        }

        return 0;
    }

} 