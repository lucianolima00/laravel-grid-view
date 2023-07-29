<?php

namespace Lucianolima00\GridView\Actions;

/**
 * Class View.
 * @package Lucianolima00\GridView\Actions
 */
class View extends BaseAction
{
    const ACTION = 'view';

    /**
     * @param $row
     * @param int $bootstrapColWidth
     * @return array|string
     */
    public function render($row, int $bootstrapColWidth = BaseAction::BOOTSTRAP_COL_WIDTH)
    {
        return view('grid_view::actions.'.self::ACTION, [
            'url' => $this->getUrl($row),
            'className' => $this->getClassName($row),
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

        return 'btn btn-success';
    }
}
