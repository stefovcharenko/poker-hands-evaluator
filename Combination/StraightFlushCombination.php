<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class StraightFlushCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class StraightFlushCombination implements CombinationInterface
{
    use StraightTrait, FlushTrait;

    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return $this->isStraight($cards) && $this->isFlush($cards);
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 9;
    }
}