<?php

declare(strict_types = 1);

namespace Example\TypeHints;

final class UnionTypeHintFormat
{

    /**
     * This demonstrates the deprecated UnionTypeHintFormat sniff
     * which checks for proper union type formatting
     */
    
    // Old union type format (deprecated)
    /**
     * @param mixed $value
     */
    public function processOldFormat($value): mixed
    {
        if (is_int($value)) {
            return $value * 2;
        }
        
        if (is_string($value)) {
            return strlen($value);
        }
        
        return null;
    }
    
    // Modern union type format (preferred)
    public function processNewFormat(int|string $value): int
    {
        if (is_int($value)) {
            return $value * 2;
        }
        
        return strlen($value);
    }
    
    // Complex union types (deprecated format)
    /**
     * @param mixed $data
     */
    public function complexOldFormat($data): mixed
    {
        if (is_array($data)) {
            return count($data);
        }
        
        if (is_object($data)) {
            return $data::class;
        }
        
        if (is_string($data)) {
            return strtoupper($data);
        }
        
        return null;
    }
    
    // Complex union types (modern format)
    public function complexNewFormat(array|object|string $data): int|string
    {
        if (is_array($data)) {
            return count($data);
        }
        
        if (is_object($data)) {
            return $data::class;
        }
        
        return strtoupper($data);
    }

} 