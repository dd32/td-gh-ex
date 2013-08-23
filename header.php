<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if ( 
        is_active_sidebar( 'sidebar-4' ) 
    )
    return; ?>
    <?php if( ! dynamic_sidebar( 'sidebar-4' ) ) : 
        the_widget( 'WP_Widget_Search' );
    endif; ?>
    <div id="page" class="hfeed container">
        <header id="header" class="blog-header">
            <h1 class="blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="blog-description"><?php bloginfo( 'description' ); ?> | <a href="<?php get_feed_link( 'rss2_url' ); ?>" title="<?php _e( 'Subscribe to the RSS Feed of this site', 'content' ); ?>" id="rss">RSS</a></h2>
            <nav id="blog-menu" class="menu">
                <h2 class="menu-toggle"><?php _e( 'Menu', 'content' ); ?></h2>
                <h3 class="skip-link accessibility"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'content' ); ?>"><?php _e( 'Skip to content', 'content' ); ?></a></h3>
                <?php wp_nav_menu( 
                    array( 
                        'container' => '',
                        'theme_location' => 'menu', 
                        'menu_class' => 'menu'
                    ) 
                ); ?>
            </nav>
        </header>