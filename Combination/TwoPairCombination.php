<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class TwoPairCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class TwoPairCombination implements CombinationInterface
{
    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return ($cards[0]->getRank() === $cards[1]->getRank() && $cards[2]->getRank() === $cards[3]->getRank())
            || ($cards[0]->getRank() === $cards[1]->getRank() && $cards[3]->getRank() === $cards[4]->getRank())
            || ($cards[1]->getRank() === $cards[2]->getRank() && $cards[3]->getRank() === $cards[4]->getRank());
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 3;
    }
}