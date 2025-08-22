<?php

declare(strict_types = 1);

namespace Example\PHP;

use DateTime;
use stdClass;

/**
 * This class demonstrates the correct and incorrect usage of parentheses
 * according to the UselessParentheses rule.
 */
final class UselessParentheses
{

    /**
     * CORRECT: Necessary parentheses for order of operations
     */
    public function correctOrderOfOperations(): int
    {
        return (2 + 3) * 4;
    }

    /**
     * INCORRECT: Useless parentheses around variable
     */
    public function uselessParenthesesAroundVariable(): int
    {
        return 5;
    }

    /**
     * INCORRECT: Useless parentheses around string
     */
    public function uselessParenthesesAroundString(): string
    {
        return 'hello world';
    }

    /**
     * INCORRECT: Useless parentheses around function call
     */
    public function uselessParenthesesAroundFunctionCall(): string
    {
        return strtoupper('hello');
    }

    /**
     * INCORRECT: Useless parentheses around new expression
     */
    public function uselessParenthesesAroundNew(): stdClass
    {
        return new stdClass();
    }

    /**
     * INCORRECT: Useless parentheses in switch case
     */
    public function uselessParenthesesInSwitch(int $value): string
    {
        switch ($value) {
            case 1:
                return 'one';

            case 2:
                return 'two';

            default:
                return 'other';
        }
    }

    /**
     * INCORRECT: Useless parentheses in ternary condition
     */
    public function uselessParenthesesInTernary(int $value): string
    {
        return $value > 0 ? 'positive' : 'non-positive';
    }

    /**
     * CORRECT: Necessary parentheses for complex conditions
     */
    public function correctComplexConditions(int $a, int $b, int $c): bool
    {
        return ($a > 0 && $b < 10) || $c === 5;
    }

    /**
     * CORRECT: Necessary parentheses with different operator precedence
     */
    public function correctOperatorPrecedence(): int
    {
        return 2 + 3 * (4 + 5);
    }

    /**
     * INCORRECT: Useless parentheses around arithmetic expression
     */
    public function uselessParenthesesAroundArithmetic(): int
    {
        return 5 + (10 * 2);
    }

    /**
     * CORRECT: Necessary parentheses for negation
     */
    public function correctNegation(bool $condition): bool
    {
        return !($condition && true);
    }

    /**
     * INCORRECT: Useless parentheses around property access
     */
    public function uselessParenthesesAroundProperty(): string
    {
        $date = new DateTime();

        return $date->format('Y-m-d');
    }

    /**
     * CORRECT: Necessary parentheses for method chaining
     */
    public function correctMethodChaining(): string
    {
        return (new DateTime())->format('Y-m-d');
    }

    /**
     * INCORRECT: Useless parentheses around assignment result
     */
    public function uselessParenthesesAroundAssignment(): int
    {
        return 10;
    }

    /**
     * CORRECT: Necessary parentheses for complex array access
     */
    public function correctArrayAccess(): mixed
    {
        $array = ['key' => ['nested' => 'value']];

        return $array['key']['nested'];
    }

    /**
     * INCORRECT: Useless parentheses around array access
     */
    public function uselessParenthesesAroundArrayAccess(): mixed
    {
        $array = ['key' => 'value'];

        return $array['key'];
    }

}
