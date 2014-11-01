<?php

/* 	Writing Board's Header
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<title><?php wp_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php  wp_head(); ?>

</head>

<body <?php body_class(); ?> >
  	  <div id="top-menu-container" class="hfback" >
      <!-- Site Titele and Description Goes Here -->
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
      
      <!-- Site Main Menu Goes Here -->
	<div id="main-menu">
	<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'writingboard_page_menu'  )); ?>  
    </div></div><div class="clear"></div>
 	
    
      
          
      
	  
	 
	  