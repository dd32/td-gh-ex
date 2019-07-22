=== Welcome to Aamla ===

Contributors: vedathemes
tags: two-columns, left-sidebar, right-sidebar, grid-layout, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, post-formats, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, blog, e-Commerce
Requires at least: WordPress 4.7
Tested up to: WordPress 5.2
Requires PHP: 5.6
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Aamla is a framework-like coding focused personal blog & wooCommerce theme.

== Description ==

Aamla is a feature rich, Gutenberg friendly, lightweight and mobile first WordPress theme that is flexible and easy to use. It is built with special focus on blog, business and e-commerce websites. Aamla helps you to build your pages even without pagebuilders and make your audios and videos stand out. It is compatible with gutenberg, woocommerce and many other plugins. Aamla is written with clean code and the most current HTML5 conventions. Aamla can be used as a solid base to build beautiful and functional websites.

== Frequently Asked Questions ==
= What are the minimum requirmens for using this theme? =
PHP 5.4+, IE11+, WordPress 4.7+

= How to disable google fonts? =
Bayleaf WordPress theme uses Google Fonts for your website by default. Fonts and their respective stylesheets are downloaded from google's website. Refer link [ https://developers.google.com/fonts/faq#what_does_using_the_google_fonts_api_mean_for_the_privacy_of_my_users ] for google font's privacy related information. If you do not want to use google fonts for your website, you can disable it from theme customizer (Appearance > Customize > Theme options).

== Changelog ==

= 1.2.2 =
* Add: Option to add related posts at the end of single posts.
* Add: Two additional widget areas for home page.
* Add: wp_body_open hook has been added.
* Add: One additional archive posts layout.
* Error Fix: Display of WooCommerce Cart icon on smaller devices.
* Error Fix: Display WooCommerce filter sidebar even if main sidebar is hidden on archives.
* Error Fix: WP attachment metadata template error fix.
* Error Fix: Hide Blank Widget Horizontal line on mobile devices.
* Modify: Minor styling improvements.

= 1.2.1 =
* Add: Email subscription box support from mailoptin plugin.
* Add: Script to lock body scroll when modal window open.
* Modify: Merge media-manager script with main scripts.
* Modify: Hamburger menu css animation.
* Modify: Display Header widgets in modal window.
* Minor CSS improvements.

= 1.2 =
* Remove - Entry Extra content has been removed.
* Modify - Major changes in theme design and styling.
* Bug Fix - WooCommerce error while using 'get_terms()' function.

= 1.1.6 =
* Error Fix - Rectify theme errors according to Theme Sniffer plugin.
* Error Fix - Scroll-to-top button was not working on ios devices.
* Error Fix - Media Manager styling error if external video is embedded in audio post type.
* Modify - Rectify theme code styling in accordance with latest WPCS standards.

= 1.1.5 =
* Add - GPL v2 license file
* Modify - Readme.txt format to meet latest WP org requirements
* Modify - WordPress gallery item height modification
* Modify - Error 404 page design simplification
* Error Fix - Block editor styling minor issues

= 1.1.4 =
* Modify - Change in theme's Author URI and Theme URI

= 1.1.3 =
* Modify - Conpatibility with WP 5.0
* Modify - Block editor styling improvements
* Error Fix - Minor css error fix and improvements

= 1.1.2 =
* Modify - Typography improvements.
* Modify - Thumbnail size and excerpt text modification on index pages.
* Add - Scroll-to-top functionality included.
* Add - Horizontal divider line option added in widgetlayer blank widget.

= 1.1.1 =
* Error Fix - Deferred media should not run if media type is not an iframe.
* Error Fix - Gutenberg styling issues.

= 1.1.0 =
* Error fix - CSS issues in Gutenberg compatibility.
* Error fix - Media manager code fixes.
* Error Fix - Minor css issues in WooCommerce.
* Error Fix - Minor css and code improvements.

= 1.0.9 =
* Modify - Make theme screenshot comply with updated requirements.
* Error Fix - Minor css and code improvements.

= 1.0.8 =
* Modify - Make theme screenshot comply with updated requirements.
* Error Fix - Media Manager autoplay/pause video streamlined.

= 1.0.7 =
* Modify - Change theme screenshot to better adhere to theme guidelines.
* Error Fix - Use wp_kses_post for page excerpts incase DOMdocument is not available.
* Error Fix - Minor css modifications and error fix.

= 1.0.6 =
* Modify - Replace esc_attr__ & esc_attr_e with esc_attr_x to make translation friendly
* Modify - Translation friendly instructions for Footer text placeholders.
* Modify - Change theme screenshot.
* Error Fix - DOMDocument generate DOCTYPE, HTML and BODY tags on saveHTML.
* Error Fix - IFRAME empty src attribute HTML markup warning in media manager

