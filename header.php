<?php
/**
 * The Header for Aplos.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Aplos
 * @since Aplos 1.2.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <hgroup>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
            <?php if (get_header_image() !== '') : ?>
            <div class="site-header-image">
                <img src="<?php header_image() ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>"/>
            </div>
            <?php endif; ?>
        </hgroup>
        <nav role="navigation" class="site-navigation main-navigation">
            <h1 class="screen-reader-text"><?php _e('Menu', 'aplos'); ?></h1>
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e('Skip to content', 'aplos'); ?>"><?php _e('Skip to content', 'aplos'); ?></a></div>
            <button class="menu-toggle">&#9776;</button>
            <?php wp_nav_menu(array( 'theme_location' => 'primary' )); ?>
        </nav><!-- .site-navigation .main-navigation -->
    </header><!-- #masthead .site-header -->
<div id="main" class="site-main">

