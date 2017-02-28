<?php

/* 	Smartia Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php 

wp_head(); ?>

</head>

<body <?php body_class(); ?> >
  
  	 <div id="top-menu-container">
         
    <div id="social">
	<a href="<?php echo esc_url(d5smartia_get_option('lin_link', '#')); ?>" class="lin-link" target="_blank"></a>
 	<a href="<?php echo esc_url(d5smartia_get_option('ytube_link', '#')); ?>" class="ytube-link" target="_blank"></a>
 	<a href="<?php echo esc_url(d5smartia_get_option('blog_link', '#')); ?>" class="blog-link" target="_blank"></a>
	</div>
	</div><div class="clear"> </div>

<div id="site-container">
      <div id ="header">
      <div id ="header-content">
      <div class="floatleft bannerad"><img src="<?php echo esc_url(d5smartia_get_option('adcodel',get_template_directory_uri() . '/images/bannerad.jpg')); ?>" /></div>
      <div class="floatright bannerad"><img src="<?php echo esc_url(d5smartia_get_option('adcoder',get_template_directory_uri() . '/images/bannerad.jpg')); ?>" /></div>      
      
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1></a> 
     
		<h2 class="site-title-des"><?php bloginfo( 'description' ); ?>  
        
       </div><!-- header-content -->
              
        <!-- Site Main Menu Goes Here -->
        <nav id="smartia-main-menu">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif;  get_search_form(); ?>
        </nav><div class="clear"> </div>
      
      </div><!-- header -->
      
<div id="slide-container"><div class="box_skitter box_skitter_large"><ul> <?php foreach (range(1, 2) as $sinumber) { ?><li><img src="<?php echo esc_url(d5smartia_get_option('slide-image-' . $sinumber,  get_template_directory_uri() . '/images/slides/(' . $sinumber . ').jpg')); ?>" class="<?php echo d5smartia_get_option('slide-effect', 'fade'); ?>" /></a><div class="label_text"><p><?php echo '<span>' . esc_textarea(d5smartia_get_option('slide-image-' . $sinumber . '-title', 'Slide Image ' . $sinumber .' Title | Welcome to D5 Smartia Theme, Visit D5 Creation for Details')). '</span><br />'; echo esc_textarea(d5smartia_get_option('slide-image-' . $sinumber . '-description', 'You can use D5 Smartia for Black and White looking Smart Blogging, Personal or Corporate Websites.  This is a Sample Description and you can change these from Samrtia Options')); ?></p></div></li>
<?php } ?></ul></div > <!-- slide --></div> <!-- slide-container -->

<div id="container">
       
	         
       
       
      
	  
	 
	  