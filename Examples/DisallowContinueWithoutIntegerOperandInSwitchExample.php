<?php

declare(strict_types = 1);

namespace Example;

final class DisallowContinueWithoutIntegerOperandInSwitchExample
{

    public function foo(): void
    {
        switch (1) {
            case 1:
                continue 1;
        }
    }

} 