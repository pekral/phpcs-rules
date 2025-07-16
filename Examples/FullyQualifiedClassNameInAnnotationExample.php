<?php

declare(strict_types = 1);

namespace Example;

use DateTime;

/**
 * @var \DateTime $dt
 */
final class FullyQualifiedClassNameInAnnotationExample
{

    public function getDateTime(): DateTime
    {
        return new DateTime();
    }

} 