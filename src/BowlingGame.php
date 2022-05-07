<?php

namespace Katas;

final class BowlingGame
{
    private const FRAMES_PER_GAME = 10;

    /**
     * @var int[]
     */
    private array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll++;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    private function isStrike(int $roll): bool
    {
        return 10 === $this->pinCount($roll);
    }

    private function isSpare(int $roll): bool
    {
        return 10 === $this->defaultFrameScore($roll);
    }

    private function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    private function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    private function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    private function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}
