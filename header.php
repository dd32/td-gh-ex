<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		<title><?php wp_title( '-', true, 'right' ); ?></title>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php tishonator_head_load_scripts();
			  wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			<header id="header-main-fixed">
				<div id="header-content-wrapper">
					<div id="header-top">
						<?php tishonator_show_header_top(); ?>
					</div>
					<div id="header-logo">
						<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
							<?php tishonator_show_website_logo_image(); ?>
						</a>
					</div>
					<nav id="navmain">
						<?php wp_nav_menu( array( 'container_class' => 'menu-all-pages-container',
											  'menu_class' => 'menu', ) ); ?>
					</nav>
					
					<div class="clear">
					</div>
				</div>
			</header>
			<div id="header-spacer">
				&nbsp;
			</div>
