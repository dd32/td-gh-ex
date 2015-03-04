<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset = "<?php bloginfo('charset'); ?>" />
        <link href = "http://gmpg.org/xfn/11" rel = "profile" />
        <link href = "<?php bloginfo('pingback_url'); ?>" rel ="pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <div id = "site-navigation">
        <nav class = "primary-navigation">
            <?php wp_nav_menu(array(
                'theme-location'    => 'primary-navigation', 
                'container'         => '',
                'container_class'   => '',
                'menu_id'           => '',
                'menu_class'        => 'primary-navigation',
                'items_wrap'        => '<ul class = "%2$s">%3$s</ul>',
                )); 
            ?>
        </nav>
    </div>
    <div class = "height"></div>
    <section id = "container" class = "cf">
        <header class = "site-header">
            <hgroup>
                <h1 class = "site-title"><a href = "<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class = "site-description"><?php bloginfo('description'); ?></h4>
            </hgroup>
        </header>