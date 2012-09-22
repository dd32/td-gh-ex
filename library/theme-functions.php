<?php
if ( ! isset( $content_width ) ) $content_width = asteroid_option('main_width');

// Add <head> Codes
function do_head_codes() {
	echo "\n\n" . '<!-- Asteroid Head -->' . "\n";
	if (!( asteroid_option('favicon') == '' )) echo '<link rel="icon" href="' . asteroid_option('favicon') . '" type="image/x-icon" />' . "\n";
	echo asteroid_option('head_codes') . "\n"; 
	echo '<!-- Asteroid Head End -->' . "\n\n";
}
add_action( 'wp_head', 'do_head_codes' );


// Load CSS for Appearance Settings
function custom_css_layout() {
	$main_width = asteroid_option('main_width');
	$sidebar_width = asteroid_option('sidebar_width');
	$container_width = asteroid_option('sidebar_width');
	
	echo "\n" . '<style type="text/css" media="screen">' . "\n";
	echo '#container {width:' . ( $main_width + $sidebar_width + 30 ) . 'px;}' . "\n";
	echo '#header {height:' . asteroid_option('header_height') . 'px; background-color: #' . asteroid_option('header_bgcolor') . ';}' . "\n";
	echo '#main {width:' . $main_width . 'px; max-width:' . $main_width . 'px; background-color: #' . asteroid_option('main_bgcolor') . ';}' . "\n";
	echo '#sidebar {width:' . $sidebar_width . 'px; background-color: #' . asteroid_option('sidebar_bgcolor') . ';}' . "\n";
	echo '</style>';
}
add_action( 'custom_css_hook', 'custom_css_layout', 600 );


// Load Custom CSS
function custom_css() {
	echo "\n\n" . '<!-- Asteroid Custom CSS -->' . "\n";
	echo '<style type="text/css" media="screen">' . "\n" . asteroid_option('custom_css') . "\n" . '</style>' . "\n";
	echo '<!-- Asteroid Custom CSS End -->' . "\n\n";
}
add_action( 'custom_css_hook', 'custom_css', 990 );


// Load Hooks
function do_hook_body() {
	if (!( asteroid_option('hook_body') == '' )) {
		echo asteroid_option('hook_body');
	}
}
add_action( 'hook_body', 'do_hook_body' );

function do_hook_container() {
	if (!( asteroid_option('hook_container') == '' )) {
		echo asteroid_option('hook_container');
	}
}
add_action( 'hook_container', 'do_hook_container' );

function do_hook_footer_link() {
	if (!( asteroid_option('hook_footer_link') == '' )) {
		echo asteroid_option('hook_footer_link');
	}
}
add_action( 'hook_footer_link', 'do_hook_footer_link' );


function change_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'change_excerpt_length', 900 );


// Remove Wordpress Version in <head>
if ( asteroid_option('remove_wp_version') == 1 ) {
	remove_action( 'wp_head', 'wp_generator' );
}


// Remove rel attribute from the category list. Only for Html5 Validation
function remove_category_list_rel($output){
	$output = str_replace(' rel="category tag"', '', $output);
	return $output;}

add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');