<?php
/*
	Theme options
	@since 1.3.4
*/
function theme_options_page() {
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'theme-options.php', 'artikler_options_page');
}
add_action('admin_menu', 'theme_options_page');

function artikler_options_page() { ?> 
<div id="theme-options-wrap">
<div id="icon-themes" class="icon32"></div>
 <h1>Artikler Theme Options</h1>
 <p>If you <strong>like</strong> this theme.
 Please <a href="https://wordpress.org/support/view/theme-reviews/artikler" target="_blank">review</a> and <a href="https://wordpress.org/themes/artikler" target="_blank">rating</a> this theme.</p>
   <form method="post" action="options.php" enctype="multipart/form-data">
   <?php settings_fields('theme_options');
   do_settings_sections(__FILE__); ?> 
   <p class="submit"> <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /> </p>
   </form> 
  </div> 
<?php } 

function register_and_build_fields() {
	register_setting('theme_options', 'theme_options', 'validate_setting');
	
	add_settings_section('header_settings', 'Header Options', 'section_basic', __FILE__);
	function section_basic() {} 
		add_settings_field('logo_url', 'Logo Image (URL)', 'logo_url', __FILE__, 'header_settings'); 
		
	add_settings_section('footer_settings', 'Footer Options', 'section_footer', __FILE__);
	function section_footer() {} 
		add_settings_field('aboutus', 'About US', 'aboutus', __FILE__, 'footer_settings');
		add_settings_field('facebookurl', 'Facebook URL', 'facebookurl', __FILE__, 'footer_settings');
		add_settings_field('googleurl', 'Google+ URL', 'googleurl', __FILE__, 'footer_settings');
		add_settings_field('twitterurl', 'Twitter URL', 'twitterurl', __FILE__, 'footer_settings'); 
}
add_action('admin_init', 'register_and_build_fields');

function validate_setting($theme_options) {
	return $theme_options; 
} 
function logo_url() {
	$options = get_option('theme_options'); 
	echo "<input name='theme_options[logo_url]' type='text' value='{$options['logo_url']}' />";
	print '<code>Recommend: 70px &gt; height of image </code>';
} 
function aboutus() {
	$options = get_option('theme_options'); 
	echo "<textarea  cols='18' rows='3' name='theme_options[aboutus]'>{$options['aboutus']}</textarea>";
} 
function facebookurl() { 
	$options = get_option('theme_options'); 
	echo "<input name='theme_options[facebookurl]' type='text' value='{$options['facebookurl']}' />"; 
}
function googleurl() { 
	$options = get_option('theme_options'); 
	echo "<input name='theme_options[googleurl]' type='text' value='{$options['googleurl']}' />"; 
}
function twitterurl() { 
	$options = get_option('theme_options'); 
	echo "<input name='theme_options[twitterurl]' type='text' value='{$options['twitterurl']}' />"; 
} 
?>
