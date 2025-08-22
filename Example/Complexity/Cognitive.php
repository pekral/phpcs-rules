<?php

declare(strict_types = 1);

namespace Example\Complexity;

final class Cognitive
{

    /**
     * This method has high cognitive complexity (> 7) to demonstrate the rule
     */
    public function complexMethod(array $data, int $type, bool $flag): array
    {
        $result = [];

        if ($type === 1) {
            $result = $this->processTypeOne($data, $flag);
        } elseif ($type === 2) {
            $result = $this->processTypeTwo($data, $flag);
        }

        return $result;
    }

    private function processTypeOne(array $data, bool $flag): array
    {
        $result = [];

        foreach ($data as $item) {
            $result = $this->processActiveItem($item, $flag, $result);
        }

        return $result;
    }
    
    private function processActiveItem(array $item, bool $flag, array $result): array
    {
        if ($item['status'] !== 'active') {
            return $result;
        }

        if ($flag && $item['priority'] > 5) {
            return $this->processHighPriority($item, $result);
        }
        
        if (!$flag || $item['priority'] <= 5) {
            return $this->processLowPriority($item, $result);
        }
        
        return $result;
    }

    private function processHighPriority(array $item, array $result): array
    {
        if ($item['category'] === 'urgent') {
            $result[] = $item;
        } elseif ($item['category'] === 'normal' && $item['score'] > 80) {
            $result[] = $item;
        }

        return $result;
    }

    private function processLowPriority(array $item, array $result): array
    {
        for ($i = 0; $i < count($item['tags']); $i += 1) {
            if ($item['tags'][$i] === 'important') {
                $result[] = $item;

                break;
            }
        }

        return $result;
    }

    private function processTypeTwo(array $data, bool $flag): array
    {
        $result = [];

        while (count($data) > 0) {
            $item = array_shift($data);

            if ($item && $flag) {
                $result[] = $item;
            }
        }

        return $result;
    }

}
