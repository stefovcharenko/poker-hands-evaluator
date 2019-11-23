<?php

namespace Stefan\PokerHandsEvaluator\Parser;

use Stefan\PokerHandsEvaluator\Entity\{Card, Hand};

/**
 * Class TextSourceParser
 * @package Stefan\PokerHandsEvaluator\Parser
 */
class TextSourceParser implements SourceParserInterface
{
    /**
     * @var string
     */
    private $filename = '';

    /**
     * TextSourceParser constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Parses hands from file.
     *
     * @return array
     * @throws \Exception
     */
    public function parse(): array
    {
        $result = [];

        foreach ($this->readSourceFile() as $line) {
            $hand = new Hand();
            $cardsArray = explode(' ', trim($line));
            foreach ($cardsArray as $cardElement) {
                $cardObject = new Card(
                    $this->parseRank($cardElement),
                    $this->parseSuit($cardElement)
                );

                $hand->addCard($cardObject);
            }

            $result[] = $hand->sortByRank();
        }

        return $result;
    }

    /**
     * Iterates file by lines.
     *
     * @return \Generator
     * @throws \Exception
     */
    private function readSourceFile()
    {
        if (is_readable($this->filename) === false) {
            throw new \Exception('Unable to open file for specified path: ' . $this->filename);
        }

        $fp = fopen($this->filename, 'rb');

        while(($line = fgets($fp)) !== false)
            yield rtrim($line, "\r\n");

        fclose($fp);
    }

    /**
     * Parses rank value from card string.
     *
     * @param string $cardLine
     * @return false|string
     */
    private function parseRank(string $cardLine)
    {
        return substr($cardLine, 0, (strlen($cardLine) - 3));
    }

    /**
     * Parses suit value from card string.
     *
     * @param string $cardLine
     * @return false|int
     */
    private function parseSuit(string $cardLine)
    {
        $suitSymbol = substr($cardLine, -3);

        return mb_ord($suitSymbol, 'utf8');
    }
}