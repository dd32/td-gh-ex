<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>	  <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>	  <html class="no-js lt-ie9" lang="en"> <![endif]-->

<head>

<meta charset="utf-8" />

<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <!-- Header and Nav -->

  <div class="row">
	<div class="six columns">

<?php global $bartleby_options; $bartleby_settings = get_option( 'bartleby_options', $bartleby_options ); ?>

<?php if ( $bartleby_settings['bartleby_logo'] !='' ) { ?>

				<div id="logo">

<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

<img src="<?php echo $bartleby_settings['bartleby_logo']; ?>" /></a>

				</div>

<?php } ?>

<?php if ( $bartleby_settings['bartleby_logo'] == '' ) { ?>

				<div id="logo">

<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

<h3><?php echo bloginfo ('name'); ?></h3></a>

				</div>

<?php } ?>
	</div>
<?php global $bartleby_options; $bartleby_settings = get_option( 'bartleby_options', $bartleby_options ); ?>
<?php if( $bartleby_settings['social_bar'] ) : ?>
	<div class="ten columns">
<?php get_template_part( 'social' , 'block' ); ?>

	</div>
<?php endif; ?>
  </div>


  <!-- End Header and Nav -->
<div class="row">
<div class="sixteen columns">
<nav id="site-navigation" class="main-navigation" role="navigation">

<h3 class="menu-toggle"><?php esc_attr_e( 'Menu', 'bartleby' ); ?></h3>

<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'bartleby' ); ?>"><?php esc_attr_e( 'Skip to content', 'bartleby' ); ?></a>

<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu') ); ?>

</nav><!-- #site-navigation -->
</div>
</div>