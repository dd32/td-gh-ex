<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Footer Template
 *
 */


	if (is_active_sidebar( 'footer-sidebar' ) ):
		?><div id="footer"><div class="container"><ul><?php
			dynamic_sidebar( 'footer-sidebar' );
		?></ul></div></div><?php
	endif;

	?><div id="sub-footer"><div class="container"><?php
		?><div class="sub-footer-left"><?php

/* You are free to modify or replace this by anything you like as per the terms of the GPL license */ ?>

<?php
			printf( __('Copyright &copy; %1$s %2$s.', 'boldr-lite'), date('Y'), get_bloginfo('name') );
			echo ' ';
			printf( __('Proudly powered by <a href="%1$s" title="%2$s">%3$s</a>.', 'boldr-lite'),
				esc_url( __('https://wordpress.org/', 'boldr-lite') ),
				esc_attr__( 'Semantic Personal Publishing Platform', 'boldr-lite' ),
				__('WordPress', 'boldr-lite')
			);
			echo ' ';
			printf( __('BoldR design by <a href="%1$s" title="%2$s">Iceable Themes</a>.', 'boldr-lite'),
				esc_url( 'https://www.iceablethemes.com' ),
				esc_attr( 'Iceablethemes', 'boldr-lite' )
			);
?>

<?php /* Stop editing here */
			?></div><?php

		?><div class="sub-footer-right"><?php
			$footer_menu = array( 'theme_location' => 'footer-menu', 'depth' => 1);
			wp_nav_menu( $footer_menu );
		?></div><?php
	?></div></div><?php // End sub footer

?></div><?php // End main wrap

wp_footer();

?></body></html>
