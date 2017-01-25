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
 <div class="header_top">
  <div class="container">
    <?php  wp_nav_menu(array('theme_location'=>'header-top-menu','menu_class'=>'top_nav','depth'=> 1)); ?>
  </div><!--container--> 
 </div><!--header_top-->
 <div class="header-main">
  <section class="container">
   <div id="logo">
   <a href="<?php echo esc_url(home_url()); ?>">
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
     <?php endif; endif; ?>
    </a>
   </div><!--logo-->
   <?php if(get_theme_mod('header_text' )){?>     
   <span class="t1"><?php echo esc_html(get_theme_mod('header_text'));?></span>
   <?php }?>
 </section><!--container-->
 </div><!--header-main-->
 <div class="main-nav">
  <div class="container">
    <?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => 'nav','container_class' => 'main_nav' ,'menu_class'=>'menu','depth'=> 0) );?>
    <div class="header-search">
      <form role="search" method="get" id="search-widget" class="search" action="<?php echo home_url( '/' ); ?>">
        <input class="form-control" type="text" value="" name="s" id="s" placeholder="Search">
        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
 </div> 
</header>