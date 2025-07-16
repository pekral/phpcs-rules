<?php

declare(strict_types = 1);

namespace Example;

final class DisallowArrayTypeHintSyntaxExample
{

    public function process(iterable $items): void
    {
        foreach ($items as $item) {
            // use $item to avoid unused variable error
            $item;
        }
    }

} 