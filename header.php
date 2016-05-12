<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic Shop
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
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'basic-shop' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="container">
        <?php
            /**
            * @hooked igthemes_site_description - 10
            * @hooked igthemes_site_header_menu - 20
            */
        do_action( 'igthemes_site_header' ); ?>
        </div><!-- .container -->
        <div class="main-nav">
           <div class="container">
        <?php
            /**
            * @hooked igthemes_site_title - 10
            * @hooked igthemes_site_main_menu - 20
            */
        do_action( 'igthemes_site_main_nav' ); ?>
            </div><!-- .container -->
        </div><!-- .main-nav -->
     </header><!-- #masthead -->
        
        <?php
	       /**
	       * @hooked igthemes_breadcrumb - 10
           * @hooked igthemes_header_widgets - 20
           */
	    do_action( 'igthemes_before_content' ); ?>
	
    <div id="content" class="site-content">
        <div class="container">
        <?php
		  /**
		  * @hooked  
		  */
		do_action( 'igthemes_content_top' ); ?>