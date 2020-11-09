<?php
/**
 * The header for our theme 
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Asthir
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'asthir' ); ?></a>
	
	<?php 
		$asthir_dheader_text = get_theme_mod( 'display_header_text', 1 );
		if($asthir_dheader_text):
	?>
	<?php 
	$asthir_topbar_show = get_theme_mod( 'asthir_topbar_show', 1 );
	if($asthir_topbar_show){
		do_action( 'asthir_header_top_display' );
	} 

	?>
	<header id="masthead" class="asthir-header site-header">
		<?php if(has_header_image()): ?>
		<div class="site-branding has-himg text-center <?php if($asthir_dheader_text && has_custom_logo()): ?>asthir-two-logo<?php endif; ?>">
			<div class="asthir-header-img">
				<?php the_header_image_tag(); ?>
			</div>
		<?php else: ?>
		<div class="site-branding text-center">
		<?php endif; ?>
			<div class="headerlogo-text">
			<div class="container pb-5 pt-5">
				<div class="asthir-logotext">
					<?php the_custom_logo(); ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					$asthir_description = get_bloginfo( 'description', 'display' );
					if ( $asthir_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $asthir_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>	
			<?php endif; ?>	
				</div>
			</div>
			</div>
		</div><!-- .site-branding -->
		<div class="asthir-main-nav bg-dark text-white">
			<div class="container">
				<nav id="site-navigation" class="main-navigation text-center">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="mshow"><?php esc_html_e( 'Menu', 'asthir' ); ?></span><span class="mhide"><?php esc_html_e( 'Close Menu', 'asthir' ); ?></span></button>
					<?php
					if ( has_nav_menu( 'menu-1' ) ) {

						wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'walker'        => new Asthir_Walker_Nav_Menu(),
						)
						);

					} elseif ( ! has_nav_menu( 'expanded' ) ) { ?>
					<ul id="primary-menu" class="menu nav-menu">
					<?php
						wp_list_pages(
							array(
								'match_menu_classes' => true,
								'show_sub_menu_icons' => true,
								'title_li' => false,
								'walker'   => new Asthir_Walker_Page(),
							)
						);
						?>
					</ul>
					<?php

					}
					
					?>
					<button class="screen-reader-text mmenu-hide"><?php esc_html_e( 'Close Menu', 'asthir' ); ?></button>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->