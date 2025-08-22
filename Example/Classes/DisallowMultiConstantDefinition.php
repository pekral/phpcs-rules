<?php

declare(strict_types = 1);

namespace Example\Classes;

use DateTime;

/**
 * This class demonstrates the exact logic of the DisallowMultiConstantDefinition rule.
 * Based on the actual implementation analysis.
 */
final class DisallowMultiConstantDefinition
{

    /**
     * CORRECT: Single constant per line
     */
    public const string CORRECT_SINGLE = 'single';

    /**
     * INCORRECT: Multiple constants on one line (should be reported and fixed)
     * Rule: Detects comma-separated constants on single line
     */
    public const string MULTI_1 = 'first';

    /**
     * INCORRECT: Multiple constants on one line (should be reported and fixed)
     * Rule: Detects comma-separated constants on single line
     */
    public const string MULTI_2 = 'second';

    /**
     * INCORRECT: Multiple constants on one line (should be reported and fixed)
     * Rule: Detects comma-separated constants on single line
     */
    public const string MULTI_3 = 'third';

    /**
     * INCORRECT: Multiple constants with array values (should be reported and fixed)
     * Rule: Detects comma-separated constants even with complex values
     * Note: The rule ignores commas inside arrays (T_OPEN_SHORT_ARRAY)
     */
    public const array ARRAY_1 = [1, 2, 3];

    /**
     * INCORRECT: Multiple constants with array values (should be reported and fixed)
     * Rule: Detects comma-separated constants even with complex values
     * Note: The rule ignores commas inside arrays (T_OPEN_SHORT_ARRAY)
     */
    public const array ARRAY_2 = ['a', 'b', 'c'];

    /**
     * INCORRECT: Multiple constants with array values (should be reported and fixed)
     * Rule: Detects comma-separated constants even with complex values
     * Note: The rule ignores commas inside arrays (T_OPEN_SHORT_ARRAY)
     */
    public const array ARRAY_3 = [];

    /**
     * INCORRECT: Multiple constants with mixed visibility (should be reported and fixed)
     * Rule: Detects comma-separated constants and preserves visibility in fix
     */
    public const string PUBLIC_1 = 'public';

    /**
     * INCORRECT: Multiple constants with mixed visibility (should be reported and fixed)
     * Rule: Detects comma-separated constants and preserves visibility in fix
     */
    public const string PUBLIC_2 = 'also_public';

    /**
     * CORRECT: Single constant with array value containing commas
     * Rule: Ignores commas inside arrays (T_OPEN_SHORT_ARRAY logic)
     */
    public const array SINGLE_ARRAY = [
        'items' => ['one', 'two', 'three'],
        'nested' => [
            'deep' => 'value',
        ],
    ];

    /**
     * CORRECT: Single constant with class reference
     */
    public const string CLASS_REF = DateTime::class;

    /**
     * CORRECT: Single constant with expression
     */
    public const int EXPRESSION = 2 + 2;

    /**
     * CORRECT: Single constant with final modifier
     */
    public final const string FINAL_CONST = 'final';

    /**
     * CORRECT: Single constant with complex modifiers
     */
    public final const string COMPLEX_MODIFIER = 'complex';

    /**
     * CORRECT: Single constant with doc comment
     */
    public const string DOC_COMMENT = 'documented';

    /**
     * CORRECT: Single constant with attribute
     */
    #[Attribute]
    public const string ATTRIBUTED = 'with_attribute';

    /**
     * CORRECT: Single constant with multiple attributes
     */
    #[Attribute]
    #[Attribute]
    public const string MULTI_ATTRIBUTE = 'multi_attributed';

    /**
     * CORRECT: Single constant with attribute and doc comment
     */
    #[Attribute]
    public const int MIXED = 42;

    /**
     * CORRECT: Single constant with long name
     */
    public const string VERY_LONG_CONSTANT_NAME_THAT_DEMONSTRATES_LINE_LENGTH = 'long_name';

    /**
     * CORRECT: Single constant with complex expression
     */
    public const int COMPLEX_EXPRESSION = (2 + 3) * 4 / 2;

