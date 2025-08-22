<?php

declare(strict_types = 1);

namespace Example\TypeHints;

final class NullableTypeForNullDefaultValue
{

    public function example(string $param): int
    {
        return strlen($param);
    }

}
