<?php

namespace GoFinTech\Logging;

class Logger
{
    public static function get($parent = null)
    {
        return new Logger();
    }

    public function info(string $message)
    {
        echo "$message\n";
    }

    public function error(string $message, \Exception $ex = null)
    {
        $msg = "ERROR $message";
        if (is_null($ex))
            $msg = "ERROR $message\n";
        else
            $msg = "ERROR $message [" . $this->formatException($ex) . "]\n"
                . $ex->getTraceAsString() . "\n";

        fwrite(STDERR, $msg);
    }

    public function formatException(\Exception $ex): string
    {
        $className = get_class($ex);
        return "{$ex->getFile()}:{$ex->getLine()} $className: {$ex->getMessage()}";
    }
}
