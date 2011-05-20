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
 * Resolves db changes
 *
 * @package UserUrls
 * @subpackage build
 */
 
/* Needs to be adjusted for userurls */

if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('userurls.core_path',null,$modx->getOption('core_path').'components/userurls/').'model/';
            $modx->addPackage('userurls',$modelPath);

            /* add name,email,website fields */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `name` VARCHAR(255) NOT NULL default ''");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `email` VARCHAR(255) NOT NULL default ''");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `website` VARCHAR(255) NOT NULL default ''");
*/
            /* make sure approved default is 1 */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} CHANGE `approved` `approved` TINYINT(1) UNSIGNED NOT NULL DEFAULT  '1'");
*/
            /* add resource mapping changes */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `resource` INT(10) unsigned NOT NULL default '0'");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `idprefix` VARCHAR(255) NOT NULL default 'qcom'");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `existing_params` TEXT");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD INDEX `resource` (`resource`)");
*/
 
            /* add albumed changes */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `ip` VARCHAR(255) NOT NULL default '0.0.0.0' AFTER `website`");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `rank` TINYTEXT AFTER `parent`");

            /* add approval/deleted changes */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `approvedby` INT(10) unsigned NOT NULL default '0' AFTER `approvedon`");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `deleted` TINYINT(1) unsigned NOT NULL default '0' AFTER `ip`");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `deletedon` DATETIME AFTER `deleted`");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD `deletedby` INT(10) unsigned NOT NULL default '0' AFTER `deletedon`");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD INDEX `approvedby` (`approvedby`)");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD INDEX `deleted` (`deleted`)");
            $modx->exec("ALTER TABLE {$modx->getTableName('SimpleMessage')} ADD INDEX `deletedby` (`deletedby`)");
*/
 
            /* add call_params to simpleAlbum */
/*
            $modx->exec("ALTER TABLE {$modx->getTableName('simpleAlbum')} ADD `userurls_call_params` TEXT AFTER `existing_params`");
            $modx->exec("ALTER TABLE {$modx->getTableName('simpleAlbum')} ADD `userurlsreply_call_params` TEXT AFTER `userurls_call_params`");
*/
 
            /* create album objects for messages if they dont exist */
/*
            $c = $modx->newQuery('SimpleMessage');
            $c->sortby('createdon','DESC');
            $messages = $modx->getCollection('SimpleMessage',$c);
            foreach ($messages as $message) {
                $album = $message->getOne('Album');
                if (empty($album)) {
                    $album = $modx->newObject('simpleAlbum');
                    $album->set('name',$message->get('album'));
                    $album->set('idprefix',$message->get('idprefix'));
                    $album->set('existing_params',$message->get('existing_params'));
                    $album->set('resource',$message->get('resource'));
                    $album->set('createdon',$message->get('createdon'));
                    $album->set('moderator_group','Administrator');
                    $album->save();
                }
                unset($album);
            }
            unset($messages,$message,$c);
*/

            break;
    }
}
return true;