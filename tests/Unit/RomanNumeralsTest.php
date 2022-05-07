<?php

namespace Katas;

use Katas\Exceptions\TargetException;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @dataProvider getRomanNumeralsScenarios
     */
    public function testShouldGeneratesPrimeFactors(int $number, string $expected): void
    {
        // Set
        $romanNumerals = new RomanNumerals();

        // Actions
        $result = $romanNumerals->generate($number);

        // Assertions
        $this->assertSame($expected, $result);
    }

    public function testShouldThrowAnExceptionWhenTheNumberIsZero(): void
    {
        // Set
        $romanNumerals = new RomanNumerals();

        // Expectations
        $this->expectException(TargetException::class);
        $this->expectExceptionMessage(
            'The target value does not exists in the array'
        );

        // Actions
        $romanNumerals->generate(0);
    }

    public function getRomanNumeralsScenarios(): array
    {
        return [
            'roman number for 1' => [
                'number' => 1,
                'expected' => 'I',
            ],
            'roman number for 2' => [
                'number' => 2,
                'expected' => 'II',
            ],
            'roman number for 3' => [
                'number' => 3,
                'expected' => 'III',
            ],
            'roman number for 4' => [
                'number' => 4,
                'expected' => 'IV',
            ],
            'roman number for 5' => [
                'number' => 5,
                'expected' => 'V',
            ],
            'roman number for 6' => [
                'number' => 6,
                'expected' => 'VI',
            ],
            'roman number for 8' => [
                'number' => 8,
                'expected' => 'VIII',
            ],
            'roman number for 9' => [
                'number' => 9,
                'expected' => 'IX',
            ],
            'roman number for 10' => [
                'number' => 10,
                'expected' => 'X',
            ],
            'roman number for 40' => [
                'number' => 40,
                'expected' => 'XL',
            ],
            'roman number for 50' => [
                'number' => 50,
                'expected' => 'L',
            ],
            'roman number for 90' => [
                'number' => 90,
                'expected' => 'XC',
            ],
            'roman number for 100' => [
                'number' => 100,
                'expected' => 'C',
            ],
            'roman number for 400' => [
                'number' => 400,
                'expected' => 'CD',
            ],
            'roman number for 500' => [
                'number' => 500,
                'expected' => 'D',
            ],
            'roman number for 700' => [
                'number' => 700,
                'expected' => 'DCC',
            ],
            'roman number for 900' => [
                'number' => 900,
                'expected' => 'CM',
            ],
            'roman number for 1000' => [
                'number' => 1000,
                'expected' => 'M',
            ],
            'roman number for 3999' => [
                'number' => 3999,
                'expected' => 'MMMCMXCIX',
            ],
        ];
    }
}
