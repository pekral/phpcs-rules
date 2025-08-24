<?php

declare(strict_types = 1);

namespace Example\PHP;

use stdClass;

/**
 * This class demonstrates the exact logic of the DisallowReference rule.
 * 
 * This rule disallows usage of references in PHP and detects 4 types of violations:
 * 
 * 1. DisallowedPassingByReference - disallows passing parameters by reference
 * 2. DisallowedReturningReference - disallows returning references from functions
 * 3. DisallowedInheritingVariableByReference - disallows inheriting variables by reference in use clause
 * 4. DisallowedAssigningByReference - disallows assigning by reference
 * 
 * Note: This example file shows the structure and comments for what would be detected,
 * but cannot contain actual & operators due to PHP syntax restrictions.
 */
final class DisallowReference
{

    /**
     * 1. PASSING BY REFERENCE
     * Rule: Disallows passing parameters by reference to functions
     * 
     * The following would be detected as INCORRECT:
     * - $this->modifyValue(&$value);
     * - $this->modifyArrayElement(&$array[0]);
     * - $this->modifyObjectProperty(&$object->property);
     */

    public function passingByReference(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        // CORRECT: Passing by value (no reference)
        $this->modifyValue($value);
        $this->modifyArrayElement($array[0]);
        $this->modifyObjectProperty($object->property);
        
        // INCORRECT: These would trigger DisallowedPassingByReference:
        // $this->modifyValue(&$value);
        // $this->modifyArrayElement(&$array[0]);
        // $this->modifyObjectProperty(&$object->property);
    }

    /**
     * 2. RETURNING REFERENCE
     * Rule: Disallows returning references from functions
     * 
     * The following would be detected as INCORRECT:
     * - public function &returningReference(): int
     * - return $value; (when function returns by reference)
     */

    public function returningReference(): int
    {
        return 42;
        
        // INCORRECT: This would trigger DisallowedReturningReference:
        // public function &returningReference(): int
        // return $value;
    }

    public function returningReferenceToArray(): array
    {
        return [1, 2, 3];
        
        // INCORRECT: This would trigger DisallowedReturningReference:
        // public function &returningReferenceToArray(): array
        // return $array;
    }

    public function returningReferenceToProperty(): string
    {
        $object = new stdClass();
        $object->property = 'value';
        
        // CORRECT: Returning by value (no reference)
        return $object->property;
        
        // INCORRECT: This would trigger DisallowedReturningReference:
        // public function &returningReferenceToProperty(): string
        // return $object->property;
    }

    /**
     * 3. INHERITING VARIABLE BY REFERENCE
     * Rule: Disallows inheriting variables by reference in use clause
     * 
     * The following would be detected as INCORRECT:
     * - function () use (&$value) { ... }
     * - fn () => ... (with &$value in use clause)
     */

    public function inheritingVariableByReference(): void
    {
        $value = 42;
        $anotherValue = 100;
        
        // CORRECT: Inheriting by value (no reference)
        $closure = static fn () => $value + 1;
        echo $closure();
        
        $arrowFunction = static fn () => $value + 1;
        echo $arrowFunction();
        
        $closure2 = static fn () => $value + $anotherValue;
        echo $closure2();
        
        // INCORRECT: These would trigger DisallowedInheritingVariableByReference:
        // $closure = function () use (&$value) { $value++; };
        // $arrowFunction = fn () => $value++;
        // $closure2 = function () use (&$value, &$anotherValue) { $value += $anotherValue; };
    }

    /**
     * 4. ASSIGNING BY REFERENCE
     * Rule: Disallows assigning variables by reference
     * 
     * The following would be detected as INCORRECT:
     * - $reference = &$original;
     * - foreach ($items as &$item) { ... }
     * - [&$data['key']] (in array)
     */

    public function assigningByReference(): void
    {
        $original = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        $items = [1, 2, 3];
        $data = ['key' => 'value'];
        
        // CORRECT: Assigning by value (no reference)
        $copy = $original;
        $elementCopy = $array[1];
        $propertyCopy = $object->property;
        
        foreach ($items as $item) {
            echo $item;
        }
        
        $newArray = [$data['key']];
        
        // Use variables to avoid UnusedVariable errors
        echo "Copy: $copy, Element: $elementCopy, Property: $propertyCopy\n";
        print_r($newArray);
        
        // INCORRECT: These would trigger DisallowedAssigningByReference:
        // $reference = &$original;
        // $elementRef = &$array[1];
        // $propertyRef = &$object->property;
        // foreach ($items as &$item) { $item *= 2; }
        // $refArray = [&$data['key']];
    }

    /**
     * 5. COMPLEX SCENARIOS
     * Rule: Demonstrates various complex reference usage patterns
     * 
     * The following would be detected as INCORRECT:
     * - Multiple references in one statement
     * - Reference in ternary operator
     * - Reference in match expression
     * - Reference in null coalescing
     */

    public function complexReferenceScenarios(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        // CORRECT: No references used
        $copy1 = $value;
        $copy2 = $array[0];
        $copy3 = $object->property;
        
        $result = $value > 0 ? $value : $array[0];
        
        $matchResult = match ($value) {
            42 => $value,
            default => $array[0],
        };
        
        $coalesceResult = $value ?? $array[0];
        
        // Use variables to avoid UnusedVariable errors
        echo "Copies: $copy1, $copy2, $copy3\n";
        echo "Result: $result, Match: $matchResult, Coalesce: $coalesceResult\n";
        
        // INCORRECT: These would trigger various DisallowReference errors:
        // $ref1 = &$value;
        // $ref2 = &$array[0];
        // $ref3 = &$object->property;
        // $result = $value > 0 ? &$value : &$array[0];
        // $matchResult = match ($value) { 42 => &$value, default => &$array[0] };
        // $coalesceResult = $value ?? &$array[0];
    }

    /**
     * 7. EXAMPLES OF CORRECT USAGE (no references)
     */

    public function correctUsage(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        // CORRECT: Passing by value
        $this->modifyValue($value);
        
        // CORRECT: Returning by value
        $result = $this->getValue();
        
        // CORRECT: Inheriting by value in closure
        $closure = static fn () => $value + 1;
        
        // CORRECT: Assigning by value
        $copy = $value;
        
        // CORRECT: Foreach without reference
        foreach ($array as $item) {
            echo $item;
        }
        
        // CORRECT: Array assignment without reference
        $newArray = [$value, $array[0]];
        
        // Use variables to avoid UnusedVariable errors
        echo "Result: $result, Closure: " . $closure() . ", Copy: $copy\n";
        print_r($newArray);
    }

    /**
     * 6. HELPER METHODS FOR DEMONSTRATION
     */

    private function modifyValue(int $value): void
    {
        // This method would modify the value if passed by reference
        echo "Modifying value: $value\n";
    }

    private function modifyArrayElement(int $element): void
    {
        // This method would modify the array element if passed by reference
        echo "Modifying array element: $element\n";
    }

    private function modifyObjectProperty(string $property): void
    {
        // This method would modify the object property if passed by reference
        echo "Modifying object property: $property\n";
    }

    private function processData(int $data, int $reference): void
    {
        // This method processes data and reference
        echo "Processing data: $data, reference: $reference\n";
    }

    private function getValue(): int
    {
        return 42;
    }

}
