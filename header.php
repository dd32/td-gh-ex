<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'vs_site_before' ); ?>

<div id="page" class="site">
  <div class="site-inner">

	<header id="masthead" class="site-header">
      <?php
      get_template_part( 'template-parts/header' );
      ?>
	</header>
    
  <div id="site-navigation" class="main-navigation">
    <div class="vs-container">
      <?php
        if (has_nav_menu('primary')) {
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'menu_class' => 'menu clearfix hidden-sm hidden-xs',
          ) );
        }
      ?>
    </div>
  </div>

<?php
if(get_theme_mod('activate_slider',0)){
	if(is_front_page()){
?>
		<div class="site-slider">
      <div class="vs-container">
      <?php vs_slider();?>
      </div>
    </div>
<?php
	}
}
?>

    <div class="site-primary">
