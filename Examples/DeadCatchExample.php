<?php

declare(strict_types = 1);

namespace Example;

use RuntimeException;
use Throwable;

final class DeadCatchExample
{

    public function foo(): string
    {
        try {
            throw new RuntimeException('Error!');
        } catch (RuntimeException $e) {
            return $e->getMessage();
        } catch (Throwable) {
            return 'Other error';
        }
    }

} 