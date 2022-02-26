<?php

namespace Fnsc\Katas;

final class MergeSorter
{
    private const MINIMUM_NUMBER_OF_ELEMENTS = 2;

    public function sort(array $data): array
    {
        $elementsQuantity = count($data);

        if (self::MINIMUM_NUMBER_OF_ELEMENTS > $elementsQuantity) {
            return $data;
        }

        $middleIndex = floor($elementsQuantity / 2);
        $leftArray = array_slice($data, 0, $middleIndex);
        $rightArray = array_slice($data, $middleIndex, $elementsQuantity);

        return $this->mergeSorted($this->sort($leftArray), $this->sort($rightArray));
    }

    private function mergeSorted(array $leftArray, array $rightArray): array
    {
        $result = [];
        $leftIndex = 0;
        $rightIndex = 0;

        while ($leftIndex < count($leftArray) && $rightIndex < count($rightArray)) {
            if ($leftArray[$leftIndex] < $rightArray[$rightIndex]) {
                $result[] = $leftArray[$leftIndex];
                $leftIndex += 1;

                continue;
            }

            $result[] = $rightArray[$rightIndex];
            $rightIndex += 1;
        }

        return array_merge(
            $result,
            array_slice($leftArray, $leftIndex),
            array_slice($rightArray, $rightIndex)
        );
    }
}
