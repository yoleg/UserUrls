<?php

$_lang['userurls'] = 'User Urls';
$_lang['userurls_desc'] = 'A user friendly URL component for giving users pages reachable by username/ or username/sub-action.';

$_lang['setting_uu.start'] = 'Default UserUrl Page.';
$_lang['setting_uu.start_desc'] = '(Required) Default page for UserUrls without an action.';
$_lang['setting_uu.prefix'] = 'Prefix';
$_lang['setting_uu.prefix_desc'] = 'Sets the prefix for the GET parameters passed by the UserUrl plugin. Default: uu_';
$_lang['setting_uu.param_id'] = 'User Id Parameter Name';
$_lang['setting_uu.param_id_desc'] = 'The name of the GET parameter to use for userid, without the prefix. The complete GET parameter name will include the uu.prefix setting. Default: userid';
$_lang['setting_uu.param_action'] = 'Action Parameter Name';
$_lang['setting_uu.param_action_desc'] = 'The name of the GET parameter to use for action, without the prefix. The complete GET parameter name will include the uu.prefix setting. Default: action';
$_lang['setting_uu.action_map'] = 'Action Map';
$_lang['setting_uu.action_map_desc'] = 'Maps URL actions to resource ids using colons. Separate multiple actions with commas. Example: 31:messages,182:edit-profile,21:something-else';
$_lang['setting_uu.search_field'] = 'Search Field';
$_lang['setting_uu.search_field_desc'] = 'The field to search for from the URL keyword. Default: username. Do not change without lots of testing.';
$_lang['setting_uu.result_field'] = 'Search Result Field';
$_lang['setting_uu.result_field_desc'] = 'The field to use as the index for finding the user. Default: id. Doesn\'t really do anything yet.';
$_lang['setting_uu.search_class'] = 'Search Class';
$_lang['setting_uu.search_class_desc'] = 'The PHP class to search through. Default: modUser. Do not change without lots of testing.';
$_lang['setting_uu.enabled'] = 'Enabled';
$_lang['setting_uu.enabled_desc'] = 'Turns on and off the UserUrls main snippet and plugin.';
