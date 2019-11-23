<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Trait FlushTrait
 * @package Stefan\PokerHandsEvaluator\Combination
 */
trait FlushTrait
{
    /**
     * Checks is hand contains flush.
     *
     * @param Card[] $cards
     * @return bool
     */
    private function isFlush(array $cards): bool
    {
        $testSuit = $cards[array_key_first($cards)]->getSuit();
        for ($i = 1; $i < count($cards); $i++) {
            if ($cards[$i]->getSuit() !== $testSuit) {
                return false;
            }
        }

        return true;
    }
}