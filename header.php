<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			<header id="header-main">
				<div id="header-content-wrapper">
					<div id="header-top">
						<?php fkidd_show_header_top(); ?>
					</div>
					<div id="header-logo">
						<?php fkidd_show_website_logo_image_or_title(); ?>
					</div>
					<nav id="navmain">
						<?php wp_nav_menu( array('theme_location' => 'primary',
												 'fallback_cb'    => 'wp_page_menu',
												) ); ?>
					</nav>
					
					<div class="clear">
					</div>
				</div>
			</header>

