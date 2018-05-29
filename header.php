<?php

/* 	SunRain Theme's Header
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
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
  
      <div id ="header">
      <div id ="header-content">
	    <nav id="top-menu-con">
        
		<?php get_search_form(); ?>
		<?php 	if (sunrain_get_option ('contactnumber', '(000) 111-222') != ''):echo '<div class="connumber">'.  sunrain_get_option ('contactnumber', '(000) 111-222'). '</div>';  endif;
				if ( has_nav_menu( 'top-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'top-menu' )); endif;
		?>
        </nav>
        <!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo logotitle" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title logotitle"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
        
        <!-- Site Main Menu Goes Here -->
        <div class="mobile-menu">&#9776;&nbsp;&nbsp;<?php echo __('Main Menu', 'sunrain'); ?></div>
        <nav id="main-menu-con">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="clear"></div>
      <?php do_action('d5theme_after_header');