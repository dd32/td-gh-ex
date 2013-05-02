<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
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
    <!--[if lt IE 9]> <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script> <![endif]-->
    <!--[if IE]> <script src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js" type="text/javascript"></script> <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
    <header id="header" class="blog-header">
            <h1 class="blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
            <h2 class="blog-description"><?php bloginfo( 'description' ); ?> | <a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php _e( 'Subscribe to the RSS Feed of this site', 'rockers' ); ?>" id="rss">RSS</a></h2>
            <nav id="blog-menu" class="menu">
                <h2 class="menu-toggle"><?php _e( 'Menu', 'inBlu' ); ?></h2>
                <h3 class="skip-link accessibility"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'inBlu' ); ?>"><?php _e( 'Skip to content', 'inBlu' ); ?></a></h3>
                <?php wp_nav_menu(
                    array( 
                        'container' => '',
                        'theme_location' => 'menu', 
                        'menu_class' => 'menu',
                        'depth' => 1
                    )
                ); ?>
            </nav>
            <?php $header_image = get_header_image();
            if( ! empty( $header_image ) ) : ?>
                <p class="header-image"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a></p>
            <?php endif; ?>
    </header>
    <div id="main" class="wrapper">