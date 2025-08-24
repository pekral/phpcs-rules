<?php

declare(strict_types = 1);

namespace Example\PHP;

use stdClass;

final class DisallowReference
{

    public function passingByReference(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        $this->modifyValue($value);
        $this->modifyArrayElement($array[0]);
        $this->modifyObjectProperty($object->property);
    }

    public function returningReference(): int
    {
        return 42;
    }

    public function inheritingVariableByReference(): void
    {
        $value = 42;
        $anotherValue = 100;
        
        $closure = static fn () => $value + 1;
        echo $closure();
        
        $arrowFunction = static fn () => $value + 1;
        echo $arrowFunction();
        
        $closure2 = static fn () => $value + $anotherValue;
        echo $closure2();
    }

    public function assigningByReference(): void
    {
        $original = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        $items = [1, 2, 3];
        $data = ['key' => 'value'];
        
        $copy = $original;
        $elementCopy = $array[1];
        $propertyCopy = $object->property;
        
        foreach ($items as $item) {
            echo $item;
        }
        
        $newArray = [$data['key']];
        
        echo "Copy: $copy, Element: $elementCopy, Property: $propertyCopy\n";
        print_r($newArray);
    }

    public function complexReferenceScenarios(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        $copy1 = $value;
        $copy2 = $array[0];
        $copy3 = $object->property;
        
        $result = $value > 0 ? $value : $array[0];
        
        $matchResult = match ($value) {
            42 => $value,
            default => $array[0],
        };
        
        $coalesceResult = $value ?? $array[0];
        
        echo "Copies: $copy1, $copy2, $copy3\n";
        echo "Result: $result, Match: $matchResult, Coalesce: $coalesceResult\n";
    }

    public function correctUsage(): void
    {
        $value = 42;
        $array = [1, 2, 3];
        $object = new stdClass();
        $object->property = 'value';
        
        $this->modifyValue($value);
        
        $result = $this->getValue();
        
        $closure = static fn () => $value + 1;
        
        $copy = $value;
        
        foreach ($array as $item) {
            echo $item;
        }
        
        $newArray = [$value, $array[0]];
        
        echo "Result: $result, Closure: " . $closure() . ", Copy: $copy\n";
        print_r($newArray);
    }

    private function modifyValue(int $value): void
    {
        echo "Modifying value: $value\n";
    }

    private function modifyArrayElement(int $element): void
    {
        echo "Modifying array element: $element\n";
    }

    private function modifyObjectProperty(string $property): void
    {
        echo "Modifying object property: $property\n";
    }

    private function getValue(): int
    {
        return 42;
    }

}
