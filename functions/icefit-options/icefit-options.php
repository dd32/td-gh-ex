<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013-2014 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings Framework
 *
 */

// Custom function to get one single option (returns option's value)
function boldr_get_option($option) {
	global $boldr_settings_slug;
	$boldr_settings = get_option($boldr_settings_slug);
	$value = "";
	if (is_array($boldr_settings)) {
		if (array_key_exists($option, $boldr_settings)) $value = $boldr_settings[$option];
	}
	return $value;
}

// Adds "Theme option" link under "Appearance" in WP admin panel
function boldr_settings_add_admin() {
	global $menu;
    $boldr_option_page = add_theme_page( __('Theme Options', 'boldr'), __('Theme Options','boldr'), 'edit_theme_options', 'icefit-settings', 'boldr_settings_page');
	add_action( 'admin_print_scripts-'.$boldr_option_page, 'boldr_settings_admin_scripts' );
}
add_action('admin_menu', 'boldr_settings_add_admin');

// Registers and enqueue js and css for settings panel
function boldr_settings_admin_scripts() {
	$boldr_template_directory_uri = get_template_directory_uri();
	wp_register_style( 'boldr_admin_css', $boldr_template_directory_uri .'/functions/icefit-options/style.css');
	wp_enqueue_style( 'boldr_admin_css' );

	wp_register_script( 'boldr_admin_js', $boldr_template_directory_uri . '/functions/icefit-options/functions.js', array( 'jquery' ), false, true );
	$boldr_translation_array = array(
		'settings_saved' => __( 'Settings saved.', 'boldr' ),
		'reset_confirm' => __( 'Are you sure you want to reset ALL settings for this theme to default values?', 'boldr' ),
	);
	wp_localize_script( 'boldr_admin_js', 'boldr_js_strings', $boldr_translation_array );
	wp_enqueue_script( 'boldr_admin_js' );



}

