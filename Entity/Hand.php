<?php

namespace Stefan\PokerHandsEvaluator\Entity;

/**
 * Class Hand
 * @package Stefan\PokerHandsEvaluator\Entity
 */
class Hand
{
    /**
     * @var Card[]
     */
    private $cards = [];

    /**
     * @var int
     */
    private $combinationRank = 0;

    /**
     * Gets hand combination weight.
     *
     * @return int
     */
    public function getCombinationRank(): int
    {
        return $this->combinationRank;
    }

    /**
     * Sets hand combination weight.
     *
     * @param int $combinationRank
     */
    public function setCombinationRank(int $combinationRank): void
    {
        $this->combinationRank = $combinationRank;
    }

    /**
     * Performs sorting by rank.
     *
     * @return Hand
     */
    public function sortByRank()
    {
        usort($this->cards, function ($cardOne, $cardTwo) {
            return $cardOne->getRank() <=> $cardTwo->getRank();
        });

        return $this;
    }

    /**
     * Adds card to hand.
     * If it's full, exception will be thrown.
     *
     * @param Card $card
     * @return self
     * @throws \Exception
     */
    public function addCard(Card $card)
    {
        if ($this->isFull()) {
            throw new \Exception('Hand is full');
        }

        $this->cards[] = $card;

        return $this;
    }

    /**
     * Checks if hand is already completed with 5 cards.
     *
     * @return bool
     */
    public function isFull()
    {
        if (count($this->cards) < 5) {
            return false;
        }

        return true;
    }

    /**
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }
}