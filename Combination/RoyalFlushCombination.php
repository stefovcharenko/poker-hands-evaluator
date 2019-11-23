<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

/**
 * Class RoyalFlushCombination
 * @package Stefan\PokerHandsEvaluator\Combination
 */
class RoyalFlushCombination implements CombinationInterface
{
    use FlushTrait, StraightTrait;

    /**
     * @inheritDoc
     * @param Card[] $cards
     */
    public function isMatch(array $cards): bool
    {
        return $this->isFlush($cards)
            && $this->isStraight($cards)
            && $cards[array_key_last($cards)]->getRank() === Card::RANKS['A'];
    }

    /**
     * @inheritDoc
     */
    public function getPriority(): int
    {
        return 10;
    }
}