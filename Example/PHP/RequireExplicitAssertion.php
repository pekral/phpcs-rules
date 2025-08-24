<?php

declare(strict_types = 1);

namespace Example\PHP;

use DateTime;
use stdClass;

use function assert;
use function is_float;
use function is_int;
use function is_string;

/**
 * This class demonstrates the exact logic of the RequireExplicitAssertion rule.
 * Based on the actual implementation analysis.
 * 
 * This rule checks @var doc comment annotations and requires them to be replaced
 * with explicit assertion statements using assert() function.
 * 
 * This example shows:
 * 1. INCORRECT: @var doc comments that should trigger the rule
 * 2. CORRECT: Explicit assertions that replace the doc comments
 * 3. SUPPORTED CONTEXTS: Where the rule applies (variables, foreach, while, list, short arrays)
 * 4. TYPE SUPPORT: Different types that can be converted to assertions
 */
final class RequireExplicitAssertion
{

    /**
     * 1. VARIABLE ASSIGNMENTS WITH @VAR ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with assertions
     */

    public function variableWithVarAnnotation(): void
    {
        $name = 'John';
        assert(is_string($name));
        $age = 25;
        assert(is_int($age));
        $date = new DateTime();
        assert($date instanceof DateTime);
        
        // INCORRECT: Should be replaced with: assert($date instanceof DateTime);
    }

    /**
     * 2. FOREACH LOOPS WITH @VAR ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with assertions
     */

    public function foreachWithVarAnnotation(): void
    {
        $users = ['John', 'Jane', 'Bob'];

        foreach ($users as $user) {
            assert(is_string($user));
            // INCORRECT: Should be replaced with: assert(is_string($user));
            echo $user;
        }
        
        $objects = [new stdClass(), new DateTime()];

        foreach ($objects as $object) {
            assert($object instanceof stdClass || $object instanceof DateTime);
            // INCORRECT: Should be replaced with: assert($object instanceof stdClass || $object instanceof DateTime);
            echo $object::class;
        }
    }

    /**
     * 3. WHILE LOOPS WITH @VAR ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with assertions
     */

    public function whileWithVarAnnotation(): void
    {
        $counter = 0;
        
        while ($counter < 10) {
            // INCORRECT: Should be replaced with: assert(is_int($counter));
            $counter += 1;
        }
    }

    /**
     * 4. LIST ASSIGNMENTS WITH @VAR ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with assertions
     */

    public function listWithVarAnnotation(): void
    {
        $data = ['John', 25];
        [$name, $age] = $data;
        assert(is_string($name));
        assert(is_int($age));
        
        // INCORRECT: Should be replaced with:
        // assert(is_string($name));
        // assert(is_int($age));
    }

    /**
     * 5. SHORT ARRAY ASSIGNMENTS WITH @VAR ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with assertions
     */

    public function shortArrayWithVarAnnotation(): void
    {
        $data = ['John', 25];
        [$name, $age] = $data;
        assert(is_string($name));
        assert(is_int($age));
        
        // INCORRECT: Should be replaced with:
        // assert(is_string($name));
        // assert(is_int($age));
    }

    /**
     * 6. COMPLEX TYPE ANNOTATIONS
     * Rule: These should trigger the rule and be replaced with complex assertions
     */

    public function complexTypeAnnotations(): void
    {
        $nullableString = 'hello';
        assert(is_string($nullableString) || $nullableString === null);
        $numericValue = 42;
        assert(is_int($numericValue) || is_float($numericValue));
        $intersectionType = new class extends stdClass {

        };
        assert($intersectionType instanceof stdClass && $intersectionType instanceof DateTime);
        
        // INCORRECT: Should be replaced with: assert($intersectionType instanceof stdClass && $intersectionType instanceof DateTime);
    }

    /**
     * 7. ADVANCED TYPE ANNOTATIONS (when enableAdvancedStringTypes = true)
     * Rule: These should trigger the rule and be replaced with advanced assertions
     */

