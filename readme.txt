===Welcome to Aamla ===

Created by: Vedathemes
Requires at least: WordPress 4.7
Tested up to: WordPress 4.9.8
Version: 1.0.7
PHP required : PHP 5.4+
IE Browser Support: IE11+
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: two-columns, left-sidebar, right-sidebar, grid-layout, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, post-formats, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, blog, e-Commerce

== Description ==

Aamla is a feature rich, lightweight and mobile first WordPress theme that is flexible and easy to use. It is built with special focus on blog, business and e-commerce websites. Aamla is written with clean code and the most current HTML5 conventions. Aamla can be used as a solid base to build beautiful and functional websites.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.
4. Navigate to Appearance > Customize in your admin panel and customize to taste.

== Copyright ==

Aamla WordPress Theme, Copyright 2018-2019 Vedathemes
Aamla is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

== Credits ==

Aamla WordPress Theme is based on Underscores, (C) 2012-2017 Automattic, Inc.
Licenses: [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
Source: http://underscores.me/

Aamla WordPress Theme incorporates code from Twenty Fifteen WordPress Theme, Copyright 2014-2017 WordPress.org & Automattic.com
Twenty Fifteen is distributed under the terms of the GNU GPL.

Aamla WordPress Theme incorporates code from Twenty Seventeen WordPress Theme, Copyright 2016-2017 WordPress.org & Automattic.com
Twenty Seventeen is distributed under the terms of the GNU GPL.

Aamla WordPress Theme incorporates code from Stargazer WordPress Theme, Copyright 2013-2018 Justin Tadlock
Stargazer is distributed under the terms of the GNU GPL.

Aamla WordPress Theme bundles the following third-party resources:

1.	normalize.css, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal
	Licenses: [MIT](http://opensource.org/licenses/MIT)
	Source:  http://github.com/necolas/normalize.css

2.	SVG Icons collection has been created from following,

	Font Awesome SVG icons, Copyright Dave Gandy
	License: SIL Open Font License, version 1.1 (https://fontawesome.com/license/free)
	Source: http://fontawesome.io/

	Icomoon SVG icons ( Free Version ), Copyright Roonas
	License: GPL / CC BY 4.0. (https://icomoon.io/icons-icomoon.html)
	Source: https://icomoon.io

	Feather SVG icons, Copyright Colebemis
	License: [MIT](http://opensource.org/licenses/MIT)
	Source: https://github.com/feathericons/feather

3.	Images used for theme screenshot

	https://pixabay.com/en/gui-interface-internet-program-2311258/
	by janjf93 (https://pixabay.com/en/users/janjf93-3084263/)
	License: [CC0](https://creativecommons.org/publicdomain/zero/1.0/)

	https://pixabay.com/en/ok-check-todo-agenda-icon-symbol-1976099/
	by janjf93 (https://pixabay.com/en/users/janjf93-3084263/)
	License: [CC0](https://creativecommons.org/publicdomain/zero/1.0/)

	https://pixabay.com/en/americana-modern-abstract-design-1501711/
	by Fotocitizen (https://pixabay.com/en/users/Fotocitizen-397314/)
	License: [CC0](https://creativecommons.org/publicdomain/zero/1.0/)

	Other illustrations are self created.

4.	Image used on 404-error page
	https://pixabay.com/en/not-found-404-error-file-not-found-2384304/
	by draguth (https://pixabay.com/en/users/draguth-1837346/)
	License: [CC0](https://creativecommons.org/publicdomain/zero/1.0/)

== Changelog ==

= 1.0.7 - Aug 10 2018 =
* Modify - Change theme screenshot to better adhere to theme guidelines.
* Error Fix - Use wp_kses_post for page excerpts incase DOMdocument is not available.
* Error Fix - Minor css modifications and error fix.

= 1.0.6 - Aug 8 2018 =
* Modify - Replace esc_attr__ & esc_attr_e with esc_attr_x to make translation friendly
* Modify - Translation friendly instructions for Footer text placeholders.
* Modify - Change theme screenshot.
* Error Fix - DOMDocument generate DOCTYPE, HTML and BODY tags on saveHTML.
* Error Fix - IFRAME empty src attribute HTML markup warning in media manager

= 1.0.5 - Aug 07 2018 =
* Error Fix - Gutenberg Gallery styling fix
* Error Fix - WooCommerce single product main image overflow its container (if multiple images)
* Error Fix - Various display posts style's thumbnail aspect ratio streamlined
* Error Fix - Reduce display posts title font size in grid layout

= 1.0.4 - Aug 05 2018 =
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

= 1.0.3 - Aug 02 2018 =
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

= 1.0.2 - Jul 13 2018 =
* Error Fix - Empty string supplied as input to loadHTML()
* Error Fix - Fatal Error on installing theme below PHP 5.4
* Error Fix - Replace esc_html to esc_attr for escaping attributes
* Error Fix - Gutenberg add theme support method changed
* Error Fix - Tap target size issue for social icons
* Error Fix - Minor styling issues
* Error Fix - Minor RTL style correction for pagination and WooCommerce
* Error Fix - WooCommerce archive pages sidebar position

= 1.0.1 - Jul 02 2018 =
* Add - Archive page grid layout option.
* Add - Display Posts, Media Manager, Typography and WidgetLayer addons.
* Add - JetPack, Gutenberg and WooCommerce Support.
* Add - Page hero image and call to action feature.
* Add - Social Icons Menu feature.
* Add - RTL support.
* Modify - Improved editor stylesheet.
* Modify - PHP, css and JS code improvements.

= 1.0.0 - Mar 31 2018 =
* Initial release
