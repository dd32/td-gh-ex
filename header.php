<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>        
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">      
        <?php wp_head(); ?>       
    </head>
    <?php
    $classHome = 'artwork';
    if (is_front_page()) :
        if (get_option('show_on_front') != 'page' && ((get_theme_mod('theme_custom_page_show', false) === false) || get_theme_mod('theme_custom_page_show') === 1)):
            $classHome = $classHome . ' artwork-custom-home';
        endif;
    endif;
    ?>

    <body <?php body_class($classHome); ?> >
        <?php if (get_page_template_slug() != 'template-landing-page.php'): ?>
            <header id="header" class="main-header">
                <div class="top-header">
                    <span class="menu-icon"><i class="fa fa-bars"></i></span>
                    <div class="top-header-content">
                        <div class="top-content">
                            <div class="site-logo">
                                <?php if (get_theme_mod('theme_logo') != "" || get_bloginfo('description') || get_theme_mod('name') != "") : ?>
                                    <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>"
                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                           <?php if (get_theme_mod('theme_logo', false) === false) : ?> 
                                            <div class="header-logo "><img src="<?php echo (get_template_directory_uri() . '/images/headers/logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                                        <?php else: ?>
                                            <?php if (get_theme_mod('theme_logo')) : ?> 
                                                <div class="header-logo "><img src="<?php echo get_theme_mod('theme_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif ?>
                            </div>
                            <div id="navbar" class="navbar <?php
                                if (get_theme_mod('theme_logo') === ""): echo 'navbar-full-width';
                                endif;
                                ?>">
                                <nav id="site-navigation" class="main-navigation">
                                    <?php
                                    $defaults = array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'sf-menu ',
                                        'menu_id' => 'main-menu',
                                        'fallback_cb' => 'theme_wp_page_menu'
                                    );
                                    wp_nav_menu($defaults);
                                    ?>
                                </nav>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </header>
            <?php
        
        
        
 endif;