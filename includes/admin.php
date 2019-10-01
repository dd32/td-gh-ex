<?php

/**
 * Replace parent theme admin page with child theme page to use appropriate theme labelling
 */
function arcanum_replace_admin_page() {
	remove_action( 'admin_menu', 'esotera_add_page_fn' );
} // arcanum_replace_admin_page()
add_action( 'init', 'arcanum_replace_admin_page', 11 );

function arcanum_add_page_fn() {
	global $esotera_page;
	$esotera_page = add_theme_page( __( 'Arcanum Theme', 'arcanum' ), __( 'Arcanum Theme', 'arcanum' ), 'edit_theme_options', 'about-arcanum-theme', 'esotera_page_fn' );
	add_action( 'admin_enqueue_scripts', 'esotera_admin_scripts' );
} // arcanum_add_page_fn()
add_action( 'admin_menu', 'arcanum_add_page_fn' );

/**
 * Add child theme version to admin page
 */
function arcanum_admin_version_output( $parent ) {
	$theme = wp_get_theme();
	$name = $theme->get( 'Name' );
	$version = $theme->get( 'Version' );

	return sprintf( __( '<em>%1$s v%2$s</em> &ndash; a child theme of %3$s', 'arcanum' ), $theme, $version, $parent );
} // arcanum_admin_version_output()
// this filter is applied in arcanum_setup()

/**
 * Extend description to reference the use of the child theme
 */
function arcanum_custom_description( $description ) {
	// Child theme
	$theme = wp_get_theme();
	$template = esc_attr( $theme->get( 'Template' ) );
	$name = esc_attr( $theme->get( 'Name' ) );

	// Parent theme
	$template_theme = wp_get_theme( $template );
	$template_desc = $template_theme->get( 'Description');

	$output = '<h3>' . sprintf( esc_attr__( '%1$s is a child theme of %2$s', 'arcanum' ), $name,  ucfirst( $template ) ) . '</h3>';

	return  $output . $description . '<br><br><hr><br><em>' . $template_desc . '</em>';
} // arcanum_custom_description()
// this filter is added in arcanum_setup()


// FIN
