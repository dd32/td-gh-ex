<?php
/**
* The Header template for our theme
*
* Displays all of the <head> section and everything up till <body>
*
* @package abaya
* @since abaya 1.0
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta <?php language_attributes(); ?>>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
 <section class="header_top">
   <section class="container">
     <?php  wp_nav_menu(array('theme_location'=>'header-top-menu','menu_class'=>'top_nav','depth'=> 1)); ?>
   </section>
   <!--container--> 
 </section>
 <!--header_top-->
 <section class="container">
  <div id="logo"><a href="<?php echo esc_url(home_url()); ?>">
<?php if(function_exists( 'the_custom_logo')): if(has_custom_logo()): 
	  the_custom_logo();
	  else : if(display_header_text()): ?>
     <h1 class="brand-title">
       <?php bloginfo('name'); ?>
     </h1>
     <p class="brand-subtitle"><?php bloginfo('description'); ?></p>
     <?php endif; endif; else : if(display_header_text()): ?>
     <h1 class="brand-title">
       <?php bloginfo('name'); ?>
     </h1>
     <p class="brand-subtitle"><?php bloginfo('description'); ?></p>
     <?php endif; endif; ?></a></div>
   <!--logo-->
   </a></div>
   <div class="toggle-mobile">
     <span class="layer one">&nbsp;</span>
     <span class="layer two">&nbsp;</span>
     <span class="layer three">&nbsp;</span>
   </div><!--toggle-mobile-->
   <?php if(get_theme_mod('header_text' )){?>     
   <span class="t1"><?php echo esc_html(get_theme_mod('header_text'));?></span>
   <?php }?>
   <?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => 'nav','container_class' => 'clear main_nav' ,'menu_class'=>'menu','depth'=> 0) );?>
 </section>
 <!--container--> 
</header>