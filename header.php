<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset = "<?php bloginfo('charset'); ?>" />
        <link href = "http://gmpg.org/xfn/11" rel = "profile" />
        <link href = "<?php bloginfo('pingback_url'); ?>" rel ="pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <nav id = "site-navigation">
        <div class = "primary-navigation">
            <?php wp_nav_menu(array(
                'theme-location'    => 'primary-navigation', 
                'container'         => '',
                'container_class'   => '',
                'menu_id'           => '',
                'menu_class'        => 'primary-navigation',
                'items_wrap'        => '<ul class = "%2$s">%3$s</ul>',
                )); 
            ?>
        </div>
    </nav>
    <div id = "height"></div>
    <section id = "container" class = "cf">
        <header id = "site-header">
            <hgroup>
                <h1 class = "site-title"><a href = "<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class = "site-description"><?php bloginfo('description'); ?></h4>
            </hgroup>
                <?php if ( get_header_image() ) : ?>
                    <img src = "<?php header_image(); ?>" class = "header-image" width = "<?php echo get_custom_header()->width; ?>" height = "<?php echo get_custom_header()->height; ?>" alt="" />
                <?php endif; ?>
        </header>