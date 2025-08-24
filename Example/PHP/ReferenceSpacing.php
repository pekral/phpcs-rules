<?php

declare(strict_types = 1);

namespace Example\PHP;

final class ReferenceSpacing
{

    public function example(): void
    {
        $value = 42;
        $reference = &$value;
        
        $array = [1, 2, 3];

        foreach ($array as &$item) {
            $item *= 2;
        }
        
        $result = $this->processReference($value);
        echo $result;
        echo $reference;
    }
    
    private function processReference(int $data): int
    {
        $data *= 2;

        return $data;
    }

}
