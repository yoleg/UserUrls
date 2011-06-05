<?php/**
 *
 * uuUrl
 *
 * Generates a UserUrl
 *
 * @ author Oleg Pryadko <oleg@websitezen.com>
 * @ copyright 2011 Oleg Pryadko
 * @ version 1.0.0 - May 19, 2010
 * @ license GPL v2 or later
 *
 * OPTIONS
 * user - Userid to make the url for. Defaults to UserUrl page if available, and then to current user.
 * action - (Opt) The action to make the URL for - found in uu.action_map system setting.
 * default - (Opt) The value returned if no URL can be made
 *
 * Example: [[!uuUrl? &user=`20` &action=`messages`]]
 * As output filter for user id: [[!+userid:uuUrl]] or [[!+userid:uuUrl=`action`]]
 *
**/

/* Very important options - include on all snippets and plugins! */
$prefix = $modx->getOption('prefix',$scriptProperties,$modx->getOption('uu.prefix',null,'uu_'));
$param_id = $modx->getOption('paramId',$scriptProperties,$modx->getOption('uu.param_id',null,'userid'));
$param_action = $modx->getOption('paramAction',$scriptProperties,$modx->getOption('uu.param_action',null,'action'));

// Later - customize the user search
$search_field = $modx->getOption('searchField',$scriptProperties,$modx->getOption('uu.search_field',null,'username'));
$result_field = $modx->getOption('resultField',$scriptProperties,$modx->getOption('uu.result_field',null,'id'));
$search_class = $modx->getOption('searchClass',$scriptProperties,$modx->getOption('uu.search_class',null,'modUser'));

// set options
$userid = $modx->getOption('user',$scriptProperties,$modx->getOption('input',$scriptProperties,''));
$action = $modx->getOption('action',$scriptProperties,$modx->getOption('options',$scriptProperties,''));
$delimiter = $modx->getOption('delimiter',$scriptProperties,'/');
$base_url = $modx->getOption('baseUrl',$scriptProperties,'');
$output = $modx->getOption('default',$scriptProperties,$base_url);

// these options rarely need to be changed
$name_id = $modx->getOption('nameId',$scriptProperties,$prefix.$param_id);
$name_action = $modx->getOption('nameAction',$scriptProperties,$prefix.$param_action);
$max = $modx->getOption('max',$scriptProperties,30);

// if no user specified
if (empty($userid)) {
    if (isset($_GET[$name_id])) {
        // userid is the one of the current UserUrls page
        $userid = intval($_GET[$name_id]);
    } elseif ($modx->user->get('id')) {
        // userid is of the current logged-in user
        $userid = $modx->user->get('id');
    } else {
        // use defaults
        return $output;
    }
}
$user = $modx->getObject($search_class,$userid);
if (!$user) return 'User not found.';

// if no action specified
if (empty($action) && isset($_GET[$name_action])) {
    if (strlen($_GET[$name_action]) > $max) {
        $action = filter_var(substr($_GET[$name_action],0,$max), FILTER_SANITIZE_STRING);
    } else {
        $action = filter_var($_GET[$name_action], FILTER_SANITIZE_STRING);
    }
}
// build the url
$url = $user->get($search_field).$delimiter.$action;
if ($url) {
    $output = $base_url.$url;
}
return $output;