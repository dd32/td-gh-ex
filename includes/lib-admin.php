<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/*	Weaver Xtreme Theme

  This file contains all the functions needed to interact with the different
  options and settings.

  Options are saved in the WP DB in one option called 'weaverx_main_settings'.

	This file includes the interface to the WP Settings API.

   Because the SAPI is quite limiting on the format of the output fields
   supported by add_settings_field, we will not use that part.

   Settings that need validation and nonce handling, we use our function weaverx_sapi_main_name() that
   generates the <input name="weaverx_main_settings[option_name]" ...> format required for
   processing by the sapi handlers. They create an array called $_POST['weaverx_main_settings']. Each
   setting in that array corresponds to a Weaver Xtreme option value, and will be passed to the
   validation function.

   We will wrap the main form (Main Options) with our functions
   weaverx_sapi_form_top() and weaverx_sapi_form_bottom() that generates required calls to sapi.

   All other forms will use submit buttons that include their own nonce definition. Other forms generally
   do not change individual settings, but take actions such as save/restore or setting a subtheme.
*/


/*
	================= Main SAPI helper functions =================
*/

function weaverx_sapi_form_top($group, $form_name='') {
	/* beginning of a form */
	$name = '';
	if ($form_name != '') $name = 'name="' . $form_name . '"';

	echo("<form action=\"options.php\" $name method=\"post\">\n");	/* <form action="options.php" method="post"> */
	settings_fields($group);		// use our one set of settings
}

function weaverx_sapi_form_bottom($form_name='end of form') {

	$non_sapi = array(		// non-sapi elements in the db
		'weaverx_version_id', 'style_version',
		'theme_filename', 'addon_name', '_hide_theme_thumbs', 'last_option'
	);

	/*	The following code allows the SAPI to save the non-sapi values. If you don't do this here,
		then the values will be set to false, and be lost! SAPI is not tolerant of submitting a form
		that doesn't include EVERY setting for the form group. */

	foreach ($non_sapi as $name) {
?>
	<input name="<?php weaverx_sapi_main_name($name); ?>" id="<?php echo $name;?>" type="hidden" value="<?php echo weaverx_getopt($name); ?>" />
<?php
	}
	weaverx_setopt('last_option','Weaver Xtreme');	// Safety check for limited PHP $_POST variables
	echo ("</form> <!-- $form_name -->\n");
}

function weaverx_sapi_submit( $before='', $after='', $show_more_opts = false ) {
	// generate a submit button for the form
	$submit_label = __('Save Settings', 'weaver-xtreme' /*adm*/);
	echo $before;
?>
	<span style="display:inline;"><input name="save_options" type="submit" style="margin-top:10px;" class="button-primary" value="<?php echo($submit_label); ?>" />
<?php
	echo "</span>\n" . $after ;

}

function weaverx_form_submit($value) {
	weaverx_sapi_submit('</table>','<table style="margin-top:10px;">');
}

function weaverx_sapi_main_name($id, $echo=true) {
	/* generate the SAPI name for 'weaverx_settings' */
	$name = apply_filters('weaverx_options','weaverx_settings');
	if ($echo) echo $name. '[' . $id . ']';
	return $name . '[' . $id . ']';
}

