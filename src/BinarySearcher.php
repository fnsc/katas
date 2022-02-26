<?php

namespace Fnsc\Katas;

use Fnsc\Katas\Exceptions\TargetException;

class BinarySearcher
{
    private array $data;
    private int $start = 0;
    private int $end = 0;

    /**
     * @throws TargetException
     */
    public function search(array $data, mixed $target): mixed
    {
        sort($data);
        $this->data = $data;
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
}
