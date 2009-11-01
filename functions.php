<?php

// Load Language:
Load_Theme_Textdomain( 'theme' );

// Add options:
Include TEMPLATEPATH.'/theme_options/options.php';

// Load Theme functions and Hooks
Include TEMPLATEPATH.'/theme_functions/theme_functions.php';

// Settings:
Function Get_Theme_Setting($key){ Global $_THEME_SETTINGS; return $_THEME_SETTINGS->LoadSetting($key); }

// Register Sidebars:
Include TEMPLATEPATH.'/theme_functions/register_sidebars.php';
                 
// Include Plugins & Widgets
Include TEMPLATEPATH.'/plugin_associate_posts_and_pages/plugin_associate_posts_and_pages.php';

// Galleryfilter
If (!Get_Theme_Setting('no_gallery_cleaning')) Include TEMPLATEPATH.'/plugin_rewrite_clean_gallery_code/plugin_rewrite_clean_gallery_code.php';

// Next-Page-Tag bug Fix
If (!Get_Theme_Setting('no_next_page_bug_fix')) Include TEMPLATEPATH.'/plugin_next_page_paragraph_tag_fix/plugin_next_page_paragraph_tag_fix.php';

// RSS Widget
Include TEMPLATEPATH.'/widget_theme_feed_link/widget_theme_feed_link.php';

// Author Widget
Include TEMPLATEPATH.'/widget_theme_author_info/widget_theme_author_info.php';

// Featured posts Widget
Include TEMPLATEPATH.'/widget_theme_featured_posts/widget_theme_featured_posts.php';

// Open external links in new window
If (Get_Theme_Setting('external_links')) Include TEMPLATEPATH.'/plugin_open_external_links_in_new_window/plugin_open_external_links_in_new_window.php';

// Fancybox for linked images
If (Get_Theme_Setting('imagebox')) Include TEMPLATEPATH.'/plugin_fancy_image_box/plugin_fancy_image_box.php';

// Remove meta tag "generator"
If (Get_Theme_Setting('kick_meta_generator')) Include TEMPLATEPATH.'/plugin_remove_meta_tag_generator/plugin_remove_meta_tag_generator.php';


/* End of File */