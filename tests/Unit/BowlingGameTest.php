<?php

namespace Katas;

use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    public function testShouldScoresGutterGameAsZero(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        // Assertions
        $this->assertSame(0, $game->score());
    }

    public function testShouldScoresAllOnes(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }

        // Assertions
        $this->assertSame(20, $game->score());
    }

    public function testShouldAwardsOneRollBonusForEverySpare(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        $game->roll(5);
        $game->roll(5); // Spare

        $game->roll(8);

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }

        // Assertions
        $this->assertSame(26, $game->score());
    }

    public function testShouldAwardsTwoRollBonusForEveryStrike(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        $game->roll(10); // Strike

        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }

        // Assertions
        $this->assertSame(24, $game->score());
    }

    public function testSpareOnTheFinalFrameGrantsOneExtraBall(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5); // Spare


        $game->roll(5);

        // Assertions
        $this->assertSame(15, $game->score());
    }

    public function testStrikeOnTheFinalFrameGrantsTwoExtraBalls(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(10);
        $game->roll(10); // Spare


        $game->roll(10);

        // Assertions
        $this->assertSame(30, $game->score());
    }

    public function testScoresPerfectGame(): void
    {
        // Set
        $game = new BowlingGame();

        // Actions
        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        // Assertions
        $this->assertSame(300, $game->score());
    }
}
