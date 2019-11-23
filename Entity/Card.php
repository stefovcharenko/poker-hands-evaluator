<?php

namespace Stefan\PokerHandsEvaluator\Entity;

/**
 * Class Card
 * @package Stefan\PokerHandsEvaluator\Entity
 */
class Card
{
    /**
     * Holds all possible ranks and their decimal representation.
     */
    const RANKS = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 14,
    ];

    /**
     * Holds suit symbols ord codes and text representation
     */
    const SUITS = [
        9829 => 'hearts',
        9824 => 'spades',
        9827 => 'clubs',
        9830 => 'diamonds',
    ];

    /**
     * @var int
     */
    private $rank;

    /**
     * @var string
     */
    private $suit;

    /**
     * Card constructor.
     * @param string $rank
     * @param string $suit
     * @throws \Exception
     */
    public function __construct(string $rank, string $suit)
    {
        $this->setSuit($suit);
        $this->setRank($rank);
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param string $rank
     * @throws \Exception
     */
    public function setRank($rank)
    {
        if ($this->checkRank($rank) === false) {
            throw new \Exception('Rank is not valid!');
        }

        $this->rank = self::RANKS[$rank];
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @param mixed $suit
     * @throws \Exception
     */
    public function setSuit($suit)
    {
        if ($this->checkSuit($suit) === false) {
            throw new \Exception('Suit is not valid!');
        }

        $this->suit = self::SUITS[$suit];
    }

    /**
     * Checks if specified rank value is valid.
     *
     * @param $rank
     * @return bool
     */
    private function checkRank($rank)
    {
        return isset(self::RANKS[$rank]);
    }

    /**
     * Checks if specified suit value is valid.
     *
     * @param $suit
     * @return bool
     */
    private function checkSuit($suit)
    {
        return isset(self::SUITS[$suit]);
    }
}
