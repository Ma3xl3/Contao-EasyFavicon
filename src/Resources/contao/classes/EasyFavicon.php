<?php

/**
 * Easy Favicon Bundle for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2017-2017, Web-Creations
 * @author     Markus Kinzl <https://github.com/Ma3xl3>
 * @license    LGPL-3.0+
 * @link       https://github.com/Ma3xl3/Contao-EasyFavicon
 */

namespace Ma3xl3\EasyFaviconBundle;

use Contao\PageModel;
use Contao\Environment;
use Contao\FilesModel;
use Contao\System;
use Contao\File;
use Contao\Image;

class EasyFavicon
{
    protected $icoSizes = array(
        array( 16, 16 ),
        array( 24, 24 ),
        array( 32, 32 ),
        array( 48, 48 ),
    );

    //iOS 8.x largest icon size
    protected $appleTouchIconSize = array(180, 180);

    /**
     * @param PageModel $objPage
     * @param LayoutModel $objLayout
     * @param $self
     *
     * Add favicon to page
     */
    public function addFavicon($objPage, $objLayout, $self)
    {

        //get root page details
        $rootPage = PageModel::findWithDetails( $objPage->rootId );

        //check if favicon or appletouchicon is active
        if( !$rootPage->addFavicon && !$rootPage->addAppleTouchIcon )
            return;

        //xhtml or html5
        $blnXhtml = ($objPage->outputFormat == 'xhtml');

        //regular favicon
        if( $rootPage->addFavicon )
        {
            $objFavicon = FilesModel::findByPk( $rootPage->faviconSRC );

            $favicon = false;

            // ico file
            if( $objFavicon !== NULL && is_file( TL_ROOT . '/' . $objFavicon->path ) && $objFavicon->extension == 'ico' )
            {
                $favicon = $objFavicon->path;
            }
            // png, jpg, gif file
            elseif( $objFavicon !== NULL && is_file( TL_ROOT . '/' . $objFavicon->path ) && ($objFavicon->extension == 'jpg' || 'jpeg' || 'gif' || 'png') )
            {
                $favicon = 'share/favicon-' . $rootPage->alias . '.ico';
                $this->createIco( TL_ROOT . '/' . $objFavicon->path, $favicon );
            }

            // Add favicon to head
            if( $favicon )
                $GLOBALS['TL_HEAD'][] = '<link rel="shortcut icon" type="image/x-icon" href="' . Environment::get('base') . $favicon.'"' . ($blnXhtml ? ' />' : '>');
        }

        //apple touch icon
        if( $rootPage->addAppleTouchIcon )
        {
            $objAppleTouchIcon = \FilesModel::findByPk( $rootPage->appleTouchIconSRC );

            if( $objAppleTouchIcon !== NULL && is_file( TL_ROOT . '/' . $objAppleTouchIcon->path ) )
            {
                $faviconAppleTouchIcon = 'share/favicon-apple-touch-icon-' . $rootPage->alias . '.png';
                $appleIconSrvPath = System::getContainer()->getParameter('contao.web_dir') . '/' . $faviconAppleTouchIcon;

                // Check if compiled new image already exists
                if(!file_exists($appleIconSrvPath)) {

                    //create resized png icon
                    System::getContainer()->get('contao.image.image_factory')
                        ->create(
                            System::getContainer()->getParameter('contao.web_dir') . '/' . $objAppleTouchIcon->path,
                            (new Image\ResizeConfiguration())
                                ->setWidth( $this->appleTouchIconSize[0] )
                                ->setHeight( $this->appleTouchIconSize[1] )
                                ->setMode(Image\ResizeConfiguration::MODE_CROP),
                            $appleIconSrvPath
                        );
                }

                $GLOBALS['TL_HEAD'][] = '<link rel="apple-touch-icon" href="'. Environment::get('base') . $faviconAppleTouchIcon.'"' . ($blnXhtml ? ' />' : '>');
            }
        }
    }

    /**
     * @param $srcFile
     * @param $savePath
     *
     * create favicon from jpg, gif or png file
     */
    private function createIco( $srcFile, $savePath )
    {
        //check if favicon already exists
        if( is_file( System::getContainer()->getParameter('contao.web_dir') . '/' . $savePath ) )
            return;

        $icoFile = new \PHP_ICO( $srcFile, $this->icoSizes );

        // Create the file
        File::putContent('web/' . $savePath, $icoFile->_get_ico_data() );
    }
}
