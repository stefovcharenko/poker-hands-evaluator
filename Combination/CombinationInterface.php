<?php

namespace Stefan\PokerHandsEvaluator\Combination;

use Stefan\PokerHandsEvaluator\Entity\Card;

interface CombinationInterface
{
    /**
     * Checks if hand cards are matching with combination.
     *
     * @param Card[] $cards
     * @return bool
     */
    public function isMatch(array $cards): bool;

    /**
     * Returns combination priority.
     *
     * @return int
     */
    public function getPriority(): int;
}