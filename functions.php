<?php

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include Customizer File
get_template_part( 'includes/customizer' );

/**
 * Theme Setup
 *
 * @since 1.0
 */
add_action( 'after_setup_theme', 'agama_blue_after_setup_theme' );
function agama_blue_after_setup_theme() {
	
	/**
	 * THEME SETUP
	 */
	
}
 
/**
 * After Theme Switch
 *
 * @since 1.0.5
 */
add_action( 'after_switch_theme', 'agamablue_setup_options' );
function agamablue_setup_options() {
	
	set_theme_mod( 'agama_primary_color', '#00a4d0' );
	
}

/**
 * Enqueue Scripts
 *
 * Enqueue the Agama Blue scripts.
 *
 * @since 1.1.2
 * @return void
 */
function agama_blue_enqueue_scripts() {
    wp_enqueue_script( 'agama-blue', get_stylesheet_directory_uri() . '/assets/js/agama-blue.js', [ 'jquery' ], '1.1.2' );
}
add_action( 'wp_enqueue_scripts', 'agama_blue_enqueue_scripts' );

/**
 * Blog Heading
 *
 * Display the heading above blog posts.
 *
 * @since 1.1.2
 * @return mixed
 */
function agama_blue_blog_heading() {
    $heading = get_theme_mod( 'agama_blue_blog_heading', __( 'Latest from the Blog', 'agama-blue' ) );
    if ( $heading && is_home() ) : ?>
        <div class="section notopmargin notopborder section-blog">
            <div class="tv-container clearfix">
                <div class="heading-block center nomargin">
                    <h3><?php echo esc_html( $heading ); ?></h3>
                </div>
            </div>
        </div>
    <?php 
    endif;
}
add_action( 'agama/after_header_wrapper', 'agama_blue_blog_heading', 40 );

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
