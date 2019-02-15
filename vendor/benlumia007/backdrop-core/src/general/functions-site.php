<?php
/**
 * Backdrop Core (functions-site.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Site;

/**
 * Table of Content
 *
 *  1.0 - General (Display Site Information)
 */
/**
 *  1.0 - General (Display Site Information)
 *
 * @param array $feature output site title/description.
 */
function display( $feature = '' ) {
	if ( 'site-title' === $feature ) {
		$site_title = get_bloginfo( 'name' );
		if ( $site_title ) {
			$site_title = sprintf( '<h1 class="site-title"><a href="%s">%s</a></h1>', esc_url( home_url( '/' ) ), $site_title );
		}
		echo wp_kses_post( $site_title );
	} elseif ( 'site-description' === $feature ) {
		$site_description = get_bloginfo( 'description' );
		if ( $site_description ) {
			$site_description = sprintf( '<h3 class="site-description">%s</h3>', $site_description );
		}
		echo wp_kses_post( $site_description );
	} elseif ( 'site-link' === $feature ) {
		return sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) );
	} elseif ( 'wp-link' === $feature ) {
		return sprintf( '<a href="%s">%s</a>', esc_url( __( 'https://wordpress.org', 'auspicious' ) ), esc_html__( 'WordPress', 'auspicious' ) );
	} elseif ( 'theme-link' === $feature ) {
		$theme_name = wp_get_theme( get_template() );
		$allowed    = array(
			'abbr'    => array( 'title' => true ),
			'acronym' => array( 'title' => true ),
			'code'    => true,
			'em'      => true,
			'strong'  => true,
		);
		return sprintf( '<a href="%s">%s</a>', $theme_name->display( 'ThemeURI' ), wp_kses( $theme_name->display( 'Name' ), $allowed ) );
	}
}
