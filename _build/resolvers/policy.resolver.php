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
 * Auto-assign the userurlsModeratorPolicy to the Administrator User Group
 *
 * @package UserUrls
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('userurls.core_path',null,$modx->getOption('core_path').'components/userurls/').'model/';
            $modx->addPackage('userurls',$modelPath);

            $modx->setLogLevel(modX::LOG_LEVEL_ERROR);

            /* assign policy to template */
            $policy = $transport->xpdo->getObject('modAccessPolicy',array(
                'name' => 'userurlsModeratorPolicy'
            ));
            if ($policy) {
                $template = $transport->xpdo->getObject('modAccessPolicyTemplate',array('name' => 'userurlsModeratorPolicyTemplate'));
                if ($template) {
                    $policy->set('template',$template->get('id'));
                    $policy->save();
                } else {
                    $modx->log(xPDO::LOG_LEVEL_ERROR,'[userurls] Could not find userurlsModeratorPolicyTemplate Access Policy Template!');
                }
            } else {
                $modx->log(xPDO::LOG_LEVEL_ERROR,'[userurls] Could not find userurlsModeratorPolicy Access Policy!');
            }

            /* assign policy to admin group */
            $policy = $modx->getObject('modAccessPolicy',array('name' => 'userurlsModeratorPolicy'));
            $adminGroup = $modx->getObject('modUserGroup',array('name' => 'Administrator'));
            if ($policy && $adminGroup) {
                $access = $modx->getObject('modAccessContext',array(
                    'target' => 'mgr',
                    'principal_class' => 'modUserGroup',
                    'principal' => $adminGroup->get('id'),
                    'authority' => 9999,
                    'policy' => $policy->get('id'),
                ));
                if (!$access) {
                    $access = $modx->newObject('modAccessContext');
                    $access->fromArray(array(
                        'target' => 'mgr',
                        'principal_class' => 'modUserGroup',
                        'principal' => $adminGroup->get('id'),
                        'authority' => 9999,
                        'policy' => $policy->get('id'),
                    ));
                    $access->save();
                }
            }
            $modx->setLogLevel(modX::LOG_LEVEL_INFO);
            break;
    }
}
return true;