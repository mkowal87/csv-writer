<?php

namespace CsvWriter;

class TextWriter
{

    protected $buffer;
    protected $file;
    protected $eolSymbol;

    const FILEMODE_NEW = "w";
    const FILEMODE_APPEND = "a";

    public function getBuffer()
    {
        return $this->buffer;
    }

    public function setBuffer($buffer)
    {
        $this->buffer = $buffer;
        return $this;
    }

    public function getEolSymbol()
    {
        return $this->eolSymbol;
    }

    public function open($filename, $mode = self::FILEMODE_NEW)
    {
        //just in case we have any file open
        $this->close();

        //TODO add exceptions
        $this->file = fopen($filename, $mode);
        if ($this->file) {
            if (stream_set_write_buffer($this->file, $this->getBuffer()) !== 0) {
                // changing the buffering failed
            }
        }

        return $this;
    }

    public function close()
    {
        if (is_resource($this->file)) {
            fclose($this->file);
        }

        return $this;
    }

    public function write($text)
    {
        fwrite($this->file, $text);
        return $this;
    }

    public function writeln($text)
    {
        $this->write($text . $this->getEolSymbol());
        return $this;
    }
}