/*
	============== Validation =====================
*/
function weaverx_validate_all_options($in) {
	/* validation for all options  */
	$err_msg = '';			// no error message yet

	if (empty($in)) {
		wp_die( __( 'You attempted to save options, but something has gone wrong. Please be sure you are logged in and your host is correctly configured. See the "Weaver Doesn\'t Save Settings" FAQ on weavertheme.com.' ,'weaver-xtreme') );
	}

	if (!current_user_can('edit_theme_options')) {
		wp_die( __( 'You do not have sufficient permissions to manage options for this site.' ,'weaver-xtreme') );
	}

	$wvr_last = '';


	foreach ($in as $key => $value) {
		switch ($key) {

			/* -------- integer -------- */
			case 'excerpt_length':

				if (!empty($value) && (!is_numeric($value) || !is_int((int)$value))) {
					$opt_id = str_replace('', '', $key);
					$opt_id = str_replace('_', ' ', $opt_id);
					$err_msg .= __('Option must be an integer value: ', 'weaver-xtreme' /*adm*/) . '"'. $opt_id . '" = "' . $value . '".'
						. __(' Value has been cleared to blank value', 'weaver-xtreme' /*adm*/) . '<br />';
					$in[$key] = '';
				}
				break;

			/* ---------- text ----------- */
			case 'excerpt_more_msg':
			case 'header_maxwidth':

				if (!empty($value))
					$in[$key] = weaverx_filter_textarea($value);
				break;

			case 'themename':       // can't be empty!
				if (empty($value))
					$in[$key] = 'please-give-this-a-name';
				else
					$in[$key] = weaverx_filter_textarea($value);
				break;


			/* code */
			case 'copyright':		// Alternate copyright
			case '_css_rows':
				if (!empty($value)) {
					$in[$key] = weaverx_filter_code($value);
				}
				break;


			case '_perpagewidgets':       	// Add widget areas for per page - names must be lower case
				if (!empty($value)) {
					$in[$key] = strtolower(str_ireplace(' ','',weaverx_filter_code($value)));
				}
				break;

			case '_althead_opts':
			case 'head_opts':
				if ( !empty( $value ) ) {
					$in[$key] = weaverx_filter_head( $value );
				}
				break;

			case 'wvrx_css_saved':
				if ( !empty( $value ) ) {
					$in[$key] = weaverx_filter_code( $value );
					//$in[$key] = wp_filter_post_kses( trim(stripslashes($value)) );
				}
				break;


			/* must not have <style .... </style> */
			case 'add_css':              	// Add CSS Rules to Weaver Xtreme's style rules

				if (!empty($value)) {
					$val = weaverx_filter_code($value);
					$in[$key] = $val;
					if (stripos($val,'<style') !== false || stripos($val, '</style') !== false ||
						stripos($val,'<script') !== false || stripos($val, '</script') !== false) {
						$err_msg .= __('&lt;style&gt; or &lt;script&gt; tags have been automatically stripped from your "Add CSS Rules"!', 'weaver-xtreme' /*adm*/)
						. ' ' . __('Please correct your entry.', 'weaver-xtreme' /*adm*/) . '<br />';
						$in[$key] = wp_filter_post_kses( trim(stripslashes($val)) );
					}
				}
				break;

			case '_fonts_google':
				$in[$key] = $value;
				break;

			case 'menu_primary_trigger_int':
			case 'menu_secondary_trigger_int':
				if ($value >= 768) {
					$err_msg = __('Menu trigger value must be less than 768.', 'weaver-xtreme' /*adm*/) . '<br />';
					$value = '';
				}
				$in[$key] = $value;
				break;

			case 'last_option':		// check for last_option...
				if (!empty($value))
					$wvr_last = $value;
				break;

			default:				/* to here, then colors, _css, or checkbox/selectors */
				$keylen = strlen($key);

				if (strrpos($key,'_css') == $keylen-4)  {	// all _css settings
					if (!empty($value)) {
						$val = weaverx_filter_code($value);
						if (stripos($val,'<style') !== false || stripos($val, '</style') !== false ||
							stripos($val,'<script') !== false || stripos($val, '</script') !== false) {
							$err_msg .= __('&lt;style&gt; or &lt;script&gt; tags have been automatically stripped from your CSS+ rules,', 'weaver-xtreme' /*adm*/)
							. ' ' . __('Please correct your entry.', 'weaver-xtreme' /*adm*/) . '<br />';
							$val = wp_filter_post_kses( trim($val) );
						}

						$in[$key] = $val;

						if (strpos($val, '{') === false || strpos($val, '}') === false) {
							$opt_id = str_replace('_css', '', $key);	// kill _css
							$opt_id = str_replace('', '', $opt_id);
							$opt_id = str_replace('_', ' ', $opt_id);
							$err_msg .= __('CSS options must be enclosed in {}\'s: ', 'weaver-xtreme' /*adm*/) . '"'. $opt_id . '" = "' . $value . '". '
							. __('Please correct your entry.', 'weaver-xtreme' /*adm*/) . '<br />';
						}
					}
					break;
				} // _css

				if (strrpos($key,'_insert') == $keylen-7) {	// all _insert settings
					if (!empty($value)) {
						$val = weaverx_filter_code($value);
						$in[$key] = $val;
						}
					break;
				} // _insert

				if (strrpos($key,'_url') == $keylen-4) {	// all _url settings
					if (!empty($value)) {
						$val = weaverx_filter_code($value);	// can't use esc_url because that forces a leading html{background-image: url(%template_directory%assets/images/addon_themes.png);}
						$in[$key] = $val;
					}
					break;
				} // _insert

				if (strrpos($key,'_dec') == $keylen-4) {
					if (!empty($value) && !is_numeric($value)) {
						$opt_id = str_replace('', '', $key);
						$opt_id = str_replace('_dec', '', $opt_id);
						$opt_id = str_replace('_', ' ', $opt_id);
						$err_msg .= __('Option must be a numeric value: ', 'weaver-xtreme' /*adm*/) . '"'. $opt_id . '" = "' . $value . '". '
							. __('Value has been cleared to blank value.', 'weaver-xtreme' /*adm*/) . '<br />';
						$in[$key] = '';
					}
					break;
				}

				if (strrpos($key,'_int') == $keylen-4 ||	// _int settings
					strrpos($key,'_X') == $keylen-2 ||
					strrpos($key,'_Y') == $keylen-2 ||
					strrpos($key,'_L') == $keylen-2 ||
					strrpos($key,'_R') == $keylen-2 ||
					strrpos($key,'_T') == $keylen-2 ||
					strrpos($key,'_B') == $keylen-2 ) {
					if (!empty($value) && (!is_numeric($value) || !is_int((int)$value))) {
						$opt_id = str_replace('', '', $key);
						$opt_id = str_replace('_int', '', $opt_id);
						$opt_id = str_replace('_', ' ', $opt_id);
						$err_msg .= __('Option must be a numeric value: ', 'weaver-xtreme' /*adm*/) . '"'. $opt_id . '" = "' . $value . '". '
							. __('Value has been cleared to blank value.', 'weaver-xtreme' /*adm*/) . '<br />';
						$in[$key] = '';
					}
					break;
				}

				if (strrpos($key,'color') == $keylen-5) {	// _bgcolor and _color (order here important - after _css, etc.)
					if (!empty($value)) {

						$val = trim(weaverx_filter_code($value));
						if (preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/i', $val)) {	// hex value
							$val = strtoupper($val);		// force hex values to upper case, just to be tidy
							if ($val[0] != '#') $val = '#' . $val;
							$in[$key] = $val;
						} else if (preg_match("/^([a-zA-Z])+$/i", $val)) {	// name - all letters
							$in[$key] = $val;
						} else {		// only legal things left are rgb and rgba
							$isrgb = strpos( $val, 'rgb' );
							$ishsa = strpos( $val, 'hsl' );
							if ($isrgb === false && $ishsa === false) {
								if ( $value == ' ') {
									$in[$key] = '';
								} else {
									$err_msg .= __('Color must be a valid # hex value, rgb value, or color name (a-z): ', 'weaver-xtreme' /*adm*/) .
									'"'. $key . '" = "' . bin2hex($value) . '". ' .
									__('Value has been cleared to blank value.', 'weaver-xtreme' /*adm*/) . '<br />';
								}
								$in[$key] = '';
							} else {
								$in[$key] = $val;
							}
						}
					}
					break;
				}

				if (!empty($value) && is_string($value) && !is_numeric($value)) { $in[$key] = weaverx_filter_textarea($value); }

				break;
		}
	}

	if (false && $wvr_last != 'Weaver Xtreme') {
		$err_msg .= __('Warning - your host may be configured to limit how many input var options you are allowed to pass via PHP.' .
		' Unfortunately, this means your settings may not be saved correctly. See the "Weaver II Doesn\'t Save Settings" FAQ on weavertheme.com.<br />', 'weaver-xtreme' /*adm*/);
	}


	if (!empty($err_msg)) {
		add_settings_error('weaverx_settings', 'settings_error', $err_msg, 'error');
	} else {
		add_settings_error('weaverx_settings', 'settings_updated', __('Weaver Xtreme Settings Saved.', 'weaver-xtreme' /*adm*/), 'updated');
	}

	return $in;
}

