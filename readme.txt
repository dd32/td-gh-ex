# Theme
Name: Bidnis
Author: Gratis Themes (https://github.com/GratisThemes)
License: GNU General Public License v3

# Copyright
Bidnis WordPress Theme, Copyright (C) 2017-2019, Gratis Themes
Bidnis is distributed under the terms of the GNU GPL v3

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

-----------------------------------------------------------------------------

# Libraries
# The theme bundles the following third-party resources:

normalize.css v8.0.0
License: MIT
Source: github.com/necolas/normalize.css

Font Awesome 4.6.3 by @davegandy
  Font License
    Applies to all desktop and webfont files in the following directory: font-awesome/fonts/.
    License: SIL OFL 1.1
    URL: http://scripts.sil.org/OFL

  Code License
    Applies to all CSS and LESS files in the following directories: font-awesome/css/, font-awesome/less/, and font-awesome/scss/.
    License: MIT License
    URL: http://opensource.org/licenses/mit-license.html

-----------------------------------------------------------------------------

# Images

Default header image
Creative Commons Zero (CC0) license https://www.pexels.com/photo-license/
https://www.pexels.com/photo/mock-up-technology-laptop-apple-51171/

-----------------------------------------------------------------------------

# changelog

1.0.0 - 2016.06.16
- Initial release

1.1.0 - 2016.10.15
- Included copyright information in style.css and readme.txt
- Included complete Font Awesome package and license decleration
- Removed closing ?> tag in required files (customize.php and theme_functions.php) to prevent possible "Header already sent" errors
- Removed Google and WhatsApp social icons
- Added prefix to enqueued styles and scripts in funtions.php
- Replaced JS detection in functions.php with one in js/functions.js
- Removed customize logo setting in favor of native WordPress custom logo support
- Fixed only logo or site-title being displayed
- Removed author url from footer
- Fixed displaying social media wrapper when no social icons are set
- Fixed default header image
- Cleaned up template parts, post formats and image.php
- Replaced custom get_the_archive_title filter with JS solution
- Escaped various user inputs

1.1.1 - 2016.11.06
- Enqueued comment-reply script
- Replaced customized css styles being added to the header with wp_add_inline_style option
- Fixed sticky post icon not showing
- Added editor stylesheet

1.1.2 - 2016.11.23
- Fixed usage of get_the_permalink instead of the_permalink on .post-thumbnail and .read-more in template-parts/loop.php

1.1.3 - 2016.11.30
- Fixed e-mail in header not linked properly

1.1.4 - 2017.05.18
- Updated theme information for author rebranding
- Added table of contents to style.css
- Simplified js/functions.js

1.2.0 - 2018.12.30
- Fixed and improved multiple layout and styling issues
- Improved post formats support
- Updated theme information for author rebranding
- Removed breadcrumbs
- Updated language file
- Added support for the_privacy_policy_link
- Improved editor styles
- Removed jQuery from functions.js
- Added filter for archive titles