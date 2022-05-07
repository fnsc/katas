<?php

namespace Katas;

final class PrimeFactors
{
    public function generate(int $number): array
    {
        $factors = [];

        for ($divisor = 2; $number > 1; $divisor++) {
            for (; 0 === $number % $divisor; $number /= $divisor) {
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}
