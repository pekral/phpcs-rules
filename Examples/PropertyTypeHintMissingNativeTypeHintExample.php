<?php

declare(strict_types = 1);

namespace Example;

final class PropertyTypeHintMissingNativeTypeHintExample
{

    /**
     * @var int
     */
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

} 