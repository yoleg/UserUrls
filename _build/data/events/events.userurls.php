<?php
/**
 * Adds events to userurls plugin
 *
 * @package UserUrls
 * @subpackage build
 */
$events = array();

$events['OnPageNotFound']= $modx->newObject('modPluginEvent');
$events['OnPageNotFound']->fromArray(array(
    'event' => 'OnPageNotFound',
    'priority' => 10,
    'propertyset' => 0,
),'',true,true);

return $events;