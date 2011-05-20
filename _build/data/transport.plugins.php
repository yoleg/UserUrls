<?php
/**
 * Package in plugins
 *
 * @package UserUrls
 * @subpackage build
 */
$plugins = array();

$idx = 0;

/* create the main plugin */
$plugins[$idx] = $modx->newObject('modPlugin');
$plugins[$idx]->set('id',$idx+1);
$plugins[$idx]->set('name','UserUrls');
$plugins[$idx]->set('description','User friendly URLs. Looks up a user id and action based on the URL and passes them to the appropriate page.');
$plugins[$idx]->set('plugincode', getSnippetContent($sources['plugins'] . 'userurls.plugin.php'));
$plugins[$idx]->set('category', 0);
$plugins[$idx]->set('disabled', 0);

$events = include $sources['events'].'events.userurls.php';
if (is_array($events) && !empty($events)) {
    $plugins[$idx]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for userurls.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for userurls.!');
}

unset($events,$idx);

return $plugins;