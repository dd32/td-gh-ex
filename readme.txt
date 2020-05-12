=== Semper Fi Lite ===

Theme Name: Semper Fi Lite
Contributors: Schwarttzy
Version: 115
Requires at least: 5.0
Tested up to: 5.4.1
Requires PHP: 5.6
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Stable tag: 115
Tags: blog, custom-colors, custom-logo, e-commerce, editor-style, featured-images, footer-widgets, full-width-template, portfolio, theme-options, threaded-comments, translation-ready
Text Domain: semper-fi-lite

Semper Fi Lite Wordpress Theme written for my personal use and freely shared with everyone else.


== Description ==

Semper Fi Lite is a handwritten WordPress theme for blogs, businesses, and can also be used as a powerful e-commerce (Woocommerce) solution. Written without JavaScript, just pure HTML5 and CSS3, Semper Fi Lite is free of any possible scripting conflicts with every WordPress Plugin out there. Fully responsive, with a built-in mobile friendly touch screen menu, adaptive font sizing, Woo Commerce integration, page-specific custom backgrounds, and 4k+ resolution ready. All of Semper Fi Lite's options are organized and controlled with WordPress's powerful Customizer for real-time customization. For support with questions, help, or issues use http://schwarttzy.com/contact-me/ or head over to https://wordpress.org/support/theme/semper-fi-lite/


== Copyright ==

Semper Fi Lite WordPress Theme, Copyright 2020 Schwarttzy
Semper Fi Lite is distributed under the terms of the GNU GPL


== Screenshots ==

1. Main screenshot for the theme


== Image Licensing ==

All images and video in "Semper Fi Lite" are the author "Schwarttzy" and are licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.

https://creativecommons.org/licenses/by-sa/4.0/

https://creativecommons.org/licenses/by-sa/4.0/legalcode


== Social Media Icon Licensing ==

The font "schwarttzy" is a dirivative work of "Font Awesome" and is licensed under a Creative Commons Attribution 4.0 International License.

https://creativecommons.org/licenses/by/4.0/

https://creativecommons.org/licenses/by/4.0/legalcode

Font Awesome Free is free, open source, and GPL friendly. You can use it for
commercial projects, open source projects, or really almost whatever you want.
Full Font Awesome Free license: https://fontawesome.com/license/free.

# Icons: CC BY 4.0 License (https://creativecommons.org/licenses/by/4.0/)
In the Font Awesome Free download, the CC BY 4.0 license applies to all icons
packaged as SVG and JS file types.

# Fonts: SIL OFL 1.1 License (https://scripts.sil.org/OFL)
In the Font Awesome Free download, the SIL OLF license applies to all icons
packaged as web and desktop font files.

# Code: MIT License (https://opensource.org/licenses/MIT)
In the Font Awesome Free download, the MIT license applies to all non-font and
non-icon files.

# Attribution
Attribution is required by MIT, SIL OLF, and CC BY licenses. Downloaded Font
Awesome Free files already contain embedded comments with sufficient
attribution, so you shouldn't need to do anything additional when using these
files normally.

We've kept attribution comments terse, so we ask that you do not actively work
to remove them from files, especially code. They're a great way for folks to
learn about Font Awesome.

# Brand Icons
All brand icons are trademarks of their respective owners. The use of these
trademarks does not indicate endorsement of the trademark holder by Font
Awesome, nor vice versa. **Please do not use brand logos for any purpose except
to represent the company, product, or service to which they refer.**


== Changelog ==

= 115 =
* Added forum link back in style description, accidently got deleted
* Woo-Commerce had a weird issue with overflow with overflowing
* Some compatibility issue with a comma in functions
* Skip link wasn't translateable

= 114 =
* Fixed issue where click the customizer icon on the first square box would open up the 404 video tab

= 113 =
* Minor adjustmen for cell phone when using keyboard accessibility, outline got cut off
* In customizer and issue with the menu not floating properly and an accident with absolute positioning happened
* Fixed customizer option that never got updated to the newer customizer code
* Fixed an issue where the customizer would display
* excerpt_length, excerpt_more no longer target admin section, only front page
* removed some code that was commented out
* Author URI changed to the correct link

= 112 =
* Had a second Text domain in style.css
* Remove old keyboard accessibility, change it red box that outlines current focus

= 111 =
* change arrow right in functions file to &rarr;

= 110 =
* Text domain had issue, no sure how got there
* Found some missing Translatable text in /inc/store-front/customizer.php
* Added in alt text for customized photos if they have it
* Theme Info doesn't error out from missing bit of code

