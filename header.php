<?php

/* 	GREEN EYE Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
  	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'green-eye' ); ?></a>
  <?php if (is_front_page()): ?>
  <div id="header-fpage"><div class="header-content">
<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="slogo site-logol" src="<?php header_image(); ?>"/><?php else: ?><h1 class="slogo site-logol"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
        
        <div id="social">
		<?php  if (green_get_option('gplus-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('gplus-link', '#'); ?>" class="gplus-link" target="_blank"></a>
		<?php  endif; if (green_get_option('li-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('li-link', '#'); ?>" class="li-link" target="_blank"></a>
		<?php  endif; if (green_get_option('feed-link', '#') !='') : ?>
		<a href="<?php echo green_get_option('feed-link', '#'); ?>" class="feed-link" target="_blank"></a>
		<?php  endif; ?>
		</div>
        
        <?php get_search_form(); ?>	
        
      
</div></div>                
<div class="clear"> </div>        
        <!-- Slide Goes Here -->
        
<?php
$sldttl = green_get_option ( 'slide-image1-title', '');
if($sldttl) $sldttl = '<h3 class="ibcon">'.esc_textarea($sldttl).'</h3>';
	
$sldcap = green_get_option('slide-image1-caption', '');
if($sldcap) $sldcap = '<p class="ibcon">'.esc_textarea($sldcap).'</p>';
	
$sldlink = green_get_option('slide-image1-link', '#');
if($sldlink) $sldlink = '<a class="jms-link" href="'.esc_url($sldlink).'">'.esc_html__('Read more', 'green-eye').'</a>';	
	
$sldimg = green_get_option('slide-image1', '');
if($sldimg) $sldimg = '<div id="iesc"><img class="ibcon" src="'.esc_url($sldimg).'" /></div>'; 
	
if($sldttl || $sldcap || $sldimg ): ?>
	
<div id="iebanner">
   <div id="iebcontent">
		<div id="iefc">
			<?php echo $sldttl.$sldcap.$sldlink; ?>		
		</div>
		<?php echo $sldimg; ?>
   </div>
</div>	
	
<?php endif;
	
?>

<div id ="header" class="large fpheader">
      <div class ="header-content">
		<nav id="green-main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'green_page_menu'  )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
  
   
  	<?php else: ?> 
      <div id ="header" class="small">
      <div class ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="slogo site-logos" src="<?php header_image(); ?>"/><?php else: ?><h1 class="slogo site-logos"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
                
  		<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>
                
        
        <!-- Site Main Menu Goes Here -->
        <nav id="green-main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'green_page_menu'  )); ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->
      <div class="clear"> </div>
      
    <?php endif; ?>  
	  