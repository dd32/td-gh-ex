<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title( '-', true, 'right' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			<header id="header-main-fixed"
				<?php if ( get_header_image() ) : ?>
						style="background-image:url('<?php header_image(); ?>');filter:none !important;"			
				<?php endif; ?>>
				<div id="header-content-wrapper">
					<div id="header-top">
						<?php fgymm_show_header_top(); ?>
					</div>
					<div id="header-logo">
						<?php fgymm_show_website_logo_image_or_title(); ?>
					</div>
					<nav id="navmain">
						<?php wp_nav_menu( array(
												  'container_class' => 'menu-all-pages-container',
												  'menu_class'      => 'menu',
												  'theme_location'  => 'primary',
											  ) ); ?>
					</nav>
					
					<div class="clear">
					</div>
				</div>
			</header>
			<div id="header-spacer">
				&nbsp;
			</div>
