<?php
/**
* Template Name: Home Page
*
* Homepage for the theme.
* @package AccesspressLite
*/

get_header();


	
$accesspresslite_options = accesspress_default_setting_value();
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$home_template            = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : 'template_one';

if($home_template == 'template_one'){
    
    get_template_part( 'index', 'one' );
} 
else {
	get_template_part( 'index', 'two' );
}
		
		
	
get_footer();
