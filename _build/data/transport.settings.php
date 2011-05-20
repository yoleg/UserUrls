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

$settings['userurls.test1']= $modx->newObject('modSystemSetting');
$settings['userurls.test1']->fromArray(array(
    'key' => 'userurls.test1',
    'value' => '{assets_path}templates/custom/',
    'xtype' => 'textfield',
    'namespace' => 'userurls'
),'',true,true);

return $settings;