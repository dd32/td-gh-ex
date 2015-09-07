<?php
function weaverx_customize_preview_js() {
	$option_menu = site_url('/wp-admin/themes.php?page=WeaverX', 'relative');

	$content = "<script>jQuery('#customize-info').append('<div class=\"use-theme-options\"><a href=\"{$option_menu}\" target=\"_blank\">Weaver Xtreme Options on Appearance Menu</a></div>')</script>";
	echo $content;
}
add_action('customize_controls_print_footer_scripts', 'weaverx_customize_preview_js');

/*
 * Customizer scripts
 */
function weaverx_enqueue_customizer_scripts(){

	// stylesheet for customizer
	wp_enqueue_style('weaverx-customizer-styles', get_template_directory_uri() . '/admin/assets/css/customizer'.WEAVERX_MINIFY.'.css');

}
add_action('customize_controls_enqueue_scripts','weaverx_enqueue_customizer_scripts');
?>
