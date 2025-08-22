<?php

declare(strict_types = 1);

namespace Example\Attributes;

use Attribute;

#[Attribute]
final class Route
{

    public function __construct(public string $path, public array $methods = ['GET']) {
    }

}

#[Attribute]
final class Security
{

    public function __construct(public string $expression)
    {
    }

}

#[Attribute]
final class Validate
{

    public function __construct(public string $validator)
    {
    }

}

final class AttributeAndTargetSpacing
{

    /**
     * This demonstrates CORRECT spacing between attributes and targets
     * There should be exactly one blank line between attributes and the target
     */
    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function getUsers(): array
    {
        return [];
    }

    /**
     * This demonstrates INCORRECT spacing - missing blank line
     * There should be one blank line between attributes and the target
     */
    #[Route('/api/users', methods: ['POST'])]
    public function createUser(): void
    {
        // Implementation
    }

    /**
     * This demonstrates INCORRECT spacing - too many blank lines
     * There should be exactly one blank line between attributes and the target
     */
    #[Route('/api/users/{id}', methods: ['PUT'])]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function updateUser(int $id): void
    {
        // Implementation
        // Use parameter to avoid unused error
        $userId = $id;
        // Cleanup
        unset($userId);
    }

    /**
     * This demonstrates CORRECT spacing with multiple attributes
     * Multiple attributes should be grouped together with one blank line to target
     */
    #[Route('/api/users/{id}', methods: ['DELETE'])]
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Validate('user')]
    public function deleteUser(int $id): void
    {
        // Implementation
        // Use parameter to avoid unused error
        $userId = $id;
        // Cleanup
        unset($userId);
    }

    /**
     * This demonstrates CORRECT spacing with single attribute
     * Single attribute should have one blank line to target
     */
    #[Route('/api/users/search', methods: ['GET'])]
    public function searchUsers(): array
    {
        return [];
    }

    /**
     * This demonstrates INCORRECT spacing - no blank line
     * There should be one blank line between attribute and target
     */
    #[Route('/api/users/stats', methods: ['GET'])]
    public function getUserStats(): array
    {
        return [];
    }

}

/**
 * This demonstrates CORRECT spacing with class attribute
 * Class attributes should have one blank line to class declaration
 */
#[Attribute]
#[Route('/api/users', methods: ['GET'])]
final class UserController
{

    public function index(): void
    {
        // Implementation
    }

}

/**
 * This demonstrates INCORRECT spacing with class attribute
 * Class attributes should have one blank line to class declaration
 */
#[Attribute]
final class AdminController
{

    public function index(): void
    {
        // Implementation
    }

}
