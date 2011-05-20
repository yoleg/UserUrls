<?php
/*
 * UserUrls
 *
 * Copyright 2011 by Oleg Pryadko (websitezen.com)

 * This file is part of UserUrls, a user friendly-url package for MODx Revolution
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

 * @package UserUrls
 */
/**
 * Build the setup options form.
 *
 * @package UserUrls
 * @subpackage build
 */

/* The return value from this script should be an HTML form (minus the
 * <form> tags and submit button) in a single string.
 *
 * The form will be shown to the user during install
 * after the readme.txt display.
 *
 * This example presents an HTML form to the user with one input field
 * (you can have more).
 *
 * The user's entries in the form's input field(s) will be available
 * in any php resolvers with $modx->getOption('field_name', $options, 'default_value').
 *
 * You can use the value(s) to set system settings, snippet properties,
 * chunk content, etc. One common use is to use a checkbox and ask the
 * user if they would like to install an example resource for your
 * component.
 */

/*
$output = '<p>&nbsp;</p>
<label for="sitename">The value here will be used to set the site_name system setting on install.</label>
<p>&nbsp;</p>
<input type="text" name="sitename" id="sitename" value="" align="left" size="40" maxlength="60" />
<p>&nbsp;</p>
<input type="checkbox" name="change_sitename" id="change_sitename" checked="checked" value="1" align="left" />&nbsp;&nbsp;
<label for="change_sitename">Set site name on install</label>
<p>&nbsp;</p>';
*/

/* set some default values */
$values = array(
    'conversation_start' => '1',
    'conversation_subfolder' => 'conversation',
);
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $setting = $modx->getObject('modSystemSetting',array('key' => 'userurls.conversation_start'));
        if ($setting != null) { $values['conversation_start'] = $setting->get('value'); }
        unset($setting);

        $setting = $modx->getObject('modSystemSetting',array('key' => 'userurls.conversation_subfolder'));
        if ($setting != null) { $values['conversation_subfolder'] = $setting->get('value'); }
        unset($setting);

        break;
    case xPDOTransport::ACTION_UNINSTALL: break;
}

$output = '<label for="userurls-conversation_start">Conversation Start (resource id):</label>
<input type="text" name="conversation_start" id="userurls-conversation_start" width="300" value="'.$values['conversation_start'].'" />
<br /><br />

<label for="userurls-conversation_subfolder">Conversation Subfolder Name:</label>
<input type="text" name="conversation_subfolder" id="userurls-conversation_subfolder" width="300" value="'.$values['conversation_subfolder'].'" />
';

return $output;