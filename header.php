<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Root
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="ak-container">
			<div id="site-branding">
			<?php if(of_get_option('logo')) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt="accesspress-root"/> </a> 
			<?php else: ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>	
			</div><!-- .site-branding -->

			<div class="right-header">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="menu-toggle"><?php _e( 'Menu', 'accesspress-root' ); ?></a>
					<?php wp_nav_menu( array( 
					'theme_location' => 'primary',
					'container'       => '', 
					) ); ?>
				</nav><!-- #site-navigation -->

				<div class="search-icon">
					<a href="javascript:void(0)"><i class="fa fa-search"></i></a>

					<div class="search-box">
						<div class="close"> &times; </div>
						<?php get_search_form(); ?>
					</div>
				</div> <!--  search-icon-->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<?php 
	if(is_home() || is_front_page()) :
		do_action('accesspress_bxslider'); 
	endif;
	?>
