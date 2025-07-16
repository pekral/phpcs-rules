<?php

declare(strict_types = 1);

namespace Example;

final class DisallowLateStaticBindingForConstantsExample
{

    public const string FOO = 'bar';

    public function getFoo(): string
    {
        return self::FOO;
    }

} 