<?php

declare(strict_types = 1);

namespace Example\Miscellaneous;

final class Cognitive
{

    /**
     * This method has high cognitive complexity (> 7) to demonstrate the rule
     */
    public function processData(array $items, string $mode, ?array $filters = null): array
    {
        $processed = [];

        if ($mode === 'strict') {
            $processed = $this->processStrictMode($items, $filters);
        } elseif ($mode === 'normal') {
            $processed = $this->processNormalMode($items);
        } else {
            $processed = $this->processDefaultMode($items);
        }

        return $processed;
    }

    private function processStrictMode(array $items, ?array $filters): array
    {
        $processed = [];

        foreach ($items as $key => $item) {
            $processed = $this->processStrictItem($key, $item, $filters, $processed);
        }

        return $processed;
    }
    
    private function processStrictItem(int|string $key, array $item, ?array $filters, array $processed): array
    {
        if ($filters !== null && !$this->passesFilters($item, $filters)) {
            return $processed;
        }

        if (!$item['active'] || !$item['verified']) {
            return $processed;
        }

        return $this->processItemByScore($key, $item, $processed);
    }
    
    private function processItemByScore(int|string $key, array $item, array $processed): array
    {
        if ($item['score'] > 90) {
            $processed[$key] = $item;
        } elseif ($item['score'] > 70 && $item['premium'] && $item['category'] === 'gold') {
            $processed[$key] = $item;
        }
        
        return $processed;
    }

    private function passesFilters(array $item, array $filters): bool
    {
        foreach ($filters as $filterKey => $filterValue) {
            if ($item[$filterKey] !== $filterValue) {
                return false;
            }
        }

        return true;
    }

    private function processNormalMode(array $items): array
    {
        $processed = [];

        for ($i = 0; $i < count($items); $i += 1) {
            if ($items[$i]['status'] === 'ready') {
                $processed[] = $items[$i];
            }
        }

        return $processed;
    }

    private function processDefaultMode(array $items): array
    {
        $processed = [];

        while (count($items) > 0) {
            $item = array_pop($items);

            if ($item && is_array($item)) {
                $processed[] = $item;
            }
        }

        return $processed;
    }

} 