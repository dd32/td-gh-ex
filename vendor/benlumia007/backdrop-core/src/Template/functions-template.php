<?php //phpcs:ignore
/**
 * Backdrop Core ( functions-template.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019-2020. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Template;

/**
 * Outputs the site title HTML.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function get_template_part( $slug, $name = '' ) {
	do_action( "get_template_part_{$slug}", $slug, $name );

	$templates = [];

	if ( $name ) {
		$templates[] = "public/views/{$slug}-{$name}.php";
		$templates[] = "public/views/{$slug}/{$name}.php";
	}

	$templates[] = "public/views/{$slug}.php";
	$templates[] = "public/views/{$slug}/{$slug}.php";

	$templates = apply_filters( "backdrop_{$slug}_template_hierarchy", $templates, $name );
	$template  = apply_filters( "hybrid_{$slug}_template", locate_template( $templates ), $name );

	if ( $template ) {
		include( $template ); // phpcs:ignore
	}

}
