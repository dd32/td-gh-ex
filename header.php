<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main">
    <nav class="toprow" role="navigation">
        <?php wp_nav_menu( array(
            'fallback_cb' => '__return_false',
            'theme_location' => 'secondary',
            'depth'           => 1, 
            )); ?>
    </nav>
        <header id="masthead" class="site-header" role="banner">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/"><?php bloginfo('name'); ?></a></h1>
	        <h2 class="site-description"><?php bloginfo('description'); ?></h2>	
                <figure id="logo-right"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/"><img src="<?php header_image(); ?>" /></a></figure>
        </header>
            <nav id="access" role="navigation">
                <?php wp_nav_menu( array( 
                    'fallback_cb' => '__return_false',
                    'theme_location' => 'primary' 
                    )); ?>
            </nav><!-- ends access -->