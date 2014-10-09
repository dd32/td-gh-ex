<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main">
    <nav class="toprow" role="navigation">
    <?php if (has_nav_menu('secondary')) { 
          wp_nav_menu( array('container_class' => 'toprow', 'theme_location' => 'secondary') ); } else { echo '<div class="no-topmenu"> </div>'; } ?>
    </nav>
        <header id="masthead" class="site-header" role="banner">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/"><?php bloginfo('name'); ?></a></h1>
	        <h2 class="site-description"><?php bloginfo('description'); ?></h2>	
                <figure id="logo-right"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/"><img src="<?php header_image(); ?>" /></a></figure>
        </header>
            <nav role="navigation">
                <?php if(has_nav_menu( 'primary' )) { wp_nav_menu( array( 'container_id' => 'access', 'theme_location' => 'primary' ) ); } else { echo '<div class="no-access"> </div>'; } ?>
            </nav><!-- ends access -->

