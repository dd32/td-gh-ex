<?php
if ( ! function_exists( 'acmephoto_gutenberg_setup' ) ) :
	/**
	 * Making theme gutenberg compatible
	 */
	function acmephoto_gutenberg_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'acmephoto_gutenberg_setup' );

function acmephoto_dynamic_editor_styles(){

	global $acmephoto_customizer_all_values;
	$acmephoto_link_color               = esc_attr( $acmephoto_customizer_all_values['acmephoto-link-color'] );
	$acmephoto_link_hover_color         = esc_attr( $acmephoto_customizer_all_values['acmephoto-link-hover-color'] );

	$custom_css = '';

	$custom_css .= "
            .edit-post-visual-editor, 
			.edit-post-visual-editor p {
               color: #666;
            }";

	$custom_css .= "
	        .wp-block .wp-block-heading h1, 
	        .wp-block .wp-block-heading h1 a,
	        .wp-block .wp-block-heading h2,
	        .wp-block .wp-block-heading h2 a,
	        .wp-block .wp-block-heading h3, 
	        .wp-block .wp-block-heading h3 a,
	        .wp-block .wp-block-heading h4, 
	        .wp-block .wp-block-heading h4 a,
	        .wp-block .wp-block-heading h5, 
	        .wp-block .wp-block-heading h5 a,
	        .wp-block .wp-block-heading h6,
	        .wp-block .wp-block-heading h6 a{
	            color: #3a3a3a;
	        }";

	$custom_css .= "
	        .wp-block a{
	            color: {$acmephoto_link_color};
	        }";
	$custom_css .= "
	        .wp-block a:hover,
	        .wp-block a:active,
	        .wp-block a:focus{
	            color: {$acmephoto_link_hover_color};
	        }";

        return wp_strip_all_tags( $custom_css );	
}

/**
 * Enqueue block editor style
 */
function acmephoto_block_editor_styles() {
	wp_enqueue_style( 'acmephoto-googleapis', '//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i', array(), null );
	wp_enqueue_style( 'acmephoto-block-editor-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-edit.css', false, '1.0' );

	/**
	 * Styles from the customizer
	 */
	wp_add_inline_style( 'acmephoto-block-editor-styles', acmephoto_dynamic_editor_styles() );
}
add_action( 'enqueue_block_editor_assets', 'acmephoto_block_editor_styles',99 );

function acmephoto_gutenberg_scripts() {
	wp_enqueue_style( 'acmephoto-block-front-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-front.css', false, '1.0' );
	wp_style_add_data( 'acmephoto-block-front-styles', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'acmephoto_gutenberg_scripts' );