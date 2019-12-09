<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#main-content-wrapper">
			<?php _e( 'Skip to content', 'fgymm' ); ?>
		</a>
		<div id="body-content-wrapper">
			<header id="header-main-fixed">
				<div id="header-content-wrapper">
					<div id="header-top">
						<ul class="header-social-widget">
							<?php fgymm_show_social_sites(); ?>
						</ul>
					</div>
					<div class="clear">
					</div>
					<div id="header-logo">
						<?php fgymm_show_website_logo_image_and_title(); ?>
					</div>
					<nav id="navmain">
						<?php wp_nav_menu( array( 'theme_location'  => 'primary',
												  'fallback_cb'    => 'wp_page_menu',
												  'items_wrap'      => fgymm_nav_wrap(),
											  ) ); ?>
					</nav>
					
					<div class="clear">
					</div>
				</div>
			</header>
			<div id="header-spacer">
				&nbsp;
			</div>

			<?php if ( is_front_page() && get_option( 'show_on_front' ) == 'page' ) : ?>

					<?php if ( get_theme_mod('fgymm_slider_display', 0) == 1 ) : ?>

						<?php fgymm_display_slider(); ?>

					<?php endif; ?>

					<?php get_sidebar('home'); ?>
			
			<?php endif; ?>
			