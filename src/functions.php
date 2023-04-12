<?php
/**
 * @param array $config
 * @return string
 */
function grid_view(array $config)
{
    return (new \Lucianolima00\GridView\Grid($config))->render();
}
