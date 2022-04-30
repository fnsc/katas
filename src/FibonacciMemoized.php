<?php

namespace Katas;

final class FibonacciMemoized
{
    public function calculate(int $index, array &$memo = []): int
    {
        if (array_key_exists($index, $memo)) {
            return $memo["{$index}"];
        }

        if ($index <= 2) {
            return 1;
        }

        $memo["{$index}"] = $this->calculate(
            $index - 1,
            $memo
        ) + $this->calculate(
            $index - 2,
            $memo
        );

        return $memo["{$index}"];
    }
}
