<?php
/**
 * Package in plugins
 * 
 * @package UserUrls
 * @subpackage build
 */
$plugins = array();

/* create the plugin object */
$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id',1);
$plugins[0]->set('name','cleanmessages');
$plugins[0]->set('description','Cleans messages when the limit set in userurls.clean_when is reached.');
$plugins[0]->set('plugincode', getSnippetContent($sources['plugins'] . 'plugin.cleanmessages.php'));
$plugins[0]->set('category', 0);
$plugins[0]->set('disabled', 1);

$events = include $sources['events'].'events.cleanmessages.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for cleanmessages.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for cleanmessages!');
}
unset($events);

return $plugins;