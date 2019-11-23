<?php

namespace Stefan\PokerHandsEvaluator;

use Stefan\PokerHandsEvaluator\Output\OutputInterface;
use Stefan\PokerHandsEvaluator\Parser\SourceParserInterface;

/**
 * Class PokerHandsEvaluator
 * @package Stefan\PokerHandsEvaluator
 */
class PokerHandsEvaluator
{
    /**
     * @var SourceParserInterface $parser
     */
    private $parser;

    /**
     * @var OutputInterface $output
     */
    private $output;

    /**
     * @var HandLogicProcessor
     */
    private $logicProcessor;

    /**
     * PokerHandsEvaluator constructor.
     */
    public function __construct()
    {
        $this->logicProcessor = new HandLogicProcessor();
    }

    /**
     * Sets output format for processing result.
     *
     * @param OutputInterface $output
     * @return PokerHandsEvaluator
     */
    public function setOutput(OutputInterface $output): self
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Sets parser for input processing.
     *
     * @param SourceParserInterface $parser
     * @return $this
     */
    public function setParser(SourceParserInterface $parser): self
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * Processes evaluation from specified source.
     * Returns result for specified output.
     *
     * @return mixed
     */
    public function process()
    {
        try {
            if (empty($this->parser) || empty($this->output)) {
                throw new \Exception('Parser or output source is nor specified for hands processor');
            }

            return $this->output->getOutput(
                $this->logicProcessor->setSource(
                    $this->parser->parse()
                )->execute()
            );
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}