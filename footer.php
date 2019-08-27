<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appdetail
 */
  	/**
	 * Hook - appdetail_container_closing_action.
	 *
	 * @hooked appdetail_container_closing_action - 10
	 */
	do_action( 'appdetail_container_closing_action' );


  	/**
	 * Hook - appdetail_site_footer_start_action.
	 *
	 * @hooked appdetail_site_footer_start_action - 10
	 */
	do_action( 'appdetail_site_footer_start_action' );


	/**
	 * Hook - appdetail_site_footer_widget_action.
	 *
	 * @hooked appdetail_site_footer_widget_action - 10
	 */
	do_action( 'appdetail_site_footer_widget_action' );

	/**
	 * Hook - appdetail_footer_site_info_action.
	 *
	 * @hooked appdetail_footer_site_info_action - 10
	 */
	do_action( 'appdetail_footer_site_info_action' );

	/**
	 * Hook - appdetail_footer_closing_action.
	 *
	 * @hooked appdetail_footer_closing - 10
	 */
	do_action( 'appdetail_footer_closing_action' );


    wp_footer(); ?>
</div>

</body>
</html>
