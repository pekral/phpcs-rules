<?php

declare(strict_types = 1);

namespace Example\PHP;

use DateTime;
use Generator;
use stdClass;

/**
 * This class demonstrates the exact logic of the UselessParentheses rule.
 * 
 * This rule detects and removes useless parentheses that don't affect
 * operator precedence or are not necessary for readability.
 * 
 * The rule is configurable with:
 * - ignoreComplexTernaryConditions: ignores complex ternary conditions with &&, || etc.
 */
final class UselessParentheses
{

    /**
     * 1. TERNARY OPERATOR PARENTHESES
     * Rule: Detects simple conditions in ternary operators
     * BUT ignores complex conditions with &&, ||, !, comparison operators
     */

    public function simpleTernaryCondition(): string
    {
        $value = 5;
        
        // INCORRECT: Useless parentheses around simple condition
        return $value > 0 ? 'positive' : 'negative';
    }

    public function complexTernaryCondition(): string
    {
        $a = 1;
        $b = 2;
        
        // CORRECT: Complex condition with && (boolean operator) - ignored by rule
        return $a > 0 && $b < 10 ? 'valid' : 'invalid';
    }

    public function negatedTernaryCondition(): string
    {
        $value = 5;
        
        // CORRECT: Negation before parentheses - necessary for readability
        return !($value > 0) ? 'not positive' : 'positive';
    }

    public function comparisonBeforeTernary(): string
    {
        $value = 5;
        
        // CORRECT: Comparison operator before parentheses - necessary for precedence
        return $value > $value + 1 ? 'impossible' : 'possible';
    }

    /**
     * 2. SWITCH CASE PARENTHESES
     * Rule: Detects parentheses around case values
     */

    public function switchCaseParentheses(int $value): string
    {
        switch ($value) {
            // INCORRECT: Useless parentheses around case value
            case 1:
                return 'one';
            
            // INCORRECT: Useless parentheses around case value
            case 2:
                return 'two';
            
            default:
                return 'other';
        }
    }

    /**
     * 3. VARIABLE/FUNCTION CALL PARENTHESES
     * Rule: Detects parentheses around simple expressions
     * BUT ignores when followed by ternary, function call, or shift right
     */

    public function variableInParentheses(): int
    {
        return 42;
    }

    public function functionCallInParentheses(): string
    {
        // INCORRECT: Useless parentheses around function call
        return strtoupper('hello');
    }

    public function booleanOperatorBeforeParentheses(): bool
    {
        $a = true;
        $b = false;
        
        // CORRECT: Boolean operator before parentheses - necessary for precedence
        return $a && ($b);
    }

    /**
     * 4. STRING PARENTHESES
     * Rule: Detects parentheses around strings
     */

    public function stringInParentheses(): string
    {
        // INCORRECT: Useless parentheses around string
        return 'hello world';
    }

    /**
     * 5. NEW EXPRESSION PARENTHESES
     * Rule: Detects parentheses around new expressions ONLY in specific contexts
     * (before comma, semicolon, or array closing bracket)
     */

    public function newInParentheses(): stdClass
    {
        // CORRECT: NOT followed by comma/semicolon - NOT detected by rule
        return new stdClass();
    }

    public function newInParenthesesWithComma(): array
    {
        // INCORRECT: Followed by comma (array element) - DETECTED by rule
        return [new stdClass(), new DateTime()];
    }

    public function newInParenthesesWithSemicolon(): stdClass
    {
        // INCORRECT: Followed by semicolon - DETECTED by rule
        return new stdClass();
    }

    /**
     * 6. OPERATOR PARENTHESES
     * Rule: Complex logic based on operator groups and context
     * Detects when parentheses don't change operator precedence
     */

    public function simpleArithmeticParentheses(): int
    {
        // INCORRECT: Simple arithmetic expression with useless parentheses
        return 5 + 10;
    }

    public function mixedOperatorGroups(): int
    {
        // CORRECT: Different operator groups (multiplication vs addition) - necessary for precedence
        return 2 * (3 + 4);
    }

    public function sameOperatorGroup(): int
    {
        // INCORRECT: Same operator group (both addition) - useless parentheses
        return 1 + 2 + 3;
    }

    public function booleanOperatorAroundArithmetic(): bool
    {
        $a = 5;
        
        // CORRECT: Boolean operator before parentheses - necessary for precedence
        return $a > 0 && (5 + 10 > 10);
    }

    public function minusBeforeParentheses(): int
    {
        // CORRECT: Minus before parentheses - necessary for precedence
        return 5 - (3 + 2);
    }

