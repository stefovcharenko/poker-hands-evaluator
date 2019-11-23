<?php

namespace Stefan\PokerHandsEvaluator\Output;

use Stefan\PokerHandsEvaluator\Entity\{Card, Hand};

/**
 * Class StringOutput
 * @package Stefan\PokerHandsEvaluator\Output
 */
class StringOutput implements OutputInterface
{
    /**
     * Returns output for processed data.
     *
     * @param Hand[] $data
     * @return string
     * @throws \Exception
     */
    public function getOutput(array $data)
    {
        $handsArray = [];

        /** @var Hand $hand */
        foreach ($data as $hand) {
            $handCards = [];

            foreach ($hand->getCards() as $card) {
                $cardRank = array_search($card->getRank(), Card::RANKS);
                $cardSuitCode = array_search($card->getSuit(), Card::SUITS);

                if (empty($cardRank) || empty($cardSuitCode)) {
                    throw new \Exception('Card rank or suit has an incorrect value');
                }

                $handCards[] = $cardRank . mb_chr($cardSuitCode, 'utf8');
            }

            $handsArray[] = implode(" ", $handCards);
        }

        return implode(PHP_EOL, $handsArray);
    }
}