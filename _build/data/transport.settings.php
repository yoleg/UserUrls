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
$settings = array();

$settings['uu.start']= $modx->newObject('modSystemSetting');
$settings['uu.start']->fromArray(array(
    'key' => 'uu.start',
    'value' => '1',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.prefix']= $modx->newObject('modSystemSetting');
$settings['uu.prefix']->fromArray(array(
    'key' => 'uu.prefix',
    'value' => 'uu_',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.param_id']= $modx->newObject('modSystemSetting');
$settings['uu.param_id']->fromArray(array(
    'key' => 'uu.param_id',
    'value' => 'userid',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.param_action']= $modx->newObject('modSystemSetting');
$settings['uu.param_action']->fromArray(array(
    'key' => 'uu.param_action',
    'value' => 'action',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.action_map']= $modx->newObject('modSystemSetting');
$settings['uu.action_map']->fromArray(array(
    'key' => 'uu.action_map',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.search_field']= $modx->newObject('modSystemSetting');
$settings['uu.search_field']->fromArray(array(
    'key' => 'uu.search_field',
    'value' => 'username',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.result_field']= $modx->newObject('modSystemSetting');
$settings['uu.result_field']->fromArray(array(
    'key' => 'uu.result_field',
    'value' => 'id',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

$settings['uu.search_class']= $modx->newObject('modSystemSetting');
$settings['uu.search_class']->fromArray(array(
    'key' => 'uu.search_class',
    'value' => 'modUser',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);


$settings['uu.enabled']= $modx->newObject('modSystemSetting');
$settings['uu.enabled']->fromArray(array(
    'key' => 'uu.enabled',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'userurls'
),'',true,true);

return $settings;