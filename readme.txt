
=== Cherish ===
Contributors: Poena
Tags: custom-colors, threaded-comments, custom-menu, translation-ready, custom-header, flexible-header, one-column, editor-style, featured-images, responsive-layout, accessibility-ready, blog
License: Dual license: GNU General Public License v2 or later, and MIT License
License URI: https://www.gnu.org/licenses/gpl-2.0.html, https://opensource.org/licenses/MIT
Requires at least: WordPress 4.7
Tested up to: WordPress 5.0
Requires PHP: 5.2
Copyright 2014-2018 Carolina Nymark

Cherish is an accessible, full width responsive theme with a fixed top menu. 

= Description ==
Cherish is an accessible, full width, responsive theme with a fixed top menu.
It has 3 widget areas in the footer and you can change the background color,
title and link color of your posts and pages. Edit or disable your Call to Action area in the customizer,
where you can also change colors, fonts, hide your post meta and upload your own logo.

== Installation ==
1. Unzip `cherish.zip` to the `/wp-content/themes/` directory
2. Activate the theme through the 'Appearance' menu in WordPress

== Known Limitations ==
-A one line menu is strongly recommended, instead of using long menus, use submenus.
-It's recommended not to use a font-size larger than 4em for the Call to Action area.

== Changelog ==

=1.4 2018-12-16=
Housekeeping: Updated readme, updated links. Compressed header images.
Added a new screenshot to comply with the WordPress.org Theme Review requirements.
Code style changes to better comply with WordPress coding standards.
Changed the license to a dual license: GPL v2 or later, and MIT.
Added support for the block editor.
Made the content width narrower to match the editor and for a more comfortable reading length.
Added an accent color option.
Added an option to change title font.
Added an rtl stylesheet.
Added starter content.
Added a post and page title color option, and made sure the color options are visible in the block editor.
Style changes for the menu, making it larger and aligning it more to the left.
Made sure the menu is actually fixed (unless in mobile view).
Made sure links in contents and comments are underlined.
Removed some of the borders for a cleaner design.
Moved bbPress styles to a separate stylesheet that is only enqueued if bbPress is installed.


=1.3 2017-04-14=
The theme had a make over since it had not been updated in nearly two years.
General code and css improvements.
Removed unused files.
New link and menu styling.
Default color changes.
Removed the fade from the site title and description.
Removed the language files in favor of WordPress.org language packs.
Removed the reset option from the customizer.
Remove the footer logo and footer site title options.
Removed the widget visibility limitation. The footer widgets will now show on all pages.
Added support for the WordPress custom logo.
Added support for selective refresh.
Moved the call to action code to a separate function.
Replaced the old navigation with the new the_post_navigation(), the_posts_navigation() and the_comments_navigation().
Removed the archive title fallback in favor of the_archive_title().
Reverted to the default comment form.
Updated the author.php page to use the_author_meta() and get_the_author_meta().
New screenshot.


=1.2 2015-05-16=
Added 	add_theme_support( "title-tag" );
Fixed sidebar id bug
Minor changes to the customizer
Removed the jump down button since it caused some issues in firefox.


=1.0=
Improved styling for bbPress and Woocommerce.
Added a customizer option for a text shadow behind the site title and description.
Minor changes to the language files.

=0.8=
Updated screenshot

=0.7=
Improved accessibility.
Added a customizer option to remove or use a black post divider image.
Minor changes to the language files.


== Folders included in this theme ==
images/ -contains images.
languages/ -contains language files.
inc/ -contains the javascripts and customizer file.
fonts/ -contains Font Awesome files.

== Resources Used In This Theme ==
All included photos where taken by the theme author and are licensed as public domain. Copyright Carolina Nymark 2015-2018.
All images where created by the theme author and are licensed as public domain, Copyright Carolina Nymark 2015-2018.
-Except the mobile menu icon that is created by Font Awesome.

Font Awesome by @davegandy - https://fontawesome.com - @fontawesome
License - https://fontawesome.com/license/free 
# Icons: CC BY 4.0 License (https://creativecommons.org/licenses/by/4.0/)
In the Font Awesome Free download, the CC BY 4.0 license applies to all icons
packaged as SVG and JS file types.

# Fonts: SIL OFL 1.1 License (https://scripts.sil.org/OFL)
In the Font Awesome Free download, the SIL OLF license applies to all icons
packaged as web and desktop font files.

# Code: MIT License (https://opensource.org/licenses/MIT)
In the Font Awesome Free download, the MIT license applies to all non-font and
non-icon files.

Javascript
Keyboard Accessible Dropdown Menus
Copyright 2013 Amy Hendrix (email : amy@amyhendrix.net), Graham Armfield (email : graham.armfield@coolfields.co.uk)
License: MIT

Cherish is a derivative work of:
Underscores https://underscores.me/, (C) 2012-2018 Automattic, Inc. License: GNU General Public License v2 or later
Twenty Seventeen https://wordpress.org/themes/twentyseventeen/ Copyright 2016-2018 WordPress.org, GNU General Public License v2 or later

Sanitization
Copyright (c) 2015-2018, WordPress Theme Review Team
https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php

If you have any questions or suggestions for this theme please contact me on the theme support page, https://wordpress.org/support/theme/cherish.
