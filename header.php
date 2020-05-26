<?php

/* 	SunRain Theme's Header
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SunRain 1.0
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
 	  <a class="skip-link screen-reader-text" href="#container"><?php esc_html_e( 'Skip to Content', 'sunrain' ); ?></a>
  	  <div id="resmwdt"></div>
      <div id ="header">
      <div id ="header-content">
	    <nav id="top-menu-con">
        
		<?php 
		if ( has_nav_menu( 'top-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'top-menu' )); endif;
		$connumber = sunrain_get_option ('contactnumber', '');
		if ($connumber):echo '<div class="connumber"><span class="dashicons dashicons-phone"></span>'.  esc_html($connumber). '</div>'; endif;
		get_search_form();
		?>
        </nav>
        <!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logotitlecon"><?php if ( get_header_image() !='' ): ?><img class="site-logo logotitle" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title logotitle"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
        
        <!-- Site Main Menu Goes Here -->
        <a href="#!" class="mobile-menu"><span class="dashicons dashicons-menu-alt3 mbmenu"></span></a>
        <nav id="main-menu-con">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main-menu-items-con', 'menu_class' => 'main-menu-items', 'container_id' => 'mainmenuparent', 'container_class' => 'mainmenu-parent', 'fallback_cb' => 'sunrain_page_menu' )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div id="topadjust"></div>
      <div class="clear"></div>
      <?php do_action('d5theme_after_header');