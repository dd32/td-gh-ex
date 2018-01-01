<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bcorporate' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="headerwrap">
			<div class="container-fluid">
				<div class="row">
					
					<div class="site-branding col-8 col-sm-4 col-lg-6">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><sub><?php echo $description; /* WPCS: xss ok. */ ?></sub></p>
						<?php
						endif; ?>
					</div><!-- .site-branding -->
							
					<nav id="site-navigation" class="main-navigation col-4 col-sm-8 col-lg-6 text-sm-left text-md-right">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bcorporate' ); ?>
							<div class="burger-menu">
								<span></span>
								<span></span>
								<span></span>
							</div>

						</button>

						<?php if ( has_nav_menu( 'header_menu' ) ) : ?>
									
						    <?php
							    wp_nav_menu(
								    array(
									    'theme_location' => 'header_menu',
									    'container'      => false,
									    'menu_id'        => 'primary-menu',
									    'menu_class'     => 'header-menu',
									    'depth'          => '4',
								    )
							    );
						    ?>
							
							<?php else : ?>
							
							<ul id="nav">
								<?php wp_list_pages( 'title_li=&depth=1' ); ?>
							</ul>
							
						<?php endif; ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>	
		</div>
		