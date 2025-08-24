<?php

declare(strict_types = 1);

namespace Example\TypeHints;

/**
 * This example demonstrates different union type hint formats
 * Note: UnionTypeHintFormat rule is deprecated and not active in this ruleset
 * It has been replaced by DNFTypeHintFormat rule
 */
final class UnionTypeHintFormat
{

    /**
     * Example 1: Union types without spaces around |
     * This format is commonly used in modern PHP code
     */
    public function processData(string|int $data): string|int
    {
        // Use parameter to avoid unused error
        $processedData = $data;
        
        if (is_string($processedData)) {
            return strtoupper($processedData);
        }
        
        return $processedData * 2;
    }

    /**
     * Example 2: Union types with spaces around |
     * This format provides better readability for some developers
     */
    public function processDataWithSpaces(string|int $data): string|int
    {
        // Use parameter to avoid unused error
        $processedData = $data;
        
        if (is_string($processedData)) {
            return strtoupper($processedData);
        }
        
        return $processedData * 2;
    }

    /**
     * Example 3: Nullable types using ? prefix
     * Modern PHP 8.0+ syntax for nullable types
     */
    public function processNullableData(?string $data): ?string
    {
        if ($data === null) {
            return null;
        }
        
        return strtoupper($data);
    }

    /**
     * Example 4: Nullable types using |null
     * Alternative syntax for nullable types
     */
    public function processNullableDataWithUnion(?string $data): ?string
    {
        if ($data === null) {
            return null;
        }
        
        return strtoupper($data);
    }

    /**
     * Example 5: Union types with null on first position
     * Some coding standards prefer null first
     */
    public function processDataWithNullFirst(null|string|int $data): null|string|int
    {
        if ($data === null) {
            return null;
        }
        
        if (is_string($data)) {
            return strtoupper($data);
        }
        
        return $data * 2;
    }

    /**
     * Example 6: Union types with null on last position
     * Some coding standards prefer null last
     */
    public function processDataWithNullLast(null|string|int $data): null|string|int
    {
        if ($data === null) {
            return null;
        }
        
        if (is_string($data)) {
            return strtoupper($data);
        }
        
        return $data * 2;
    }

    /**
     * Example 7: Complex union types without spaces
     * Multiple union types in one declaration
     */
    public function processComplexData(string|int|float $value, null|array|object $config): null|string|int|float|array|object {
        // Use parameters to avoid unused errors
        $processedValue = $value;
        $processedConfig = $config;
        
        if ($processedConfig === null) {
            return $processedValue;
        }
        
        if (is_array($processedConfig)) {
            return $processedConfig;
        }
        
        return $processedValue;
    }

    /**
     * Example 8: Complex union types with spaces
     * Multiple union types with spacing for readability
     */
    public function processComplexDataWithSpaces(string|int|float $value, null|array|object $config): null|string|int|float|array|object {
        // Use parameters to avoid unused errors
        $processedValue = $value;
        $processedConfig = $config;
        
        if ($processedConfig === null) {
            return $processedValue;
        }
        
        if (is_array($processedConfig)) {
            return $processedConfig;
        }
        
        return $processedValue;
    }

}

/**
 * Example 9: Union type hints in properties
 * Different formatting styles for property type hints
 */
final class DataProcessor
{

    // Style 1: No spaces around |
    private string|int $value1;
    
    // Style 2: Spaces around |
    private string|int $value2;
    
    // Style 3: Nullable with ? prefix
    private ?string $name1;
    
    // Style 4: Nullable with |null
    private ?string $name2;
    
    // Style 5: Complex union without spaces
    private null|array|object $config1;
    
    // Style 6: Complex union with spaces
    private null|array|object $config2;

    public function __construct(private string|int $value, private ?string $name = null, private null|array|object $config = null,) {
    }

}

/**
 * Example 10: Union type hints in arrow functions
 * Different formatting styles for arrow function type hints
 */
final class ArrowFunctionExample
{

    public function processWithArrowFunction(): void
    {
        // Style 1: No spaces around |
        $processor1 = static fn (string|int $data): string|int => is_string($data) ? strtoupper($data) : $data * 2;

        // Style 2: Spaces around |
        $processor2 = static fn (string|int $data): string|int => is_string($data) ? strtoupper($data) : $data * 2;

        $result1 = $processor1('hello');
        $result2 = $processor1(42);
        $result3 = $processor2('world');
        $result4 = $processor2(100);
        
        // Use variables to avoid unused errors
        $finalResult = $result1 . $result2 . $result3 . $result4;
        unset($finalResult);
    }

}

/**
 * Note: This example file demonstrates various union type hint formats
 * that were previously controlled by the deprecated UnionTypeHintFormat rule.
 * 
 * Current active rules that control union type hint formatting:
 * - DNFTypeHintFormat: Controls spacing around | and & operators
 * - Other type hint rules: Control nullable types, parameter types, etc.
 * 
 * The UnionTypeHintFormat rule was deprecated in Slevomat Coding Standard 8.16.0
 * and will be removed in version 9.0.0.
 */
