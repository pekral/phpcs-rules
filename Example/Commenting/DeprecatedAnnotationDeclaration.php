<?php

declare(strict_types = 1);

namespace Example\Commenting;

use DateTime;
use InvalidArgumentException;

/**
 * This class demonstrates the correct and incorrect usage of @deprecated annotations
 * according to the DeprecatedAnnotationDeclaration rule.
 */
final class DeprecatedAnnotationDeclaration
{

    /**
     * CORRECT: @deprecated annotation with proper description
     *
     * @deprecated Since version 2.0, use newMethod() instead
     */
    public function oldMethod(): string
    {
        return 'This method is deprecated';
    }

    /**
     * CORRECT: @deprecated annotation with detailed description
     *
     * @deprecated This method will be removed in version 3.0
     * @param string $name The user's name
     * @return string Greeting message
     */
    public function deprecatedGreet(string $name): string
    {
        return "Hello, {$name}!";
    }

    /**
     * CORRECT: @deprecated annotation with minimal description
     *
     * @deprecated This method is deprecated
     */
    public function deprecatedWithoutDescription(): void
    {
        // This method demonstrates a deprecated method with minimal description
        echo 'This method is deprecated but has minimal description';
    }

    /**
     * CORRECT: @deprecated annotation with short description
     *
     * @deprecated This method is deprecated
     */
    public function deprecatedWithEmptyDescription(): int
    {
        // This method demonstrates a deprecated method with short description
        return 42;
    }

    /**
     * CORRECT: @deprecated annotation with version and replacement info
     *
     * @deprecated Since version 1.5, use processDataV2() instead
     * @param array $data Input data array
     * @return array Processed data
     */
    public function processData(array $data): array
    {
        return array_filter($data);
    }

    /**
     * CORRECT: @deprecated annotation with migration guide
     *
     * @deprecated Will be removed in version 4.0. Use DateTimeImmutable instead
     * @return string Formatted date
     */
    public function formatDate(DateTime $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * CORRECT: @deprecated annotation with breaking change notice
     *
     * @deprecated This method changes behavior in version 2.1
     * @param string $input Input string
     * @param int $maxLength Maximum length
     * @return string Truncated string
     * @throws \InvalidArgumentException When maxLength is negative
     */
    public function truncate(string $input, int $maxLength): string
    {
        if ($maxLength < 0) {
            throw new InvalidArgumentException('Max length must be non-negative');
        }
        
        return mb_substr($input, 0, $maxLength);
    }

    /**
     * CORRECT: Method without @deprecated annotation
     *
     * @param int $age User's age
     * @param bool $isAdult Whether user is adult
     * @return string Age description
     */
    public function describeAge(int $age, bool $isAdult): string
    {
        return "Age: {$age}, Adult: " . ($isAdult ? 'Yes' : 'No');
    }

}
