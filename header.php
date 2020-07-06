<?php

/* 	Design Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
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
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'd5-design' ); ?></a>
  	  <div id="top-menu-container">
      <?php get_search_form(); ?>    
      </div>
      <div id ="header">
      <div id ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php echo bloginfo( 'description' ); ?></h2>
        <!-- Site Main Menu Goes Here -->
        <nav id="main-menu-con" class="mainmenuconx">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main-menu-items-con', 'menu_class' => 'main-menu-items', 'container_id' => 'mainmenuparent', 'container_class' => 'mainmenu-parent', 'fallback_cb' => 'design_page_menu' )); ?>
        </nav>
      </div><!-- header-content -->
      </div><!-- header -->