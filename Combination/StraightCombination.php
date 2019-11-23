<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class StraightCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class StraightCombination implements CombinationInterface
{
    use StraightTrait;

    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return $this->isStraight($cards);
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 5;
    }
}