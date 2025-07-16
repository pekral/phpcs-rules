<?php

declare(strict_types = 1);

namespace Example;

final class NullTypeHintOnLastPositionExample
{

    public function getValue(): ?int
    {
        return null;
    }

} 