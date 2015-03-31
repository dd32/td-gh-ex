<?php
/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2015 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings Framework
 *
 */

// Custom function to get one single option (returns option's value)
function wortex_get_option($option) {
	global $wortex_settings_slug;
	$wortex_settings = get_option($wortex_settings_slug);
	$value = "";
	if (is_array($wortex_settings)) {
		if (array_key_exists($option, $wortex_settings)) $value = $wortex_settings[$option];
	}
	return $value;
}

// Adds "Theme option" link under "Appearance" in WP admin panel
function wortex_settings_add_admin() {
	global $menu;
    $wortex_option_page = add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'icefit-settings', 'wortex_settings_page');
	add_action( 'admin_print_scripts-'.$wortex_option_page, 'wortex_settings_admin_scripts' );
}
add_action('admin_menu', 'wortex_settings_add_admin');

// Registers and enqueue js and css for settings panel
function wortex_settings_admin_scripts() {
	$wortex_template_directory_uri = get_template_directory_uri();
	wp_register_style( 'wortex_admin_css', $wortex_template_directory_uri .'/functions/icefit-options/style.css');
	wp_enqueue_style( 'wortex_admin_css' );
	wp_register_script( 'wortex_admin_js', $wortex_template_directory_uri . '/functions/icefit-options/functions.js', array( 'jquery' ), false, true );
	$wortex_translation_array = array(
		'settings_saved' => __( 'Settings saved.', 'wortex' ),
		'reset_confirm' => __( 'Are you sure you want to reset ALL settings for this theme to default values?', 'wortex' ),
	);
	wp_localize_script( 'wortex_admin_js', 'wortex_js_strings', $wortex_translation_array );
	wp_enqueue_script( 'wortex_admin_js' );
}

// Generates the settings panel's menu
function wortex_settings_machine_menu($options) {
	$output = "";
	foreach ($options as $arg) {
	
		if ( $arg['type'] == "start_menu" )
		{
			$output .= '<li class="icefit-admin-panel-menu-li '.$arg['id'].'"><a class="icefit-admin-panel-menu-link '.$arg['icon'].'" href="#'.$arg['name'].'" id="icefit-admin-panel-menu-'.$arg['id'].'"><span></span>'.$arg['name'].'</a></li>'."\n";
		} 
	}
	return $output;
}

