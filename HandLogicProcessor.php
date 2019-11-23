<?php

namespace Stefan\PokerHandsEvaluator;

use Stefan\PokerHandsEvaluator\Entity\Hand;

/**
 * Class HandLogicProcessor
 * @package Stefan\PokerHandsEvaluator
 */
class HandLogicProcessor
{
    /**
     * @var array
     */
    private $source = [];
    /**
     * @var array
     */
    private $result = [];

    /**
     * Sets parsed source data for further processing.
     *
     * @param array $source
     * @return HandLogicProcessor
     */
    public function setSource(array $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Executes hand evaluation logic.
     *
     * @return array
     * @throws \Exception
     */
    public function execute()
    {
        /** @var Hand $hand */
        foreach ($this->source as $hand) {
            $sortingRank = (new HandEvaluator($hand))->evaluate();

            if ($sortingRank) {
                $hand->setCombinationRank($sortingRank);
                $this->result[] = $hand;
            }
        }

        $this->sortHands();

        return $this->result;
    }

    /**
     * Performs hands sorting by combination weight.
     */
    private function sortHands()
    {
        usort($this->result, function (
            Hand $handOne,
            Hand $handTwo
        ) {
            if ($handOne->getCombinationRank() === $handTwo->getCombinationRank()) {
                return 0;
            }

            return $handOne->getCombinationRank() < $handTwo->getCombinationRank() ? 1: -1;
        });
    }

}