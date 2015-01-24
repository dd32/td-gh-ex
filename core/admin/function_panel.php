<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function diarjolite_add_menu() {
	
	global $themename, $adminmenuname, $optionfile;
	add_theme_page(__('Diarjo Options', 'diarjolite' ), __('Diarjo Options', 'diarjolite' ), 'administrator',  'diarjolite_option', 'diarjolite_option');

}

add_action('admin_menu', 'diarjolite_add_menu'); 

function diarjolite_option() {
		
		$shortname = "diarjolite";
		require_once dirname(__FILE__) . '/option/options.php';   

}

function diarjolite_add_script() {
	
	 global $wp_version;
     wp_enqueue_style( "thickbox" );
     add_thickbox();

	 $file_dir = get_template_directory_uri()."/core/admin/include";

	 wp_enqueue_style ( 'wip_panel', $file_dir.'/css/wip_panel.css' ); 
	 wp_enqueue_style ( 'wip_on_off', $file_dir.'/css/wip_on_off.css' );
	
	 wp_enqueue_script( 'wip_panel', $file_dir.'/js/wip_panel.js',array('jquery','media-upload','thickbox'),'1.0',TRUE ); 
	 wp_enqueue_script( 'wip_on_off', $file_dir.'/js/wip_on_off.js','3.5', '', TRUE); 
	
	 wp_enqueue_script( "jquery-ui-core", array('jquery'));
	 wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	 wp_enqueue_script( "jquery-ui-sortable", array('jquery'));

}

add_action('admin_init', 'diarjolite_add_script');

function diarjolite_save_option ( $panel ) {
	
	global $message_action;
	
	$diarjolite_setting = get_option( diarjolite_themename() );
	
	if ( $diarjolite_setting != false ) {
			$diarjolite_setting = maybe_unserialize( $diarjolite_setting );
		} 
						
	else {
			$diarjolite_setting = array();
		}      
		
	if ( "Save" == diarjolite_request('action') ) {
				
		foreach ($panel as $element ) {
			
			if ( ( isset($element['tab']) )  && ( $element['tab'] == $_GET['tab'] ) ){
					
				foreach ($element as $value )
		
					{
		
						if ( $_REQUEST['element-opened'] == "Skins" ) {
								
								require_once dirname(__FILE__) . '/option/skins.php';
								update_option( diarjolite_themename(), array_merge( $diarjolite_setting  ,$current) );
								break;
								
						} 
						
						else if ( ( isset( $value['id']) ) && ( isset( $_POST[$value["id"]] ))) {	
							
							if ($value["type"] == "url"):
							
								$current[$value["id"]] = esc_url_raw($_POST[$value["id"]]); 
								
							else:
							
								$current[$value["id"]] = stripslashes($_POST[$value["id"]]); 
								
							endif;
							
								update_option( diarjolite_themename(), array_merge( $diarjolite_setting  ,$current) );
								
						}
							
						$message_action = 'Options saved successfully.';
					
					}
				
				}
		
			}
		}
}

function diarjolite_message () {
		global $message_action;
		if (isset($message_action))
		echo '<div id="message" class="updated fade message_save voobis_message"><p><strong>'.$message_action.'</strong></p></div>';
	}

?>