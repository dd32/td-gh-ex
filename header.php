<?php

/* 	Searchlight Theme's Header
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
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
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo esc_attr(bloginfo( 'name' )); ?></h1><?php endif; ?></a>
                
		<h2 class="site-title-hidden"><?php echo esc_attr( bloginfo( 'description' )); ?></h2>
	    <nav id="top-menu-con">
		<?php get_search_form(); if (esc_textarea(searchlight_get_option ('contactnumber', '(000) 111-222')) != ''):echo '<div class="connumber">'.  esc_textarea(searchlight_get_option ('contactnumber', '(000) 111-222')). '</div>';  endif; ?>
		<?php if ( has_nav_menu( 'top-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'top-menu' )); endif; ?>
        </nav>
        <!-- Site Main Menu Goes Here -->
         <div class="mobile-menu"><?php _e('Main Menu', 'searchlight'); ?></div>
        <nav id="main-menu-con">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="headerheight"> </div>
      

 
	  