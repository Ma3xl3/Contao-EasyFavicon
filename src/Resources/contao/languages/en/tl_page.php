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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_page']['addFavicon']			= array('Add favicon','Add a favicon to your website.');
$GLOBALS['TL_LANG']['tl_page']['faviconSRC']			= array('Favicon file','Please select a file.');
$GLOBALS['TL_LANG']['tl_page']['addAppleTouchIcon']		= array('Add apple touch icon','Add an apple touch icon to your website.');
$GLOBALS['TL_LANG']['tl_page']['appleTouchIconSRC']		= array('Apple touch icon file','Please select an apple touch icon (png file). File will be cropped to 152x152px.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_page']['favicon_legend'] = 'Favicon';

/**
 * Explanation
 */
$GLOBALS['TL_LANG']['XPL']['faviconSRCexpl'] = array(
	array('Ico file', 'The original ico file will be included.'),
	array('Png/ gif-/ jpg file', 'Converts to a ico file.<br><br>The following sizes are available in the ico file: 16x16, 24x24, 32x32, 48x48. Therefore it is recommended to select an image with at least 48x48px.<br><br>If you choose an animated gif the first image will be used for the ico converted file.')
);