<?php
/*
================================================================================================
Beyond Expectations - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displayers the header
section of this theme. This also displays the navigation menu as well.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <link href="<?php bloginfo('pingback_url'); ?>" rel="pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <div id="social-search" class="social-search">
        <nav class="align-center">
            <div class="social-navigation cf">
            <div class="search-toggle cf">
                <i class="fa fa-search cf"> </i>
                <a href ="#search-container" class="screen-reader-text cf"><?php _e('Search', 'beyond-expectations'); ?></a>
            </div>
                <?php beyond_expectations_social_navigation_setup(); ?>
            </div>
        </nav>
    </div>
    <div id="search-container" class="search-box-wrapper cf">
        <div class="search-box cf">
            <?php get_search_form(); ?>
        </div>
    </div>
    <header id="main-header" class="site-header">
            <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) { ?>
                <figure class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php header_image(); ?>" width="< ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                    </a>
                </figure>
            <?php } ?>
            <?php 
                if ( get_header_image() && !('blank' == get_header_textcolor()) ) { 
                    echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">'; 
                } else {
                    echo '<div class="site-branding">';
                }
            ?>
            <div class="title-box">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
        </div>
    </header>
    <span class="menu-toggle"><i class="fa fa-bars"></i></span>
    <div id="main-navigation" class="site-navigation cf">
        <div class="align-center">
            <div class="primary-navigation">
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary-navigation',
                )); 
                ?>
            </div>
        </div>
    </div>
    <div id="main-container" class="site-container cf">
        <div id="main-wrapper" class="site-wrapper">