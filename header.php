<?php
	/**
	 *    The template for displaying the header.
	 *
	 * @package    WordPress
	 * @subpackage asterion
	 */
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	$intro_image = get_theme_mod( 'asterion_intro_image', get_template_directory_uri() . '/images/bg.jpg' );

	if ( get_theme_mod('asterion_intro_image_parallax') ) {
		$parallax_class = " intro-parallax"; 
	} else { 
		$parallax_class = false; 
	}

	if ( get_theme_mod('asterion_intro_image_overlay') ) {
		$overlay_class = " dark-overlay"; 
	} else { 
		$overlay_class = false; 
	}

	$intro_image_show = get_theme_mod( 'asterion_intro_image_show', true );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<header id="header" class="<?php echo esc_attr( ( is_front_page() ) ? 'intro-image': 'intro-blog' ); ?> <?php echo esc_attr( $parallax_class ); ?>" style="background-image: url(' <?php echo esc_url( ( is_front_page() ) ? $intro_image : ( ! get_header_image() ) ? $intro_image : get_header_image() ); ?>');">

			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display --> 
					<div class="navbar-header"> 
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
							<span class="sr-only">
								<?php esc_html_e("Toggle navigation", 'asterion');?>
							</span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
						</button>

						<?php
							// Try to retrieve the Custom Logo
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
							// Display the site's name
						?>
								<h1>
									<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home">
										<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
									</a>
								</h1>

								<?php if( get_bloginfo('description') ) : ?>
									<div class="description">
										<?php echo esc_attr( get_bloginfo('description') );?>
									</div>
							<?php endif;?>
						<?php endif;?>
					</div> 


					<?php 
						/* display the WordPress Main Menu if available */
						if ( has_nav_menu( 'main-menu' ) ) : 
							$args =	array(
										'menu'              => 'main-menu',
										'theme_location'    => 'main-menu',
										'depth'             => 2,
										'container'         => 'div',
										'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
										'menu_class'        => 'nav navbar-nav navbar-right',
										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
										'walker'            => new wp_bootstrap_navwalker()
									);

							wp_nav_menu($args);

						endif;
					?>
				</div>
			</nav>
			
			
			<div class="slider-container<?php echo esc_attr( $overlay_class ); ?>">
				<?php if( is_front_page() && $intro_image_show ) : ?>
					<?php get_template_part( 'sections/intro-image' ); ?>
				<?php endif; ?>
			</div>
			
		</header>

		<div id="content" class="site-content">