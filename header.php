<?php

/* 	SPARK Theme's Header
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
  	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'spark' ); ?></a>
      <div id ="header">
      <div id ="header-content" class="box90">
		<!-- Site Titele and Description Goes Here -->
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logotitle"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
                
        <div id="mmainmenu">
        <!-- Site Main Menu Goes Here -->
        <div id="mobile-menu" class="mmenucon"><?php echo __('Main Menu', 'spark'); ?></div>
        <nav id="main-menu-con" class="mmenucon mainmenuconx">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu-items' )); else: wp_page_menu(); endif; ?>
        </nav>
        
      </div>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="clear"></div>