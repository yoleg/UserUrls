<?php/**
 * UserUrls
 *
 * Copyright 2010 by Oleg Pryadko (websitezen.com)
 *
 * This file is part of UserUrls, a user friendly url component for MODx
 * Revolution. This file is loosely based off of ArchivistFURL by Shaun McCormick.
 *
 * UserUrlsis free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * UserUrls is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * UserUrls; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 */

/*
 * Problem: currently URLs MUST be in the format [[++base_url]]user/action
 * ToDo: use RegExp or other method to add flexibility to URLs
*/
// Exit right away if not necessary
if (($modx->event->name != 'OnPageNotFound') || (!$modx->getOption('uu.enabled'))) return;
$uu_start = $modx->getOption('uu.start',null,$modx->getOption('site_start'));
if (empty($uu_start)) return;

/* Very important options - include on all snippets and plugins! */
$prefix = $modx->getOption('prefix',$scriptProperties,$modx->getOption('uu.prefix',null,''));
$param_id = $modx->getOption('param_id',$scriptProperties,$modx->getOption('uu.param_id',null,'userid'));
$param_action = $modx->getOption('param_action',$scriptProperties,$modx->getOption('uu.param_action',null,'action'));

// Later - customize the user search
$search_field = $modx->getOption('searchField',$scriptProperties,$modx->getOption('uu.search_field',null,'username'));
$result_field = $modx->getOption('resultField',$scriptProperties,$modx->getOption('uu.result_field',null,'id'));
$search_class = $modx->getOption('searchClass',$scriptProperties,$modx->getOption('uu.search_class',null,'modUser'));

/* wall actions */
$wall_action_ids = explode(',',$modx->getOption('uu.action_map',null,''));

/* handle redirects */
$search = $_SERVER['REQUEST_URI'];
/* remove the base url */
$base_url = $modx->getOption('base_url');
if ($base_url != '/') {
  $search = str_replace($base_url,'',$search);
}
// Remove GET parameters and trim slashes
$search = strtok($search, "?");
$search = trim($search, '/');
// Divide by slash - returns array
$params = explode('/', $search);
/* $params = preg_split('/[\/\.]+/', $search); // splits on slash and dot all at once - possibly use this instead? */

// Helps with SEO and speed. Problem: this makes sure the structure of the URL is consistent: "user/action" and nothing else. Needs to be changed eventually.
if ((count($params) < 1) || (count($params) > 2)) return;

// splits based on dot - just to make sure we don't have something like user.html
$params_a = explode('.', $params[0]);

// Helps with SEO. ToDo: This should be made optional 
if (count($params_a) != 1) return; 

// Assign understandable variable names so we know what everything is
$wall_username = $params_a[0];
$wall_url = $search;

/* Check if user exists and user is active */
// ToDo: make the user active check optional to allow more flexibility.
$user = $modx->getObject($search_class,array(
    $search_field => $wall_username,
    'active' => true
));
if (!$user) {return;}
else $wall_id = $user->get('id');

/* check for a user sub-action if URL in the form of "user/action" */
if (count($params) == 2) {

    // To avoid situations like action.html
    $params_b = explode('.', $params[1]);
    
    // Helps with SEO. ToDo: This should be made optional 
    if (count($params_b) != 1) return; 
    
    /* process second URL parameter to see if it matches a wall action */
    $url_action = $params_b[0];
    $uu_start = false;
    $wall_action = '';
    
    // Parse the wall_action_ids
    if (count($wall_action_ids) == 0) return;
    foreach ($wall_action_ids as $action) {
        $action = explode(':',$action);
        if (count($action) != 2) continue;
        $wall_action_resource = $action[0];
        $wall_action_name = $action[1];
        /* if match is found, set redirect to proper resource */
        if ($url_action == $wall_action_name) {
            if (intval($wall_action_resource)) {
                $uu_start = $wall_action_resource;
            }
            $wall_action = $wall_action_name;
            break;
        }
    }
    if (!$wall_action || !$uu_start) return;
} else {
    $wall_action = '';
}

/* pass variables to target resource as GET parameters */
if (intval($wall_id)) {
    $_GET[$prefix . $param_id] = $wall_id;
}
if (strval($wall_action)) {
    $_GET[$prefix . $param_action] = $wall_action;
}
$modx->sendForward($uu_start);
return true;