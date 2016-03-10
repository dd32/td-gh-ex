<?php
function webriti_scripts()
{	
	$corpbiz_options=theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options );
	wp_enqueue_style( 'corpbiz-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap-css', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style('corpbiz-default', WEBRITI_TEMPLATE_DIR_URI . '/css/default.css');
	wp_enqueue_style('theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');
	wp_enqueue_style('media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');
	wp_enqueue_style('corpbiz-font-awesome-min',WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('corpbiz-theme-element', WEBRITI_TEMPLATE_DIR_URI . '/css/element.css');	
	
	
	wp_enqueue_script('menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_script('bootstrap-min', WEBRITI_TEMPLATE_DIR_URI .'/js/bootstrap.min.js');
	
	if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
	
}
add_action('wp_enqueue_scripts', 'webriti_scripts');

// Adding custom enqueue scripts
function corpbiz_custom_scripts(){
$corpbiz_options=theme_data_setup();
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options );	
if($current_options['webrit_custom_css']!='') {  ?>
<style>
<?php echo $current_options['webrit_custom_css']; ?>
</style>
<?php } 
if($current_options['google_analytics']!='') {  ?>
<script type="text/javascript">
<?php echo $current_options['google_analytics']; ?>
</script>
<?php } }
add_action( 'wp_head', 'corpbiz_custom_scripts' ); 

/*--------------------------------------------*/
/*    admin enqueue script function 
/*--------------------------------------------*/

function corpbiz_enqueue_scripts(){
	wp_enqueue_style('corpbiz_customizer-css', WEBRITI_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action( 'admin_enqueue_scripts', 'corpbiz_enqueue_scripts' );
?>