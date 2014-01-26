<?php
/**
 * The Header for our theme.
 *
 * @package	Anarcho Notepad
 * @since	2.5
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2014, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php echo get_theme_mod('scripts_header'); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header id="masthead" class="site-header" role="banner">

	<?php if ( get_theme_mod('disable_paper_search') == '0') { ?>
		<div class="top-search-form"><?php get_search_form(); ?></div>
	<?php } ?>

	<div id="title">
	  <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

	   <?php $header_image = get_header_image();
		if ( !empty( $header_image ) ) : ?>
			<img
				class="logo"
				src="<?php esc_url(header_image()); ?>" 
				height="<?php echo esc_attr(get_custom_header()->height); ?>" 
				width="<?php echo esc_attr(get_custom_header()->width); ?>" 
				alt="<?php bloginfo('name'); ?>" 
			/>
	   <?php endif; ?>

	    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
	    <h2 class="site-description"><?php bloginfo('description'); ?></h2>

	  </a>
	</div>

</header>