<?php
/**
 * UserUrls
 *
 * Copyright 2011 by Oleg Pryadko (websitezen.com)
 *
 * This file is part of UserUrls, a user friendly-url package for MODx Revolution.
 *
 * UserUrls is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * UserUrls is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * UserUrls; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package UserUrls
 */
/**
 * @package UserUrls
 * @subpackage build
 */
$snippets = array();

$idx=1;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'UserUrls',
    'description' => 'Helper snippet for userurls. Place on the page that gets redirected to.',
    'snippet' => getSnippetContent($sources['snippets'].'userurls.snippet.php'),
));

$idx++;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'uuId',
    'description' => 'Gets the userid from a UserUrls target page.',
    'snippet' => getSnippetContent($sources['snippets'].'uuid.snippet.php'),
));

$idx++;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'uuAction',
    'description' => 'Gets the UserUrls action (as defined in uu.action_map) from a UserUrls target page.',
    'snippet' => getSnippetContent($sources['snippets'].'uuaction.snippet.php'),
));

$idx++;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'uuUrl',
    'description' => 'Generates a URL to a UserUrls target page based on a userid and action. Defaults to the current UserUrl page if called on one.',
    'snippet' => getSnippetContent($sources['snippets'].'uuurl.snippet.php'),
));

/* Template snippet
$idx++;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'test2',
    'description' => 'test2',
    'snippet' => getSnippetContent($sources['snippets'].'test2.snippet.php'),
));
*/

/* Example snippet with properties:
$idx++;
$snippets[$idx]= $modx->newObject('modSnippet');
$snippets[$idx]->fromArray(array(
    'id' => $idx,
    'name' => 'userurls',
    'description' => '',
    'snippet' => getSnippetContent($sources['snippets'].'userurls.snippet.php'),
));
$properties = include $sources['data'].'properties/properties.userurls.php';
$snippets[$idx]->setProperties($properties);
*/

return $snippets;