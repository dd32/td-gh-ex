<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "body-content-wrapper" div.
 *
 * @package WordPress
 * @subpackage fmuzz
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			<header id="header-main">
				<div id="header-content-wrapper">
					<div id="header-top">
						<?php fmuzz_show_header_top(); ?>
					</div><!-- #header-top -->
					<div id="header-logo">
						<?php fmuzz_show_website_logo_image_or_title(); ?>
					</div><!-- #header-logo -->
					<nav id="navmain">
						<?php wp_nav_menu( array( 'container_class' => 'menu-all-pages-container',
											      'menu_class' => 'menu',
											      'theme_location' => 'primary',
												) ); ?>
					</nav><!-- #navmain -->
					
					<div class="clear">
					</div>
				</div><!-- #header-content-wrapper -->
			</header><!-- #header-main -->
