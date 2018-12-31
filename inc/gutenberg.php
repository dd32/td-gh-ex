<?php
/**
 * Altitude-lite gutenberg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-gutenberg-functions/
 *
 * @package altitude-lite
 */

/**
 * [gb_altitude_premium_css_styles description].
 *
 * @return string.
 */
function gb_altitude_premium_css_styles() {

	require_once get_template_directory() . '/premium/typography/wp-head-hooks.php';
	$body_styles       = altitude_premium_body_styles();
	$heading_styles    = altitude_premium_headings_styles();
	$editor_custom_css = '';

	if ( ! empty( $body_styles ) ) :
		$editor_custom_css = $editor_custom_css . ' .editor-writing-flow,
	   .editor-styles-wrapper { ';
		foreach ( $body_styles as $key => $body_style ) :
				$editor_custom_css = $editor_custom_css . " {$key} : {$body_style}; ";
		endforeach;
			$editor_custom_css = $editor_custom_css . ' } ';
	endif;

	if ( ! empty( $heading_styles ) ) {
		foreach ( $heading_styles as $key => $head_style ) {
			for ( $j = 1; $j <= 6; $j++ ) {
				$editor_custom_css = $editor_custom_css . " .wp-block-freeform.block-library-rich-text__tinymce h{$j},
		       .wp-block-heading h{$j}.editor-rich-text__tinymce { ";
				if ( ! empty( $head_style[ $j ] ) ) {
					$editor_custom_css = $editor_custom_css . " {$key} : {$head_style[ $j ]}; ";
				}
				$editor_custom_css = $editor_custom_css . ' } ';
			}
				$j = 1;
		}
	}

		return $editor_custom_css;
}



/**
 * [customizer_css description].
 *
 * @return string.
 */
function customizer_css() {

	$get_background_color = get_background_color() ? get_background_color() : 'ffffff';
	$get_background_image = get_background_image() ? get_background_image() : '';
	$accent_color         = get_theme_mod( 'accent_color' ) ? get_theme_mod( 'accent_color' ) : '#8c2849';
	$text_color           = get_theme_mod( 'text_color' ) ? get_theme_mod( 'text_color' ) : '#555555';
	$highlight_color      = get_theme_mod( 'highlight_color' ) ? get_theme_mod( 'highlight_color' ) : '#e4e4e4';

	$custom_css = ".editor-writing-flow,
    .editor-styles-wrapper{
        background-color:#{$get_background_color};
        background-image:url('{$get_background_image}');
				color: {$text_color};
    }

		.wp-block-freeform.block-library-rich-text__tinymce a,
		.editor-writing-flow a{
			color: {$accent_color};
			text-decoration: none;
		}
    .wp-block-freeform.block-library-rich-text__tinymce pre,
    .editor-block-list__block-edit pre,
    .wp-block-preformatted pre.editor-rich-text__tinymce.mce-content-body,
    .wp-block-verse pre.editor-rich-text__tinymce.mce-content-body{
      background-color: {$highlight_color};
    }
    table.mce-item-table th,
    table.wp-block-table th,
    table.mce-item-table td,
    table.wp-block-table td {
        border: 1px solid {$highlight_color} !important;
    }

    .wp-block-pullquote:not(.is-style-solid-color),
    .wp-block-pullquote,
    .wp-block-freeform.block-library-rich-text__tinymce blockquote,
    .wp-block-quote,
    .wp-block-quote:not(.is-large):not(.is-style-large) {
        border-left: 5px solid {$highlight_color} !important;
    }

    .wp-block-separator:not(.is-style-dots) {
        border-bottom: 1px solid {$highlight_color} !important;
    }
    ";
	return $custom_css;
}

/**
 *  Enqueue block styles  in editor
 */
function firebrand_block_styles() {
	wp_enqueue_style( 'Montserrat-font', '//fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i', false );

	wp_enqueue_style( 'Merriweather-font', '//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i', false );

	wp_enqueue_style( 'firebrand-gutenberg-blocks', get_stylesheet_directory_uri() . '/assets/css/gutenberg-blocks.css', array(), '1.0' );

	wp_add_inline_style( 'firebrand-gutenberg-blocks', customizer_css() );

	if ( file_exists( get_template_directory() . '/premium/typography/wp-head-hooks.php' ) ) {

		wp_add_inline_style( 'firebrand-gutenberg-blocks', gb_altitude_premium_css_styles() );

	}

}
add_action( 'enqueue_block_editor_assets', 'firebrand_block_styles' );
