<?php
/**
 * The Header of the theme.
 *
 * Displays all of the <head> section and everything up till <main id="main"> (i.e. until the end of the header, opens the #container and the #main div elements)
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
     <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <div id="container">
            <header id="masthead" class="site-header">
                <a class="screen-reader-text skip-link" href="#main"><?php _e( 'Skip to content', 'aguafuerte' ); ?></a>

                <?php if (has_nav_menu('primary') || has_nav_menu('secondary') || has_nav_menu('social')): ?>
                    <button id="nav-button" class="menu-toggle"><?php _e( 'Menus', 'aguafuerte' ); ?></button>
                <?php endif ?>

                <div class="inner">                    
                    <div id="site-identity">
                        <?php $aguafuerte_theme_options = aguafuerte_get_options( 'aguafuerte_theme_options' );?>
                        <div id="logo">
                            <?php if ( $aguafuerte_theme_options['logo'] != '' ) { ?>
                                <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ) ?>">
                                    <img src="<?php echo esc_url($aguafuerte_theme_options['logo']); ?>" alt="<?php echo esc_attr($aguafuerte_theme_options['logo_alt_text']); ?>"/>
                                </a>                               
                            <?php } else { ?>
                                <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                                    <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </a>
                            <?php } ?>
                        </div><!--logo-->                       
                    </div><!--/site-identity-->

                    <div id="navigation">

                    <?php if (has_nav_menu('secondary')): ?>                
                        <nav id="categories-menu" class="site-navigation secondary-navigation" role="navigation" aria-label='<?php _e( 'Secondary Menu ', 'aguafuerte' ); ?>'>
                            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => 'false', 'menu_id' => 'secondary-menu' ) ); ?>
                        </nav><!--categories-menu-->                
                    <?php endif ?>

                    <?php if (has_nav_menu('primary')): ?>
                        <nav id="main-menu" class="site-navigation primary-navigation" role="navigation" aria-label='<?php _e( 'Primary Menu ', 'aguafuerte' ); ?>'>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav><!--main-menu-->
                    <?php endif ?>

                    <?php if (has_nav_menu('social')): ?>                
                        <nav id="social" class="site-navigation social-navigation" role="navigation" aria-label='<?php _e( 'Social Menu ', 'aguafuerte' ); ?>' >
                           <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'false',
                                'menu_id' => 'social-menu',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
                        </nav><!--social-menu-->                
                    <?php endif ?>

                    </div><!--/navigation--> 

                    
                </div><!--/inner--> 
            </header><!--/header-->
            <main id="main">

