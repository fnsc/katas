<?php

namespace Tests\Unit;

use Fnsc\Katas\BinarySearcher;
use Fnsc\Katas\Exceptions\TargetException;
use Fnsc\Katas\MergeSorter;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public function testShouldReturnTrueWhenFindsTheTargetInAnArray(): void
    {
        // Set
        $data = [1,54,2,3,65,1,67,12345,6,2345,3245,123,4,41,4];
        $expected = $target = 3245;

        $sorter = new MergeSorter();
        $searcher = new BinarySearcher($sorter);

        // Actions
        $result = $searcher->search($data, $target);

        // Assertions
        $this->assertSame($expected, $result);
    }

    public function testShouldReturnFalseWhenDoesNotFindTheTargetInAnArray(): void
    {
        // Set
        $data = [1,54,2,3,65,1,67,12345,6,2345,3245,123,4,41,4];
        $target = 1000000000;

        $sorter = new MergeSorter();
        $searcher = new BinarySearcher($sorter);

        // Expectations
        $this->expectException(TargetException::class);

        // Actions
        $searcher->search($data, $target);
    }
}
