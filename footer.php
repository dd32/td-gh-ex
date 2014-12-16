<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013-2014 Mathieu Sarrasin - Iceable Media
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

/* You are free to modify or replace this by anything you like as per the terms of the GPL license */

			printf( __('Copyright &copy; %s %s.', 'boldr'), date('Y'), get_bloginfo('name') );
			echo ' ';
			printf( __('Proudly powered by <a href="%s" title="%s">%s</a>.', 'boldr'),
				esc_url( __('http://wordpress.org/', 'boldr') ),
				esc_attr__( 'Semantic Personal Publishing Platform', 'boldr' ),
				__('WordPress', 'boldr')
			);
			echo ' ';
			printf( __('BoldR design by <a href="%s" title="%s">Iceable Themes</a>.', 'boldr'),
				esc_url( 'http://www.iceablethemes.com' ),
				esc_attr( 'Iceablethemes', 'boldr' )
			);

/* Stop editing here */
			?></div><?php

		?><div class="sub-footer-right"><?php
			$footer_menu = array( 'theme_location' => 'footer-menu', 'depth' => 1);
			wp_nav_menu( $footer_menu );
		?></div><?php
	?></div></div><?php // End sub footer

?></div><?php // End main wrap

wp_footer();

?></body></html>