// ========================== utils ==================================

function weaverx_end_of_section($who = '') {
	echo '<hr />';
	$name = weaverx_getopt('themename');
	if ( ! $name )
		$name = __('Please set theme name on the Advanced Options &rarr; Admin Options tab.', 'weaver-xtreme' /*adm*/);

	printf(__("%s %s | Options Version: %s | Subtheme: %s\n", 'weaver-xtreme' /*adm*/),WEAVERX_THEMENAME, WEAVERX_VERSION, weaverx_getopt('style_version'), $name);

	$last = weaverx_getopt('last_option');
	if ($last != 'Weaver Xtreme') // check for case of limited PHP $_POST values
	{
?>
<p style="color:red">
<?php _e('Possible Non-Standard Web Host Configuration detected. If your options
are not saving correctly, your host may have limited the default number of values that PHP can use for
settings. Try saving your settings again, and if this message persists, please contact your host and ask them to "Increase the PHP <em>max_input_vars</em> value for $_POST to at least 600." If that does not fix the issue,
please contact Weaver Xtreme support. Diagnostic info: last_option=', 'weaver-xtreme' /*adm*/); ?><?php echo $last;?>
</p>
<?php
	}

	if (false && !weaverx_getopt('_hide_subtheme_link')) {
?>
	<p style="max-width:90%;"><?php weaverx_site('/subthemes/'); ?><img style="max-width:95%;float:left;margin-right:10px;" src="<?php echo weaverx_relative_url('/assets/images/'); ?>theme-bar.jpg" alt="addons" />
	<?php _e('<strong>Discover more premium <br />Weaver Xtreme Subthemes</strong>', 'weaver-xtreme' /*adm*/); ?></a>
	</p>
<?php
	}
}

function weaverx_donate_button() {

	if (!weaverx_getopt_checked('_hide_donate') && !function_exists('weaverxplus_plugin_installed')) { ?>
<div style="float:right;padding-right:30px;"><small><strong><?php _e('Like Weaver X? Consider', 'weaver-xtreme' /*adm*/); ?></strong></small>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6Y68LG9G9M82W">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
<?php }
}


function weaverx_clear_messages() {
?>
<form style="float:right;margin-right:15px;" name="clearweaverx_form" method="post">
<?php
	if (!function_exists('weaverxplus_plugin_installed')) {
		echo '<strong style="border:1px solid blue;background:yellow;padding:4px;margin:5px;">';
		weaverx_site('','http://plus.weavertheme.com/',__('Weaver Xtreme Plus', 'weaver-xtreme' /*adm*/));
		echo __('Get Weaver Xtreme Plus!','weaverx-xtreme' /*adm*/) . '</a> </strong>';
	}
	do_action('weaverx_check_licenses');
?>
	<span class="submit"><input type="submit" name="weaverx_clear_messages" value="<?php _e('Clear Messages', 'weaver-xtreme' /*adm*/); ?>"/></span>
	<?php weaverx_nonce_field('weaverx_clear_messages'); ?>
</form> <!-- resetweaverx_form -->
<?php
}

function weaverx_abs_file_path($http_path) {
	return untrailingslashit(ABSPATH) . parse_url($http_path,PHP_URL_PATH);
}
/*
	==================== SAVE / RESTORE THEMES AND BACKUPS ==========================
*/
function weaverx_get_save_settings($is_theme) {
	// serialize current settings
	global $weaverx_opts_cache;

	weaverx_update_options('write_backup');

	if ($is_theme) {
		$header = 'WXT-V01.00';			/* Save theme settings: 10 byte header */
		$theme_opts = array();
		$theme_opts['weaverx_base'] = $weaverx_opts_cache;
		foreach ($weaverx_opts_cache as $opt => $val) {
			if ($opt[0] == '_')
			$theme_opts['weaverx_base'][$opt] = false;
		}
		return $header . serialize($theme_opts);	/* serialize full set of options right now */
	} else {
		$header = 'WXB-V01.00';			/* Save all settings: 10 byte header */
		$theme_opts = array();
		$theme_opts['weaverx_base'] = $weaverx_opts_cache;
		return $header . serialize($theme_opts);	/* serialize full set of options right now */
	}
}

function weaverx_clear_cache_settings() {
	/* clear all settings */
	global $weaverx_opts_cache;
	foreach ($weaverx_opts_cache as $key => $value) {
		$weaverx_opts_cache[$key] = false;		// clear everything
	}
}

function weaverx_save_msg($msg) {
	echo '<div id="message" class="updated fade"><p><strong>' . $msg .
		'</strong></p></div>';
}
function weaverx_error_msg($msg) {
	echo '<div id="message" class="updated fade" style="background:#F88;"><p><strong>' . $msg .
		'</strong></p></div>';
}

//============================================ form builder ====================================

function weaverx_form_show_options($weaverx_olist, $begin_table = true, $end_table = true) {
	/* output a list of options - this really does the layout for the options defined in an array */
	if ($begin_table) {
?>
<div>
<table class="optiontable" style="margin-top:6px;">
<?php
	}
	foreach ($weaverx_olist as $value) {
		$value['type'] = weaverx_fix_type($value['type']);
		switch ($value['type']) {
			case 'align':
				weaverx_form_align($value);
				break;
			case 'checkbox':
				weaverx_form_checkbox($value);
				break;
			case 'ctext':
				weaverx_form_ctext($value);
				break;
			case 'color':
				weaverx_form_color($value);
				break;
			case 'custom_css':
				weaverx_custom_css($value);
				break;
			case 'endheader':
				echo '<!-- end header -->';
				break;
			case 'fi_align':
				weaverx_form_fi_align($value);
				break;
			case 'fi_location':
				weaverx_from_fi_location($value);
				break;
			case 'fi_location_post':
				weaverx_from_fi_location($value, true);
				break;
			case 'header':
				weaverx_form_header($value);
				break;
			case 'header_area':
				weaverx_form_header_area($value);
				break;
			case 'header0':
				weaverx_form_header($value,true);
				break;
			case 'inactive':
				weaverx_form_inactive($value);
				break;
			case 'link':
				weaverx_form_link($value);
				break;
			case 'menu_opts':
				weaverx_form_menu_opts($value, false);
				break;
			case 'menu_opts_submit':
				weaverx_form_menu_opts($value, true);
				break;
			case 'note':
				weaverx_form_note($value);
				break;
			case 'radio':
				weaverx_form_radio($value);
				break;
			case 'rounded':
				weaverx_form_rounded($value);
				break;
			case 'select_hide':
				weaverx_form_select_hide($value);
				break;
			case 'select_id':
				weaverx_form_select_id($value);
				break;
			case 'select_layout':
				weaverx_form_select_layout($value);
				break;
			case 'shadows':
				weaverx_form_shadows($value);
				break;
			case 'subheader':
				weaverx_form_subheader($value);
				break;
			case 'subheader_alt':
				weaverx_form_subheader_alt($value);
				break;
			case 'submit':
				weaverx_form_submit($value);
				break;
			case 'text':
			case 'widetext':
				weaverx_form_text($value);
				break;
			case 'text_xy':
				weaverx_form_text_xy($value);
				break;
			case 'text_xy_em':
				weaverx_form_text_xy($value,'X','Y','em');
				break;
			case 'text_xy_percent':
				weaverx_form_text_xy($value,'X','Y','%');
				break;
			case 'text_tb':
				weaverx_form_text_xy($value,'T','B');
				break;
			case 'text_lr':
				weaverx_form_text_xy($value,'L','R');
				break;
			case 'text_lr_em':
				weaverx_form_text_xy($value,'L','R','em');
				break;
			case 'text_lr_percent':
				weaverx_form_text_xy($value,'L','R','%');
				break;
			case 'textarea':
				weaverx_form_textarea($value);
				break;
			case 'titles':
				weaverx_form_text_props($value, 'titles');
				break;
			case 'titles_area':
				weaverx_form_text_props($value, 'area');
				break;
			case 'titles_content':
				weaverx_form_text_props($value, 'content');
				break;
			case 'titles_menu':
				weaverx_form_text_props($value, 'menu');
				break;
			case 'titles_text':
				weaverx_form_text_props($value, 'text');
				break;
			case 'val_num':
				weaverx_form_val($value,'');
				break;
			case 'val_percent':
				weaverx_form_val($value,'%');
				break;
			case 'val_px':
				weaverx_form_val($value,'px');
				break;
			case 'val_em':
				weaverx_form_val($value,'em');
				break;
			case 'widget_area':
				weaverx_form_widget_area($value, false);
				break;
			case 'widget_area_submit':
				weaverx_form_widget_area($value, true);
				break;
			default:
				weaverx_form_subheader_alt($value);
				break;
		}

	}
	if ($end_table) {
?>
</table></div> <!-- close previous tab div -->
	<br />
<?php
	}
}

function weaverx_fix_type($type) {
	return apply_filters('weaverx_xtra_type', $type );
}

function weaverx_form_inactive($value, $reason= '') {
	if ( $reason == '' )
		$reason = '<small>' . __('Weaver Xtreme Plus Options', 'weaver-xtreme' /*adm*/) . '&nbsp;</small>';
	if (!isset($value['name']) || !isset($value['id']) || !isset($value['info'])) {     // probably an '=submit'
		return;
	}
	$title = $value['name'];
	if (strlen($title) < 1) $title = ' ';        // make code work for invisibles
	if ($title[0] == '#')
		$title = substr($title,4);    // strip color
	echo '  <tr>' . "\n";
?>
	<th scope="row" style="width:200px;"><?php      /* NO SAPI SETTING */
	echo '<span style="color:#777;float:right;">'.$title.':&nbsp;</span>';
	if (!empty($value['help'])) {
		weaverx_help_link($value['help'], __('Help for ', 'weaver-xtreme' /*adm*/) . $title);
	}
?>
		</th>
		<td style="color:#777;"><?php echo $reason; ?>
		<input type="hidden" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>"  value="<?php if ( weaverx_getopt( $value['id'] ) != "") { weaverx_esc_textarea(weaverx_getopt( $value['id'] )); } else { echo ''; } ?>" />
		</td>
<?php
		if ($value['info'] != '') {
			echo('<td style="padding-left:10px;color:#777;font-size:x-small;">'); echo $value['info'];
			echo("</td>\n");
		}
?>
	</tr>
<?php
}


function weaverx_echo_name($value, $add_icon = '') {
	$l = $add_icon . $value['name'];
	if (isset($value['id']))
		$icon = $value['id'];
	if ( !isset($icon) || !$icon )
		$icon = ' ';
	if (strlen($l) > 4 && $l[0] == '#') {
		echo '<span style="color:' . substr($l,0,4) .
			';">' . substr($l,4) . '</span>';
	} else if ( $icon[0] == '-' ) {                      // add a leading icon
		echo '<span class="dashicons dashicons-' . substr( $icon, 1) . '">' . $l . '</span>';
	} else {
		echo $l;
	}
}

function weaverx_form_ctext( $value, $val_only = false ) {

	$pclass = 'color {hash:true, adjust:false}';    // starting with V 1.3, allow text in color pickers
	$img_css = '<img src="'. esc_url(get_template_directory_uri() . '/assets/images/theme/css.png') . '" alt="css" />' ;
	$img_hide = esc_url(get_template_directory_uri() . '/assets/images/theme/hide.png') ;
	$img_show = esc_url(get_template_directory_uri() . '/assets/images/theme/show.png') ;
	$help_file = esc_url(get_template_directory_uri() . '/help/css-help.html');
	$css_id = $value['id'] . '_css';
	$css_id_text = weaverx_getopt($css_id);
	if ($css_id_text && !weaverx_getopt( '_hide_auto_css_rules' )) {
		$img_toggle = $img_hide;
	} else {
		$img_toggle = $img_show;
	}
	$add_icon = '<span class="i-left-bg dashicons dashicons-admin-appearance"></span>';
	if (strpos($value['name'], ' BG') === false)
		$add_icon = '<span class="i-left-fg dashicons dashicons-admin-appearance"></span>';
	if ( ! $val_only ) { ?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value, $add_icon ); ?>:&nbsp;</th>
	<td> <?php
	} else {
		echo '&nbsp;<small>' . $value['info'] . '</small>&nbsp;';
	} ?>
	<input class="<?php echo $pclass; ?>" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:90px" value="<?php if ( weaverx_getopt( $value['id'] ) != "") { weaverx_esc_textarea(weaverx_getopt( $value['id'] )); } else { echo ''; } ?>" />
<?php
echo $img_css; ?><a href="javascript:void(null);" onclick="weaverx_ToggleRowCSS(document.getElementById('<?php echo $css_id . '_js'; ?>'), this, '<?php echo $img_show; ?>', '<?php echo $img_hide; ?>')"><?php echo '<img src="' . esc_url($img_toggle) . '" alt="toggle css" />'; ?></a>
	<?php if (  ! $val_only ) { ?>
	</td>
<?php 	weaverx_form_info($value);
?>
	</tr>
<?php }
	$css_rows = weaverx_getopt('_css_rows');
	if ($css_rows < 1 || $css_rows > 25)
		$css_rows = 1;
	if ($css_id_text && !weaverx_getopt( '_hide_auto_css_rules' )) { ?>
	<tr id="<?php echo $css_id . '_js'; ?>">
	<th scope="row" align="right"><span style="color:#22a;"><small><?php _e('Custom CSS styling:', 'weaver-xtreme' /*adm*/); ?></small></span></th>
	<td align="right"><small>&nbsp;</small></td>
	<td>
		<small>
<?php _e('You can enter CSS rules, enclosed in {}\'s, and separated by <strong>;</strong>. See ', 'weaver-xtreme' /*adm*/); ?>
<a href="<?php echo $help_file; ?>" target="_blank"><?php _e('CSS Help', 'weaver-xtreme' /*adm*/); ?></a> <?php _e('for more details.', 'weaver-xtreme' /*adm*/); ?></small><br />
	<?php weaverx_textarea( $css_id_text, $css_id, $css_rows,'{ font-size:150%; font-weight:bold; } /* for example */' ); ?>
	</td>
	</tr>
<?php
	} else {
?>
	<tr id="<?php echo $css_id . '_js'; ?>" style="display:none;">
	<th scope="row" align="right"><span style="color:green;"><small><?php _e('Custom CSS styling:', 'weaver-xtreme' /*adm*/); ?></small></span></th>
	<td align="right"><small>&nbsp;</small></td>
	<td>
		<small>
<?php _e('You can enter CSS rules, enclosed in {}\'s, and separated by <strong>;</strong>. See', 'weaver-xtreme' /*adm*/); ?>
<a href="<?php echo $help_file; ?>" target="_blank"><?php _e('CSS Help', 'weaver-xtreme' /*adm*/); ?></a> for more details.</small><br />
		<?php weaverx_textarea( $css_id_text, $css_id, $css_rows,'{ font-size:150%; font-weight:bold; } /* for example */' ); ?>
	</td>
	</tr>
<?php
	}
}

