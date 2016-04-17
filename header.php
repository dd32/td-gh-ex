<?php
/*
================================================================================================
Ecclesiastical - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files
for a theme (the other footer.php). The header.php template file only displayers the header
section of this theme. This also displays the navigation menu as well.

@package        Ecclesiastical WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
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
    <section id="main-container" class="site-container cf">
        <header id="main-header" class="site-header">
            <div class="site-branding">
                <div class="title-box">
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                </div>
            </div>
        </header>
        <button class="menu-toggle"><?php _e('Menu', 'white-spektrum'); ?></button>
        <nav id="main-navigation" class="primary-navigation cf">
            <?php wp_nav_menu(array(
                'theme_location'    => 'primary-navigation'
            )); 
            ?>
        </nav>
        <div id="main-wrapper" class="site-wrapper">