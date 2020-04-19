<?php

/* 	Searchlight Theme's Header
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
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
      <div id="resmwdt"></div>
      <div id ="header">
      <div id ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <a id="logotitlecon" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo logotitle" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title logotitle"><?php echo esc_attr(bloginfo( 'name' )); ?></h1><?php endif; ?></a>
                
		<h2 class="site-title-hidden"><?php echo esc_attr( bloginfo( 'description' )); ?></h2>
	    <div id="top-menu-con">
	    <?php if ( has_nav_menu( 'top-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'top-menu' )); endif; ?>
	    <div class="social social-link"><?php foreach (range(1, 5 ) as $searchlight_sll) { $scolink = '#'; $scolink = searchlight_get_option('sl' . $searchlight_sll, '#');  if ( $scolink ): echo '<a href="'. esc_url($scolink) .'"target="_blank"> </a>'; endif; } ?> </div>
		<?php $phonenumber = searchlight_get_option ('contactnumber', '(000) 111-222');
		if ($phonenumber):echo '<div class="connumber">'.  wp_kses_post($phonenumber). '</div>';  endif; 
		get_search_form(); ?>
       		
        </div>
        <!-- Site Main Menu Goes Here -->
         <div id="mobile-menu"></div>
        <nav id="main-menu-con">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="headerheight"> </div>
      <div id="topadjust"></div>