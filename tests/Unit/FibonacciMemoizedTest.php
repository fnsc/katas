<?php

namespace Katas;

use PHPUnit\Framework\TestCase;

class FibonacciMemoizedTest extends TestCase
{
    public function testShouldCalculateFibonacciNumber(): void
    {
        // Set
        $fibonacci = new FibonacciMemoized();
        $memo = [];

        // Actions
        $result = $fibonacci->calculate(50, $memo);

        // Assertions
        $this->assertSame(12_586_269_025, $result);
    }
}
