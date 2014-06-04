== Think Up Themes ==

- By Think Up Themes, http://www.thinkupthemes.com/

Requires at least:	3.4.1
Tested up to:		3.9.2

Minamaze is a multi-purpose professional Premium WordPress Theme ideal for a business or blog website. The theme is responsive, HD retina ready and comes with 600+ Google Fonts which can easily be selected directly from the theme options panel.


-----------------------------------------------------------------------------
	Support
-----------------------------------------------------------------------------

- For setup and use instructions please refer to file "ThinkUpThemes - Lite Documentation.pdf" in licensing folder.


-----------------------------------------------------------------------------
	Frequently Asked Questions
-----------------------------------------------------------------------------

- None Yet


-----------------------------------------------------------------------------
	Limitations
-----------------------------------------------------------------------------

- RTL support is yet to be added. This is planned for inclusion in v1.4.
- Multi-language support is yet to be added. This is planned for inclusion in v1.4.


-----------------------------------------------------------------------------
	Copyright, Sources, Credits & Licenses
-----------------------------------------------------------------------------

Minamaze WordPress Theme, Copyright 2014 Think Up Themes Ltd
Minamaze is distributed under the terms of the GNU GPL

Demo images are licensed under CC0 1.0 Universal (CC0 1.0) and available from http://unsplash.com/

The following opensource projects, graphics, fonts, API's or other files as listed have been used in developing this theme. Thanks to the author for the creative work they made. All creative works are licensed as being GPL or GPL compatible.

    [1.01] Item:        Underscores (_s) starter theme - Copyright: Automattic, automattic.com
           Item URL:    http://underscores.me/
           Licence:     Licensed under GPLv2 or later
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.02] Item:        Redux Framework
           Item URL:    https://github.com/ReduxFramework/ReduxFramework
           Licence:     GPLv3
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.03] Item:        TGM Plugin Activation
           Item URL:    http://tgmpluginactivation.com/#license
           Licence:     GPLv3
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.04] Item:        html5shiv (jQuery file)
           Item URL:    http://code.google.com/p/html5shiv/
           Licence:     MIT
           Licence MIT: http://opensource.org/licenses/mit-license.html

    [1.05] Item:        Wordpress Sidebar Generator
           Item URL:    https://github.com/Smartik89/Wordpress-Sidebar-Generator
           Licence:     GPLv3
           Licence URL: http://www.gnu.org/licenses/gpl.html

    [1.06] Item:        Custom Metaboxes and Fields for WordPress
           Item URL:    https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/blob/master/readme.md
           Licence:     GPLv2
           Licence URL: http://www.gnu.org/licenses/gpl-2.0.html

    [1.07] Item:        PrettyPhoto
           Item URL:    http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
           Licence:     GPLv2
           Licence URL: http://www.gnu.org/licenses/gpl-2.0.html

    [1.09] Item:        Masonry
           Item URL:    https://github.com/desandro/masonry
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.10] Item:        ImagesLoaded
           Item URL:    https://github.com/desandro/imagesloaded
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.11] Item:        Sticky
           Item URL:    https://github.com/garand/sticky
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.12] Item:        Waypoints
           Item URL:    https://github.com/imakewebthings/jquery-waypoints
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.13] Item:        Retina js
           Item URL:    http://retinajs.com
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.14] Item:        ResponsiveSlides
           Item URL:    https://github.com/viljamis/ResponsiveSlides.js
           Licence:     MIT
           Licence URL: http://opensource.org/licenses/mit-license.html

    [1.15] Item:        Font Awesome
           Item URL:    http://fortawesome.github.io/Font-Awesome/#license
           Licence:     SIL Open Font &  MIT
           Licence OFL: http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL
           Licence MIT: http://opensource.org/licenses/mit-license.html

    [1.16] Item:        Twitter Bootstrap
           Item URL:    https://github.com/twitter/bootstrap/wiki/License
           Licence:     Apache 2.0
           Licence URL: http://www.apache.org/licenses/LICENSE-2.0

    [1.17] Item:        Elegant Icons
           Item URL:    http://www.elegantthemes.com/blog/resources/elegant-themes-icon-pack-for-free
           Licence:     Dual GPL and MIT
           Licence URL: /licenses/license_(elegant_icons).txt

    [1.18] Item:        Elegant Media Icons
           Item URL:    https://www.iconfinder.com/search/?q=iconset:elegantmediaicons
           Licence:     GPL
           Licence URL: http://www.gnu.org/licenses/gpl.html


