<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package topshop
 */
global $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod( 'kra-header-favicon', false ) ) :
    echo '<link rel="icon" href="' . esc_url( get_theme_mod( 'kra-header-favicon' ) ) . '">';
endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="masthead" class="site-header border-bottom kra-header-layout-standard" role="banner">
    
    <?php get_template_part( '/templates/header/header-layout-standard' ); ?>
    
</header><!-- #masthead -->

<?php if ( is_front_page() ) : ?>
	
	<?php get_template_part( '/templates/slider/homepage-slider' ); ?>
	
<?php endif; ?>

<div id="content" class="site-content site-container<?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? ' content-no-sidebar' : ' content-has-sidebar'; ?>">