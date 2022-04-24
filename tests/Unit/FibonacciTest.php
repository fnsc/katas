<?php

namespace Tests\Unit;

use Katas\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testShouldCalculateFibonacciNumber(): void
    {
        // Set
        $fibonacci = new Fibonacci();
        $memo = [];

        // Actions
        $result = $fibonacci->calculate(50, $memo);

        // Assertions
        $this->assertSame(12586269025, $result);
    }
}
