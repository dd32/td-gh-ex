<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Benevolent
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
	
	<header id="masthead" class="site-header" role="banner">
        <div class="container">
    	
            <div class="site-branding">
    			<?php
    			if ( get_header_image() ) : ?>
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                	</a>
                <?php else : ?>
    				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    			<?php
    			$description = get_bloginfo( 'description', 'display' );
    			if ( $description || is_customize_preview() ) : ?>
    				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
    			<?php endif; ?>
                
                <?php endif; // End header image check. ?>
    		</div><!-- .site-branding -->
            
            <?php 
                $benevolent_button_text = get_theme_mod( 'benevolent_button_text', __( 'Donate Now', 'benevolent' ) );
                $benevolent_button_url = get_theme_mod( 'benevolent_button_url', __( '#', 'benevolent' ) );
                if( $benevolent_button_url ) echo '<a href="' . esc_url( $benevolent_button_url ). '" class="btn-donate">' . esc_html( $benevolent_button_text ) . '</a>';
            ?>
            
    		<nav id="site-navigation" class="main-navigation" role="navigation">
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    		</nav><!-- #site-navigation -->
            
            <div id="mobile-header">
			    <a id="responsive-menu-button" href="#sidr-main"><?php esc_html_e( 'Menu', 'benevolent' ); ?></a>
			</div>
            
        </div>
    </header><!-- #masthead -->
    
    <?php 
    $benevolent_ed_slider = get_theme_mod( 'benevolent_ed_slider' );
    if( is_front_page() && $benevolent_ed_slider ) do_action( 'benevolent_slider' );
    
    if( !is_page_template( 'template-home.php' ) ) echo '<div class="container">';
    
    //BreadCrumbs
    if( !is_page_template( 'template-home.php' ) && !is_404() ) do_action( 'benevolent_breadcrumbs' ); 
        
   	if( !is_page_template( 'template-home.php' ) ) echo '<div id="content" class="site-content"><div class="row">';