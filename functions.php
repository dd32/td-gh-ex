<?php 

// Uncomment this to test your localization, make sure to enter the right language code.
// function test_localization( $locale ) {
// 	return "nl_NL";
// }
// add_filter('locale','test_localization');

load_theme_textdomain('studiopress', TEMPLATEPATH.'/languages/');

// outputs the sidebar_alt.php file if the split blog layout theme is chosen
function sidebar_alt() {
    if(sp_get_option('blog_layout') == 'Split')
        include(TEMPLATEPATH."/sidebar-alt.php");
    else return;
}

// loads scripts
add_action('init', 'sp_load_scripts');
function sp_load_scripts() {
	if(!is_admin()) {
		wp_enqueue_script('ddsmoothmenu', get_bloginfo('template_directory').'/tools/js/menu/ddsmoothmenu.js.php', array('jquery'), '1.31');
		wp_enqueue_script('theme_js', get_bloginfo('template_directory').'/tools/js/common.js');
	}
}

// outputs the correct div (with id) depending on the option chosen
function sp_content_div() {
    $div = sp_get_option('blog_layout');
    if($div == 'Left') $div = 'right';
    elseif($div == 'Split') $div = 'split';
    else $div = 'left';
    echo '<div id="content'.$div.'">';
}

// includes the theme options
include(TEMPLATEPATH."/tools/theme-options.php");

// includes file for breadcrumbs
include(TEMPLATEPATH."/tools/breadcrumbs.php");

if ( function_exists('register_sidebars') ) {
	register_sidebar(array('name'=>'Sidebar','before_title'=>'<h4>','after_title'=>'</h4>'));
	register_sidebar(array('name'=>'Sidebar Alt','before_title'=>'<h4>','after_title'=>'</h4>'));
}

//	pulls theme options from database
function sp_get_option($key, $setting = null) {
	$setting = ($setting) ? $setting : SP_SETTINGS_FIELD;
	$option = get_option($setting);
	if(isset($option[$key])) return wp_kses_stripslashes(wp_kses_decode_entities($option[$key]));
	else return FALSE;
}
function sp_option($key, $settings = null) {
	echo sp_get_option($key, $setting);
}

// removes WP Generator for security reasons
remove_action('wp_head', 'wp_generator');
?>