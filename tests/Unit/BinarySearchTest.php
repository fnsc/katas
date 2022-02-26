<?php

namespace Tests\Unit;

use Fnsc\Katas\BinarySearcher;
use Fnsc\Katas\Exceptions\TargetException;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public function testShouldReturnTrueWhenFindsTheTargetInAnArray(): void
    {
        // Set
        $data = [1,54,2,3,65,1,67,12345,6,2345,3245,123,4,41,4];
        $target = 3245;
        $searcher = new BinarySearcher();

        // Actions
        $result = $searcher->search($data, $target);

        // Assertions
        $this->assertSame(3245, $result);
    }

    public function testShouldReturnFalseWhenDoesNotFindTheTargetInAnArray(): void
    {
        // Set
        $data = [1,54,2,3,65,1,67,12345,6,2345,3245,123,4,41,4];
        $target = 1000000000;
        $searcher = new BinarySearcher();

        // Expectations
        $this->expectException(TargetException::class);

        // Actions
        $searcher->search($data, $target);
    }
}
