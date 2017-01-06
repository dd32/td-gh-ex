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
      <?php global $abaya_option; wp_nav_menu( array( 'theme_location'=>'header-top-menu','menu_class'=>'top_nav')); ?>
    </section>
    <!--container--> 
  </section>
  <!--header_top-->
  <section class="container">
    <div id="logo"><a href="<?php echo esc_url(home_url()); ?>">
    <?php
	if(isset($abaya_option['logo']['url']) && $abaya_option['logo']['url']!='') { echo '<img src="'.esc_url($abaya_option['logo']['url']).'"  alt="">';}else { ?>

    <h1 class="brand-title"> <?php bloginfo('name'); ?></h1>

     <p class="brand-subtitle"><?php bloginfo('description'); ?></p>

     <?php } ?>

    </a></div>

    <!--logo-->

    <div class="toggle-mobile">

      <span class="layer one">&nbsp;</span>

      <span class="layer two">&nbsp;</span>

      <span class="layer three">&nbsp;</span>

    </div><!--toggle-mobile-->

    <?php if(isset($abaya_option['header_text']) && $abaya_option['header_text']) { echo '<span class="t1">'.$abaya_option['header_text'].'</span>'; } ?>

    <?php wp_nav_menu( array( 'theme_location' => 'nav-menu','container' => 'nav','container_class' => 'clear main_nav' ,'menu_class'=>'menu') );?>

  </section>

  <!--container--> 

</header>