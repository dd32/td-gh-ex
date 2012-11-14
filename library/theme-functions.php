<?php
if ( ! isset( $content_width ) ) {
	$content_width = asteroid_option('ast_content_width');
}

/*-------------------------------------
	Favicon + <HEAD> Contents
--------------------------------------*/
function ast_print_head_codes() {
	echo "\n\n" . '<!-- Asteroid Head -->' . "\n";
	
	if (! ( asteroid_option('ast_favicon') == '' ) ) {
		echo '<link rel="icon" href="' . asteroid_option('ast_favicon') . '" type="image/x-icon" />' . "\n";
	}
		echo asteroid_option('ast_head_codes') . "\n";
	
	echo '<!-- Asteroid Head End -->' . "\n\n";
}
add_action( 'wp_head', 'ast_print_head_codes' );


/*-------------------------------------
	Header Background
--------------------------------------*/
function ast_header_image() {
	if (!( get_header_image() == '' )) {
		echo '<style type="text/css" media="screen">' . "\n";
		echo '#header {' . "\n";
		echo 'background-image: url(' . get_header_image() . ');' . "\n"; 
		echo 'background-size: ' . get_custom_header()->width . 'px ' . get_custom_header()->height . 'px;' . "\n";
		echo '}' . "\n";
		echo '</style>' . "\n\n";
	}
}
add_action( 'wp_head', 'ast_header_image' );


/*-------------------------------------
	Header Text Color
--------------------------------------*/
function ast_header_text_color() {
	if (!( get_header_textcolor() == 'FFA900' )){
		echo '<style type="text/css" media="screen">' . "\n";
		echo '#site-title a, #site-description {color:#' . get_header_textcolor() . ';}' . "\n";
		echo '</style>' . "\n";
	}
}
add_action( 'wp_head', 'ast_header_text_color' );


/*-------------------------------------
	Container Widths and BG Colors
--------------------------------------*/
function ast_print_layout() {
	$content_x = asteroid_option('ast_content_width');
	$sidebar_x = asteroid_option('ast_sidebar_width');
	
	echo "\n" . '<style type="text/css" media="screen">' . "\n";
	echo '#container {width:' . ( $content_x + $sidebar_x + 30 ) . 'px;}' . "\n";
	echo '#header {min-height:' . asteroid_option('ast_header_height') . 'px; background-color: #' . asteroid_option('ast_header_bgcolor') . ';}' . "\n";
	echo '#content {width:' . $content_x . 'px; max-width:' . $content_x . 'px; background-color: #' . asteroid_option('ast_content_bgcolor') . ';}' . "\n";
	echo '#sidebar {width:' . $sidebar_x . 'px; max-width:' . $sidebar_x . 'px; background-color: #' . asteroid_option('ast_sidebar_bgcolor') . ';}' . "\n";
	echo '</style>';
}
add_action( 'wp_head', 'ast_print_layout', 600 );


/*-------------------------------------
	Custom CSS
--------------------------------------*/
function ast_print_custom_css() {
	echo "\n\n" . '<!-- Asteroid Custom CSS -->' . "\n";
	echo '<style type="text/css" media="screen">' . "\n" . asteroid_option('ast_custom_css') . "\n" . '</style>' . "\n";
	echo '<!-- Asteroid Custom CSS End -->' . "\n\n";
}
add_action( 'wp_head', 'ast_print_custom_css', 990 );


/*-------------------------------------
	Remove WordPress Generator
--------------------------------------*/
if ( asteroid_option('ast_remove_wp_version') == 1 ) {
	remove_action( 'wp_head', 'wp_generator' );
}


/*-------------------------------------
	Excerpt Length
--------------------------------------*/
function ast_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'ast_excerpt_length' );


/*-------------------------------------
	Footer Links
--------------------------------------*/
function ast_do_hook_footer_links() {
	if (!( asteroid_option('ast_hook_footer_links') == '' )) echo asteroid_option('ast_hook_footer_links');
}
add_action( 'ast_hook_footer_links', 'ast_do_hook_footer_links' );


/*-------------------------------------
	Remove rel attr from category
	HTML5 Validation
--------------------------------------*/
function ast_remove_category_rel($output){
	$output = str_replace(' rel="category tag"', '', $output);
	return $output;}

add_filter('wp_list_categories', 'ast_remove_category_rel');
add_filter('the_category', 'ast_remove_category_rel');