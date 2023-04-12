<?php

namespace Lucianolima00\GridView\Filters;

/**
 * Class StubFilter.
 * @package Lucianolima00\GridView\Filters
 */
class StubFilter extends BaseFilter
{
    /**
     * @return string
     */
    public function render(): string
    {
        return view('grid_view::filters.stub');
    }
}
