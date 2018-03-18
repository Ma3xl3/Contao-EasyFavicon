Contao-EasyFavicon
==============================

[![](https://img.shields.io/packagist/v/ma3xl3/contao-easy-favicon.svg?style=flat-square)](https://packagist.org/packages/ma3xl3/contao-easy-favicon)
[![](https://img.shields.io/packagist/dt/ma3xl3/contao-easy-favicon.svg?style=flat-square)](https://packagist.org/packages/ma3xl3/contao-easy-favicon)

This extension allows you easily to add a favicon and apple touch icon to your website.

Png, jpeg and gif files will automatically be converted into a ico file. The following sizes are available in the ico file: 16x16, 24x24, 32x32, 48x48. If you choose an animated gif the first image will be used for the ico converted file.

You can also choose a traditional ico file. It will be included directly.

Apple touch icons for mobile devices (iOS, Android) are supported too. The icon is stored in the size of 180x180.

## Requirements

* Contao >=4.4 <5.0

For Contao 3.x use version EasyFavicon 1.x

## Note

You can use a different icon per website root.

To regenerate the icon, delete the file favicon-\*.ico and favicon-apple-touch-icon-\*.png in the web/share/ folder.

## Changelog

##### Version 2.0.1 stable

* Fixed dca layout problems

##### Version 2.0.0 stable

* Rewritten for contao 4.4 as a bundle
* Outsourced php-ico from favicon bundle

##### Version 1.0.2 stable

* Increased apple touch icon to 180x180
* Changed image/vnd.microsoft.icon to image/x-icon
* Tested with Contao 3.4

##### Version 1.0.1 stable

* Backend css appeared in frontend (see #1)

##### Version 1.0.0 stable

* First release
* Converts png, jpg gif into a ico file with different sizes
* Ico file will be included directly
* Add apple touch icon