function weaverx_textarea($text, $id, $rows = 0, $place = '', $style = 'width:85%;', $class='wvrx-edit', $filter = true) {
	$name = weaverx_sapi_main_name($id, false);
	/* if ($text) {
		$newrows = count((explode("\n",$text)))+1;
		if ($newrows > $rows)
			$rows = $newrows;
	} else { */
	if ( $rows < 2 ) {
		$rows = 1;
	}
	if ($rows > 25) $rows = 25;
	if ( $filter )
		$text = weaverx_esc_textarea($text, false);	// don't echo
	echo "<textarea class='{$class}' placeholder='{$place}' name='{$name}' rows='$rows' style='{$style}'>{$text}</textarea>\n";
}


function weaverx_form_color($value, $val_only = false) {

	$pclass = 'color {hash:true, adjust:false}';    // starting with V 1.3, allow text in color pickers
	if ( ! $val_only ) {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value, '<span class="i-left-fg dashicons dashicons-admin-appearance"></span>'); ?>:&nbsp;</th>
	<td>
	<?php } else { echo '&nbsp;<small>' . $value['info'] . '</small>&nbsp;'; } ?>
	<input class="<?php echo $pclass; ?>" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:90px" value="<?php if ( weaverx_getopt( $value['id'] ) != "") { weaverx_esc_textarea(weaverx_getopt( $value['id'] )); } else { echo ' '; } ?>" />
	<?php if (! $val_only ) { ?>
	</td>
<?php 	weaverx_form_info($value);
?>
	</tr>
<?php
	}
}

