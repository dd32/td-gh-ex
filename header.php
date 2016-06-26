<?php
/*
================================================================================================
White Spektrum - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displayers the header
section of this theme. This also displays the navigation menu as well.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
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
    <section id="site-container" class="site-container">
        <header id="site-header" class="site-header">
            <div id="site-branding" class="site-branding">
                <div id="title-box" class="title-box">
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                </div>
            </div>
            <?php if (has_nav_menu('primary')) { ?>
                <nav id="site-navigation" class="primary-navigation">
                    <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'white-spektrum'); ?></button>
                    <?php wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'menu_id'           => 'primary-menu',
                        'menu_class'        => 'nav-menu'   
                    )); 
                    ?>
                </nav>
            <?php } ?>
        </header>
        <section id="site-content" class="site-content clearfix">
            <div id="site-wrapper" class="site-wrapper">