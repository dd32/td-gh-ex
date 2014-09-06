<?php
/**
 * Get the google fonts from the API or in the cache
 *
 * @param  integer $amount
 *
 * @return String
 */
add_action( 'admin_init','generate_get_fonts' );
function generate_get_fonts( $amount = 1000 )
{
	if ( get_transient('generate_get_fonts') )
		return;
		
	$selectDirectory = '';

    $fontFileURI = GENERATE_URI . '/inc/addons/typography/google-web-fonts.txt';
    $fontFileDIR = GENERATE_DIR . '/inc/addons/typography/google-web-fonts.txt';

    if(file_exists($fontFileDIR))
    {
		$request = wp_remote_get( $fontFileURI );
        $response = wp_remote_retrieve_body( $request );
		$content = json_decode($response);
    }
	
	set_transient('generate_get_fonts', $content->items, WEEK_IN_SECONDS);

}