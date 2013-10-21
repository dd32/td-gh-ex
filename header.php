<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until id="main-core".
 *
 * @package ThinkUpThemes
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/lib/scripts/html5.js" type="text/javascript"></script>
<![endif]-->

<?php thinkup_hook_header(); ?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?><?php thinkup_bodystyle(); ?>>

<div id="body-core" class="hfeed site">

	<header>
	<div id="site-header">
		<div id="header">
		<div id="header-core">

			<div id="logo">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php /* Custom Logo */ thinkup_custom_logo(); ?></a>
			</div>

			<div id="header-links" class="main-navigation">

			<?php wp_nav_menu(array('container_class' => 'header-links', 'container_id' => 'header-links-inner', 'theme_location'  => 'header_menu') ); ?>

			</div>
			<!-- #header-links .main-navigation -->

			<?php /* Add responsive header menu */ thinkup_input_responsivehtml(); ?>

		</div>
		</div>
		<!-- #header -->

		<div id="pre-header">
	    	<div id="pre-header-core" class="main-navigation">
  
			<?php if ( has_nav_menu( 'pre_header_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'pre-header-links-inner', 'theme_location' => 'pre_header_menu' ) ); ?>
			<?php endif; ?>

			<?php /* Social Media Icons */ thinkup_input_socialmedia(); ?>

			<?php /* Header Search */ thinkup_input_headersearch(); ?>

		</div>
		</div>
		<!-- #pre-header -->

	</div>

	<?php /* Custom Slider */ thinkup_input_sliderhome(); ?>
	</header>
	<!-- header -->
	<?php /*  Call To Action - Intro */ thinkup_input_ctaintro(); ?>

	<?php /* Custom Intro */ thinkup_custom_intro(); ?>
	<?php /* Custom Slider */ thinkup_input_sliderpage(); ?>

	<div id="content">
	<div id="content-core">

		<div id="main">
		<div id="main-core">