    public function advancedTypeAnnotations(): void
    {
        /** @var non-empty-string $nonEmptyString */
        $nonEmptyString = 'hello';
        // Use variable to avoid unused variable warning
        echo $nonEmptyString;
        
        // INCORRECT: Should be replaced with: assert(is_string($nonEmptyString) && $nonEmptyString !== '');
        
        /** @var callable-string $callableString */
        $callableString = 'strlen';
        // Use variable to avoid unused variable warning
        echo $callableString;
        
        // INCORRECT: Should be replaced with: assert(is_string($callableString) && is_callable($callableString));
        
        /** @var numeric-string $numericString */
        $numericString = '123';
        // Use variable to avoid unused variable warning
        echo $numericString;
        
        // INCORRECT: Should be replaced with: assert(is_string($numericString) && is_numeric($numericString));
    }

    /**
     * 8. INTEGER RANGE ANNOTATIONS (when enableIntegerRanges = true)
     * Rule: These should trigger the rule and be replaced with range assertions
     */

    public function integerRangeAnnotations(): void
    {
        /** @var positive-int $positiveInt */
        $positiveInt = 5;
        // Use variable to avoid unused variable warning
        echo $positiveInt;
        
        // INCORRECT: Should be replaced with: assert(is_int($positiveInt) && $positiveInt > 0);
        
        /** @var negative-int $negativeInt */
        $negativeInt = -5;
        // Use variable to avoid unused variable warning
        echo $negativeInt;
        
        // INCORRECT: Should be replaced with: assert(is_int($negativeInt) && $negativeInt < 0);
        
        /** @var int<0, 100> $rangeInt */
        $rangeInt = 50;
        // Use variable to avoid unused variable warning
        echo $rangeInt;
        
        // INCORRECT: Should be replaced with: assert(is_string($rangeInt) && $rangeInt >= 0 && $rangeInt <= 100);
    }

    /**
     * 9. CORRECT USAGE - EXPLICIT ASSERTIONS
     * Rule: These are CORRECT and should NOT trigger the rule
     */

    public function correctExplicitAssertions(): void
    {
        $name = 'John';
        $age = 25;
        $date = new DateTime();
        
        // CORRECT: Explicit assertions instead of @var annotations
        assert(is_string($name));
        assert(is_int($age));
        assert($date instanceof DateTime);
        
        // CORRECT: Complex assertions
        $nullableString = 'hello';
        assert(is_string($nullableString) || $nullableString === null);
        
        $numericValue = 42;
        assert(is_int($numericValue) || is_float($numericValue));
    }

    /**
     * 10. IGNORED CASES - WHERE RULE DOES NOT APPLY
     * Rule: These should NOT trigger the rule
     */

    public function ignoredCases(): void
    {
        // CORRECT: No @var annotation, no assertion needed
        $simpleVariable = 'value';
        echo $simpleVariable;
        $unnamedVar = 'value';
        assert(is_string($unnamedVar));
        echo $unnamedVar;
        
        // CORRECT: @var annotation with unsupported type (ignored by rule)
        /** @var mixed $mixedVar */
        $mixedVar = 'value';
        echo $mixedVar;
        
        // CORRECT: @var annotation with void type (ignored by rule)
        /** @var void $voidVar */
        $voidVar = null;
        echo $voidVar;
    }

    /**
     * 11. DOC COMMENT WITH OTHER ANNOTATIONS
     * Rule: Only @var annotations trigger the rule
     */

    public function otherAnnotations(): void
    {
        // CORRECT: @param, @return, @throws don't trigger the rule
        // These annotations are for documentation purposes only
        echo 'Method with other annotations';
    }

    /**
     * 12. METHOD WITH OTHER ANNOTATIONS
     * Rule: Only @var annotations trigger the rule
     */
    
    /** @param string $param This is a parameter */
    /** @return void */
    /** @throws \InvalidArgumentException */
    public function methodWithOtherAnnotations(string $param): void
    {
        // CORRECT: @param, @return, @throws don't trigger the rule
        echo $param;
    }

}
