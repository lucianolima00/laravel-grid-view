<?php

namespace Lucianolima00\GridView\Filters;

/**
 * Class TextFilter.
 * @package Lucianolima00\GridView\Filters
 */
class TextFilter extends BaseFilter
{
    /**
     * @return string
     */
    public function render(): string
    {
        return view('grid_view::filters.text', [
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'class' => $this->getCssClass(),
        ]);
    }
}
