<?php

namespace Lucianolima00\GridView\Columns;

/**
 * Class CallbackColumn.
 * @package Lucianolima00\GridView\Columns
 */
class CallbackColumn extends BaseColumn
{
    /**
     * @param $row
     * @return mixed
     */
    public function getValue($row)
    {
        return call_user_func($this->value, $row) ?? '';
    }
}
