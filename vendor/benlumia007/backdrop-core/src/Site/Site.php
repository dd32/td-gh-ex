<?php //phpcs:ignore
/**
 * Backdrop Core ( framework.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Site;

use Benlumia007\Backdrop\Contracts\Displayable;
use Benlumia007\Backdrop\Contracts\Renderable;

/**
 * Site extends SiteContract
 */
class Site implements Displayable, Renderable {
	/**
	 * Display display( $args = '' );
	 *
	 * @since 1.0.0
	 * @access public
	 * @param string $args output site information.
	 */
	public static function display( $args = '' ) {
		if ( 'site-title' === $args ) {
			$args = wp_parse_args(
				$args,
				[
					'tags'  => 'h1',
					'class' => 'site-title',
				]
			);

			$html = '';

			$title = get_bloginfo( 'name', 'display' );

			if ( $title ) {
				$link = home_link(
					[
						'text'  => $title,
						'class' => $args['class'],
					]
				);

				$html = printf(
					'<%1$s class="%2$s">%3$s</a>',
					tag_escape( $args['tags'] ),
					esc_attr( $args['class'] ),
					$link // phpcs:ignore
				);
			}
			return apply_filters( 'backdrop_site_title', $html );
		} elseif ( 'site-description' === $args ) {
			$args = wp_parse_args(
				$args,
				[
					'tag'   => 'h3',
					'class' => 'site-description',
				]
			);

			$html = '';

			$description = get_bloginfo( 'description' );
			if ( $description ) {
				$html = printf(
					'<%1$s class="%2$s">%3$s</%1$s>',
					tag_escape( $args['tag'] ),
					esc_attr( $args['class'] ),
					$description // phpcs:ignore
				);
			}
			return apply_filters( 'backdrop_site_description', $html );
		}
	}

	/**
	 * Renders display
	 *
	 * @since 1.0.0
	 * @access public
	 * @param string $args output site information.
	 */
	public static function render( $args = '' ) {
		if ( 'site-link' === $args ) {
			$args = wp_parse_args(
				$args,
				[
					'text'   => '%s',
					'class'  => 'site-link',
					'before' => '',
					'after'  => '',
				]
			);
			$html = sprintf(
				'<a class="%1$s" href="%2$s">%3$s</a>',
				esc_attr( $args['class'] ),
				esc_url( home_url( '/' ) ),
				sprintf( $args['text'], get_bloginfo( 'name' ) )
			);
			return apply_filters( 'backdrop_site_link', $html );
		} elseif ( 'wp-link' === $args ) {
			$args = wp_parse_args(
				$args,
				[
					'text'   => '%s',
					'class'  => 'wp-link',
					'before' => '',
					'after'  => '',
				]
			);
			$html = sprintf(
				'<a class="%1$s" href="%2$s">%3$s</a>',
				esc_attr( $args['class'] ),
				esc_url( __( 'https://wordpress.org', 'backdrop-core' ) ),
				sprintf( $args['text'], esc_html__( 'WordPress', 'backdrop-core' ) )
			);
			return apply_filters( 'backdrop_wp_link', $html );
		} elseif ( 'theme-link' === $args ) {
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
}

/**
 * Renders home_link();
 *
 * @since 1.0.0
 * @param array $args outputs home_link for site title.
 */
function home_link( array $args = [] ) {
	$args = wp_parse_args(
		$args,
		[
			'text'   => '%s',
			'before' => '',
			'after'  => '',
		]
	);
	$html = sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url( home_url( '/' ) ),
		sprintf( $args['text'], get_bloginfo( 'name' ) )
	);
	return apply_filters(
		'backdrop_home_link',
		$args['before'] . $html . $args['after']
	);
}
