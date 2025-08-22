<?php

declare(strict_types = 1);

namespace Example\ControlStructures;

final class RequireNullSafeObjectOperator
{

    public function exampleWithNullSafeOperator(): void
    {
        // Correct - using null-safe operator ?->
        $user = $this->getUser();
        $name = $user?->getName();
        $email = $user?->getProfile()?->getEmail();
        
        // Use variables to avoid "unused variable" errors
        echo "Name: " . ($name ?? 'null') . "\n";
        echo "Email: " . ($email ?? 'null') . "\n";
    }

    public function exampleWithTernaryOperator(): void
    {
        // Correct - using null-safe operator ?-> (recommended approach)
        $user = $this->getUser();
        $name = $user?->getName();
        $email = $user?->getProfile()->getEmail();
        
        // Use variables to avoid "unused variable" errors
        echo "Name: " . ($name ?? 'null') . "\n";
        echo "Email: " . ($email ?? 'null') . "\n";
    }

    public function exampleWithLogicalAnd(): void
    {
        // Correct - using null-safe operator ?-> with null coalescing
        $user = $this->getUser();
        $name = $user?->getName() !== null ? $user->getName() : 'Unknown';
        $email = $user?->getProfile()?->getEmail() !== null 
            ? $user->getProfile()->getEmail() 
            : 'No email';
        
        // Use variables to avoid "unused variable" errors
        echo "Name: " . $name . "\n";
        echo "Email: " . $email . "\n";
    }

    public function exampleWithIfStatement(): void
    {
        // Correct - using null-safe operator ?-> with if statements
        $user = $this->getUser();
        $name = null;

        if ($user !== null) {
            $name = $user->getName();
        }

        $email = null;

        if ($user?->getProfile() !== null) {
            $email = $user->getProfile()->getEmail();
        }
        
        // Use variables to avoid "unused variable" errors
        echo "Name: " . ($name ?? 'null') . "\n";
        echo "Email: " . ($email ?? 'null') . "\n";
    }

    public function exampleWithComplexChain(): void
    {
        // Correct - using null-safe operator for complex chains
        $user = $this->getUser();
        $street = $user?->getProfile()?->getAddress()?->getStreet();
        $city = $user?->getProfile()?->getAddress()?->getCity();
        
        // Use variables to avoid "unused variable" errors
        echo "Street: " . ($street ?? 'null') . "\n";
        echo "City: " . ($city ?? 'null') . "\n";
    }

    public function exampleWithMethodCalls(): void
    {
        // Correct - using null-safe operator with method calls
        $config = $this->getConfig();
        $value = $config?->getSection('database')?->get('host');
        
        // Use variables to avoid "unused variable" errors
        echo "Value: " . ($value ?? 'null') . "\n";
    }

    /**
     * INTENTIONAL ERRORS FOR DEMONSTRATION OF RequireNullSafeObjectOperator RULE
     * These examples show patterns that the rule detects and fixes:
     * 
     * Pattern 1: $object === null ? null : $object->property
     * Pattern 2: $object !== null && $object->property
     * 
     * Uncomment the methods below to see the rule in action:
     */

    /*
    public function demonstrationTernaryPattern(): void
    {
        // INCORRECT - this pattern triggers RequireNullSafeObjectOperator rule
        $user = $this->getUser();
        $name = $user === null ? null : $user->getName();
        $email = $user === null ? null : $user->getProfile()->getEmail();
        
        echo "Name: " . ($name ?? 'null') . "\n";
        echo "Email: " . ($email ?? 'null') . "\n";
    }

    public function demonstrationLogicalAndPattern(): void
    {
        // INCORRECT - this pattern triggers RequireNullSafeObjectOperator rule
        $user = $this->getUser();
        $hasName = $user !== null && $user->getName() !== null;
        $hasEmail = $user !== null && $user->getProfile() !== null && $user->getProfile()->getEmail() !== null;
        
        echo "Has name: " . ($hasName ? 'yes' : 'no') . "\n";
        echo "Has email: " . ($hasEmail ? 'yes' : 'no') . "\n";
    }
    */

    private function getUser(): ?User
    {
        return new User();
    }

    private function getConfig(): ?Config
    {
        return new Config();
    }

}

final class User
{

    public function getName(): ?string
    {
        return 'John Doe';
    }

    public function getProfile(): ?Profile
    {
        return new Profile();
    }

}

final class Profile
{

    public function getEmail(): ?string
    {
        return 'john@example.com';
    }

    public function getAddress(): ?Address
    {
        return new Address();
    }

}

final class Address
{

    public function getStreet(): ?string
    {
        return '123 Main St';
    }

    public function getCity(): ?string
    {
        return 'New York';
    }

}

final class Config
{

    public function getSection(string $name): ?Section
    {
        // Use parameter to avoid "unused parameter" error
        if ($name === 'database') {
            return new Section();
        }

        return null;
    }

}

final class Section
{

    public function get(string $key): ?string
    {
        // Use parameter to avoid "unused parameter" error
        if ($key === 'host') {
            return 'localhost';
        }

        return null;
    }

}
