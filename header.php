<?php
/**
 * Header Template Part
 *
 * Template part file that contains the HTML document head and opening HTML
 * body elements as well as the site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aamla
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js no-svg" <?php language_attributes(); ?>>

<head<?php aamla_attr( 'head', false ); ?>>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>

</head>

<body<?php aamla_attr( 'body', false ); ?> <?php body_class(); ?>>

	<header id="masthead"<?php aamla_attr( 'site-header' ); ?>>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aamla' ); ?></a>

		<?php
		/**
		 * Fires inside site header after skip-link.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_inside_header', 'inside_header' );
		?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Fires immediately after closing of header tag.
	 *
	 * @since 1.0.0
	 */
	do_action( 'aamla_after_header', 'after_header' );
	?>

	<div id="content"<?php aamla_attr( 'site-content' ); ?>>

		<?php
		/**
		 * Fires immediately after opening of main site content tag.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aamla_on_top_of_site_content', 'on_top_of_site_content' );?>