// Generates the settings panel's menu
function boldr_settings_machine_menu($options) {
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
function boldr_settings_machine($options) {
	global $boldr_settings_slug;
	$boldr_settings = get_option($boldr_settings_slug);
	$output = "";
	foreach ($options as $arg) {

		if ( is_array($arg) && is_array($boldr_settings) ) {
			if ( array_key_exists('id', $arg) ) {
				if ( array_key_exists($arg['id'], $boldr_settings) ) $val = stripslashes($boldr_settings[$arg['id']]);
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
			if ( $val == "" && $arg['default'] != "") $boldr_settings[$arg['id']] = $val = $arg['default'];
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
			if ( $val == "" && $arg['default'] != "") $boldr_settings[$arg['id']] = $val = $arg['default'];
			$output .= '<input class="boldr_input_img" name="'. $arg['id'] .'" id="'. $arg['id'] .'" type="text" value="'. esc_url($val) .'" />'."\n";
			$output .= '<br class="clear"><label>'. $arg['desc'] .'</label><br class="clear">'."\n";
			$output .= '<input class="boldr_upload_button" name="'. $arg['id'] .'_upload" id="'. $arg['id'] .'_upload" type="button" value="'.__('Upload Image','boldr').'">'."\n";
			$output .= '<input class="boldr_remove_button" name="'. $arg['id'] .'_remove" id="'. $arg['id'] .'_remove" type="button" value="'.__('Remove','boldr').'"><br />'."\n";
			$output .= '<img class="boldr_image_preview" id="'. $arg['id'] .'_preview" src="'.esc_url($val).'"><br class="clear">'."\n";
		}
		elseif ( $arg['type'] == "gopro" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			$output .= sprintf( __('<p>Unleash the full potential of BoldR by upgrading to BoldR Pro!</p>
<p>The Pro version comes with a great set of awesome features:</p>
<ul>
<li>(Lite & Pro) Fully <strong>Responsive Design</strong></li>
<li>(Lite & Pro) <strong>Translation Ready</strong> (.POT file included)</li>
<li>(Lite & Pro) <strong>Child Theme</strong> support</li>
<li>(Lite & Pro) 2 <strong>Widgetized areas</strong> (Sidebar and Footer)</li>
<li>(Lite & Pro) <strong>Custom background</strong></li>
<li>(Pro Only) <strong>Unlimited sidebars and footers</strong> with different widgets for different pages</li>
<li>(Pro Only) Quick Setup <strong>Page Templates</strong></li>
<li>(Pro Only) <strong>Right, Left or Dual Sidebar or Full Width</strong> templates for pages and blog.</li>
<li>(Pro Only) <strong>Built-in Slider</strong> for <strong>Unlimited Slideshows</strong></li>
<li>(Pro Only) <strong>Wide</strong> or <strong>Boxed</strong> layout</li>
<li>(Pro Only) <strong>Portfolio</strong> section</li>
<li>(Pro Only) <strong>Unlimited colors</strong></li>
<li>(Pro Only) <strong>650 Webfonts</strong> to choose from</li>
<li>(Pro Only) <strong>Comprehensive settings panel</strong> with dozens of options</li>
<li>(Pro Only) <strong>Sticky (fixed) Navbar or Header</strong> for enhanced navigation</li>
<li>(Pro Only) jQuery <strong>"Slide-in" mobile menu</strong> in responsive mode</li>
<li>(Pro Only) Enhanced <strong>WYSIWYG Layout Builder</strong> in WP Visual Editor</li>
<li>(Pro Only) <strong>Visual Shortcodes</strong>, fully integrated in WordPress\' Visual editor (no coding!)</li>
<li>(Pro Only) Powerful <strong>shortcodes</strong> and <strong>custom widgets</strong></li>
<li>(Pro Only)<strong> Partners and/or Clients\' logos</strong> carousel</li>
<li>(Pro Only) <strong>Clients\' testimonials</strong> carousel</li>
<li>(Pro Only) One click setup <strong>AJAX contact form</strong></li>
<li>(Pro Only) <strong>Google Maps</strong> API v3 integration</li>
<li>(Pro Only) <strong>Custom CSS</strong> support for even more advanced layout customizations</li>
<li>(Pro Only) <strong>Pro dedicated support forum</strong> access</li>
<li><a href="http://www.gnu.org/licenses/" target="_blank">GPL License</a> : Buy once, use as many times as you wish!</li>
<li><strong>Cross-browsers support</strong>, optimized for IE8+, Firefox, Chrome, Safari and Opera (note: IE7 and older are no longer supported.)</li>
<li>Lifetime <strong>free updates</strong> and continued support for the <strong>latest WordPress versions</strong></li>
<li>Currently supports <strong>WordPress from 3.5 up to 4.1</strong></strong></li>
</ul>
<a href="%s" class="button-primary" target="_blank">Learn More and Upgrade Now!</a>', 'boldr'),
						'http://www.iceablethemes.com/shop/boldr-pro/?utm_source=lite_theme&utm_medium=go_pro&utm_campaign=boldr_lite');
		}
		elseif ( $arg['type'] == "support_feedback" )
		{
			$output .= '<h3>'.__('Get Support','boldr').'</h3>'."\n";
			$output .= '<p>'.__('Have a question? Need help?', 'boldr').'</p>';
			$output .= '<p><a href="http://www.iceablethemes.com/forums/forum/free-support-forum/boldr-lite/?utm_source=lite_theme&utm_medium=support_forums&utm_campaign=boldr_lite" target="_blank" class="button-primary">'.__('Visit the free BoldR Lite support forums','boldr').'</a></p>';		

			$output .= '<h3>'.__('Give Feedback', 'boldr').'</h3>'."\n";
			$output .= '<p>'.__('Like this theme? We\'d love to hear your feedback!','boldr').'</p>';
			$output .= '<p><a href="http://wordpress.org/support/view/theme-reviews/boldr-lite" target="_blank" class="button-primary">'.__('Rate and review BoldR Lite at WordPress.org','boldr').'</a></p>';		

			$output .= '<h3>'.__('Get social!', 'boldr').'</h3>'."\n";
			$output .= '<p>'.__('Follow and like IceableThemes!','boldr').'</p>';
			$output .= '<p id="social"></p>';
 
		}
		elseif ( $arg['type'] == "end_menu" )
		{
			$output .= '</div>';
		} 
	}
	return $output;
}

// AJAX callback function for the "reset" button (resets settings to default)
function boldr_settings_reset_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'boldr'));
	global $boldr_settings_slug;
	// Get settings from the database
	$boldr_settings = get_option($boldr_settings_slug);
	// Get the settings template
	$options = boldr_settings_template();
	// Revert all settings to default value
	foreach($options as $arg){
		if ($arg['type'] != 'start_menu' && $arg['type'] != 'end_menu' && isset($arg['default'])) {
			$boldr_settings[$arg['id']] = $arg['default'];
		}	
	}
	// Updates settings in the database	
	update_option($boldr_settings_slug,$boldr_settings);	
}
add_action('wp_ajax_boldr_settings_reset_ajax_post_action', 'boldr_settings_reset_ajax_callback');

