<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class HighCardCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class HighCardCombination implements CombinationInterface
{
    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 1;
    }
}