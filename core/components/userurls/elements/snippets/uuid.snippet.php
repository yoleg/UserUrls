<?php/**
 *
 * uuId
 *
 * Gets the user id of a page using the UserUrls
 *
 * @ author Oleg Pryadko <oleg@websitezen.com>
 * @ copyright 2011 Oleg Pryadko
 * @ version 1.0.0 - May 19, 2010
 * @ license GPL v2 or later
 *
 * OPTIONS
 * name - The GET parameter name, defaults to userid
 * max - (Opt) The maximum length of the returned value, defaults to 20
 * default - (Opt) The value returned if no URL parameter is found
 *
 * Example: [[!uuId:userinfo=`username`]]
 *
**/

/* Very important options - include on all snippets and plugins! */
$prefix = $modx->getOption('prefix',$scriptProperties,$modx->getOption('uu.prefix',null,''));
$param_id = $modx->getOption('paramId',$scriptProperties,$modx->getOption('uu.param_id',null,'userid'));

$name_id = $prefix.$param_id;

// set defaults
$name = $modx->getOption('name',$scriptProperties,$name_id);
$max = $modx->getOption('max',$scriptProperties,20);
$output = $modx->getOption('default',$scriptProperties,'');

if (isset($_GET[$name])) {
    $output = intval($_GET[$name]);
}

return $output;