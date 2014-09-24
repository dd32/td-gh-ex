=== WORTEX LITE ===

Contributors: Iceable
Tags: gray, green, white, light, one-column, two-columns, right-sidebar, fixed-layout, responsive-layout, custom-header, custom-menu, editor-style, featured-images, full-width-template, sticky-post, theme-options, threaded-comments, translation-ready
Requires at least: 3.5
Tested up to: 4.0
Stable tag: 1.1.2

== ABOUT WORTEX LITE ==

Wortex Lite is a clean, professional looking, responsive theme for WordPress. Perfect for tech or design oriented blogs and creative business websites.
It features two widgetizable areas (sidebar and optional footer), two custom menus (main navbar and optional footer menu) and a full-width header image.

Wortex Lite is the lite version of Wortex Pro, which comes with many additional features and access to premium class pro support forum and can be found at http://www.iceablethemes.com

== GETTING STARTED ==

Once you activate the theme from your WordPress admin panel, you can visit the "Appearance > Theme Options" page to quickly and easily upload your own logo and optionally set a custom favicon.
If you will be using a custom header image, you can also optionally choose to enable or disable it on your homepage, blog index pages, single post pages and individual pages.
It is highly recommended to set a menu (in Appearance > Menus) instead of relying on the default fallback menu. Doing so will automatically activate the dropdown version of your menu in responsive mode.
You can also set a custom menu to appear at the bottom right of your site. Note this footer menu doesn't support sub-menus, only top-level menu items will be displayed.

Additional documentation and free support forums can be found at http://www.iceablethemes.com under "support".

== SPECIAL FEATURES INSTRUCTIONS ==

* Footer widgets: The widgetizable footer is disabled by default. To activate it, simply go to Appearance > Widgets and drop some widgets in the "Footer" area, just like you would do for the sidebar. It is recommended to use 4 widgets in the footer, or no widgets at all to disable it.

Additional documentation and free support forums can be found at http://www.iceablethemes.com under "support".

== LICENSE ==

This theme is released under the terms of the GNU GPLv2 License.
Please refer to license.txt for more information.

== CREDITS ==

This theme bundles some third party javascript/jQuery plugins and font, all open source and released under GPL or GPL compatible licenses:
* hoverIntent: Copyright 2007, 2013 Brian Cherne. MIT License. http://cherne.net/brian/resources/jquery.hoverIntent.html
* superfish: Copyright 2013 Joel Birch. Dual licensed under the MIT and GPL licenses. http://users.tpg.com.au/j_birch/plugins/superfish/
* Font Awesome: Copyright Dave Gandy. Font licensed under SIL OFL 1.1. CSS code licensed under MIT License. http://fortawesome.github.io/Font-Awesome/

All other files are copyright 2014 Iceable Media.

== TRANSLATIONS ==

Currently available translations:

* French (fr_FR) translation: by Iceable Media

Translating this theme into you own language is quick and easy, you will find a .POT file in the /languages folder to get you started. It contains about 40 strings only.
If you don't have a .po file editor yet, you can download Poedit from http://www.poedit.net/download.php - Poedit is free and available for Windows, OSX and Linux.

If you have translated this theme into your own language and are willing to share your translation with the community, please feel free to do so on the forums at http://www.iceablethemes.com
Your translation files will be added to the next update. Don't forget to leave your name, email address and/or website link so credits can be given to you!

== CHANGELOG ==

= 1.1.2 =
September 24th, 2014
* Tested with WP 4.0
* Fixed hAtom structured data (Errors like Missing required field "entry-title" / "updated" / hCard "author" in Google Webmaster tools)
* Updated hAtom structured data: using post date as "published" and modified_date as "updated"
* Removed hentry class from pages (hentry is irrelevant for static content)
* Updated Font-Awesome from 4.0.3 to 4.2.0

= 1.1.1 =
September 1st, 2014
* Fixed W3C validator error caused by the "X-UA-Compatible" meta tag. The theme now fully validates as HTML5.
* Replaced (has_post_thumbnail()) with ('' != get_the_post_thumbnail()) (as per codex recommendation - fixes an occasional issue)
* Fixed an odd glitch with footer widgets columns
* Fixed CSS glitch in Firefox with large logo and featured images

= 1.1.0 =
June 30rd, 2014
* Added Background support
* Added Boxed/Wide layout option
* Updated Screenshot
* Fixed typo in theme options title: "Wortex Lite Settings"

= 1.0.2 =
June 23rd, 2014
* Added missing .pot file
* Added French (fr_FR) translation

= 1.0.1 = 
June 16th, 2014 
* Added ellipsis (...) to the end of truncated excerpts when displaying the "read more" button (based on user feedback).

= 1.0.0 =
May 14th, 2014
* Initial public release