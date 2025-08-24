<?php

declare(strict_types = 1);

namespace Example\Commenting;

use DateTime;

final class DeprecatedAnnotationDeclaration
{

    /**
     * @deprecated Since version 2.0, use newMethod() instead
     */
    public function oldMethod(): string
    {
        return 'This method is deprecated';
    }

    /**
     * @deprecated This method will be removed in version 3.0
     * @param string $name The user's name
     * @return string Greeting message
     */
    public function deprecatedGreet(string $name): string
    {
        return "Hello, {$name}!";
    }

    /**
     * @deprecated Will be removed in version 4.0. Use DateTimeImmutable instead
     * @return string Formatted date
     */
    public function formatDate(DateTime $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function newMethod(): string
    {
        return 'This is the new method';
    }

}
