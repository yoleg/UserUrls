<?php
/**
 *
 * UserUrls
 *
 * UserUrls helper snippet - place on each UserUrls page.
 *
 * @ author Oleg Pryadko <oleg@websitezen.com>
 * @ copyright 2011 Oleg Pryadko
 * @ version 1.0.0 - May 19, 2010
 * @ license GPL v2 or later
 *
**/

$output = '';
if (!$modx->getOption('uu.enabled')) return '';

// ToDo: if(!$modx->user->has_permissions('view_user_profiles')) sendErrorPage();
// ToDo: if($needs_session_context) {if(!$modx->user->has_session_context($this_context)) sendUnauthorizedPage();}

/* Very important options - include on all snippets and plugins! */
$prefix = $modx->getOption('prefix',$scriptProperties,$modx->getOption('uu.prefix',null,'uu_'));
$param_id = $modx->getOption('param_id',$scriptProperties,$modx->getOption('uu.param_id',null,'userid'));
$param_action = $modx->getOption('param_action',$scriptProperties,$modx->getOption('uu.param_action',null,'action'));
// Unlikely to need changing.
$name_id = $modx->getOption('nameId',$scriptProperties,$prefix.$param_id);
$name_action = $modx->getOption('nameAction',$scriptProperties,$prefix.$param_action);

// Check if this is actually a UserUrl page, and if not decide what to do
if (!isset($_GET[$name_id])) {
    if ($modx->getOption('defaultUser',$scriptProperties,false)) {$userid = $modx->getOption('defaultUser');}
    elseif ($modx->getOption('sendErrorPage',$scriptProperties,true)) {$modx->sendErrorPage(); }
    else {return $modx->getOption('errorDirectAccess',$scriptProperties,'');}
} else {
    $userid = intval($_GET[$name_id]);
}

// Later - customize the user search
$search_field = $modx->getOption('searchField',$scriptProperties,$modx->getOption('uu.search_field',null,'username'));
$result_field = $modx->getOption('resultField',$scriptProperties,$modx->getOption('uu.result_field',null,'id'));
$search_class = $modx->getOption('searchClass',$scriptProperties,$modx->getOption('uu.search_class',null,'modUser'));

// Check if user exists, and if not decide what to do
$user = $modx->getObject($search_class,$userid);
if (!$user) {
    $redirectId = (int)$modx->getOption('redirectToOnNotFound',$scriptProperties,0);
    if ($redirectId) {$modx->sendRedirect($modx->makeUrl($redirectId));}
    else {return $modx->getOption('errorNotFound',$scriptProperties,'');}
}

// ToDo: Check that UserUrls user is in the allowed usergroups to be shown.

// ToDo: Set placeholders OR process template chunk with UserUrls user data.

return $output;