<?php

/**
 * Easy Favicon Bundle for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017-2017, Web-Creations
 * @author     Markus Kinzl <https://github.com/Ma3xl3>
 * @license    LGPL-3.0+
 * @link       https://github.com/Ma3xl3/Contao-EasyFavicon
 */

/**
 * Table tl_page
 */

// Palettes
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addFavicon';
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addAppleTouchIcon';
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] =  str_replace('{publish_legend}', '{favicon_legend:hide},addFavicon,addAppleTouchIcon;{publish_legend}', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);

// Subpalettes
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addFavicon'] = 'faviconSRC';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addAppleTouchIcon'] = 'appleTouchIconSRC';

// Fields
$GLOBALS['TL_DCA']['tl_page']['fields']['addFavicon'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_page']['addFavicon'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'eval'				=> array('submitOnChange'=>true, 'tl_class' => 'clr w50'),
	'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['faviconSRC'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_page']['faviconSRC'],
	'exclude'			=> true,
	'inputType'			=> 'fileTree',
	'explanation'		=> 'faviconSRCexpl',
	'eval'				=> array('helpwizard'=>true, 'filesOnly'=>true, 'fieldType'=>'radio', 'extensions' =>'ico,jpg,jpeg,png,gif', 'mandatory'=>true, 'tl_class'=>'clr w50 autoheight'),
	'sql'				=> "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['addAppleTouchIcon'] = array
(
		'label'				=> &$GLOBALS['TL_LANG']['tl_page']['addAppleTouchIcon'],
		'exclude'			=> true,
		'inputType'			=> 'checkbox',
		'eval'				=> array('submitOnChange'=>true, 'tl_class' => 'clr w50'),
		'sql'				=> "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['appleTouchIconSRC'] = array
(
		'label'				=> &$GLOBALS['TL_LANG']['tl_page']['appleTouchIconSRC'],
		'exclude'			=> true,
		'inputType'			=> 'fileTree',
		'eval'				=> array('filesOnly'=>true, 'fieldType'=>'radio', 'extensions' =>'png', 'mandatory'=>true, 'tl_class'=>'clr w50 autoheight'),
		'sql'				=> "binary(16) NULL"
);
