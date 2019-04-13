<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency_Ecommerce
 */

?>
<?php
	/**
	 * Hook - agency_ecommerce_doctype.
	 *
	 * @hooked agency_ecommerce_doctype_action - 10
	 */
	do_action( 'agency_ecommerce_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - agency_ecommerce_head.
	 *
	 * @hooked agency_ecommerce_head_action - 10
	 */
	do_action( 'agency_ecommerce_head' );
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<?php
        /**
         * Hook - agency_ecommerce_before_top_header.
         *
         * @hooked agency_ecommerce_before_top_header_action - 10
         */
        do_action( 'agency_ecommerce_before_top_header' );
		/**
		 * Hook - agency_ecommerce_top_header.
		 *
		 * @hooked agency_ecommerce_top_header_action - 10
		 */
		do_action( 'agency_ecommerce_top_header' );

        /**
         * Hook - agency_ecommerce_after_top_header.
         *
         * @hooked agency_ecommerce_after_top_header_action - 10
         */
        do_action( 'agency_ecommerce_after_top_header' );

		/**
		* Hook - agency_ecommerce_before_header.
		*
		* @hooked agency_ecommerce_before_header_action - 10
		*/
		do_action( 'agency_ecommerce_before_header' );

		/**
		* Hook - agency_ecommerce_header.
		*
		* @hooked agency_ecommerce_header_action - 10
		*/
		do_action( 'agency_ecommerce_header' );

		/**
		* Hook - agency_ecommerce_after_header.
		*
		* @hooked agency_ecommerce_after_header_action - 10
		*/
		do_action( 'agency_ecommerce_after_header' );

		/**
		* Hook - agency_ecommerce_main_content.
		*
		* @hooked agency_ecommerce_main_content_for_slider - 5
		* @hooked agency_ecommerce_main_content_for_breadcrumb - 7
		* @hooked agency_ecommerce_main_content_for_home_widgets - 9
		*/
		do_action( 'agency_ecommerce_main_content' );

		/**
		* Hook - agency_ecommerce_before_content.
		*
		* @hooked agency_ecommerce_before_content_action - 10
		*/
		do_action( 'agency_ecommerce_before_content' );