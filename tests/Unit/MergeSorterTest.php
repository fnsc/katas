<?php

namespace Tests\Unit;

use Fnsc\Katas\MergeSorter;
use PHPUnit\Framework\TestCase;

class MergeSorterTest extends TestCase
{
    public function testShouldOrderGivenArray(): void
    {
        // Set
        $expected = $data = [12, 3, 16, 6, 5, 1];
        sort($expected);

        $sorter = new MergeSorter();

        // Actions
        $result = $sorter->sort($data);

        // Assertions
        $this->assertSame($expected, $result);
    }
}
