<?php
namespace Core\Log;

use Core\Log\LogLevel;

class Logger extends LogLevel
{

    public function debug($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function info($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function notice($message, array $context = array())
    {
        return $log = $this->interpolate($message, $context);
    }

    public function warning($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function erro($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function critical($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function alert($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function emergency($message, array $context = array())
    {
        $log = $this->interpolate($message, $context);
    }

    public function log($level, $message, array $context = array()) {}

    /**
     * Interpolates context values into the message placeholders.
     */
    public function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            // check that the value can be cast to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }




}