-----------------------------------------------------------------------------
	Changelog
-----------------------------------------------------------------------------

Version 1.3.5
- New:     Update notice added.
- New:     ThinkUpSlider added to inner pages.
- New:     Styling options added allowing user to customize basic theme styles.
- New:     Dashicons font library added. Used in shortcodes such as image overlay.
- New:     Backend styling added to hide meta options from shortcode dropdown list.
- Fixed:   Unlimited sidebars updated to remove PHP error messages.
- Fixed:   Responsive jQuery fixed for iframes. Including Youtube videos etc...
- Fixed:   Walker_Nav_Menu_Responsive updated to fix reported PHP error messages.
- Fixed:   Social media sharing links in blog.php changes from http:// (or https://) to //.
- Fixed:   Page titles used in social media sharing links in blog.php wrapped with esc_attr().
- Fixed:   thinkup_hook_header() moved to immediately after <head> html tag to correct SEO issue.
- Fixed:   http: (and https:) removed from google fonts link in typography.php so fonts display correctly on all sites.
- Updated: Shortcodes styling updated.
- Updated: Sidebar selector updated so that footer sidebars are not displayed.
- Updated: responsiveslides-call.js updated to ensure slider shortcode is responsive.
- Updated: Full width slider now controlled by adding class to body tag when selected.
- Updated: thinkup_input_sliderpage() moved immediately after thinkup_input_homepagesection().
- Updated: Blog template updated to allow only posts from a specific category to be displayed.
- Updated: Shortcode scripts removed from Caldera output, now enqued directly from functions.php.
- Removed: Slidedeck 2 css removed from style-backend.css.

Version 1.3.4
- New:     ImagesLoaded script added to correct masonry layout issues
- Fixed:   Imagesloaded script corrected to avoid $ error.
- Fixed:   Carousel shortcode jQuery now assigns container height.
- Updated: carousel css updated.
- Updated: Parallax class added in adminbody tag if template-parallax.php is present

Version 1.3.3
- New:     Portfolio options added to individual pages.
- New:     jQuery added to backend to only show portfolio options when template selected.
- Fixed:   Twitter widget css corrected for links.
- Fixed:   Sidebar selector displays correctly when blog template selected.
- Fixed:   wp_reset_query added to portfolio archive and template pages. Sidebars now display correctly.
- Updated: All shortcode specific jQuery removed from shortcodes folder.
- Removed: Shortcode tabs style 2 removed.
- Removed: Accordion styles 2, 3 and 5 removed.
- Updated  Blog carousel shortcode updated to allow individual categories.

Version 1.3.2
- Fixed:   Responsive header menu now works on localhost correctly.
- Updated: Auto sizing of logo image added.
- Updated: Styling added for default WordPress widgets.
- Removed: All references to blog layout 2.
- Removed: All references to template family.

Version 1.3.1
- New:     Compatibility with ThinkUp Page Builder added
- Updated: Shortcode styles updated (notification box and buttons)

Version 1.3.0
- New:     ThinkUpSlider added.
- New:     Translation ready added.
- New:     Page / Post / Image / Project navigation added.
- Fixed:   Walker Nav(s) updated to follow WordPress best practices.
- Fixed:   Responsive navigation menu displays when custom menu is not set.
- Fixed:   Depreciated calls for widgets. attribute_escape() replaced with esc_attr().
- Updated: Default logo is now blog name.
- Updated: Styling added to default WordPress widgets.
- Updated: Logo styling improved. Maximum logo image size added.
- Updated: custom-styling.php updated to reflect sidebar and navigation styling.
- Removed: Template Family removed.
- Removed: SlideDeck2 plugins removed.
- Removed: Blog style 2 removed. Only single blog layout now available.

Version 1.2.0
- Updated: Header menu displays fine when custom menu is not set.

Version 1.1.0
- New:     Redux framework
- Fixed:   Flickr widget error handling improved.
- Updated: Animation shortcode added.
- Removed: SMOF framework.

Version 1.0.0
- Initial release.