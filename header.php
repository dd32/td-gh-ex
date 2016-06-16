<?php
/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Header Template
 *
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists('wp_site_icon') ) :
	$favicon = get_theme_mod( 'wortex_favicon' );
	if ($favicon):
		?><link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" /><?php
	endif;
endif;
?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]--><?php
wp_head();
?></head><body <?php body_class(); ?>><?php

/* Wide or boxed layout ? */
$boxed = ('boxed' == get_theme_mod('wortex_layout') ) ? true : false;

/* Start main wrap */
?><div id="main-wrap"<?php if ( $boxed ) echo ' class="boxed"'; ?>><?php

	/* Start header wrap */
	?><div id="header-wrap"><?php

		/* Start header */
		?><div id="header"><?php

			?><div class="container"><?php
			?><div id="logo"><a href="<?php echo esc_url( home_url() ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php
				if ( get_theme_mod( 'wortex_logo' ) ) :
					?><h1 class="site-title" style="display:none"><?php bloginfo('name') ?></h1><?php
					?><img src="<?php echo esc_url( get_theme_mod( 'wortex_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php
				else:
					?><h1 class="site-title"><?php bloginfo('name') ?></h1><?php
				endif;
			?></a></div><?php

			if ( get_bloginfo ( 'description' ) ):
				?><div id="tagline"><?php bloginfo('description'); ?></div><?php
			endif;

				?><div id="navbar"><?php
					$search_markup = '<li id="nav-search">';
					$search_markup .= get_search_form(false);
					$search_markup .= '<a class="nav-search-toggle"><i class="fa fa-search"></i></a></li>';
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s'.$search_markup.'</ul>',
						) );
					wortex_dropdown_nav_menu();
			?></div></div></div></div><?php
			/* End header wrap */

		if ( get_custom_header()->url ) :
			if ( ( is_front_page() && get_theme_mod('home_header_image') != 'off' )
				|| ( is_page() && !is_front_page() && get_theme_mod('pages_header_image') != 'off' )
				|| ( is_single() && get_theme_mod('single_header_image') != 'off' )
				|| ( !is_front_page() && !is_singular() && get_theme_mod('blog_header_image') != 'off' )
				|| ( is_404() ) ):

	?><div id="header-image"><?php
		?><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /><?php
	?></div><?php

			endif;
		endif;
