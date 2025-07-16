<?php

declare(strict_types = 1);

namespace Example;

final class NamingConventionExample
{

    private int $itemCount = 0;

    public function incrementItemCount(): void
    {
        $this->itemCount += 1;
    }

    public function getItemCount(): int
    {
        return $this->itemCount;
    }

} 