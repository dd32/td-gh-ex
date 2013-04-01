<?php
/** Load the Core Files */
require_once( trailingslashit( get_template_directory() ) . 'lib/init.php' );
new Chiplife();

/** Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'chiplife_theme_setup' );

/** Theme setup function. */
function chiplife_theme_setup() {
	
	/** Add theme support for Feed Links. */
	add_theme_support( 'automatic-feed-links' );
	
	/** Add theme support for Custom Background. */
	add_theme_support( 'custom-background', array( 'default-color' => 'fafafa' ) );
	
	/** Set content width. */
	chiplife_set_content_width( 580 );
	
}
?>