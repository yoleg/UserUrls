<?php
/**
 * Adds events to cleanmessages plugin
 * 
 * @package UserUrls
 * @subpackage build
 */
$events = array();

$events['OnEmptyTrash']= $modx->newObject('modPluginEvent');
$events['OnEmptyTrash']->fromArray(array(
    'event' => 'OnEmptyTrash',
    'priority' => 100,
    'propertyset' => 0,
),'',true,true);

return $events;