// Generate the settings panel's content
function wortex_settings_machine($options) {
	global $wortex_settings_slug;
	$wortex_settings = get_option($wortex_settings_slug);
	$output = "";
	foreach ($options as $arg) {

		if ( is_array($arg) && is_array($wortex_settings) ) {
			if ( array_key_exists('id', $arg) ) {
				if ( array_key_exists($arg['id'], $wortex_settings) ) $val = stripslashes($wortex_settings[$arg['id']]);
				else $val = "";
			} else { $val = ""; }
		} else { $val = ""; }
		
		if ( $arg['type'] == "start_menu" )
		{
			$output .= '<div class="icefit-admin-panel-content-box" id="icefit-admin-panel-content-'.$arg['id'].'">';
		}				
		elseif ( $arg['type'] == "radio" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			if ( $val == "" && $arg['default'] != "") $wortex_settings[$arg['id']] = $val = $arg['default'];
			$values = $arg['values'];
			$output .= '<div class="radio-group">';
			foreach ($values as $value) {
			$output .= '<input type="radio" name="'.$arg['id'].'" value="'.$value['value'].'" '.checked($value['value'], $val, false).'>'.$value['display'].'<br/>';
			}
			$output .= '</div>';
			$output .= '<label class="desc">'. $arg['desc'] .'</label><br class="clear" />'."\n";
		}
		elseif ( $arg['type'] == "image" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			if ( $val == "" && $arg['default'] != "") $wortex_settings[$arg['id']] = $val = $arg['default'];
			$output .= '<input class="wortex_input_img" name="'. $arg['id'] .'" id="'. $arg['id'] .'" type="text" value="'. $val .'" />'."\n";
			$output .= '<div class="desc">'. $arg['desc'] .'</div><br class="clear">'."\n";
			$output .= '<input class="wortex_upload_button" name="'. $arg['id'] .'_upload" id="'. $arg['id'] .'_upload" type="button" value="' . __('Upload Image', 'wortex') . '">'."\n";
			$output .= '<input class="wortex_remove_button" name="'. $arg['id'] .'_remove" id="'. $arg['id'] .'_remove" type="button" value="' . __('Remove', 'wortex') . '"><br />'."\n";
			$output .= '<img class="wortex_image_preview" id="'. $arg['id'] .'_preview" src="'.$val.'"><br class="clear">'."\n";
		}
		elseif ( $arg['type'] == "gopro" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			$output .= sprintf( __('<p>Unleash the full potential of Wortex by upgrading to Wortex Pro!</p>
<p>The Pro version comes with a great set of awesome features:</p>
<ul>
<li>Fully <strong>Responsive Design</strong></li>
<li>Quick Setup <strong>Page Templates</strong></li>
<li><strong>Translation Ready</strong> (.POT file included)</li>
<li><strong>Child Theme</strong> support</li>
<li><strong>Wide</strong> or <strong>Boxed</strong> layout</li>
<li>(Pro only) <strong>Fixed header</strong> option</li>
<li>(Pro only) <strong>Unlimited colors</strong> and <strong>backgrounds</strong></li>
<li>(Pro Only) <strong>Unlimited Slideshows </strong><em>(NEW! the slider now supports videos from youtube and vimeo!)</em></li>
<li>(Pro Only) <strong>600+ Webfonts to choose from</strong> for content and various headings</li>
<li>(Pro Only) <strong>Tons of settings</strong> for heavy customizations (see screenshots)</li>
<li>(Pro Only) Revolutionary <strong>WYSIWYG Layout Builder</strong> in WP Visual editor</li>
<li>(Pro Only) <strong>Visual Shortcodes</strong>, fully integrated in WordPress\' Visual editor (no coding skills needed!)</li>
<li>(Pro Only) Powerful <strong>shortcodes</strong> and <strong>custom widgets</strong></li>
<li>(Pro Only) <strong>Portfolio</strong> section</li>
<li>(Pro Only) <strong>Partners and/or Clients\' logos</strong> carousel</li>
<li>(Pro Only) <strong>Clients\' testimonials</strong> carousel</li>
<li>(Pro Only) <strong>Unlimited sidebars</strong></li>
<li>(Pro Only) One click setup <strong>AJAX contact form</strong></li>
<li>(Pro Only) <strong>Google Maps</strong> API v3 integration</li>
<li>(Pro Only) <strong>Custom CSS support</strong> for advanced layout customizations</li>
<li>(Pro Only) <strong>Premium Class Pro dedicated Support Forum access</strong> (This alone is worth more than the price tag!)</li>
<li><a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html">GPLv2 License</a> : Buy once, use as many time as you wish!</li>
<li><strong>Cross-browsers support</strong>, optimized for IE8+, Firefox, Chrome, Safari and Opera (please note: IE7 and older are no longer supported.)</li>
<li>Lifetime <strong>free updates</strong> and continued support for the <strong>latest WordPress versions</strong></li>
<li>Currently supports WordPress from 3.5 up to 4.1.1</strong></li>
</ul>
<a href="%s" class="button-primary" target="_blank">Learn More and Upgrade Now!</a>', 'wortex'),
	'http://www.iceablethemes.com/shop/wortex-pro/');
		}
		elseif ( $arg['type'] == "support_feedback" )
		{
			$output .= '<h3>'.__('Get Support','wortex').'</h3>'."\n";
			$output .= '<p>'.__('Have a question? Need help?', 'wortex').'</p>';
			$output .= '<p><a href="http://www.iceablethemes.com/forums/forum/free-support-forum/wortex-lite/" target="_blank" class="button-primary">'.__('Visit the free wortex Lite support forums','wortex').'</a></p>';		

			$output .= '<h3>'.__('Give Feedback', 'wortex').'</h3>'."\n";
			$output .= '<p>'.__('Like this theme? We\'d love to hear your feedback!','wortex').'</p>';
			$output .= '<p><a href="http://wordpress.org/support/view/theme-reviews/wortex-lite" target="_blank" class="button-primary">'.__('Rate and review wortex Lite at WordPress.org','wortex').'</a></p>';		

			$output .= '<h3>'.__('Get social!', 'wortex').'</h3>'."\n";
			$output .= '<p>'.__('Follow and like IceableThemes!','wortex').'</p>';
			$output .= '<p id="social"></p>';
 
		}
		elseif ( $arg['type'] == "end_menu" )
		{
			$output .= '</div>';
		}
	}
	return $output;
}

// Ajax callback function for the "reset" button (resets settings to default)
function wortex_settings_reset_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'wortex'));
	global $wortex_settings_slug;
	// Get settings from the database
	$wortex_settings = get_option($wortex_settings_slug);
	// Get the settings template
	$options = wortex_settings_template();
	// Revert all settings to default value
	foreach($options as $arg){
		if ($arg['type'] != 'start_menu' && $arg['type'] != 'end_menu') {
			$wortex_settings[$arg['id']] = $arg['default'];
		}	
	}
	// Updates settings in the database	
	update_option($wortex_settings_slug,$wortex_settings);	
}
add_action('wp_ajax_wortex_settings_reset_ajax_post_action', 'wortex_settings_reset_ajax_callback');

