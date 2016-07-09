<?php
/*
================================================================================================
Silver Quantum - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/)
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
   <section id="top-nav" class="top-nav">
        <nav id="site-navigation" class="primary-navigation">
            <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'silver-quantum'); ?></button>
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary-navigation',
                    'menu_id'           => 'primary-menu',
                    'menu_class'        => 'nav-menu'   
                )); 
            ?>
        </nav>
    </section>
    <div class="height"></div>
    <section id="site-content" class="site-content cf">
        <header id="site-header" class="site-header" style="background: url(<?php header_image(); ?>);">
            <div id="site-branding" class="site-branding">
                <h1 class="site-title"><a href=""><?php bloginfo('name'); ?></a></h1>
                <h3 class="site-description"><?php bloginfo('description'); ?></h3>
            </div>
        </header>
        <div class="site-wrapper" class="site-wrapper">