<?php
if ( ! isset( $content_width ) ) $content_width = asteroid_option('ast_main_width');


// <head> Codes : Scripts, Links, Metas.
function ast_print_head_codes() {
	echo "\n\n" . '<!-- Asteroid Head -->' . "\n";
	
	if (! ( asteroid_option('ast_favicon') == '' ) ) {
		echo '<link rel="icon" href="' . asteroid_option('ast_favicon') . '" type="image/x-icon" />' . "\n";
	}
		echo asteroid_option('ast_head_codes') . "\n";
	
	echo '<!-- Asteroid Head End -->' . "\n\n";
}
add_action( 'wp_head', 'ast_print_head_codes' );


// <head> CSS : Div Widths and BG Color.
function ast_print_layout() {
	$main_x = asteroid_option('ast_main_width');
	$sidebar_x = asteroid_option('ast_sidebar_width');
	
	echo "\n" . '<style type="text/css" media="screen">' . "\n";
	echo '#container {width:' . ( $main_x + $sidebar_x + 30 ) . 'px;}' . "\n";
	echo '#header {height:' . asteroid_option('ast_header_height') . 'px; background-color: #' . asteroid_option('ast_header_bgcolor') . ';}' . "\n";
	echo '#main {width:' . $main_x . 'px; max-width:' . $main_x . 'px; background-color: #' . asteroid_option('ast_main_bgcolor') . ';}' . "\n";
	echo '#sidebar {width:' . $sidebar_x . 'px; background-color: #' . asteroid_option('ast_sidebar_bgcolor') . ';}' . "\n";
	echo '</style>';
}
add_action( 'ast_hook_custom_css', 'ast_print_layout', 600 );


// <head> CSS : Custom CSS
function ast_print_custom_css() {
	echo "\n\n" . '<!-- Asteroid Custom CSS -->' . "\n";
	echo '<style type="text/css" media="screen">' . "\n" . asteroid_option('ast_custom_css') . "\n" . '</style>' . "\n";
	echo '<!-- Asteroid Custom CSS End -->' . "\n\n";
}
add_action( 'ast_hook_custom_css', 'ast_print_custom_css', 990 );


// Remove Wordpress Version in <head>
if ( asteroid_option('ast_remove_wp_version') == 1 ) {
	remove_action( 'wp_head', 'wp_generator' );
}


// Excerpt Length
function ast_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'ast_excerpt_length', 900 );


// Add Footer Links 
function ast_do_hook_footer_links() {
	if (!( asteroid_option('ast_hook_footer_links') == '' )) echo asteroid_option('ast_hook_footer_links');
}
add_action( 'ast_hook_footer_links', 'ast_do_hook_footer_links' );


// Remove rel attribute from the category list. Only for Html5 Validation
function ast_remove_category_rel($output){
	$output = str_replace(' rel="category tag"', '', $output);
	return $output;}

add_filter('wp_list_categories', 'ast_remove_category_rel');
add_filter('the_category', 'ast_remove_category_rel');