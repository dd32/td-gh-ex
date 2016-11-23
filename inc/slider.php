<?php
/**
 * Post Slider Setup
 *
 * Enqueues scripts and styles for the slideshow
 * Sets slideshow excerpt length and slider animation parameter
 *
 * The template for displaying the slideshow can be found under /template-parts/post-slider.php
 *
 * @package Beetle
 */

/**
 * Enqueue slider scripts and styles.
 */
function beetle_slider_scripts() {

	// Get theme options from database.
	$theme_options = beetle_theme_options();

	// Register and enqueue FlexSlider JS and CSS if necessary.
	if ( true === $theme_options['slider_blog'] or true === $theme_options['slider_magazine'] or is_page_template( 'template-slider.php' ) ) :

		// FlexSlider JS.
		wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.0' );

		// Register and enqueue slider setup.
		wp_enqueue_script( 'beetle-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery-flexslider' ) );

		// Register and enqueue slider CSS.
		wp_enqueue_style( 'beetle-slider', get_template_directory_uri() . '/css/flexslider.css' );

	endif;

}
add_action( 'wp_enqueue_scripts', 'beetle_slider_scripts' );


/**
 * Function to change excerpt length for post slider
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function beetle_slider_excerpt_length( $length ) {
	return 25;
}


/**
 * Sets slider animation effect
 *
 * Passes parameters from theme options to the javascript files (js/slider.js)
 */
function beetle_slider_options() {

	// Get theme options from database.
	$theme_options = beetle_theme_options();

	// Set parameters array.
	$params = array();

	// Set slider animation.
	$params['animation'] = ( 'fade' === $theme_options['slider_animation'] ) ? 'fade' : 'slide';

	// Set slider speed.
	$params['speed'] = absint( $theme_options['slider_speed'] );

	// Passing parameters to Flexslider.
	wp_localize_script( 'beetle-slider', 'beetle_slider_params', $params );

}
add_action( 'wp_enqueue_scripts', 'beetle_slider_options' );
