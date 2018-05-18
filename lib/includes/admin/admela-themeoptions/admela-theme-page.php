<?php
/* Admela : Add Settings Page to Menu settings
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */



/**
* Add Settings Page to Menu
*/


$admela_options = get_option( 'admela_theme_settings' );

if(! function_exists( 'admela_menusettingspage' )):	

function admela_menusettingspage() {

add_theme_page( esc_html__( 'Admela Theme Options' , 'admela' ), esc_html__( 'Admela Theme Options' , 'admela' ), 'manage_options', 'settings', 'admela_theme_settings_page');
	
}

endif;


function get_options() {

global $wpdb;

//prepare data options for admela themesettings

$admelathemeoptions_sql = 
$wpdb->prepare( "
SELECT option_name,
option_value FROM {$wpdb->options} 
WHERE option_name = %s",
'admela_theme_settings'
);

//get results 
$admelathemeoption_tlbkresults = $wpdb->get_results( $admelathemeoptions_sql );

return $admelathemeoption_tlbkresults;

}




