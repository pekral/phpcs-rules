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

final class RequireAttributeAfterDocComment
{

    /**
     * This method demonstrates the correct placement of attributes
     * Attributes should come AFTER the doc comment
     */
    #[Route('/api/users', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function getUsers(): array
    {
        return [];
    }

    /**
     * This method demonstrates INCORRECT placement of attributes
     * Attributes should NOT come BEFORE the doc comment
     */
    // This should trigger the rule
    /**
     * Create a new user
     */
    #[Route('/api/users', methods: ['POST'])]
    public function createUser(): void
    {
        // Implementation
    }

    /**
     * This method demonstrates the correct placement of attributes
     * Multiple attributes are properly placed after the doc comment
     */
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
     * This method demonstrates INCORRECT placement of attributes
     * Attributes should NOT come BEFORE the doc comment
     */
    // This should trigger the rule
    /**
     * Delete a user
     */
    #[Route('/api/users/{id}', methods: ['DELETE'])]
    #[Security("is_granted('ROLE_ADMIN')")]
    public function deleteUser(int $id): void
    {
        // Implementation
        // Use parameter to avoid unused error
        $userId = $id;
        // Cleanup
        unset($userId);
    }

    /**
     * This method demonstrates the correct placement of attributes
     * Even with complex doc comments, attributes come after
     */
    /**
     * Search users with various filters
     * 
     * @param array<string, mixed> $filters
     * @return array<string, mixed>
     */
    #[Route('/api/users/search', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    public function searchUsers(array $filters, int $page = 1, int $limit = 10): array
    {
        // Use parameters to avoid unused errors
        $searchFilters = $filters;
        $currentPage = $page;
        $pageLimit = $limit;
        
        // Cleanup
        unset($searchFilters, $currentPage, $pageLimit);
        
        return [];
    }

}
