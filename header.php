<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Conica
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">

<?php echo ( get_theme_mod( 'conica-set-site-layout' ) == 'conica-site-boxed' ) ? '<div class="site-boxed">' : ''; ?>
	
	<?php get_template_part( '/templates/header/header' ); ?>

<?php if ( is_front_page() ) : ?>
    
    <?php get_template_part( '/templates/slider/homepage-slider' ); ?>
    
<?php endif; ?>

<?php get_template_part( '/templates/title-bar' ); ?>

<div class="site-content site-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?>">