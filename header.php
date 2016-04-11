<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Greenr
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">      
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function greenr_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'greenr_render_title' );           
endif;
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>     

<body <?php body_class(); ?>>  
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'greenr' ); ?></a>

	<header id="masthead" class="site-header header-wrap" role="banner">
		<div id="header-top">
			<div class="container">
				<div class="eight columns top-contact">
					<?php if( get_theme_mod( 'contact' ) ) : ?>    
						<p><?php echo esc_html( get_theme_mod( 'contact' ) ); ?></p>
					<?php else: echo '&nbsp;' ?>
					<?php endif; ?>
				</div>
				
				<div class="eight columns">
					<ul class="social top-right">
					<?php if( get_theme_mod( 'social-twitter' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'social-twitter' ) ); ?>" class="fa fa-twitter"></a></li>
					<?php endif; ?>		
					<?php if( get_theme_mod( 'social-facebook' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod('social-facebook' ) ); ?>" class="fa fa-facebook"></a></li>
					<?php endif; ?>
					
					<?php if( get_theme_mod( 'social-google' ) ) : ?>     
						<li><a href="<?php echo esc_attr( get_theme_mod( 'social-google' ) ); ?>" class="fa fa-google-plus"></a></li>
					<?php endif; ?>
					
					<?php if( get_theme_mod('social-linkedin' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'social-linkedin' ) ); ?>" class="fa fa-linkedin"></a></li>
					<?php endif; ?>
					
					<?php if( get_theme_mod( 'social-dribbble' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'social-dribbble') ); ?>" class="fa fa-dribbble"></a></li>
					<?php endif; ?>
					
					<?php if( get_theme_mod( 'social-rss' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'social-rss') ); ?>" class="fa fa-rss"></a></li>
					<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>

		<div id="header-bottom">
			<div class="container">
				<div class="logo site-branding six columns">  
					<?php 
						$logo_title = get_theme_mod( 'site-title' );
						$logo = get_theme_mod( 'custom-logo', '' );
						$tagline = get_theme_mod( 'site-description',true );
					?>
					<?php	if( $logo_title &&  $logo != '' ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>	
					<?php endif; ?>
					
					<?php if( $tagline ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>				
				</div>

				<div class="ten columns">
					<div class="top-right">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle"><?php _e( 'Primary Menu', 'greenr' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
				
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_checkout' )) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
		   <div class="container">
				<div class="sixteen columns breadcrumb">	
					<header class="entry-header">
						<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
					</header><!-- .entry-header -->
					<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'greenr_breadcrumbs' ) ) : ?>
						<div id="breadcrumb" role="navigation">
							<?php woocommerce_breadcrumb(); ?>
						</div>
					<?php endif; ?> 
				</div>
	        </div>
	<?php } 
	endif; ?>

