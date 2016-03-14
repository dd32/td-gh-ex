<?php add_action('admin_menu','becorp_add_opiotn_page');
function becorp_add_opiotn_page(){
$page = add_theme_page( __('becorp','becorp'), __('Theme Options','becorp'), 'edit_theme_options', 'becorp', 'becorp_option_panal_function' );
add_action('admin_print_styles-'.$page, 'becorp_admin_enqueue_scripts');
} 

 function becorp_admin_enqueue_scripts()
{
		/*====Becorp Option Panel Style====*/
		wp_enqueue_style('thickbox');	
		wp_enqueue_style('becorp-style', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/style.css');//enqueu 
		wp_enqueue_style('becorp-bootstrap', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/bootstrap.css');//enqueu option panel bootstrap
		wp_enqueue_style('becorp-font-awesome-4.2.0', ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/font-awesome-4.2.0/css/font-awesome.min.css');//enqueu option panel font-awesome-4.2.0
}
 
function becorp_option_panal_function()
{	require_once('becorp-option-panel.php'); }
?>
