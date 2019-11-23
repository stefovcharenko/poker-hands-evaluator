<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class FlushCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class FlushCombination implements CombinationInterface
{
    use FlushTrait;

    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return $this->isFlush($cards);
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 6;
    }

}