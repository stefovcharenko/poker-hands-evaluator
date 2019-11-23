<?php

namespace Stefan\PokerHandsEvaluator;

use Stefan\PokerHandsEvaluator\Combination\CombinationInterface;
use Stefan\PokerHandsEvaluator\Entity\Hand;

/**
 * Class HandEvaluator
 * @package Stefan\PokerHandsEvaluator
 */
class HandEvaluator
{
    /**
     * @var Hand
     */
    private $hand;

    /**
     * @var array
     */
    private $combinations;


    /**
     * HandEvaluator constructor.
     * @param Hand $hand
     * @throws \Exception
     */
    public function __construct(Hand $hand)
    {
        if ($hand->isFull() === false) {
            throw new \Exception('Not enough cards in the hand!');
        }

        $this->hand = $hand;
        $this->combinations = (new CombinationManager())
            ->sortCombinations()
            ->getCombinations();
    }

    /**
     * Evaluates hand to each combination.
     * If combination matches, combination weight returns.
     * Otherwise, method will return false.
     *
     * @return bool
     */
    public function evaluate()
    {
        /** @var CombinationInterface $combination */
        foreach ($this->combinations as $combination) {
            if ($combination->isMatch($this->hand->getCards())) {
                return $combination->getPriority();
            }
        }

        return false;
    }
}