<?php
/**
 * Template Name: Gallery Four Column Template
 *
 * Displays the Gallery Section of the theme with four column.
 *
 * @package Theme Horse
 * @subpackage Attitude
 * @since Attitude 1.0
 */
?>

<?php get_header(); ?>

<?php
	/** 
	 * attitude_before_main_container hook
	 */
	do_action( 'attitude_before_main_container' );
?>

<div id="container">
	<?php
		/** 
		 * attitude_gallery_four_column_template_content hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * attitude_display_gallery_four_column_content 10
		 */
		do_action( 'attitude_gallery_four_column_template_content' );
	?>
</div><!-- #container -->

<?php
	/** 
	 * attitude_after_main_container hook
	 */
	do_action( 'attitude_after_main_container' );
?>

<?php get_footer(); ?>