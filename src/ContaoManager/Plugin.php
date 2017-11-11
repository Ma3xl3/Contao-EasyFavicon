<?php

/**
 * Easy Favicon Bundle for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017-2017, Web-Creations
 * @author     Markus Kinzl <https://github.com/Ma3xl3>
 * @license    LGPL-3.0+
 * @link       https://github.com/Ma3xl3/Contao-EasyFavicon
 */

namespace Ma3xl3\EasyFaviconBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Ma3xl3\EasyFaviconBundle\Ma3xl3EasyFaviconBundle;

/**
 * Plugin for the Contao Manager.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(Ma3xl3EasyFaviconBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
