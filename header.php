<?php

/* 	Easy Theme's Header
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php  wp_head(); ?>

</head>

<body <?php body_class(); ?> >
	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
	<div id ="site-container">
		<div id ="header">
			<div id="header-content" >
				<!-- Site Titele and Description Goes Here -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logotitle"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
				<h2 class="site-title-hidden"><?php bloginfo( 'description' ); ?></h2>

				<!-- Site Main Menu Goes Here -->
				<div id="mmainmenu">
						<!-- Site Main Menu Goes Here -->
						<div id="mobile-menu" class="mmenucon"><span class="mobilefirst">&#9776;</span><?php echo esc_html__('Main Menu', 'easy'); ?></div>
						<nav id="main-menu-con" class="mmenucon"><?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'm-menu', 'fallback_cb' => 'easy_page_menu'  )); ?></nav>
				</div>
			</div>
		</div><div class="clear"></div>
		<div id="con-container">