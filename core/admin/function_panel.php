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

function wip_add_menu() {
	
	add_theme_page( __('Alhena Options.', 'wip' ), __('Alhena Options.', 'wip' ), 'administrator',  'themeoption', 'wip_themeoption');
	add_theme_page("Get Premium", "Get Premium", 'administrator',  'getpremium', 'wip_getpremium');
	
}

add_action('admin_menu', 'wip_add_menu'); 

function wip_themeoption() {
		
		$shortname = "wip";
		require_once get_template_directory() . '/core/admin/option/options.php';   

}

function wip_add_scripts() {
	
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

add_action('admin_init', 'wip_add_scripts');

function wip_save_options ( $panel ) {
	
	global $message_action;
	
	$wip_setting = get_option( wip_themename() );
	
	if ( $wip_setting != false ) {
			$wip_setting = maybe_unserialize( $wip_setting );
		} 
						
	else {
			$wip_setting = array();
		}      
		
	if ( "Save" == wip_request('action') )

	{
				

		foreach ($panel as $element ) 
		{
			
			if ( ( isset($element['tab']) )  && ( $element['tab'] == $_GET['tab'] ) ){
					
				foreach ($element as $value )
		
					{
		
						if ( $_REQUEST['element-opened'] == "Skins" ) {
								
								require_once get_template_directory() . '/core/admin/option/skins.php';
								update_option( wip_themename(), array_merge( $wip_setting  ,$current) );
								break;
							} 
						
						else if ( ( isset( $value['id']) ) && ( isset( $_POST[$value["id"]] ) ) && ( $value['id'] <> "wip_sidebars" ) ) {	
								
								$current[$value["id"]] = $_POST[$value["id"]]; 
								update_option( wip_themename(), array_merge( $wip_setting  ,$current) );
							}
							
						$message_action = 'Options saved successfully.';
					
					}
				
				}
		
			}
		}
}

function wip_message () 

	{
		global $message_action;
		if (isset($message_action))
		echo '<div id="message" class="updated fade message_save voobis_message"><p><strong>'.$message_action.'</strong></p></div>';
	}

function wip_getpremium() {	?>

	<a href="http://www.themeinprogress.com/?ref=panel" target="_blank" >
    	<img src="http://www.themeinprogress.com/images/alhenapremium.jpg" alt="Get Premium" style="margin:15px auto" />
    </a>

<?php } ?>
