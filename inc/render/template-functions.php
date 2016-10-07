<?php
/*-----------------------------------------------------------------
 * POST THUMBNAIL
-----------------------------------------------------------------*/
if ( ! function_exists( 'igthemes_post_thumbnail' ) ) {
    /**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 */
    function igthemes_post_thumbnail( $size ) {
        if ( has_post_thumbnail() && is_singular() ) {
            the_post_thumbnail( $size, array( 'class' => 'featured-img' )  );
        } else {
            echo '<a href=" '. esc_url( get_permalink() ) .' " rel="bookmark">';
            the_post_thumbnail( $size, array( 'class' => 'featured-img' ) );
            echo '</a>';
        }
    }
}
/*----------------------------------------------------------------------
# ARCHIVE TITLE FILTER
 ----------------------------------------------------------------------*/
add_filter('get_the_archive_title', function ($title) {
    if ( is_tax() || is_category() ) {
        $title = sprintf( __( '%s', 'base-wp' ), single_cat_title( '', false ) );
    } elseif ( is_post_type_archive() ) {
        $title = sprintf( __( '%s', 'base-wp' ), post_type_archive_title( '', false ) );
    }
    return $title;
});

/*----------------------------------------------------------------------
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @param  strong  $hex   hex color e.g. #111111.
 * @param  integer $steps factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @return string        brightened/darkened hex color
 ----------------------------------------------------------------------*/
function igthemes_color_brightness( $hex, $steps ) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter.
    $steps  = max( -255, min( 255, $steps ) );
    // Format the hex color string.
    $hex    = str_replace( '#', '', $hex );
    if ( 3 == strlen( $hex ) ) {
        $hex    = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
    }
    // Get decimal values.
    $r  = hexdec( substr( $hex, 0, 2 ) );
    $g  = hexdec( substr( $hex, 2, 2 ) );
    $b  = hexdec( substr( $hex, 4, 2 ) );
    // Adjust number of steps and keep it inside 0 to 255.
    $r  = max( 0, min( 255, $r + $steps ) );
    $g  = max( 0, min( 255, $g + $steps ) );
    $b  = max( 0, min( 255, $b + $steps ) );
    $r_hex  = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
    $g_hex  = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
    $b_hex  = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
    return '#' . $r_hex . $g_hex . $b_hex;
}