# Release Notes

## v1.2.0

### Added
* Added post thumbnail support
* Added Roboto Condensed as a font option, which contains Latin, Greek, Cyrillic, and Vietnamese characters
* Added a collapsible hamburger menu for smaller screen sizes
* Added custom Header Image support
* Added Site Text customization options for:
  * 'Read More' link
  * Post date text
  * Categories text
  * Tags text
* Added color customization options for:
  * Content background color
  * Site description color
  * Text color
  * Button text color
  * Button border color
* Added Right-to-Left language support
* Added custom background image support
* Added editor styles

### Changed
* Changed main font to 'BebasNeue' which has wider character support
* Changed button styles to match navigation elements
* Changed mobile responsive breakpoint to 768px to mirror Bootstrap 3
* Changed way the theme internally manages default customizations
* Changed way the theme internally manages column layout styles
* Changed code to use PSR-2 formatting
* Updated screen-reader classes
* Screenshot is bigger and better
* Update wordpress tags to more accurately reflect theme

### Fixed
* Stopped showing comments on pages where the comments were disabled
* Fixed some minor styling issues with comments
* Stopped rendering second widget column when there were no active widgets in it
* Fixed spacing issue with nested menu items

## v1.1.2

### Added
* Added license for default theme font (Bebas)
* Added separate changelog file

## v1.1.1

### Added
* Added correct POT file for translations. Located in languages folder

## v1.1.0

### Added
* Added fonts choices for posts titles (addresses the issue of Bebas font not containing many characters found in foreign languages)
* Added Theme URI
* Made the theme translation ready

### Changed
* Reworked responsive styling to look and work much better on tablets and mobile devices
* Changed layout choices to "Two Columns" and "Three Columns" to better reperesent design

### Fixed
* Properly filtered the wp_title function in compliance with Wordpress standards
* Properly escaped home_url in header
* Fixed issue where customizable layout values initialize with no values and break layout design
* Added more padding around comments
* Fixed minor typo on 404 page

## v1.0.0

* Initial release
