<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package app_Landing_Page
 */

$app_landing_page_ed_breadcrumb = get_theme_mod( 'app_landing_page_ed_breadcrumb' );

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
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'app-landing-page' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
	  <div class="container">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<!-- main-navigation of the site -->
		<div id="mobile-header">
		    <a id="responsive-menu-button" href="#sidr-main"><span class="fa fa-navicon"></span></a>
		</div>		

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'app-landing-page' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	  </div>
	</header><!-- #masthead -->
<?php if( !is_page_template( 'template-home.php' ) ){ ?>
	<div id="content" class="site-content">
			<div class="container">
				<?php } ?>
			  <?php if( is_search() ) { ?>
				<div class="top-bar">
					<div class="page-header">
						<h1 class="page-title"><?php $count = $wp_query->post_count; echo $count; wp_reset_query(); ?><?php printf( esc_html__( ' Search Results for "%s"', 'app-landing-page' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</div>
				</div>
			  <?php } ?>
			  <?php if( is_404() ) { ?>
			  	<div class="top-bar">
					<div class="page-header">
						<h1 class="page-title"><?php  esc_html_e( '404 - Page Not Found ' ,'app-landing-page' ); ?></h1>
					</div>
				</div>
			</div>
				<div class="error-page">
					<div class="container">
			  <?php } ?>

			  <?php if ( is_single() ) { ?>
				<div class="top-bar">
					<?php do_action( 'app_landing_page_breadcrumbs' ); ?>
				</div>
			  <?php } ?>

			  <?php 
   				if( !is_page_template( 'template-home.php' ) && !is_404() && !is_home() && !is_search() ) { 
   					
					if( $app_landing_page_ed_breadcrumb ){
   			 ?>
					<div class="breadcrumbs">
						<div class="container">
							<?php do_action( 'app_landing_page_breadcrumbs' ); ?>
						</div>
					</div>
   				<?php } ?>
			<?php } ?>

	
			   
