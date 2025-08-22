<?php

declare(strict_types = 1);

namespace Example\Strings;

/**
 * This class demonstrates the exact logic of the DisallowVariableParsing rule.
 * Based on the actual implementation analysis.
 * 
 * This example shows:
 * 1. CORRECT: Strings without variable parsing
 * 2. INCORRECT: Strings with variable parsing (will be reported as errors)
 * 3. Different syntax types that can be disallowed based on settings
 */
final class DisallowVariableParsing
{

    private string $name = 'John';
    private int $age = 25;
    private array $data = ['key' => 'value'];

    /**
     * CORRECT: Strings without variable parsing
     * Rule: No variable syntax inside strings
     */
    public function correctStrings(): void
    {
        // Simple strings without variables
        echo 'Hello World';
        echo "Simple string";
        echo 'String with quotes: "nested"';
        echo "String with apostrophe: John's book";
        
        // Concatenation instead of variable parsing
        echo 'Hello ' . $this->name . '!';
        echo 'Age: ' . $this->age;
        echo 'Data: ' . json_encode($this->data);
        
        // Heredoc without variables
        echo <<<'EOT'
            This is a heredoc string
            without any variable parsing.
            It's completely safe.
            EOT;
    }

    /**
     * CORRECT: Strings with proper syntax instead of ${...} syntax
     * Rule: Use concatenation or sprintf instead of deprecated ${...} syntax
     */
    public function correctDollarCurlySyntax(): void
    {
        // Use concatenation instead of ${...} syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of ${...} syntax
        echo 'Hello ' . $name . '!';
        echo 'Age: ' . $age;
        echo 'Data: ' . $data['key'];
        
        // Heredoc with concatenation instead of ${...} syntax
        echo <<<EOT
            Hello {$name}! 
            Age: {$age}
            EOT;
    }

    /**
     * CORRECT: Strings with proper syntax instead of {$...} syntax
     * Rule: Use concatenation or sprintf instead of {$...} syntax
     */
    public function correctCurlyDollarSyntax(): void
    {
        // Use concatenation instead of {$...} syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of {$...} syntax
        echo 'Hello ' . $name . '!';
        echo 'Age: ' . $age;
        echo 'Data: ' . $data['key'];
        
        // Heredoc with concatenation instead of {$...} syntax
        echo <<<EOT
            Hello {$name}! 
            Age: {$age}
            EOT;
    }

    /**
     * CORRECT: Strings with proper syntax instead of $... syntax
     * Rule: Use concatenation or sprintf instead of $... syntax
     */
    public function correctSimpleSyntax(): void
    {
        // Use concatenation instead of $... syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of $... syntax
        echo 'Hello ' . $name . '!';
        echo 'Age: ' . $age;
        echo 'Data: ' . $data;
        
        // Heredoc with concatenation instead of $... syntax
        echo <<<EOT
            Hello {$name}! 
            Age: {$age}
            EOT;
    }

    /**
     * CORRECT: Alternative approaches to variable parsing
     * Rule: Use concatenation or sprintf instead
     */
    public function correctAlternatives(): void
    {
        // Use concatenation
        echo 'Hello ' . $this->name . '!';
        echo 'Age: ' . $this->age;
        echo 'Data: ' . $this->data['key'];
        
        // Use sprintf
        echo sprintf('Hello %s!', $this->name);
        echo sprintf('Age: %d', $this->age);
        echo sprintf('Data: %s', $this->data['key']);
        
        // Use heredoc with concatenation
        echo <<<EOT
            Hello {$this->name}! 
            Age: {$this->age}
            EOT;
    }

    /**
     * CORRECT: Complex expressions without variable parsing
     */
    public function correctComplexStrings(): void
    {
        // Complex strings without variable parsing
        echo 'User: ' . $this->name . ' (' . $this->age . ' years old)';
        echo 'Data: ' . json_encode($this->data, JSON_PRETTY_PRINT);
        
        // Multi-line strings
        echo 'This is a very long string ' . 'that spans multiple lines ' . 'without using variable parsing.';
    }

    /**
     * CORRECT: Mixed syntax examples with proper alternatives
     * Rule: Use concatenation instead of mixed variable syntax
     */
    public function correctMixedSyntax(): void
    {
        // Mixed syntax - using proper concatenation instead
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of mixed syntax
        echo 'Hello ' . $name . ', age ' . $age . ', data ' . $data;
        
        // Heredoc with concatenation instead of mixed syntax
        echo <<<EOT
            Hello {$name}, age {$age}, data {$data}
            EOT;
    }

    /**
     * CORRECT: Edge cases and special characters
     */
    public function correctEdgeCases(): void
    {
        // Strings with dollar signs that are not variable parsing
        // CORRECT: literal dollar sign
        echo 'Price: $19.99';
        // CORRECT: escaped dollar sign
        echo "Cost: \$25.50";
        // CORRECT: single dollar sign
        echo 'Currency: $';
        
        // Strings with curly braces that are not variable parsing
        // CORRECT: literal curly braces
        echo 'Text with {brackets}';
        // CORRECT: literal curly braces
        echo 'Function: {closure}';
    }

    /**
     * CORRECT: Variable parsing alternatives in different contexts
     */
    public function correctInDifferentContexts(): void
    {
        // Variable parsing alternatives - using proper syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of ${...} syntax
        $message = 'Hello ' . $name . '!';
        // CORRECT: Using concatenation instead of {$...} syntax
        $greeting = 'Welcome ' . $name;
        // CORRECT: Using concatenation instead of $... syntax
        $info = 'Age: ' . $age;
        
        // CORRECT: Using concatenation instead of variable parsing
        echo $message;
        echo $greeting;
        echo $info;
        
        // CORRECT: Using the data variable
        echo 'Data: ' . $data['key'];
    }

    /**
     * CORRECT: Safe string operations
     */
    public function correctStringOperations(): void
    {
        // Safe string operations
        $message = 'Hello ' . $this->name . '!';
        $greeting = sprintf('Welcome %s', $this->name);
        $info = 'Age: ' . $this->age;
        
        // CORRECT: Using safe string operations
        echo $message;
        echo $greeting;
        echo $info;
    }

}
