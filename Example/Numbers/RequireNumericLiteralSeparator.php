<?php

declare(strict_types = 1);

namespace Example\Numbers;

/**
 * This class demonstrates the exact logic of the RequireNumericLiteralSeparator rule.
 * Based on the actual implementation analysis.
 * 
 * This example shows:
 * 1. CORRECT: Numbers that don't need separators (less than 4 digits)
 * 2. CORRECT: Numbers with proper separators (4+ digits)
 * 3. INCORRECT: Numbers that will be reported as errors (4+ digits without separators)
 * 4. IGNORED: Numbers that the rule ignores (octal numbers, existing separators)
 */
final class RequireNumericLiteralSeparator
{

    /**
     * CORRECT: Class constants with proper separators
     */
    public const int LARGE_NUMBER = 10_000;
    public const float PRECISE_VALUE = 123.456_7;

    /**
     * CORRECT: Class constants using proper separators
     */
    // 5 digits - needs separator
    public const int LARGE_NUMBER_INCORRECT = 10_000;
    public const float PRECISE_VALUE_INCORRECT = 123.456_7;

    /**
     * CORRECT: Numbers with less than 4 digits before decimal point (default minDigitsBeforeDecimalPoint = 4)
     */
    public function correctShortNumbers(): void
    {
        // Short numbers (less than 4 digits) - no separators required
        echo 1;
        echo 12;
        echo 123;
        echo 1.5;
        echo 12.34;
        echo 123.456;
    }

    /**
     * CORRECT: Numbers with 4+ digits using proper separators
     * Rule: Numbers with 4+ digits should use separators
     */
    public function correctLongNumbers(): void
    {
        // Numbers with 4+ digits - using proper separators
        // 4 digits - needs separator
        echo 1_000;
        // 5 digits - needs separator
        echo 10_000;
        // 6 digits - needs separator
        echo 100_000;
        // 7 digits - needs separator
        echo 1_000_000;
        // 8 digits - needs separator
        echo 10_000_000;
    }

    /**
     * CORRECT: Decimal numbers with 4+ digits using proper separators
     * Rule: Decimals with 4+ digits should use separators
     */
    public function correctLongDecimals(): void
    {
        // Decimals with 4+ digits after decimal point - using proper separators
        // 4 digits after decimal - needs separator
        echo 123.456_7;
        // 5 digits after decimal - needs separator
        echo 123.456_78;
        // 6 digits after decimal - needs separator
        echo 123.456_789;
        // 9 digits after decimal - needs separator
        echo 1.123_456_789;
    }

    /**
     * CORRECT: Mixed long numbers using proper separators
     * Rule: Both before and after decimal point should use separators when applicable
     */
    public function correctMixedLongNumbers(): void
    {
        // Mixed long numbers - using proper separators
        // 4 digits before decimal - needs separator
        echo 1_000.5;
        // 4 digits after decimal - needs separator
        echo 123.456_7;
        // Both 4+ digits - need separators
        echo 1_000.456_7;
        // Both long - need separators
        echo 10_000.123_456;
    }

    /**
     * CORRECT: Octal numbers (ignored by default when ignoreOctalNumbers = true)
     * Rule: Ignores octal numbers when ignoreOctalNumbers setting is true (default)
     */
    public function correctOctalNumbers(): void
    {
        // Octal numbers - ignored by default (no errors reported)
        echo 01234;
        echo 012345;
        echo 0123456;
        echo 01234567;
    }

    /**
     * CORRECT: Scientific notation and other special formats
     */
    public function correctSpecialFormats(): void
    {
        // Scientific notation and special formats
        echo 1e3;
        echo 1.5e10;
        echo 2.5E-3;
        echo 1.0;
        echo 0.5;
    }

    /**
     * CORRECT: Large scientific notation base numbers using separators
     * Rule: The base number should use separators when 4+ digits
     */
    public function correctScientificWithLongBase(): void
    {
        // Base numbers with 4+ digits - using proper separators
        // 4 digits in base - needs separator
        echo 1_234e3;
        // 5 digits in base - needs separator
        echo 12_345e10;
        // 4 digits after decimal - needs separator
        echo 123.456_7e-3;
    }

    /**
     * CORRECT: Edge cases and boundary conditions
     */
    public function correctEdgeCases(): void
    {
        // Numbers under the 4-digit threshold
        // 3 digits - under limit
        echo 999;
        // 3 digits on both sides - under limit
        echo 999.999;
        // Single digit
        echo 0;
        // Negative short number
        echo -123;
    }

    /**
     * CORRECT: Edge cases using proper separators
     */
    public function correctEdgeCasesWithSeparators(): void
    {
        // Numbers at or over the 4-digit threshold - using proper separators
        // Exactly 4 digits - requires separator
        echo 1_000;
        // Exactly 4 digits after decimal - requires separator
        echo 123.1_000;
        // Negative number with 4 digits - requires separator
        echo -1_000;
        // Negative decimal with 4+ digits - requires separator
        echo -123.456_7;
    }

    /**
     * CORRECT: Array and object contexts using proper separators
     */
    public function correctInArrays(): void
    {
        // All numbers using proper separators
        // All need separators
        echo [1_000, 2_000, 3_000];
        echo [
            // Needs separator
            'decimal' => 123.456_7,
            // Needs separator
            'large' => 10_000,
        ];
        // All need separators
        echo 1_000 + 2_000 + 3_000;
    }

    /**
     * CORRECT: Function calls and returns using proper separators
     */
    public function correctInFunctions(): int
    {
        // Needs separator
        $this->processNumber(1_000);
        // Needs separator
        $this->processDecimal(123.456_7);

        // Needs separator
        return 10_000;
    }

    /**
     * CORRECT: Numbers that already have separators (ignored by rule)
     * Rule: Ignores numbers with existing separators (strpos($number, '_') !== false)
     */
    public function correctWithExistingSeparators(): void
    {
        // Numbers with existing separators - ignored by rule (no errors)
        echo 1_000;
        echo 10_000;
        echo 100_000;
        echo 1_000_000;
        echo 123.456_7;
        echo 1_000.456_7;
    }

    /**
     * CORRECT: Binary and hexadecimal numbers (not checked by this rule)
     */
    public function correctBinaryAndHex(): void
    {
        // Binary and hex numbers are not checked by RequireNumericLiteralSeparator
        echo 0b10101010;
        echo 0x1F2E3D4C;
    }

    /**
     * Helper methods for demonstration
     */
    private function processNumber(int $number): void
    {
        echo $number;
    }

    private function processDecimal(float $decimal): void
    {
        echo $decimal;
    }

}