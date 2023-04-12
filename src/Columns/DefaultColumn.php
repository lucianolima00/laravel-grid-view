<?php

namespace Lucianolima00\GridView\Columns;

/**
 * Class DefaultColumn
 * @package Lucianolima00\GridView\Columns
 */
class DefaultColumn extends BaseColumn
{
    /**
     * @param $row
     * @return mixed
     */
    public function getValue($row)
    {
        return $row->{$this->attribute} ?? '';
    }
}
