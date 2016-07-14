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
<?php if(get_theme_mod('header_menu_show')==1) {?>
  <section class="header_top">
    <section class="container">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_class'=>'top_nav') );?>
    </section>
    <!--container--> 
  </section>
   <?php }?>
  <!--header_top-->
  
  <section class="container">
    <div id="logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php if(!get_theme_mod('logo')){ echo get_template_directory_uri(); ?>/images/logo.png<?php } else { echo esc_url(get_theme_mod('logo')); } ?>"  alt=""></a></div>
    <!--logo--> 
    <div class="toggle-mobile">
      <span class="layer one">&nbsp;</span>
      <span class="layer two">&nbsp;</span>
      <span class="layer three">&nbsp;</span>
    </div>
    <span class="t1"><?php if(get_theme_mod('header_text')) {echo get_theme_mod('header_text');}else{?>Free Canada Wide Shipping<?php }?></span>
<?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => 'nav','container_class' => 'clear main_nav' ,'menu_class'=>'menu') );?>
     </section>
  <!--container--> 
</header>