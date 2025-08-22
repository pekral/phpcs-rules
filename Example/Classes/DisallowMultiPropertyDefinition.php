<?php

declare(strict_types = 1);

namespace Example\Classes;

use DateTime;

/**
 * This class demonstrates the exact logic of the DisallowMultiPropertyDefinition rule.
 * Based on the actual implementation analysis.
 */
final class DisallowMultiPropertyDefinition
{

    /**
     * INCORRECT: Multiple properties with same visibility and type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same visibility
     */
    private string $publicProp1;

    /**
     * INCORRECT: Multiple properties with same visibility and type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same visibility
     */
    private string $publicProp2;

    /**
     * INCORRECT: Multiple properties with same visibility and type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same visibility
     */
    private string $publicProp3;

    /**
     * CORRECT: Single property per line
     */
    private int $id;

    /**
     * CORRECT: Single property per line with type hint
     */
    private string $name;

    /**
     * CORRECT: Single property per line with default value
     */
    private bool $active = true;

    /**
     * CORRECT: Single property per line with complex type
     */
    private array $data = [];

    /**
     * INCORRECT: Multiple properties on one line (should be reported and fixed)
     * Rule: Detects comma-separated properties on single line
     */
    private int $x;

    /**
     * INCORRECT: Multiple properties on one line (should be reported and fixed)
     * Rule: Detects comma-separated properties on single line
     */
    private int $y;

    /**
     * INCORRECT: Multiple properties on one line (should be reported and fixed)
     * Rule: Detects comma-separated properties on single line
     */
    private int $z;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private string $firstName;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private string $lastName;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private string $email;

    /**
     * INCORRECT: Multiple properties with same type and default values (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers and defaults
     */
    private array $items = [];

    /**
     * INCORRECT: Multiple properties with same type and default values (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers and defaults
     */
    private array $config = [];

    /**
     * INCORRECT: Multiple properties with same type and default values (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers and defaults
     */
    private array $settings = [];

    /**
     * INCORRECT: Multiple properties with readonly modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with readonly modifier
     */
    private readonly string $readonlyProp1;

    /**
     * INCORRECT: Multiple properties with readonly modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with readonly modifier
     */
    private readonly string $readonlyProp2;

    /**
     * INCORRECT: Multiple properties with readonly modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with readonly modifier
     */
    private readonly string $readonlyProp3;

    /**
     * CORRECT: Single property with array type and default
     */
    private array $appConfig = [
        'retries' => 3,
        'timeout' => 30,
    ];

    /**
     * CORRECT: Single property with nullable type
     */
    private ?string $optionalName = null;

    /**
     * CORRECT: Single property with union type
     */
    private string|int $flexibleValue;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private array $users = [];

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private array $profiles = [];

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private array $collections = [];

    /**
     * CORRECT: Single property with long type hint
     */
    private DateTime $date;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private DateTime $date1;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private DateTime $date2;

    /**
     * INCORRECT: Multiple properties with same type (should be reported and fixed)
     * Rule: Detects comma-separated properties with same modifiers
     */
    private DateTime $date3;

    /**
     * INCORRECT: Multiple properties with static modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with static modifier
     */
    private static string $staticProp1;

    /**
     * INCORRECT: Multiple properties with static modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with static modifier
     */
    private static string $staticProp2;

    /**
     * INCORRECT: Multiple properties with static modifier (should be reported and fixed)
     * Rule: Detects comma-separated properties with static modifier
     */
    private static string $staticProp3;

    /**
     * CORRECT: Single property with complex modifiers
     */
    private static string $singleComplexProp;

    /**
     * CORRECT: Single property with constructor property promotion
     */
    public function __construct(private string $promotedProp) {
    }

    /**
     * CORRECT: Single property with getter method
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * CORRECT: Single property with setter method
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * CORRECT: Properties that the rule IGNORES (not reported)
     * Rule: Ignores properties with T_AS token (trait aliases)
     * Note: This would require a trait to be defined, so it's commented out
     */
    // use SomeTrait {
    //     SomeTrait::method as private renamedMethod;
    // }

    /**
     * CORRECT: Properties that the rule IGNORES (not reported)
     * Rule: Ignores properties that are not actually properties
     * (e.g., variables in functions, constants, etc.)
     */
    public function someFunction(): void
    {
        // This function demonstrates that the rule ignores non-property variables
        // Local variables in functions are not checked by DisallowMultiPropertyDefinition
    }

}
