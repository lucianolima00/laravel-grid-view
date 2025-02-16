<?php

namespace Lucianolima00\GridView\Formatters;

/**
 * Class TextFormatter
 * @package Lucianolima00\GridView\Formatters
 */
class TextFormatter extends BaseFormatter
{
    /**
     * @var null|string
     */
    protected $allowableTags = null;

    /**
     * Format value as simple text without html tags.
     * @param $value
     * @return mixed
     */
    public function format($value)
    {
        return strip_tags($value, $this->allowableTags);
    }
}
