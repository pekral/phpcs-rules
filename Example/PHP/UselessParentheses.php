<?php

declare(strict_types = 1);

namespace Example\PHP;

use DateTime;
use stdClass;

/**
 * This class demonstrates the exact logic of the UselessParentheses rule.
 * Based on the actual implementation analysis.
 */
final class UselessParentheses
{

    /**
     * 1. TERNARY OPERATOR PARENTHESES
     * Rule: Detects simple conditions in ternary operators
     */

    public function simpleTernaryCondition(): string
    {
        $value = 5;
        
        // DETECTED: Simple condition with parentheses
        return $value > 0 ? 'positive' : 'negative';
    }

    public function complexTernaryCondition(): string
    {
        $a = 1;
        $b = 2;
        
        // NOT DETECTED: Complex condition with && (boolean operator)
        return $a > 0 && $b < 10 ? 'valid' : 'invalid';
    }

    public function negatedTernaryCondition(): string
    {
        $value = 5;
        
        // NOT DETECTED: Negation before parentheses
        return !($value > 0) ? 'not positive' : 'positive';
    }

    public function comparisonBeforeTernary(): string
    {
        $value = 5;
        
        // NOT DETECTED: Comparison operator before parentheses
        return $value > $value + 1 ? 'impossible' : 'possible';
    }

    /**
     * 2. SWITCH CASE PARENTHESES
     * Rule: Detects parentheses around case values
     */

    public function switchCaseParentheses(int $value): string
    {
        switch ($value) {
            // DETECTED: Parentheses around case value
            case 1:
                return 'one';
            
            // DETECTED: Parentheses around case value
            case 2:
                return 'two';
            
            default:
                return 'other';
        }
    }

    /**
     * 3. VARIABLE/FUNCTION CALL PARENTHESES
     * Rule: Detects parentheses around simple expressions
     */

    public function variableInParentheses(): int
    {
        return 5;
    }

    public function functionCallInParentheses(): string
    {
        // DETECTED: Parentheses around function call
        return strtoupper('hello');
    }

    public function booleanOperatorBeforeParentheses(): bool
    {
        $a = true;
        $b = false;
        
        // NOT DETECTED: Boolean operator before parentheses
        return $a && ($b);
    }

    /**
     * 4. STRING PARENTHESES
     * Rule: Detects parentheses around strings
     */

    public function stringInParentheses(): string
    {
        // DETECTED: Parentheses around string
        return 'hello world';
    }

    /**
     * 5. NEW EXPRESSION PARENTHESES
     * Rule: Detects parentheses around new expressions in specific contexts
     */

    public function newInParentheses(): stdClass
    {
        // DETECTED: Parentheses around new expression
        return new stdClass();
    }

    public function newInParenthesesWithComma(): array
    {
        // NOT DETECTED: Followed by comma (array element)
        return [new stdClass(), new DateTime()];
    }

    /**
     * 6. OPERATOR PARENTHESES
     * Rule: Complex logic based on operator groups and context
     */

    public function simpleArithmeticParentheses(): int
    {
        // DETECTED: Simple arithmetic expression
        return 5 + 10;
    }

    public function mixedOperatorGroups(): int
    {
        // NOT DETECTED: Different operator groups (multiplication vs addition)
        return 2 * (3 + 4);
    }

    public function sameOperatorGroup(): int
    {
        // DETECTED: Same operator group (both addition)
        return 1 + 2 + 3;
    }

    public function booleanOperatorAroundArithmetic(): bool
    {
        $a = 5;
        
        // NOT DETECTED: Boolean operator before parentheses
        return $a > 0 && (5 + 10 > 10);
    }

    public function minusBeforeParentheses(): int
    {
        // NOT DETECTED: Minus before parentheses (special case)
        return 5 - (3 + 2);
    }

    /**
     * 7. PROPERTY/ARRAY ACCESS PARENTHESES
     * Rule: Detects parentheses around property/array access
     */

    public function propertyAccessInParentheses(): string
    {
        $date = new DateTime();
        
        // DETECTED: Parentheses around property access
        return $date->format('Y-m-d');
    }

    public function arrayAccessInParentheses(): mixed
    {
        $array = ['key' => 'value'];
        
        // DETECTED: Parentheses around array access
        return $array['key'];
    }

    /**
     * 8. NECESSARY PARENTHESES (should NOT be detected)
     */

    public function orderOfOperations(): int
    {
        // NECESSARY: Changes order of operations
        return (2 + 3) * 4;
    }

    public function complexLogicalCondition(): bool
    {
        $a = 1;
        $b = 2;
        $c = 3;
        
        // NECESSARY: Complex logical condition
        return ($a > 0 && $b < 10) || $c === 5;
    }

    public function methodChaining(): string
    {
        // NECESSARY: For method chaining
        return (new DateTime())->format('Y-m-d');
    }

    public function negationWithComplexCondition(): bool
    {
        $condition = true;
        
        // NECESSARY: Negation with complex condition
        return !($condition && true);
    }

}
