<?php

namespace Lucianolima00\GridView\Actions;

/**
 * Class Delete.
 * @package Lucianolima00\GridView\Actions
 */
class Delete extends BaseAction
{
    const ACTION = 'delete';

    /**
     * @param $row
     * @param int $bootstrapColWidth
     * @return array|string
     */
    public function render($row, int $bootstrapColWidth = BaseAction::BOOTSTRAP_COL_WIDTH)
    {
        return view('grid_view::actions.'.self::ACTION, [
            'url' => $this->getUrl($row),
            'className' => $this->getClass($row),
            'bootstrapColWidth' => $bootstrapColWidth,
            'icon' => $this->icon,
            'htmlAttributes' => $this->buildHtmlAttributes()
        ])->render();
    }

    /**
     * @param $row
     * @return string
     */
    protected function buildUrl($row)
    {
        return $this->getCurrentUrl() . '/' . $row->id . '/' . self::ACTION;
    }

    /**
     * @param $row
     * @return mixed|string
     */
    protected function getClass($row)
    {
        if (!is_null($this->className) && is_string($this->className)) {
            return $this->className;
        }

        return 'btn btn-danger';
    }
}
