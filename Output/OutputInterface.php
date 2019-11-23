<?php

namespace Stefan\PokerHandsEvaluator\Output;

/**
 * Interface OutputInterface
 * @package Stefan\PokerHandsEvaluator\Output
 */
interface OutputInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function getOutput(array $data);
}