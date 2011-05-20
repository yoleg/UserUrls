<?php
/**
 *
 * uuAction
 *
 * Gets the action of a page using the UserUrls
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
 * Example: [[!uu:userinfo=`username`]]
 *
**/
/* Very important options - include on all snippets and plugins! */
$prefix = $modx->getOption('prefix',$scriptProperties,$modx->getOption('uu.prefix',null,'uu_'));
$param_action = $modx->getOption('paramAction',$scriptProperties,$modx->getOption('uu.param_action',null,'action'));

$name_action = $prefix.$param_action;

// set defaults
$name = $modx->getOption('name',$scriptProperties,$name_action);
$max = $modx->getOption('max',$scriptProperties,20);
$output = $modx->getOption('default',$scriptProperties,'');

// get the sanitized value if there is one
if (isset($_GET[$name])) {
    if (strlen($_GET[$name]) > $max) {
        $value = filter_var(substr($_GET[$name],0,$max), FILTER_SANITIZE_STRING);
    } else {
        $value = filter_var($_GET[$name], FILTER_SANITIZE_STRING);
    }
    $output = $value;
}
return $output;