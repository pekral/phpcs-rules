<?php

declare(strict_types = 1);

namespace Example;

final class UseFromSameNamespaceExample
{

    public function help(): Helper
    {
        return new Helper();
    }

} 