<?php

namespace Katas;

use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @dataProvider getPrimeFactorsScenarios
     */
    public function testShouldGeneratesPrimeFactors(int $number, array $expected): void
    {
        // Set
        $factors = new PrimeFactors();

        // Actions
        $result = $factors->generate($number);

        // Assertions
        $this->assertSame($expected, $result);
    }

    public function getPrimeFactorsScenarios(): array
    {
        return [
            'prime factor for 1' => [
                'number' => 1,
                'expected' => [],
            ],
            'prime factor for 2' => [
                'number' => 2,
                'expected' => [2],
            ],
            'prime factor for 3' => [
                'number' => 3,
                'expected' => [3],
            ],
            'prime factor for 4' => [
                'number' => 4,
                'expected' => [2, 2],
            ],
            'prime factor for 5' => [
                'number' => 5,
                'expected' => [5],
            ],
            'prime factor for 6' => [
                'number' => 6,
                'expected' => [2, 3],
            ],
            'prime factor for 8' => [
                'number' => 8,
                'expected' => [2, 2, 2],
            ],
            'prime factor for 100' => [
                'number' => 100,
                'expected' => [2, 2, 5, 5],
            ],
        ];
    }
}