// AJAX callback function for the "Save changes" button (updates user's settings in the database)
function wortex_settings_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'wortex'));
	global $wortex_settings_slug;
	// Check nonce
	check_ajax_referer('wortex_settings_ajax_post_action','wortex_settings_nonce');
	// Get POST data
	$data = $_POST['data'];
	parse_str($data,$input);
	// Get current settings from the database
	$wortex_settings = get_option($wortex_settings_slug);
	// Get the settings template
	$options = wortex_settings_template();

	// Validate input and update all settings according to POST data
	foreach($options as $option_array){

		if (isset($option_array['id']) && $option_array['type'] != 'start_menu' && $option_array['type'] != 'end_menu') {
			$id = $option_array['id'];
			if ($option_array['type'] == "radio" ) {
				$allowed_values = array();
				foreach ($option_array['values'] as $value):
					$allowed_values[] = $value['value'];
				endforeach;
			
				if ( in_array( $input[$option_array['id']], $allowed_values) ) {
					$new_value = $input[$option_array['id']];
				} else {
					$new_value = $option_array['default'];
				}
			} elseif ($option_array['type'] == "image") {
				$new_value = esc_url_raw($input[$option_array['id']]);
			}
			$wortex_settings[$id] = stripslashes($new_value);
		}

	}

	// Updates settings in the database
	update_option($wortex_settings_slug,$wortex_settings);	
}
add_action('wp_ajax_wortex_settings_ajax_post_action', 'wortex_settings_ajax_callback');

// NOJS fallback for the "Save changes" button
function wortex_settings_save_nojs() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'wortex'));
	global $wortex_settings_slug;
	// Get POST data
	//	parse_str($_POST,$output);
	// Get current settings from the database
	$wortex_settings = get_option($wortex_settings_slug);
	// Get the settings template
	$options = wortex_settings_template();
	// Updates all settings according to POST data
	foreach($options as $option_array){
	
		if (isset($option_array['id']) && $option_array['type'] != 'start_menu' && $option_array['type'] != 'end_menu') {
			$id = $option_array['id'];
			if ($option_array['type'] == "radio" ) {
				if ( in_array( $_POST[$option_array['id']], $option_array['values']) ) {
					$new_value = $_POST[$option_array['id']];
				} else {
					$new_value = $option_array['default'];
				}
			} elseif ($option_array['type'] == "image") {
				$new_value = esc_url_raw($_POST[$option_array['id']]);
			}
			$wortex_settings[$id] = stripslashes($new_value);
		}

	}

	// Updates settings in the database
	update_option($wortex_settings_slug,$wortex_settings);	
}

