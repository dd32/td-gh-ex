<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package BOXY
 */
global $boxy;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function boxy_render_title() { 
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'boxy_render_title' );
endif;
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'boxy' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<?php if( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" style="position: absolute;" />
	<?php endif; ?>
	<div class="logo-wrapper">
		<div class="container">
			<div class="logo site-branding ten columns">
				<?php $logo_title = get_theme_mod( 'site-title' );
				$logo = get_theme_mod( 'custom-logo', '' );
				$tagline = get_theme_mod( 'site-description' ); ?>
					<?php if( $logo_title &&  $logo != '' ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" alt="logo" ></a>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
						<?php if( $tagline ) : ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
			</div>
			<div class="six columns">
				<div class="top-right">
					<?php dynamic_sidebar( 'header-top-right' ); ?>     
				</div>					
			</div>
		</div>
	</div>

		<nav id="site-navigation" class="main-navigation nav-wrap" role="navigation">
			<div class="container">
			<?php if ( get_theme_mod ('header_search',true) ){  ?>
				<div class="twelve columns">
					<button class="menu-toggle"><?php _e( 'Primary Menu', 'boxy' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu' ) ); ?>
				</div>
				<div class="four columns">
					<?php get_search_form(); ?>
				</div>
			<?php } else { ?>
			     <div class="sixteen columns">
					<button class="menu-toggle"><?php _e( 'Primary Menu', 'boxy' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu' ) ); ?>
				</div>
			<?php } ?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