function weaverx_form_header($value, $narrow=false) {
?>
	<tr class="atw-row-header">
	<th scope="row" align="left" style="width:200px;"><?php	/* NO SAPI SETTING */

	if (isset($value['id']))
		$icon = $value['id'];
	if ( !isset($icon) || !$icon )
		$icon = ' ';

	$dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
		$dash = '<span style="padding: .1em .5em 0 .2em" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
	}
	echo weaverx_anchor($value['name']) . $dash . '<span style="font-weight:bold; font-size: larger;"><em>'. $value['name'] .'</em></span>';
		weaverx_form_help($value);
?>
	</th>
<?php
	if ($narrow) echo ('<td  style="width:80px;">&nbsp;</td>'. "\n");
	else echo ('<td style="width:170px;">&nbsp;</td>'. "\n");

	if ($value['info'] != '') {
		echo('<td style="padding-left: 10px"><u><em><strong>'); echo $value['info'];
		echo("</strong></em></u></td>\n");
	}
?>
	</tr>
<?php
}

function weaverx_anchor( $title ) {
	if ( $title )
		return '<a class="anchorx" id="' . sanitize_title( $title ) . '"></a>';
	return '';
}

function weaverx_form_help($value) {
	if (!empty($value['help'])) {
		weaverx_help_link($value['help'], 'Help for ' . $value['name']);
	}
}

