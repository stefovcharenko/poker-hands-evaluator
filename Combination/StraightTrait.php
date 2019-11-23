<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Trait StraightTrait
 * @package Stefan\PokerHandsEvaluator\Combination
 */
trait StraightTrait
{
    /**
     * Checks is hand contains straight.
     *
     * @param Card[] $cards
     * @return bool
     */
    private function isStraight(array $cards): bool
    {
        if ($cards[array_key_last($cards)]->getRank() === Card::RANKS['A']) {
            return (
                    $cards[0]->getRank() === Card::RANKS['2']
                    && $cards[1]->getRank() === Card::RANKS['3']
                    && $cards[2]->getRank() === Card::RANKS['4']
                    && $cards[3]->getRank() === Card::RANKS['5'])
                || ($cards[0]->getRank() === Card::RANKS['10']
                    && $cards[1]->getRank() === Card::RANKS['J']
                    && $cards[2]->getRank() === Card::RANKS['Q']
                    && $cards[3]->getRank() === Card::RANKS['K']);
        } else {
            $nextRank = $cards[array_key_first($cards)]->getRank() + 1;

            for ($i = 1; $i < count($cards); $i++) {
                if ($cards[$i]->getRank() !== $nextRank) {
                    return false;
                }

                $nextRank++;
            }
        }

        return true;
    }
}