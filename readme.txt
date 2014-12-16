== Naya Lite ==

Theme Name: Naya Lite
Theme URI: http://sampression.com/themes/naya-lite
Author: Sampression
Author URI: http://www.sampression.com

Version: 1.0.11
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

All files, unless otherwise stated, are released under the GNU General Public License version 2.0 (http://www.gnu.org/licenses/gpl-2.0.html)

== Bundled Files ==

1. modernizr jQuery file
 = Item URL: http://modernizr.com
 = Licence: MIT
 = Licence URI: http://opensource.org/licenses/mit-license.html
 
2. selectivizr jQuery file
 = Item URL: http://selectivizr.com
 = Licence: MIT
 = Licence URI: http://opensource.org/licenses/mit-license.html
 
3. Fonts
 = Item URL: http://icomoon.io
 = Licence: GPL
 = Licence GPL: http://www.gnu.org/licenses/gpl.html

4. mousewheel jquery file
 = Item URL: https://github.com/brandonaaron/jquery-mousewheel
 = Licence: MIT
 = Licence URI: http://opensource.org/licenses/mit-license.html

5. codemirror jquery file
 = Item URL: http://codemirror.net/
 = Licence: MIT
 = Licence URI: http://opensource.org/licenses/mit-license.html

5. jScrollPane jquery file
 = Item URL: http://jscrollpane.kelvinluck.com/
 = Licence: GPL
 = Licence GPL: http://www.gnu.org/licenses/gpl.html
 
== Theme Description ==
Naya Lite is a minimal responsive blogging theme. While its design is basic and it manages to strictly stick to the idea of a good old fashioned blog, its features emphasize on being more modern and state-of-the-art. Naya Lite’s design will take your web presence back to the early days of blogging while its functionality will make sure you reach out to your current audiences and their multiple internet devices. Being both responsive and retina-ready while still maintaining the look of a classic blog, Naya Lite perfectly manages to combine the past and future of blog design.

== Features ==
Responsive design, Theme Options, Custom Logo/Fav Icons/Apple Touch Icons, Custom Menu, Sticky Post, W3C validated, supports social media, supports webmaster tools, post formats

== Tags ==
Tags: white, black, green, one-column, two-columns, responsive-layout, custom-menu, featured-image-header, featured-images, post-formats, sticky-post, theme-options, threaded-comments, right-sidebar, custom-background, custom-header


== Installation ==

1. Primary:
 = Login to your wp-admin account and go to Appearance -> Themes.
 = Select "Install" tab and click on the "Upload" link.
 = Select "theme .zip" and click on "Install Now" button.
 = In case of errors, use an alternate method.

2. Alternate:
 = Unzip the template file (naya-lite.zip) that you have downloaded.
 = Upload the entire folder (naya-lite) to your server via FTP and place it in the /wp-content/themes/ folder.
 = Do not change the directory name.
 = The template files should be there now: /wp-content/themes/naya-lite/index.php (example).

3. Log into your WP admin panel and click on "Appearance". Go to "Themes" tab.
4. Now click on naya-lite" to activate the theme.
5. Complete all of the required inputs in the sampression page (in the WP admin panel) and click "Save".

6. Change Logo and Favicon:
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Logo & Icons" Tab.
 = Upload the logo, favicon and different sizes of apple touch icons that you require.
 = Select for either Logo or website title to show.
 = Change font-family, font-size, font-style and color for website title and description.

7. Styling
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Styling" Tab
 = Here you can select whether to show the right sidebar or not on the site.
 = You can also change the sidebar settings for the specific post/page that is available below the editor of the post.

8. Typography
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Typography" Tab
 = Here you can change the font-family and font-size of general text or that of post and page.
 = To change font-size and font-family for general body text select General menu on the top beside typography title.
 = Similarly for the page and post select Post/Pages menu.

9. Social Media:
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Social Media" tab
 = Here you can add your Facebook, Twitter, Youtube and Linkedin id which appears at the top right of the site.

10. Custom CSS
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Custom CSS" Tab
 = Here you can add your own custom css to overwrite the default css of the theme.

11. Blog
 = Login to your wp-admin area and go to Appearance -> Sampression.
 = Select "Blog" Tab
 = Here you select the meta values to show on the blog page and also hide the posts from any specific category from the blog page.
 = You can also write your own text as "read more" text that links to the single post.

9. Copyright & License
 = Naya Lite, Copyright 2014 Sampression.com
 = Naya Lite is distributed under the terms of the GNU GPL.

== Changelog ==
Version 1.0.11
 = Fixed: Some CSS issues

Version 1.0.10
 = Fixed: Audio player responsive css
 = Fixed: Some CSS issues

 = Removed: Sticky Post background color
 = Removed: SAM_FW_TIMTHUMB_DIR - Directory Location Constant
 = Removed: SAM_FW_WIDGETS_DIR - Directory Location Constant
 = Removed: SAM_FW_WIDGET_TPL_PART_DIR -  Template Part Constants
 = Removed: SAM_FW_TIMTHUMB_URL - URL Location Constant
 = Removed: SAM_FW_WIDGETS_URL - URL Location Constant

 = Added: Script for do not submit search form if empty
 = Added: Open social media link on new tab
 = Added: SAM_NAYA_LITE_VERSION - Constant in init

 = Changed: Link of community forum on theme option page
 = Changed: screenshot.png

Version 1.0.9
 = Added some action hooks on header and footer.
 = Removed unwanted PHP funtions
 = Replaced deprecated live jQuery function by on function

Version 1.0.8
 = style.css enqueued from function instead of header
 = Added more options to add social medias : Google Plus, Vimeo and Flickr

Version 1.0.7
 = Error occured while editing post fixed 

Version 1.0.6
 = Theme option datas are now saved in a single array.
  
Version 1.0.5
 = home_url() escaped with esc_url() 
 = data sanitazation, validation and escape fuctions used
 = PHP fixes for sidebar
 = CSS fixes for table font size

Version 1.0.4
 = get_stylesheet_uri() used instead of bloginfo() function for main stylesheet url.
 = google font path fixed
 = added prefix on userdefined functions
 = Escape functions added
 = home_url function added to output home page url
 = fonts with gpl license used
 = hooks sections removed that provided theme options for arbitrary header/footer scripts.

Version 1.0.3
 = Removed: <meta> description and author removed from header.php 
 = Removed: Dashboard widgets removed 
 = Fixed: wp_title filter used for title tag
 = Fixed: Google fonts enqueued without the protocol (http:). 
 = Fixed: Favicon icons disable by default
 = Fixed: admin_print_scripts and admin_print_styles changed to admin_enqueue_scripts 
 = Fixed: scripts and styles files enqueued directly without registering
 = Fixed: output of data by using escape function
 = Fixed: used ‘theme_location’ parameter instead of ‘menu’ in wp_nav_menu
 = Fixed: register_nav_menu(), add_theme_support, add_image_size, add_nav_menu, register_nav_menus and load_theme_textdomain hooked into after_setup_theme action. 


Version 1.0.2
 = Added: License information added on readme.txt file of bundled js files and icons.

Version 1.0.1
 = Fixed: Non-printable characters were replaced by web save special characters.
 = Fixed: Enqueued comment-reply script.
 = Fixed: wp_head() template tag placed immediately before the closing HTML head tag. 
 = Fixed: wp_footer() template tag placed immediately before the closing HTML body tag. 
 = Fixed: manage_options replaced by be edit_theme_options on setting page.
 = Fixed: Read more text field validated.
 = Fixed: sampression_right_sidebar() replaced by get_sidebar() function.
 
 = Added: Function for custom header preview on admin panel.

== Child Theme Support ===
 Naya Lite supports child themes. Please use child themes for customization of Naya Lite". For further reading: http://codex.wordpress.org/Child_Themes.
	