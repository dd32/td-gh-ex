<?php
/**
 * The header section of appdetail.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appdetail
 */
    global $appdetail_theme_options;
	$appdetail_theme_options = appdetail_get_theme_options();
	$appdetail_header_disable = $appdetail_theme_options['appdetail-header-disable'];

?>
<?php
	/**
	 * Hook - appdetail_doctype.
	 *
	 * @hooked appdetail_doctype_action - 10
	 */
	do_action( 'appdetail_doctype' );
?>

<head>

<?php
	/**
	 * Hook - appdetail_head.
	 *
	 * @hooked appdetail_head_action - 10
	 */
	do_action( 'appdetail_head' );


	wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
<?php
	if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() 
		{
			do_action( 'wp_body_open' );
		}
	} 
	?>
	<a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'appdetail' ); ?>
	</a>

	<div class="site_layout">

<?php

	/**
	 * Hook - appdetail_header_start_wrapper_action.
	 *
	 * @hooked appdetail_header_start_wrapper - 10
	 */

	do_action( 'appdetail_header_start_wrapper_action' );


	/**
	 * Hook - appdetail_skip_link.
	 *
	 * @hooked appdetail_skip_link_action - 10
	 */
	do_action( 'appdetail_skip_link_action' );


	/**
	 * Hook - appdetail_header_section.
	 *
	 * @hooked appdetail_header_section_action - 10
	 */
	if($appdetail_header_disable == 1 ){ 
	 do_action( 'appdetail_header_section_action' );
	}

	/**
	 * Hook - appdetail_header_lower_section.
	 *
	 * @hooked appdetail_header_lower_section_action - 10
	 */
	do_action( 'appdetail_header_lower_section_action' );
	if (!is_front_page()) :
	/**
	 * Hook - appdetail_header_slider_action.
	 *
	 * @hooked appdetail_header_slider_section_action - 10
	 */
	do_action('appdetail_breadcrumb_section_action');
	endif;
	/**
	 * Hook - appdetail_header_slider_action.
	 *
	 * @hooked appdetail_header_slider_section_action - 10
	 */
	if(is_front_page ()) {
	do_action('appdetail_header_slider_section_action');

	/**
	 * Hook - appdetail_header_service_action.
	 *
	 * @hooked appdetail_header_service_section_action - 10
	 */
	do_action('appdetail_header_service_section_action');

	/**
	 * Hook - appdetail_header_screenshot_action.
	 *
	 * @hooked appdetail_header_screenshot_section_action - 10
	 */
	do_action('appdetail_header_screenshot_section_action');
	/**
	 * Hook - appdetail_header_video_action.
	 *
	 * @hooked appdetail_header_video_section_action - 10
	 */
	do_action('appdetail_header_video_section_action');
	/**
	 * Hook - appdetail_header_testimonial_action.
	 *
	 * @hooked appdetail_header_testimonial_section_action - 10
	 */
	do_action('appdetail_header_testimonial_section_action');
	/**
	 * Hook - appdetail_header_video_action.
	 *
	 * @hooked appdetail_header_video_section_action - 10
	 */
	do_action('appdetail_header_blog_section_action');
	/**
	 * Hook - appdetail_header_featured.
	 *
	 * @hooked appdetail_header_featured_action - 10
	 */}
	do_action('appdetail_header_featured_action');
	/**
	 * Hook - appdetail_header_end_wrapper.
	 *
	 * @hooked appdetail_header_end_wrapper_action - 10
	 */

	do_action( 'appdetail_header_end_wrapper_action' );
?>