    /**
     * 7. PROPERTY/ARRAY ACCESS PARENTHESES
     * Rule: Detects parentheses around property/array access
     */

    public function propertyAccessInParentheses(): string
    {
        $date = new DateTime();
        
        // INCORRECT: Useless parentheses around property access
        return $date->format('Y-m-d');
    }

    public function arrayAccessInParentheses(): mixed
    {
        $array = ['key' => 'value'];
        
        // INCORRECT: Useless parentheses around array access
        return $array['key'];
    }

    /**
     * 8. NECESSARY PARENTHESES (should NOT be detected)
     */

    public function orderOfOperations(): int
    {
        // CORRECT: Changes order of operations - necessary
        return (2 + 3) * 4;
    }

    public function complexLogicalCondition(): bool
    {
        $a = 1;
        $b = 2;
        $c = 3;
        
        // CORRECT: Complex logical condition - necessary for precedence
        return ($a > 0 && $b < 10) || $c === 5;
    }

    public function methodChaining(): string
    {
        // CORRECT: For method chaining - necessary
        return (new DateTime())->format('Y-m-d');
    }

    public function negationWithComplexCondition(): bool
    {
        $condition = true;
        
        // CORRECT: Negation with complex condition - necessary
        return !($condition && true);
    }

    /**
     * 9. ADDITIONAL EXAMPLES OF USELESS PARENTHESES
     */

    public function uselessParenthesesAroundAssignment(): int
    {
        return 10;
    }

    public function uselessParenthesesAroundConstant(): int
    {
        // INCORRECT: Useless parentheses around constant
        return 42;
    }

    public function uselessParenthesesAroundFloat(): float
    {
        // INCORRECT: Useless parentheses around float
        return 3.14;
    }

    public function uselessParenthesesAroundNull(): mixed
    {
        // INCORRECT: Useless parentheses around null
        return null;
    }

    public function uselessParenthesesAroundTrue(): bool
    {
        // INCORRECT: Useless parentheses around boolean
        return true;
    }

    public function uselessParenthesesAroundArray(): array
    {
        // INCORRECT: Useless parentheses around array
        return ['key' => 'value'];
    }

    public function uselessParenthesesAroundClosure(): callable
    {
        // INCORRECT: Useless parentheses around closure
        return static fn () => 'hello';
    }

    /**
     * 10. EXAMPLES OF NECESSARY PARENTHESES
     */

    public function necessaryParenthesesForPrecedence(): int
    {
        // CORRECT: Necessary for operator precedence
        // = 9, not 7
        return (1 + 2) * 3;
    }

    public function necessaryParenthesesForTypeCast(): string
    {
        // CORRECT: Necessary for type casting
        return (string) 42;
    }

    public function necessaryParenthesesForInstanceOf(): bool
    {
        $object = new stdClass();
        
        // CORRECT: Necessary for instanceof operator
        return $object instanceof stdClass;
    }

    public function necessaryParenthesesForYield(): Generator
    {
        // CORRECT: Necessary for yield expression
        yield 1 + 2;
    }

    public function necessaryParenthesesForReturnType(): int
    {
        // CORRECT: Necessary for return type declaration
        return 42;
    }

    /**
     * 11. EDGE CASES AND COMPLEX SCENARIOS
     */

    public function edgeCaseWithMultipleParentheses(): int
    {
        // INCORRECT: Multiple levels of useless parentheses
        return 42;
    }

    public function edgeCaseWithMixedParentheses(): int
    {
        // CORRECT: Mixed necessary and unnecessary parentheses
        // Necessary for precedence
        return (2 + 3) * (4 + 5);
    }

    public function edgeCaseWithTernaryAndParentheses(): string
    {
        $value = 5;
        
        // INCORRECT: Useless parentheses in ternary
        return $value > 0 ? 'positive' : 'negative';
    }

    public function edgeCaseWithSwitchAndParentheses(): string
    {
        $value = 1;
        
        switch ($value) {
            // INCORRECT: Useless parentheses in case
            case 1:
                return 'one';
            
            // INCORRECT: Useless parentheses in case with expression
            case 2 + 0:
                return 'two';
            
            default:
                return 'other';
        }
    }

    /**
     * 12. HELPER METHODS FOR DEMONSTRATION
     */

    private function getValue(): int
    {
        return 42;
    }

    private function getString(): string
    {
        return 'hello';
    }

    private function getArray(): array
    {
        return ['key' => 'value'];
    }

}
