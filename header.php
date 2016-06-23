<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beka
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
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'beka' ); ?></a>

    <?php 
        $header_text = get_theme_mod('header_text');
        $social_button = get_theme_mod('social_button');
        if( $header_text !='' && $social_button !='' ){
    ?>
    <div class="top-header">
        <div class="container clearfix">
            <?php 
                if($header_text) { ?>
            <div class="left-bar">
                <span><?php echo $header_text; ?></span>
            </div>
            <?php }
                if( $social_button) { ?>
                    <div class="social-icons">
                        <?php $facebook = get_theme_mod('facebook_url');
                            if($facebook) { ?>
                            <a href="<?php echo $facebook; ?>"><span class="ti-facebook"></span></a>
                        <?php } ?>
                        
                        <?php $twitter = get_theme_mod('twitter_url');
                            if($twitter) { ?>
                            <a href="<?php echo $twitter; ?>"><span class="ti-twitter"></span></a>
                        <?php } ?>
                        
                        <?php $google = get_theme_mod('gp_url');
                            if($google) { ?>
                            <a href="<?php echo $google; ?>"><span class="ti-google"></span></a>
                        <?php } ?>
                        
                        <?php $instagram = get_theme_mod('instagram_url');
                            if($instagram) { ?>
                            <a href="<?php echo $instagram; ?>"><span class="ti-instagram"></span></a>
                        <?php } ?>
                    </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php beka_custom_logo(); ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'beka' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
