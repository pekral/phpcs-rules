<?php

declare(strict_types = 1);

namespace Example;

final class DisallowEmptyExample
{

    public function foo(): void
    {
        if (false) {
            // not empty
            echo 'no empty block';
        }
    }

} 