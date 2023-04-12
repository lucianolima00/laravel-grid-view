<?php

namespace Lucianolima00\GridView\Interfaces;

/**
 * Interface Formattable
 * @package Lucianolima00\GridView\Interfaces
 */
interface Formattable
{
    /**
     * @param $value
     * @return mixed
     */
    public function format($value);
}