    /**
     * CORRECT: Single constant with ternary operator
     */
    public const string TERNARY = 'yes';

    /**
     * CORRECT: Single constant with null coalescing
     */
    public const string NULL_COALESCE = 'default';

    /**
     * CORRECT: Single constant with spaceship operator
     */
    public const int SPACESHIP = 1 <=> 2;

    /**
     * CORRECT: Single constant with bitwise operations
     */
    public const int BITWISE = 1 | 2 | 4;

    /**
     * CORRECT: Single constant with logical operations
     */
    public const bool LOGICAL = true;

    /**
     * CORRECT: Single constant with simple value
     */
    public const string FUNCTION_CALL = 'test';

    /**
     * CORRECT: Single constant with simple value
     */
    public const string METHOD_CALL = '2023-01-01';

    /**
     * CORRECT: Single constant with simple value
     */
    public const string CLOSURE = 'closure';

    /**
     * CORRECT: Single constant with simple value
     */
    public const string MATCH = 'match_true';

    /**
     * CORRECT: Single constant with simple value
     */
    public const string ENUM = 'Case1';

    /**
     * CORRECT: Single constant with string value
     */
    public const string INTERSECTION = 'ExampleContract';

    /**
     * CORRECT: Single constant with string value
     */
    public const string DNF = 'ExampleContract&ExampleBehavior';

    /**
     * CORRECT: Single constant with string value
     */
    public const string READONLY_CLASS = 'ReadonlyExample';

    /**
     * CORRECT: Single constant with complex value
     */
    protected const array COMPLEX_VALUE = [
        'key' => 'value',
        'number' => 123,
    ];

    /**
     * INCORRECT: Multiple constants with different values (should be reported and fixed)
     * Rule: Detects comma-separated constants regardless of value type
     */
    protected const string PROTECTED_1 = 'string';

    /**
     * INCORRECT: Multiple constants with different values (should be reported and fixed)
     * Rule: Detects comma-separated constants regardless of value type
     */
    protected const int PROTECTED_2 = 42;

    /**
     * INCORRECT: Multiple constants with different values (should be reported and fixed)
     * Rule: Detects comma-separated constants regardless of value type
     */
    protected const true PROTECTED_3 = true;

    /**
     * CORRECT: Single constant with visibility modifier
     */
    private const int PRIVATE_CONST = 42;

    /**
     * INCORRECT: Multiple constants with same visibility (should be reported and fixed)
     * Rule: Detects comma-separated constants with same visibility modifier
     */
    private const int PRIVATE_1 = 1;

    /**
     * INCORRECT: Multiple constants with same visibility (should be reported and fixed)
     * Rule: Detects comma-separated constants with same visibility modifier
     */
    private const int PRIVATE_2 = 2;

    /**
     * INCORRECT: Multiple constants with same visibility (should be reported and fixed)
     * Rule: Detects comma-separated constants with same visibility modifier
     */
    private const int PRIVATE_3 = 3;

    /**
     * CORRECT: Single constant with constructor property promotion
     */
    public function __construct(public string $promotedProp) {
    }

    /**
     * CORRECT: Single constant with getter method
     */
    public function getConstant(): string
    {
        return self::CORRECT_SINGLE;
    }

    /**
     * CORRECT: Single constant with setter method
     */
    public function setConstant(): void
    {
        // Constants cannot be set, this is just for demonstration
    }

}

/**
 * Example enum for demonstration
 */
enum ExampleEnum
{

    case Case1;
    case Case2;

}

/**
 * Example interface for demonstration
 */
interface ExampleContract
{

    public function method(): void;

}

/**
 * Example trait for demonstration
 */
trait ExampleBehavior
{

    public function traitMethod(): void
    {
        // Trait method implementation
    }

}

/**
 * Example readonly class for demonstration
 */
readonly final class ReadonlyExample
{

    public function __construct(public string $name, public int $value,) {
    }

}

/**
 * Example attribute for demonstration
 */
#[Attribute]
final class Attribute
{

    public function __construct(public string $name = '',) {
    }

}