= 109 =
* All prefixes changed from "semperfi" to "semper_fi_lite"
* Fixed none escaped echo on /categories-and-tags/html.php:53
* Fixed a bunch of missed Translatable text
* Found couple of un-sanitized data in /theme-info/html.php
* Added the copyright to the readme.txt file
* The "WordPress Plugin readme.txt Validator" required me to add a screenshot section
* Added information about the copyright information of all the photos
* Fixed some hidden PHP "Undefined variable" & "Trying to get property of non-object" errors I wasn't aware of
* Added "Skip Content" to improve the accessablity of the theme
* Fixed issues where "Background Color" wouldn't work because of the theme's default background overlaying the color
* Fixed issues with images that were changed from default in customizer wouldn't display upon revisiting
* Fixed linking icons in Customizer, among some other issues

= 108 =
* Default publisher logo image in /inc/blog/images/ wasn't named properly, changed it correct naming
* Customizer option code went missing too, added back in

= 107 =
* /inc/woo-commerce/style.css was accidently placed in the folder /inc/woo-commerce-content-microdata/

= 106 =
* Figure text on a center image was display off to the left because of WordPress CSS
* .wp-block-button CSS displays same as the paragraph element now
* figcaption is fixed, WordPress added padding and hard font numbers
* Block quote cite wasn't applying CSS sytles because of block editor element differences
* wp-block-embed will center up on the page now
* Menu should be more accessable now, especially for users navigating with the tab key, also menu now works with hover
* Navigation didn't work with a static front page, switched to pagination for a better user experience.

= 104 =
* Fixed the issues with WordPress Block editor and new gallery code
* Changed it so the blockquotes center up on the screen, looks visually better

= 103 =
* Added content width back in, feels so pointless
* Can't use the real "->"

= 102 =
* in semper-fi-lite/inc/footer-widgets/html.php "_()" changed to "__()"
* learned about the plugin "Theme Sniffer" and fixed all the errors
* fixed issue with the single page comments not displaying
* fixed issue where the customizer modifed css for navigation wouldn't enqueue properly
* updated semper-fi-lite/woocommerce/global/quantity-input.php to reflect the chances made in the woocommerce 4.0 update
* After clicking "Older News" the "Square Boxes", "Above the Fold", and "Store Front / Woocommerce Display Products" no longer display

= 101 =
* Removed theme promotions on semper-fi-lite\inc\store-front\html.php and semper-fi-lite\inc\store-front\customizer.php
* Moved semper-fi-lite\inc\open-graph-protocol\ from the theme over to the premium plugin because a third party api key is plugin territory
* fixed wrong use of unique prefix in semper-fi-lite\inc\woo-commerce\
* fixed the wrong uses of esc_attr, esc_textarea, and missing esc_url
* custom customizer sanitizer for range and select
* adding in the missing text domain for translation in semper-fi-lite\inc\footer-widgets\html.php
* fixed coding error in semper-fi-lite\inc\404\html.php and issues with escaping functions with esc_html() between HTML tags using only esc_attr() 
* fixed hardcode the date formats, although few hidden hard coded dates remain to ensure the Microdata work properly, these coded dates are not seen but the viewer, only the search engines see these hard coded dates
* fixed missing translations on semper-fi-lite\inc\comments\html.php and semper-fi-lite\inc\woo-commerce\customizer.php
* updated Read Me to use WordPress.org match recommend 

= 100 =
* Theme released after two plus years with new code


== Upgrade Notice ==

= 115 =
* Minor tweaks in the code to fix obscure bugs and one none translatable text

= 114 =
* Fixed issue in customizer linking

= 113 =
* Improved experience in Customizer, fixed some code issues, and updated some information

= 112 =
* Worked to improve keyboard accessibility

= 111 =
* Changed arrow right to &rarr; in the Continue Reading link for blog

= 110 =
* Further tweaks to maybe some day get approved by the WordPress repository

= 109 =
* Fixes for odd configurations, proper licensing for photos and fonts, and some more tweaks. 

= 108 =
* Fixed issues with default publisher image logo missing and the customizer option missing.

= 107 =
* The file /inc/woo-commerce/style.css got accidently moved into the wrong folder, just putting it back in the correct folder.

= 106 =
* Fixing minor issues, switched to pagination, making the navigation more accessable, tweaking how embedded media displays.

= 104 =
* Gallerys and Blockquotes created in Block Editor will display more visually pleasing.

= 103 =
* Theme Failed, minor changes

= 102 =
* Mostly improvements to the theme based on the plugin Theme Sniffer recommendations, and couple for errors fixed

= 101 =
* Improvements to the theme based on WordPress.org Review recommendations.

= 100 =
* Completely redesigned theme under the hood with many fixes, new features.