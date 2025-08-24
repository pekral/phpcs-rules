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

#[Attribute]
final class Cache
{

    public function __construct(public int $ttl = 3_600)
    {
    }

}

#[Attribute]
final class Deprecated
{

    public function __construct(public string $reason = '')
    {
    }

}

final class AttributesOrder
{

    /**
     * This demonstrates CORRECT alphabetical order of attributes
     * Attributes are sorted alphabetically: Cache, Deprecated, Route, Security, Validate
     */
    #[Cache(ttl: 1_800)]
    #[Deprecated('Use new endpoint')]
    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('user')]
    public function getUsers(): array
    {
        return [];
    }

    /**
     * This demonstrates INCORRECT alphabetical order of attributes
     * Attributes are not in alphabetical order: Route should come after Deprecated
     */
    #[Cache(ttl: 1_800)]
    #[Deprecated('Use new endpoint')]
    #[Route('/api/users', methods: ['POST'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('user')]
    public function createUser(): void
    {
        // Implementation
    }

    /**
     * This demonstrates CORRECT alphabetical order with multiple attributes
     * Multiple attributes are treated as separate blocks
     */
    #[Cache(ttl: 1_800)]
    #[Route('/api/users/{id}', methods: ['PUT'])]
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Validate('user')]
    public function updateUser(int $id): void
    {
        // Implementation
        // Use parameter to avoid unused error
        $userId = $id;
        // Cleanup
        unset($userId);
    }

    /**
     * This demonstrates INCORRECT alphabetical order with multiple attributes
     * Security should come after Cache, but it's placed before
     */
    #[Cache(ttl: 1_800)]
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
     * This demonstrates CORRECT alphabetical order
     * Attributes are sorted alphabetically: Cache, Deprecated, Route, Security
     */
    #[Cache(ttl: 3_600)]
    #[Deprecated('Use new endpoint')]
    #[Route('/api/users/search', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function searchUsers(): array
    {
        return [];
    }

    /**
     * This demonstrates INCORRECT alphabetical order
     * Attributes are not in alphabetical order: Route should come after Deprecated
     */
    #[Cache(ttl: 3_600)]
    #[Deprecated('Use new endpoint')]
    #[Route('/api/users/stats', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function getUserStats(): array
    {
        return [];
    }

    /**
     * This demonstrates CORRECT alphabetical order with complex attribute names
     * Attributes are sorted alphabetically: Route, Security, Validate
     */
    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('user')]
    public function listUsers(): array
    {
        return [];
    }

    /**
     * This demonstrates INCORRECT alphabetical order with complex attribute names
     * Attributes are not in alphabetical order: Validate should come after Security
     */
    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('user')]
    public function listUsersIncorrect(): array
    {
        return [];
    }

}

/**
 * This demonstrates CORRECT alphabetical order with class attributes
 * Class attributes are sorted alphabetically: Attribute, Route
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
 * This demonstrates INCORRECT alphabetical order with class attributes
 * Class attributes are not in alphabetical order: Route should come after Attribute
 */
#[Attribute]
#[Route('/api/admin', methods: ['GET'])]
final class AdminController
{

    public function index(): void
    {
        // Implementation
    }

}

/**
 * This demonstrates CORRECT alphabetical order with property attributes
 * Property attributes are sorted alphabetically: Route, Security, Validate
 */
final class UserEntity
{

    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('user')]
    private string $name;

    /**
     * This demonstrates INCORRECT alphabetical order with property attributes
     * Property attributes are not in alphabetical order: Validate should come after Security
     */
    #[Route('/api/users', methods: ['POST'])]
    #[Security("is_granted('ROLE_USER')")]
    #[Validate('email')]
    private string $email;

}
