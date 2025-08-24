<?php

declare(strict_types = 1);

namespace Example\Strings;

/**
 * This class demonstrates the exact logic of the DisallowVariableParsing rule.
 * Based on the actual implementation analysis.
 * 
 * This example shows:
 * 1. CORRECT: Strings without deprecated ${...} syntax
 * 2. INCORRECT: Strings with deprecated ${...} syntax (will be reported as errors)
 * 3. ALLOWED: Regular variable parsing ($name, {$name}) - these are NOT reported as errors
 * 
 * Rule configuration (default):
 * - disallowDollarCurlySyntax = true (enabled) - zakazuje deprecated ${...} syntax
 * - disallowCurlyDollarSyntax = false (disabled) - povoluje {$...} syntax
 * - disallowSimpleSyntax = false (disabled) - povoluje $... syntax
 */
final class DisallowVariableParsing
{

    private string $name = 'John';
    private int $age = 25;
    private array $data = ['key' => 'value'];

    /**
     * CORRECT: Strings without deprecated ${...} syntax
     * Rule: No deprecated ${...} syntax inside strings
     */
    public function correctStrings(): void
    {
        // Simple strings without variables
        echo 'Hello World';
        echo "Simple string";
        echo 'String with quotes: "nested"';
        echo "String with apostrophe: John's book";
        
        // Concatenation instead of deprecated ${...} syntax
        echo 'Hello ' . $this->name . '!';
        echo 'Age: ' . $this->age;
        echo 'Data: ' . json_encode($this->data);
        
        // Heredoc without deprecated ${...} syntax
        echo <<<'EOT'
            This is a heredoc string
            without any deprecated ${...} syntax.
            It's completely safe.
            EOT;
    }

    /**
     * CORRECT: Strings with proper syntax instead of deprecated ${...} syntax
     * Rule: Use concatenation or other allowed syntax instead of deprecated ${...} syntax
     */
    public function correctDollarCurlySyntax(): void
    {
        // Use concatenation instead of deprecated ${...} syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of deprecated ${...} syntax
        echo 'Hello ' . $name . '!';
        echo 'Age: ' . $age;
        echo 'Data: ' . $data['key'];
        
        // CORRECT: Using allowed {$...} syntax (this is NOT reported as error)
        echo <<<EOT
            Hello {$name}! 
            Age: {$age}
            EOT;
    }

    /**
     * CORRECT: Strings with allowed {$...} syntax
     * Rule: {$...} syntax is allowed by default (disallowCurlyDollarSyntax = false)
     */
    public function correctCurlyDollarSyntax(): void
    {
        // Use allowed {$...} syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using allowed {$...} syntax
        echo "Hello {$name}!";
        echo "Age: {$age}";
        echo "Data: {$data['key']}";
        
        // CORRECT: Using allowed {$...} syntax in heredoc
        echo <<<EOT
            Hello {$name}! 
            Age: {$age}
            EOT;
    }

    /**
     * CORRECT: Strings with allowed $... syntax
     * Rule: $... syntax is allowed by default (disallowSimpleSyntax = false)
     */
    public function correctSimpleSyntax(): void
    {
        // Use allowed $... syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using allowed $... syntax
        echo "Hello $name!";
        echo "Age: $age";
        echo "Data: $data";
        
        // CORRECT: Using allowed $... syntax in heredoc
        echo <<<EOT
            Hello $name! 
            Age: $age
            EOT;
    }

    /**
     * CORRECT: Alternative approaches to deprecated ${...} syntax
     * Rule: Use concatenation, sprintf, or allowed syntax instead
     */
    public function correctAlternatives(): void
    {
        // Use concatenation instead of deprecated ${...} syntax
        echo 'Hello ' . $this->name . '!';
        echo 'Age: ' . $this->age;
        echo 'Data: ' . $this->data['key'];
        
        // Use sprintf instead of deprecated ${...} syntax
        echo sprintf('Hello %s!', $this->name);
        echo sprintf('Age: %d', $this->age);
        echo sprintf('Data: %s', $this->data['key']);
        
        // Use allowed {$...} syntax instead of deprecated ${...} syntax
        echo <<<EOT
            Hello {$this->name}! 
            Age: {$this->age}
            EOT;
    }

    /**
     * CORRECT: Complex expressions without deprecated ${...} syntax
     */
    public function correctComplexStrings(): void
    {
        // Complex strings without deprecated ${...} syntax
        echo 'User: ' . $this->name . ' (' . $this->age . ' years old)';
        echo 'Data: ' . json_encode($this->data, JSON_PRETTY_PRINT);
        
        // Multi-line strings
        echo 'This is a very long string ' . 'that spans multiple lines ' . 'without using deprecated ${...} syntax.';
    }

    /**
     * CORRECT: Mixed syntax examples with proper alternatives
     * Rule: Use concatenation or allowed syntax instead of deprecated ${...} syntax
     */
    public function correctMixedSyntax(): void
    {
        // Mixed syntax - using proper alternatives instead of deprecated ${...} syntax
        $name = $this->name;
        $age = $this->age;
        $data = $this->data;
        
        // CORRECT: Using concatenation instead of deprecated ${...} syntax
        echo 'Hello ' . $name . ', age ' . $age . ', data ' . $data;
        
        // CORRECT: Using allowed {$...} syntax instead of deprecated ${...} syntax
        echo <<<EOT
            Hello {$name}, age {$age}, data {$data}
            EOT;
    }

    /**
     * CORRECT: Edge cases and special characters
     */
    public function correctEdgeCases(): void
    {
        // Strings with dollar signs that are not deprecated ${...} syntax
        // CORRECT: literal dollar sign
        echo 'Price: $19.99';
        // CORRECT: escaped dollar sign
        echo "Cost: \$25.50";
        // CORRECT: single dollar sign
        echo 'Currency: $';
        
        // Strings with curly braces that are not deprecated ${...} syntax
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
        
        // CORRECT: Using concatenation instead of deprecated ${...} syntax
        $message = 'Hello ' . $name . '!';
        // CORRECT: Using allowed {$...} syntax instead of deprecated ${...} syntax
        $greeting = "Welcome {$name}";
        // CORRECT: Using allowed $... syntax instead of deprecated ${...} syntax
        $info = "Age: $age";
        
        // CORRECT: Using the data variable
        echo $message;
        echo $greeting;
        echo $info;
        
        // CORRECT: Using allowed syntax
        echo "Data: {$data['key']}";
    }

    /**
     * CORRECT: Safe string operations
     */
    public function correctStringOperations(): void
    {
        // Safe string operations without deprecated ${...} syntax
        $message = 'Hello ' . $this->name . '!';
        $greeting = sprintf('Welcome %s', $this->name);
        $info = "Age: {$this->age}";
        // This is allowed!
        
        // CORRECT: Using safe string operations
        echo $message;
        echo $greeting;
        echo $info;
    }

}

/**
 * Note: This example file demonstrates the actual behavior of the DisallowVariableParsing rule.
 * 
 * The rule ONLY reports errors for deprecated ${...} syntax (PHP 8.2+).
 * It does NOT report errors for:
 * - Regular variable parsing ($name)
 * - Curly braces syntax ({$name})
 * 
 * This is the default configuration. If you want to disallow ALL variable parsing,
 * you would need to configure the rule with:
 * - disallowCurlyDollarSyntax = true
 * - disallowSimpleSyntax = true
 */
