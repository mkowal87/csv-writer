<?php

namespace CsvWriter;

use CsvWriter\TextWriter;

class CsvWriter extends TextWriter
{

    protected $delimiter;
    protected $enclosure;
    protected $newlineInTextBehavior;
    protected $cellWrapping;

    const NEWLINE_IN_TEXT_ACCEPT = "newline_accept";
    const NEWLINE_IN_TEXT_REPLACE_WITH_SLASH_N = "newline_n";
    const NEWLINE_IN_TEXT_TRIM = "newline_trim";

    const CELLWRAPPING_ALWAYS = "cellwrapping_always";
    const CELLWRAPPING_WHEN_NEEDED = "cellwrapping_when_needed";

    public function __construct($delimiter = ',', $enclosure = '"', $newlineInTextBehavior = self::NEWLINE_IN_TEXT_ACCEPT, $cellWrapping = self::CELLWRAPPING_WHEN_NEEDED)
    {
        $this->setDelimiter($delimiter)
             ->setEnclosure($enclosure)
             ->setNewlineInTextBehavior($newlineInTextBehavior)
             ->setCellWrapping($cellWrapping);
    }

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }

    public function getEnclosure()
    {
        return $this->enclosure;
    }

    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;
        return $this;
    }

    public function getNewlineInTextBehavior()
    {
        return $this->newlineInTextBehavior;
    }

    public function setNewlineInTextBehavior($newlineInTextBehavior)
    {
        $this->newlineInTextBehavior = $newlineInTextBehavior;
        return $this;
    }

    public function getCellWrapping()
    {
        return $this->cellWrapping;
    }

    public function setCellWrapping($cellWrapping)
    {
        $this->cellWrapping = $cellWrapping;
    }

    public function write($data)
    {
        fputcsv($this->file, $data, $this->getdelimiter(), $this->getEnclosure());
        return $this;
    }
}
