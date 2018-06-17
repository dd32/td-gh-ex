<?php
/**
 * The template for displaying the header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php asagi_body_schema();?> <?php body_class(); ?>>
	<?php
	/**
	 * asagi_before_header hook.
	 *
	 *
	 * @hooked asagi_do_skip_to_content_link - 2
	 * @hooked asagi_top_bar - 5
	 * @hooked asagi_add_navigation_before_header - 5
	 */
	do_action( 'asagi_before_header' );

	/**
	 * asagi_header hook.
	 *
	 *
	 * @hooked asagi_construct_header - 10
	 */
	do_action( 'asagi_header' );

	/**
	 * asagi_after_header hook.
	 *
	 *
	 * @hooked asagi_featured_page_header - 10
	 */
	do_action( 'asagi_after_header' );
	?>

	<div id="page" class="hfeed site grid-container container grid-parent">
		<div id="content" class="site-content">
			<?php
			/**
			 * asagi_inside_container hook.
			 *
			 */
			do_action( 'asagi_inside_container' );
