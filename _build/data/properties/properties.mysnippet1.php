<?php

/**
 * Default properties for the UserUrls snippet
 * 
 * May 2011
 *
 * @package userurls
 * @subpackage build
 */
/* These are example properties.
 * The description fields should match
 * keys in the lexicon property file
 *
 * Change snippet1, snippet2 to the name of your snippet.
 * Change property1 to the name of the property.
 * */

$properties = array(
    array(
        'name' => 'property1',
        'desc' => 'mc_snippet1_property1_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '1',
        'lexicon' => 'userurls:properties',
    ),
     array(
        'name' => 'property2',
        'desc' => 'mc_snippet1_property2_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Some Text',
        'lexicon' => 'userurls:properties',
    ),
    array(
        'name' => 'property3',
        'desc' => 'mc_snippet1_property3_desc',
        'type' => 'list',
        'options' => array(
            array(
                'name' => 'System Default',
                'value' => 'System Default',
                'menu' => '',
            ),
            array(
                'name' => 'Yes',
                'value' => 'Yes',
                'menu' => '',
            ),
            array(
                'name' => 'No',
                'value' => 'No',
                'menu' => '',
            ),
            array(
                'name' => 'Parent',
                'value' => 'Parent',
                'menu' => '',
            ),
        ),
        'value' => 'System Default',
        'lexicon' => 'userurls:properties',
    ),
 );

return $properties;