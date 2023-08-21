<?php

namespace Lucianolima00\GridView\Filters;

use Lucianolima00\GridView\Traits\Configurable;

/**
 * Class BaseFilter.
 * @package Lucianolima00\GridView\Filters
 */
abstract class BaseFilter
{
    use Configurable;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $cssClass;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var mixed
     */
    protected $data = [];

    /**
     * BaseFilter constructor.
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->loadConfig($config);
        $this->setValue();
    }

    /**
     * Render filters template.
     */
    abstract public function render(): string;

    public function setValue(): void
    {
        $this->value = request()->input('filters.' . $this->getName(), $this->value);
    }

    /**
     * @return mixed
     */
    protected function getValue()
    {
        return $this->value ?? null;
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    protected function getCssClass()
    {
        return $this->cssClass ?? 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm';
    }

    /**
     * @return mixed
     */
    protected function getStyle()
    {
        return $this->style;
    }
}
