<?php

/**
 * Easy Favicon Bundle for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017-2017, Web-Creations
 * @author     Markus Kinzl <https://github.com/Ma3xl3>
 * @license    LGPL-3.0+
 * @link       https://github.com/Ma3xl3/Contao-EasyFavicon
 */

$GLOBALS['TL_HOOKS']['generatePage'][] = array('Ma3xl3\EasyFaviconBundle\EasyFavicon', 'addFavicon');