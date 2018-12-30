# WP Theme Boilerplate

A quick starting point for developing WordPress themes

## License

WP Theme Boilerplate, Copyright (C) 2019, Kniffen<br>
WP Theme Boilerplate is distributed under the terms of the GNU GPL v3<br>
<br>
This program is free software: you can redistribute it and/or modify<br>
it under the terms of the GNU General Public License as published by<br>
the Free Software Foundation, either version 3 of the License, or<br>
(at your option) any later version.

This program is distributed in the hope that it will be useful,<br>
but WITHOUT ANY WARRANTY; without even the implied warranty of<br>
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the<br>
GNU General Public License for more details.

-----------------------------------------------------------------------------

## Libraries

normalize.css v8.0.0<br>
License: MIT<br>
Source: github.com/necolas/normalize.css

-----------------------------------------------------------------------------

## Fonts

Open Sans<br>
https://fonts.google.com/specimen/Open+Sans<br>
License: Apache License, Version 2.0 (http://www.apache.org/licenses/LICENSE-2.0)

-----------------------------------------------------------------------------

## Changelog

0.0.0 - 2018.11.27
- Initial release

0.0.1 - 2018.11.28
- Fixed read-more filter
- Added line-height to widget list items
- Added prefix to variables in various post-format content files
- Added missing closing tags on .entry-header in template-parts/content-status.php
- Moved closing tag on .entry-header inside if statement in template-parts/content-aside.php
- Improved styling for various post-formats
- Added fallback on missing titles in template-parts/entry-header.php

0.1.0 - 2018.12.06
- Changed default theme details
- Removed prefixes from archive titles
- Fixed table overflow on small screens
- Fixed word wrapping in pre elements
- Improved post-navigation responsiveness
- Changed margin of various content elements
- Changed default gallery columns amount
- Fixed missing default background color
- Improved scroll-to-top look
- Fixed post-password wrapping
- Clean up various post formats
- Fixed header image description text
- Added 3 more image sizes (300x300, 400x400, 500x500)
- Added editor-styles to Gutenberg

0.1.1 - 2018.12.14
- Cleaned up code comments
- Fixed .read-more-link name in _content.scss
- Fixed code tag text color and padding
- Added margin to the bottom of address elements
- Improved styling of ins elements
- Fixed floating .wp-caption elements bleeding into each other
- Fixed pot task in glupfile.js locking up during errors
- Cleaned up post formats styles
- Improved .comment-meta styles
- Improved RTL styles
- Removed Big and Normal image sizes
- Removed --spacing variable from stylesheet

0.1.2 - 2018.12.14
- Added version paramater to stylesheet URI
- Moved Boilerplate info over to README.md

0.2.0 - 2018.12.17
- Fixed sidebar detection
- Fixed styling of blockquote element in .format-quote
- Adjusted stylesheet load order
- Added releases folder to .gitignore
- Fixed spacing on footer text
- Added filter for archive titles
- Added post-thumbnail to pages
- Added styling of quotes
- Improved categories and tags logic
- Improved header menu styles
- Added image.php file
- Added image dimensions to entry meta
- Added post format to entry meta
- Improved nav-links styling
- Removed table styling from editor styles
- Fixed issues in the RTL stylesheet

0.2.1 - 2018.12.21
- Added highlight color variable
- Improved entry-meta for categories
- Improved styles for content containers
- Added styles for gallery captions
- Removed comments title if there are 0 comments
- Added "scroll to top" setting
- Improved editor styles

0.3.0 - 2018.12.26
- Updated year of copyright
- Reorganized stylesheets
- Changed archive.php to display excerpts instead of content
- Moved the_privacy_policy_link
- Improved template parts structure
- Changed name and ID of sidebar
- Added support for block styles
- Added support for responsive embeds
- Added support for wide alignment

0.3.1 - 2018.12.29
- Added .entry-content container in page.php
- Improved responsiveness of .nav-links
- Fixed class name of tags in entry footer