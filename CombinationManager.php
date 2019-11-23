<?php

namespace Stefan\PokerHandsEvaluator;

use Stefan\PokerHandsEvaluator\Combination\CombinationInterface;
use Symfony\Component\ClassLoader\ClassMapGenerator;

/**
 * Class CombinationManager
 * @package Stefan\PokerHandsEvaluator
 */
class CombinationManager
{
    /**
     * @var array
     */
    private $combinations = [];

    /**
     * CombinationManager constructor.
     */
    public function __construct()
    {
        $this->importCombinations();
    }

    /**
     * Imports instances of combination classes to apply for hands evaluation.
     */
    public function importCombinations()
    {
        foreach (ClassMapGenerator::createMap('Combination/') as $className => $fileName)
        {
            if (class_exists($className))
            {
                $combination = new $className;
                $this->addCombination($combination);
            }
        }
    }

    /**
     * Adds combination to combinations list.
     *
     * @param CombinationInterface $combination
     */
    public function addCombination(CombinationInterface $combination)
    {
        $this->combinations[] = $combination;
    }

    /**
     * @return array
     */
    public function getCombinations(): array
    {
        return $this->combinations;
    }

    /**
     * Sorts combinations by combination weight to define processing order during hands evaluation.
     *
     * @return $this
     */
    public function sortCombinations()
    {
        usort($this->combinations, function (
            CombinationInterface $combinationOne,
            CombinationInterface $combinationTwo
        ) {
            if ($combinationOne->getPriority() === $combinationTwo->getPriority()) {
                return 0;
            }

            return $combinationOne->getPriority() < $combinationTwo->getPriority() ? 1: -1;
        });

        return $this;
    }
}