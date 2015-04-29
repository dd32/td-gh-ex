<?php
/**
 * Barista - Header File
 *
 * This file is the header.php that contains header image and navigation.
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <link href="<?php bloginfo('pingback_url'); ?>" rel ="pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <section id ="container" class="cf">
        <header class="site-header">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
                <?php if ( get_header_image() ) : ?>
                    <img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
                <?php endif; ?>
        </header>
            <nav class="primary-navigation cf">
            <div class="search-toggle cf">
                <i class="fa fa-search cf"></i>
                <a href ="#search-container" class="screen-reader-text cf"><?php _e('Search', 'barista'); ?></a>
            </div>
                    <?php wp_nav_menu(array(
                        'theme_location'    => 'primary-navigation', 
                        )); 
                    ?>
                    <?php barista_social_menu(); ?>
            </nav>
            <div id="search-container" class="search-box-wrapper cf">
                <div class="search-box cf">
                    <?php get_search_form(); ?>
                </div>
            </div>