function weaverx_form_subheader($value) {
?>
	<tr class="atw-row-subheader">
	<th scope="row" align="left" style="width:200px;line-height:2em;"><?php	/* NO SAPI SETTING */

	if (isset($value['id']))
		$icon = $value['id'];
	if ( !isset($icon) || !$icon )
		$icon = ' ';

	$dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
		$dash = '<span style="padding:.2em;" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
	}

	echo weaverx_anchor($value['name']) . $dash . '<span style="color:blue; font-weight:bold; "><em><u>'.$value['name'].'</u></em></span>';
	weaverx_form_help($value);
?>
	</th>
	<td style="width:170px;">&nbsp;</td>
<?php
	if ($value['info'] != '') {
		echo('<td style="padding-left: 10px"><u><em>'); echo $value['info'];
		echo("</em></u></td>\n");
	}
?>
	</tr>
<?php
}

function weaverx_form_subheader_alt($value) {
?>
	<tr><td>&nbsp;</td></tr>
	<tr class="atw-row-subheader-alt" >
	<th scope="row" align="left" style="width:200px;line-height:2em;"><?php	/* NO SAPI SETTING */

	if (isset($value['id']))
		$icon = $value['id'];
	if ( !isset($icon) || !$icon )
		$icon = ' ';

	$dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
		$dash = '<span style="padding:.2em;" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
	}
	echo weaverx_anchor($value['name']) . $dash . '<span style="color:blue; font-weight:bold;padding-left:5px;"><em>'.$value['name'].'</em></span>';
	weaverx_form_help($value);
?>
	</th>
	<td style="width:170px;">&nbsp;</td>
<?php
	if (isset($value['info']) &&  $value['info'] != '') {
		echo('<td style="padding-left: 10px;color:blue;">'); echo $value['info'];
		echo("</td>\n");
	}
?>
	</tr>
<?php
}

function weaverx_form_header_area($value) {
?>
	<tr><td>&nbsp;</td></tr>
	<tr class="atw-row-subheader-area" >
	<th scope="row" align="left" style="width:200px;line-height:2em;"><?php	/* NO SAPI SETTING */

	if (isset($value['id']))
		$icon = $value['id'];
	if ( !isset($icon) || !$icon )
		$icon = ' ';

	$dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
		$dash = '<span style="padding:.2em;" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
	}

	echo weaverx_anchor($value['name']) . $dash . '<span style="color:blue; font-weight:bold;padding-left:5px;font-size:small;"><em>'.$value['name'].'</em></span>';
	weaverx_form_help($value);
?>
	</th>
	<td style="width:170px;">&nbsp;</td>
<?php
	if ($value['info'] != '') {
		echo('<td style="padding-left: 10px;color:blue;">'); echo $value['info'];
		echo("</td>\n");
	}
?>
	</tr>
<?php
}

?>
