<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Base WP
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
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'base-wp' ); ?></a>

<header id="masthead" class="site-header" role="banner">

<?php igthemes_header(); ?>

<div class="main-menu">
        <div class="grid-1200">
            <div class="row">
                    <nav id="site-navigation" class="main-navigation col12" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="icon_menu-square_alt2"></span> <?php esc_html_e( 'Menu', 'base-wp' ); ?>
                </button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                    </nav><!-- #site-navigation .col12 -->
            </div><!-- .row -->
        </div><!-- .grid-1200 -->
</div><!-- .main-menu -->

</header><!-- #masthead -->

<?php igthemes_after_header();?>

<div id="content" class="site-content grid-1200">
<div class="row">

<?php igthemes_before_site_content();?>
