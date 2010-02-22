<?php
/**
 * @package WordPress
 * @subpackage Aggiornare
 */

// Load main options panel file
require_once (TEMPLATEPATH . '/functions/aggiornare-menu.php');

$content_width = 600;

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
register_sidebar(array('name'=>'Home Sidebar',
		'before_widget' => '<li id="%1$s" class="sidebarItem widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<li id="%1$s" class="sidebarItem widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array('name'=>'Footer - Left Column',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Footer - Right Column',
'before_widget' => '<div class="footerWidget">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
}
?>