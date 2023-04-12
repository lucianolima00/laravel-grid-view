<?php

namespace Lucianolima00\GridView\Formatters;

use Lucianolima00\GridView\Interfaces\Formattable;
use Lucianolima00\GridView\Traits\{Configurable, Attributable};

/**
 * Class BaseFormatter
 * @package Lucianolima00\GridView\Formatters
 */
abstract class BaseFormatter implements Formattable
{
    use Configurable, Attributable;

    /**
     * BaseFormatter constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->loadConfig($config);
    }
}