// Outputs the settings panel
function wortex_settings_page(){
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	global $wortex_settings_slug;
	global $wortex_settings_name;
	
	if (isset( $_POST['reset-no-js'] ) && $_POST['reset-no-js']) {
		wortex_settings_reset_ajax_callback();
		echo '<div class="updated fade"><p>'.__('Settings were reset to default.', 'wortex').'</p></div>';
	}
	
	if (isset( $_POST['save-no-js'] ) && $_POST['save-no-js']) {
		wortex_settings_save_nojs();
		echo '<div class="updated fade"><p>'.__('Settings updated.', 'wortex').'</p></div>';
	}

	?>

	<noscript><div id="no-js-warning" class="updated fade"><p><?php _e('<b>Warning:</b> Javascript is either disabled in your browser or broken in your WP installation.<br />
	This is ok, but it is highly recommended to activate javascript for a better experience.<br />
	If javascript is not blocked in your browser then this may be caused by a third party plugin.<br />
	Make sure everything is up to date or try to deactivate some plugins.', 'wortex'); ?></p></div></noscript><?php

	/* The automatically generated fallback menu is not responsive.
	 * Add a notice to warn users who did not set a primary menu. */
	if ( !has_nav_menu( 'primary' ) ):
	    echo '<div class="update-nag"><p>' . sprintf( __('<strong>Wortex Lite Notice:</strong> you have not set your primary menu yet, and your site is currently using a fallback menu which is not responsive. Please take a minute to <a href="%s">set your menu now</a>!','wortex'), admin_url('nav-menus.php') ) . '</p></div>';
    endif;

	?><div id="icefit-admin-panel" class="no-js">
		<form enctype="multipart/form-data" id="icefitform" method="POST">
			<div id="icefit-admin-panel-header">
				<div id="icon-options-general" class="icon32"><br></div>
				<h3><?php echo $wortex_settings_name; ?></h3>
			</div>
			<div id="icefit-admin-panel-main">
				<div id="icefit-admin-panel-menu">
					<ul>
						<?php echo wortex_settings_machine_menu( wortex_settings_template() ); ?>
					</ul>
				</div>
				<div id="icefit-admin-panel-content">
					<?php echo wortex_settings_machine( wortex_settings_template() ); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div id="icefit-admin-panel-footer">
				<div id="icefit-admin-panel-footer-submit">
					<input type="button" class="button" id="icefit-reset-button" name="reset" value="<?php _e('Reset Options','wortex'); ?>" />
					<input type="submit" value="<?php _e('Save all Changes','wortex'); ?>" class="button-primary" id="submit-button" />
					<!-- No-JS Fallback buttons -->
					<noscript>
					<input type="submit" class="button" id="icefit-reset-button-no-js" name="reset-no-js" value="<?php _e('Reset Options','wortex'); ?>" />
					<input type="submit" class="button-primary" id="submit-button-no-js" name="save-no-js" value="<?php _e('Save all Changes','wortex'); ?>" />
					</noscript>
					<!-- End No-JS Fallback buttons -->
					<div id="ajax-result-wrap"><div id="ajax-result"></div></div>
					<?php wp_nonce_field('wortex_settings_ajax_post_action','wortex_settings_nonce'); ?>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	<?php $options = wortex_settings_template(); ?>
		
		jQuery(document).ready(function(){

		<?php
			$has_image = false;
			foreach ($options as $arg) {
				if ( $arg['type'] == "image" ) {
					$has_image = true;
		?>
					jQuery(<?php echo "'#".$arg['id']."_upload'"; ?>).click(function() {
					formfield = <?php echo "'#".$arg['id']."'"; ?>;
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					return false;
					});
					
					jQuery(<?php echo "'#".$arg['id']."_remove'"; ?>).click(function() {
					formfield = <?php echo "'#".$arg['id']."'"; ?>;
					preview = <?php echo "'#".$arg['id']."_preview'"; ?>;
					jQuery(formfield).val('');
					jQuery(preview).attr("src",<?php echo "'".get_template_directory_uri(). "/functions/icefit-options/img/null.png'"; ?>);
					return false;
					});
					
		<?php	}
			}
			if ($has_image) {
		?>
			window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery(formfield).val(imgurl);
				jQuery(formfield+'_preview').attr("src",imgurl);
				tb_remove();
			}
		<?php } ?>
		});
	</script>
	<?php	
}
?>