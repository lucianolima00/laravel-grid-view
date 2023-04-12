<?php

namespace Lucianolima00\GridView\Formatters;

/**
 * Class ImageFormatter.
 * @package Lucianolima00\GridView\Formatters
 */
class ImageFormatter extends BaseFormatter
{
    /**
     * Format value as image.
     * @param $value
     * @return mixed|string
     */
    public function format($value)
    {
        return '<img src="' . $value . '" ' . $this->buildHtmlAttributes() . ' />';
    }
}