// AJAX callback function for the "Save changes" button (updates user's settings in the database)
function boldr_settings_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'boldr'));
	global $boldr_settings_slug;
	// Check nonce
	check_ajax_referer('boldr_settings_ajax_post_action','boldr_settings_nonce');
	// Get POST data
	$data = $_POST['data'];
	parse_str($data,$input);
	// Get current settings from the database
	$boldr_settings = get_option($boldr_settings_slug);
	// Get the settings template
	$options = boldr_settings_template();

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
			$boldr_settings[$id] = stripslashes($new_value);
		}

	}

	// Updates settings in the database
	update_option($boldr_settings_slug,$boldr_settings);	
}
add_action('wp_ajax_boldr_settings_ajax_post_action', 'boldr_settings_ajax_callback');

// NOJS fallback for the "Save changes" button
function boldr_settings_save_nojs() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'boldr'));
	global $boldr_settings_slug;
	// Get POST data
	//	parse_str($_POST,$output);
	// Get current settings from the database
	$boldr_settings = get_option($boldr_settings_slug);
	// Get the settings template
	$options = boldr_settings_template();
	// Updates all settings according to POST data
	foreach($options as $option_array){
	
		if ( isset($option_array['id']) && $option_array['type'] != 'start_menu' && $option_array['type'] != 'end_menu' ) {
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
			$boldr_settings[$id] = stripslashes($new_value);
		}
	}

	// Updates settings in the database
	update_option($boldr_settings_slug,$boldr_settings);	
}

// Outputs the settings panel
function boldr_settings_page(){
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	global $boldr_settings_slug;
	global $boldr_settings_name;
	
	if (isset( $_POST['reset-no-js'] ) && $_POST['reset-no-js']) {
		boldr_settings_reset_ajax_callback();
		echo '<div class="updated fade"><p>'.__('Settings were reset to default.', 'boldr').'</p></div>';
	}
	
	if (isset( $_POST['save-no-js'] ) && $_POST['save-no-js']) {
		boldr_settings_save_nojs();
		echo '<div class="updated fade"><p>'.__('Settings updated.', 'boldr').'</p></div>';
	}

	?>

	<noscript><div id="no-js-warning" class="updated fade"><p><?php _e('<b>Warning:</b> Javascript is either disabled in your browser or broken in your WP installation.<br />
	This is ok, but it is highly recommended to activate javascript for a better experience.<br />
	If javascript is not blocked in your browser then this may be caused by a third party plugin.<br />
	Make sure everything is up to date or try to deactivate some plugins.', 'boldr'); ?></p></div></noscript><?php

	/* The automatically generated fallback menu is not responsive.
	 * Add a notice to warn users who did not set a primary menu. */
    if  ( !has_nav_menu( 'primary' ) ):
	    echo '<div class="update-nag"><p>' . sprintf( __('<strong>BoldR Lite Notice:</strong> you have not set your primary menu yet, and your site is currently using a fallback menu which is not responsive. Please take a minute to <a href="%s">set your menu now</a>!','boldr'), admin_url('nav-menus.php') ) . '</p></div>';
    endif;

	?><div id="icefit-admin-panel" class="no-js">
		<form enctype="multipart/form-data" id="icefitform" method="POST">
			<div id="icefit-admin-panel-header">
				<div id="icon-options-general" class="icon32"><br></div>
				<h3><?php echo $boldr_settings_name; ?></h3>
			</div>
			<div id="icefit-admin-panel-main">
				<div id="icefit-admin-panel-menu">
					<ul>
						<?php echo boldr_settings_machine_menu( boldr_settings_template() ); ?>
					</ul>
				</div>
				<div id="icefit-admin-panel-content">
					<?php echo boldr_settings_machine( boldr_settings_template() ); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div id="icefit-admin-panel-footer">
				<div id="icefit-admin-panel-footer-submit">
					<input type="button" class="button" id="icefit-reset-button" name="reset" value="<?php _e('Reset Options','boldr'); ?>" />
					<input type="submit" value="<?php _e('Save all Changes','boldr'); ?>" class="button-primary" id="submit-button" />
					<!-- No-JS Fallback buttons -->
					<noscript>
					<input type="submit" class="button" id="icefit-reset-button-no-js" name="reset-no-js" value="<?php _e('Reset Options','boldr'); ?>" />
					<input type="submit" class="button-primary" id="submit-button-no-js" name="save-no-js" value="<?php _e('Save all Changes','boldr'); ?>" />
					</noscript>
					<!-- End No-JS Fallback buttons -->
					<div id="ajax-result-wrap"><div id="ajax-result"></div></div>
					<?php wp_nonce_field('boldr_settings_ajax_post_action','boldr_settings_nonce'); ?>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	<?php $options = boldr_settings_template(); ?>
		
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