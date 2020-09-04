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
	 <?php wp_body_open(); ?> 

<div id="page" class="hfeed site <?php echo boxy_site_style_class(); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'boxy' ); ?></a>
     <?php do_action('boxy_before_header'); ?>
	<header id="masthead" class="site-header  header-image <?php echo boxy_site_style_header_class(); ?>" role="banner">
	<?php if( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" style="position: absolute;" />
	<?php endif; ?>
	<div class="logo-wrapper "><?php
		if ( get_theme_mod ('header_overlay',false ) ) { 
		    echo '<div class="overlay overlay-header"></div>';     
		} ?>
		<div class="container">
			<div class="logo site-branding ten columns">   
				<?php  
						   // $header_text = get_theme_mod( 'header_text' );
							$site_title = get_theme_mod( 'site-title',false );
                            $logo = get_theme_mod( 'custom_logo');	 				
							$tagline = get_theme_mod( 'tagline',true);
							if( $site_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $site_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
						<?php if( $tagline ) : ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif;  
					?>
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
					<button class="menu-toggle"><?php echo apply_filters('boxy_responsive_menu_text' , __('Primary Menu','boxy') ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu' ) ); ?>
				</div>
				<div class="four columns">
					<?php get_search_form(); ?>
				</div>
			<?php } else { ?>
			     <div class="sixteen columns">
					<button class="menu-toggle"><?php echo apply_filters('boxy_responsive_menu_text' , __('Primary Menu','boxy') ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu' ) ); ?>
				</div>
			<?php } ?>
			<?php do_action('boxy_after_primary_nav'); ?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
	<?php do_action('boxy_after_header'); ?> 

	
	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_chechout' ) ) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
	    <div class="breadcrumb-wrap">  
			<div class="container">
				<div class="ten columns">
					<header class="entry-header">
						<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
					</header><!-- .entry-header -->			
				</div>
				<div class="six columns breadcrumb">
					<?php
					$breadcrumb = get_theme_mod( 'breadcrumb',true );
						if( $breadcrumb ) : ?>
						<?php woocommerce_breadcrumb(); ?>
					<?php endif; ?>
				</div>		
			</div>
        </div>	
	<?php } 
	endif; ?>

	

