<?php

namespace Stefan\PokerHandsEvaluator\Parser;

use Stefan\PokerHandsEvaluator\Entity\Hand;

/**
 * Interface SourceParserInterface
 * @package Stefan\PokerHandsEvaluator\Parser
 */
interface SourceParserInterface
{
    /**
     * @return Hand[]
     */
    public function parse(): array;

}