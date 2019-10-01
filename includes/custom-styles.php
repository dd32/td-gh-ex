<?php
/**
 * Master generated style function
 *
 * @package Arcanum
 */

/**
 * Add body classes to identify the child theme
 */
function arcanum_body_classes( $classes ) {
	$classes[] = strtolower( wp_get_theme() ) . '-child';
	return $classes;
}
add_filter( 'body_class', 'arcanum_body_classes', 15 );

/**
 * Dynamic styles for the frontend
 */
function arcanum_custom_styling() {
    $options = cryout_get_option();
    extract($options);

    ob_start(); ?>

    /* Arcanum custom style */

	.single #author-info {
		border-color: rgba( <?php echo cryout_hex2rgb( esc_html( $theme_accent1 ) ) ?>, 0.2 );
	}

	.lp-box-title {
		color: <?php echo esc_html( $theme_accent2 ) ?>;
	}

	#nav-fixed i {
		background-color: rgba( <?php echo cryout_hex2rgb( esc_html( $theme_accent2 ) ) ?>, 0.5 );
	}

	.lp-staticslider .staticslider-caption-text,
	.seriousslider-theme .seriousslider-caption-text {
		font-family: <?php echo cryout_font_select( $theme_ftitles, $theme_ftitlesgoogle ) ?>;
	}


    /* end Arcanum custom style */
    <?php
    return preg_replace( '/((background-)?color:\s*?)[;}]/i', '', ob_get_clean() );

} // arcanum_custom_styling()


/**
 * Load custom styles
 */
function arcanum_custom_styles( $style = '' ) {

	return $style . arcanum_custom_styling();

} // arcanum_custom_styles()
// this filer is applied in arcanum_setup()


/* FIN */
