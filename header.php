<?php

/* 	COLORFUL Theme's Header
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	
	Since COLORFUL 1.0
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title() ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php 

wp_head(); ?>

</head>

<body <?php body_class(); ?> >

  <div id="container">
    
      <div id ="header">
      <?php get_search_form(); ?>
      <a class="feedlink" target="_blank" href="<?php echo get_feed_link( '' ); ?>"> </a>
       	<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
        <h2 class="displaynone"><?php bloginfo('description'); ?></h2>
        <!-- Site Main Menu Goes Here -->
        <nav id="colorful-main-menu">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
         </nav>
      
      </div><!-- header -->
      
            
      <?php 
	  	  
	 
	  