= 1.0.5 =
* Error Fix - Gutenberg Gallery styling fix
* Error Fix - WooCommerce single product main image overflow its container (if multiple images)
* Error Fix - Various display posts style's thumbnail aspect ratio streamlined
* Error Fix - Reduce display posts title font size in grid layout

= 1.0.4 =
* Add - Media Manager support for external embedded audio.
* Modify - Rename 'typography' addon to 'google-fonts' addon.
* Modify - Method for Media Manager to load iframe content only on click.
* Error Fix - Return 'aamla_markup' function if context is not defined.
* Error Fix - Return 'aamla_get_attr' function if slug is not defined.
* Error Fix - User capability check removed from 'extend_widget_form' in widgetlayer class.
* Error Fix - User capability check removed from 'update_settings' in widgetlayer class.
* Error Fix - Breadcrumb styling on widgetlayer and other pages.
* Error Fix - JetPack infinite scroll compatibility with Media Manager & grid layout.
* Error Fix - Widget lists style for display posts full content and grid content styles.
* Error Fix - WooCommerce notice box styling.
* Error Fix - Styling of audio files added via gutenberg editor.
* Error Fix - Other minor styling and Javascript improvements.

= 1.0.3 =
* Add - Additional image size to cater laptop screens.
* Add - Customizer option to not display thumbnails on single posts.
* Add - Number of columns in display posts grid specific styles.
* Add - Option to get posts by post IDs in display posts widget.
* Add - Option to hide social navigation menu from contact bar.
* Add - Method to defer loading videos in Media Manager.
* Add - Proper styles to add navigation menus to widget areas.
* Add - Proper styles to add social navigation menu to widget areas.
* Modify - Remove title in Media Manager for display posts styles without titles.
* Modify - Media manager css to create minor animation effect.
* Modify - Move blank widget height options to Theme specific styling options.
* Modify - Style to recognize hover and focus on linked images.
* Modify - Media Manager video styling for better mobile compatibility.
* Error Fix - Markup and style of scroll buttons to cater accessibility errors.
* Error Fix - Add aria expanded and screen reader text to toggle buttons.
* Error Fix - Gutenberg page/post style to be compatible with display posts widget.
* Error Fix - Minor markup, commenting and styling issues.

= 1.0.2 =
* Error Fix - Empty string supplied as input to loadHTML()
* Error Fix - Fatal Error on installing theme below PHP 5.4
* Error Fix - Replace esc_html to esc_attr for escaping attributes
* Error Fix - Gutenberg add theme support method changed
* Error Fix - Tap target size issue for social icons
* Error Fix - Minor styling issues
* Error Fix - Minor RTL style correction for pagination and WooCommerce
* Error Fix - WooCommerce archive pages sidebar position

= 1.0.1 =
* Add - Archive page grid layout option.
* Add - Display Posts, Media Manager, Typography and WidgetLayer addons.
* Add - JetPack, Gutenberg and WooCommerce Support.
* Add - Page hero image and call to action feature.
* Add - Social Icons Menu feature.
* Add - RTL support.
* Modify - Improved editor stylesheet.
* Modify - PHP, css and JS code improvements.

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.1.5 =
* Upgrade to receive latest theme updates.

== Resources ==
* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* Font Awesome SVG icons http://fontawesome.io/, (C) Dave Gandy, [CC BY 4.0](https://fontawesome.com/license/free)
* Icomoon SVG icons https://icomoon.io, (C) Roonas, [GPL / CC BY 4.0](https://icomoon.io/icons-icomoon.html)
* Feather SVG icons https://github.com/feathericons/feather, (C) Colebemis, [MIT](http://opensource.org/licenses/MIT)
* Image in screenshot https://pxhere.com/en/photo/479333, [CC0](https://creativecommons.org/publicdomain/zero/1.0/)
* Image in screenshot https://pxhere.com/en/photo/1542243, (C) Ken Lane, [CC0](https://creativecommons.org/publicdomain/zero/1.0/)
* Image in screenshot https://pxhere.com/en/photo/1542257, (C) Ken Lane, [CC0](https://creativecommons.org/publicdomain/zero/1.0/)
* Image in screenshot https://pxhere.com/en/photo/1460159, (C) CHESVISUAL, [CC0](https://creativecommons.org/publicdomain/zero/1.0/)
* Image in screenshot https://pxhere.com/en/photo/1592870, (C) Lê Tuấn Hùng, [CC0](https://creativecommons.org/publicdomain/zero/1.0/)
* Incorporates code from Twenty Fifteen WordPress Theme, (C) Automattic & WordPress.org, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Incorporates code from Twenty Seventeen WordPress Theme, (C) Automattic & WordPress.org, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Incorporates code from Stargazer WordPress Theme, (C) Justin Tadlock, [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
