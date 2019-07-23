<?php
/**
 * The template for displaying front page
 *
 * @package WordPress
 * @subpackage astral
 * @since 0.1
 */
get_header();
if ( is_home() ) {

	get_template_part( 'index' );

} elseif ( is_front_page() ) {

	/* 
	* Functions hooked into astral_slider_area action
	* 
	* @hooked astral_slider
	*/
	do_action( 'astral_slider_area' );
	?>

	<?php
	/* 
	* Functions hooked into astral_callout_area action
	* 
	* @hooked astral_callout
	*/
	do_action( 'astral_callout_area' );
	?>

	<?php
	/* 
	* Functions hooked into astral_service_area action
	* 
	* @hooked astral_service
	*/
	do_action( 'astral_service_area' );
	?>

	<?php
	/* 
	* Functions hooked into astral_contact_area action
	* 
	* @hooked astral_contact
	*/
	do_action( 'astral_contact_area' );
	?>

	<?php
	/* 
	* Functions hooked into astral_blog_area action
	* 
	* @hooked astral_blog
	*/
	do_action( 'astral_blog_area' );

}
get_footer();