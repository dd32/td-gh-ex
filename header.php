<?php
/*
================================================================================================
Silver Quantum - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <div id="top-nav" class="top-nav">
        <div id="align-center" class="align-center">

            <?php if (has_nav_menu('primary-navigation')) { ?>
                <nav id="site-navigation" class="primary-navigation">
                    <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'silver-quantum'); ?></button>
                    <?php wp_nav_menu(array(
                        'theme_location'    => 'primary-navigation',
                        'menu_id'           => 'primary-menu',
                        'menu_class'        => 'nav-menu'   
                    )); 
                    ?>
                </nav>            
            <?php } ?>
        </div>
    </div>
    <section id="site-container" class="site-container cf">
        <?php if (get_header_image()) : ?>
            <div id="site-header" class="site-header" style="background: url(<?php header_image(); ?>);">
                <div id="site-branding" class="site-branding">
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                </div>
            </div>
        <?php else : ?>
        <div id="site-header" class="site-header">
            <div id="site-branding" class="site-branding">
                <div id="title-box" class="title-box">
                    <h1 class="site-title"><a href="<?php esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <section id="site-content" class="site-content cf">