<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<?php
            if ( is_singular() && pings_open() ) :
                printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
            endif;
        ?>
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="body-content-wrapper">
			<header id="header-main">
				<div id="header-content-wrapper">
					<div id="header-top">
						<?php fkidd_show_header_phone(); ?>

						<?php fkidd_show_header_email(); ?>

						<ul class="header-social-widget">
							<?php fkidd_display_social_sites(); ?>
						</ul>
					</div>
					<div id="header-logo">
						<?php fkidd_show_website_logo_image_and_title(); ?>
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
			<div id="header-spacer">
				&nbsp;
			</div>

			<?php if ( is_front_page() && get_option( 'show_on_front' ) == 'page' ) : ?>

					<?php if ( get_theme_mod('fkidd_slider_display', 0) == 1 ) : ?>

						<?php fkidd_display_slider(); ?>

					<?php endif; ?>

					<?php get_sidebar( 'home' ); ?>
				
			<?php endif; ?>

			<div class="clear">
			</div>
