<?php

namespace Fnsc\Katas;

class BinarySearcher
{
    private array $data;
    private int $start = 0;
    private int $end = 0;

    public function search(array $data, mixed $target): bool
    {
        sort($data);
        $this->data = $data;
        $this->setEnd();

        return $this->binarySearch($target);
    }

    private function binarySearch(mixed $target): bool
    {
        if ($this->isStartBiggerThanTheEnd()) {
            return false;
        }

        $midIndex = $this->getMidIndex($this->start, $this->end);

        if ($this->data[$midIndex] === $target) {
            return true;
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