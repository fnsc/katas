<?php

namespace Katas;

use Katas\Exceptions\TargetException;

final class BinarySearcher
{
    private int $start = 0;
    private int $end = 0;
    private array $data;

    public function __construct(private readonly MergeSorter $sorter)
    {
    }

    /**
     * @throws TargetException
     */
    public function search(array $data, mixed $target): mixed
    {
        $this->setData($data);
        $this->setEnd();

        return $this->binarySearch($target);
    }

    /**
     * @throws TargetException
     */
    private function binarySearch(mixed $target): mixed
    {
        if ($this->isStartBiggerThanTheEnd()) {
            throw TargetException::doesNotExists();
        }

        $midIndex = $this->getMidIndex($this->start, $this->end);

        if ($this->data[$midIndex] === $target) {
            return $this->data[$midIndex];
        }

        if ($this->data[$midIndex] > $target) {
            $this->setEnd($midIndex - 1);

            return $this->binarySearch($target);
        }

        $this->setStart($midIndex + 1);

        return $this->binarySearch($target);
    }

    private function setEnd(?int $value = null): void
    {
        if ($value === null) {
            $this->end = count($this->data) - 1;

            return;
        }

        $this->end = $value;
    }

    private function setStart(int $value): void
    {
        $this->start = $value;
    }

    private function isStartBiggerThanTheEnd(): bool
    {
        return $this->start > $this->end;
    }

    private function getMidIndex(int $start, int $end): int
    {
        return floor(($start + $end) / 2);
    }

    private function setData(array $data): void
    {
        $this->data = $this->sorter->sort($data);
    }
}
