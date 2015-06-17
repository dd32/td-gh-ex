== Changelog ==

= 1.3 - October 3 2014 =
* Internationalization improvements: remove HTML from strings and reduce number of individual strings.
* Updated screenshot to the 880x660 pixels size.
* Replace usage of get_children() with get_posts().
* Jetpack fixes: use correct hook and add support for responsive videos.
* Minor CSS fixes.
* Add text domain in style.css.
* Fix PHPDoc header in content-aside.php.
* Use correct hook to register widgets.

= 1.2 - May 16 2013 =
* Updated license information.
* Minor style fixes in preparation for 3.6 compat.
* Enqueues scripts and styles via callback.
* Uses a filter to modify the output of wp_title().
* Updated comments in Jetpack compat files to point to live documentation on jetpack.me.

= 1.1 - Nov 5 2012 =
* Fix overly general .attachment img selectors.
* Make sure attribute escaping occurs after printing.
* PNG image compression.
* Remove loading of $locale.php.
* Add Jetpack compatibility file.
* Updated screenshot for HiDPI support.

= 1.0.3 - Oct 4 2011 =
* the_post should always be called in the loop.
* Make sure the current category highlights in the menu.
* Set svn:eol-style on JS and TXT files.
* Fix get_the_author() escaping.
* Move functions from comments.php to functions.php to avoid redeclaration errors.
* Trim whitespace and fix CSS formatting.