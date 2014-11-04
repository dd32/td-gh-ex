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
	$submit_label = wvr__('Save Settings');
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
        wp_die( __( 'You attempted to save options, but something has gone wrong. Please be sure you are logged in and your host is correctly configured. See the "Weaver II Doesn\'t Save Settings" FAQ on weavertheme.com.' ,'weaverx') );
	}

	if (!current_user_can('edit_theme_options')) {
        wp_die( __( 'You do not have sufficient permissions to manage options for this site.' ,'weaverx') );
	}

	$wvr_last = '';


	foreach ($in as $key => $value) {
        switch ($key) {

            /* -------- integer -------- */
            case 'excerpt_length':

                if (!empty($value) && (!is_numeric($value) || !is_int((int)$value))) {
                    $opt_id = str_replace('', '', $key);
                    $opt_id = str_replace('_', ' ', $opt_id);
                    $err_msg .= wvr__('Option must be an integer value: ') . '"'. $opt_id . '" = "' . $value . '".'
                        . wvr__(' Value has been cleared to blank value') . '<br />';
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


            case 'perpagewidgets':       	// Add widget areas for per page - names must be lower case
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

            case 'wvrx_css':
                if ( !empty( $value ) ) {
                    $in[$key] = weaverx_filter_code( $value );
                }
                break;


            /* must not have <style .... </style> */
            case 'add_css':              	// Add CSS Rules to Weaver Xtreme's style rules

                if (!empty($value)) {
                    $val = weaverx_filter_code($value);
                    $in[$key] = $val;
                    if (stripos($val,'<style') !== false || stripos($val, '</style') !== false) {
                    $err_msg .= wvr__('"Add CSS Rules" option must not contain &lt;style&gt; tags!')
                        . wvr__(' Please correct your entry.') . '<br />';
                    }
                }
                break;

            case '_fonts_google':
                $in[$key] = $value;
                break;

            case 'last_option':		// check for last_option...
                if (!empty($value))
                    $wvr_last = $value;
                break;

            default:				/* to here, then colors, _css, or checkbox/selectors */
                $keylen = strlen($key);

                if (strrpos($key,'_css') == $keylen-4) {	// all _css settings
                    if (!empty($value)) {
                        $val = weaverx_filter_code($value);
                        $in[$key] = $val;

                        if (strpos($val, '{') === false || strpos($val, '}') === false) {
                            $opt_id = str_replace('_css', '', $key);	// kill _css
                            $opt_id = str_replace('', '', $opt_id);
                            $opt_id = str_replace('_', ' ', $opt_id);
                            $err_msg .= wvr__('CSS options must be enclosed in {}\'s: ') . '"'. $opt_id . '" = "' . $value . '".'
                            . wvr__(' Please correct your entry.') . '<br />';
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
                        $err_msg .= wvr__('Option must be a numeric value: ') . '"'. $opt_id . '" = "' . $value . '".'
                            . wvr__(' Value has been cleared to blank value.') . '<br />';
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
                        $err_msg .= wvr__('Option must be a numeric value: ') . '"'. $opt_id . '" = "' . $value . '".'
                            . wvr__(' Value has been cleared to blank value.') . '<br />';
                        $in[$key] = '';
                    }
                    break;
                }

                if (strrpos($key,'color') == $keylen-5) {	// _bgcolor and _color (order here important - after _css, etc.)
                    if (!empty($value)) {
                        $val = weaverx_filter_code($value);
                        if (preg_match('/^#?+[0-9a-f]{3}(?:[0-9a-f]{3})?$/i', $val)) {	// hex value
                            $val = strtoupper($val);		// force hex values to upper case, just to be tidy
                            if ($val[0] != '#') $val = '#' . $val;
                            $in[$key] = $val;
                        } else if (preg_match("/^([a-zA-Z])+$/i", $val)) {	// name - all letters
                            $in[$key] = $val;
                        } else {		// only legal things left are rgb and rgba
                            $isrgb = strpos( $val, 'rgb' );
                            $ishsa = strpos( $val, 'hsl' );
                            if ($isrgb === false && $ishsa === false ) {
                                $in[$key] = '';
                                $err_msg .= 'Color must be a valid # hex value, rgb value, or color name (a-z): ' .
                                '"'. $key . '" = "' . $value . '".' . ' Value has been cleared to blank value.' . '<br />';
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

	if (false && $wvr_last != 'Weaver Xtreme') { // @@@@@@ move this somewhere else
        $err_msg .= 'Warning - your host may be configured to limit how many input var options you are allowed to pass via PHP.' .
        ' Unfortunately, this means your settings may not be saved correctly. See the "Weaver II Doesn\'t Save Settings" FAQ on weavertheme.com.<br />';
	}


	if (!empty($err_msg)) {
        add_settings_error('weaverx_settings', 'settings_error', $err_msg, 'error');
	} else {
        add_settings_error('weaverx_settings', 'settings_updated', wvr__('Weaver Xtreme Settings Saved.'), 'updated');
	}

    return $in;
}

// ========================== utils ==================================

function weaverx_end_of_section($who = '') {
    echo '<hr />';
    $name = weaverx_getopt('themename');
    if ( ! $name )
        $name = 'Please set theme name on the Advanced Options &rarr; Admin Options tab.';

    printf("%s %s | Options Version: %s | Subtheme: %s\n",WEAVERX_THEMENAME, WEAVERX_VERSION, weaverx_getopt('style_version'), $name);

    $last = weaverx_getopt('last_option');
	if ($last != 'Weaver Xtreme') // check for case of limited PHP $_POST values @@@@@@ popup?
	{
?>
<p style="color:red">Possible Non-Standard Web Host Configuration detected. If your options
are not saving correctly, your host may have limited the default number of values that PHP can use for
settings. Try saving your settings again, and if this message persists, please contact your host and ask them to "Increase the PHP <em>max_input_vars</em> value for $_POST to at least 600." If that does not fix the issue,
please contact Weaver Xtreme support. (diagnostic info: last_option="<?php echo $last;?>").
</p>
<?php
	}

	if (false && !weaverx_getopt('_hide_subtheme_link')) {
?>
	<p style="max-width:90%;"><?php weaverx_site('/subthemes/'); ?><img style="max-width:95%;float:left;margin-right:10px;" src="<?php echo weaverx_relative_url('/assets/images/'); ?>theme-bar.jpg" alt="addons" />
	<strong>Discover more premium <br />Weaver Xtreme Subthemes</strong></a>
	</p>
<?php
	}
}

function weaverx_donate_button() {

	if (!weaverx_getopt_checked('_hide_donate') && !function_exists('weaverxplus_plugin_installed')) { ?>
<div style="float:right;padding-right:30px;"><small><strong>Like Weaver X? Consider</strong></small>
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
		weaverx_site('','http://plus.weavertheme.com/','Weaver Xtreme Plus');
		echo 'Get Weaver Xtreme Plus!</a> </strong>';
	}
	do_action('weaverx_check_licenses');
?>
	<span class="submit"><input type="submit" name="weaverx_clear_messages" value="Clear Messages"/></span>
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
            case 'custom':
                $func = $value['val'];
                $func($value);
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
	if ($type[0] == '+') {
        return apply_filters('weaverx_xtra_type', $type );
	}
	return $type;
}

function weaverx_form_inactive($value, $reason='<small>Weaver Xtreme Plus Required&nbsp;</small>') {
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
		weaverx_help_link($value['help'], 'Help for ' . $title);
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


function weaverx_echo_name($value) {
	$l = $value['name'];
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
    if ( ! $val_only ) { ?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td> <?php } else { echo '&nbsp;<small>' . $value['info'] . '</small>&nbsp;'; } ?>
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
	<th scope="row" align="right"><span style="color:#22a;"><small>Custom CSS styling:</small></span></th>
	<td align="right"><small>&nbsp;</small></td>
	<td>
		<small>You can enter CSS rules, enclosed in {}'s, and separated by <strong>;</strong>.
		See <a href="<?php echo $help_file; ?>" target="_blank">CSS Help</a> for more details.</small><br />
		<textarea placeholder="{ font-size:150%; font-weight:bold; } /* for example */" name="<?php weaverx_sapi_main_name($css_id); ?>" rows=<?php echo $css_rows;?> style="width: 85%"><?php weaverx_esc_textarea($css_id_text); ?></textarea>
	</td>
	</tr>
<?php
	} else {
?>
	<tr id="<?php echo $css_id . '_js'; ?>" style="display:none;">
	<th scope="row" align="right"><span style="color:green;"><small>Custom CSS styling:</small></span></th>
	<td align="right"><small>&nbsp;</small></td>
	<td>
		<small>You can enter CSS rules, enclosed in {}'s, and separated by <strong>;</strong>.
		See <a href="<?php echo $help_file; ?>" target="_blank">CSS Help</a> for more details.</small><br />
		<textarea placeholder="{ font-size:150%; font-weight:bold; } /* for example */" name="<?php weaverx_sapi_main_name($css_id); ?>" rows=<?php echo $css_rows;?> style="width: 85%"><?php weaverx_esc_textarea($css_id_text); ?></textarea>
	</td>
	</tr>
<?php
	}
}

function weaverx_form_color($value, $val_only = false) {

	$pclass = 'color {hash:true, adjust:false}';    // starting with V 1.3, allow text in color pickers
    if ( ! $val_only ) {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
    <?php } else { echo '&nbsp;<small>' . $value['info'] . '</small>&nbsp;'; } ?>
	<input class="<?php echo $pclass; ?>" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:90px" value="<?php if ( weaverx_getopt( $value['id'] ) != "") { weaverx_esc_textarea(weaverx_getopt( $value['id'] )); } else { echo ''; } ?>" />
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
	echo $dash . '<span style="font-weight:bold; font-size: larger;"><em>'.$value['name'].'</em></span>';
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

	echo $dash . '<span style="color:blue; font-weight:bold; "><em><u>'.$value['name'].'</u></em></span>';
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
	echo $dash . '<span style="color:blue; font-weight:bold;padding-left:5px;"><em>'.$value['name'].'</em></span>';
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

	echo $dash . '<span style="color:blue; font-weight:bold;padding-left:5px;font-size:small;"><em>'.$value['name'].'</em></span>';
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

function weaverx_form_textarea($value,$media = false) {
	$twide =  ($value['type'] == 'text') ? '60' : '140';
    $rows = ( isset($value['val'] ) ) ? $value['val'] : 1;
    $place = ( isset($value['placeholder'] ) ) ? ' placeholder="' . $value['placeholder'] . '"' : '';
    if ( $rows < 1 )
        $rows = 1;
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td colspan=2>
		<textarea<?php echo $place;?> name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" rows=<?php echo $rows; ?> style="width: 350px"><?php echo(esc_textarea( weaverx_getopt($value['id'] ))); ?></textarea>
<?php
	if ($media) {
	weaverx_media_lib_button($value['id']);
	}
?>
&nbsp;<small><?php echo $value['info']; ?></small>
	</td>

	</tr>
<?php
}

function weaverx_form_text($value,$media=false) {
	$twide =  ($value['type'] == 'text') ? '60' : '160';
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
		<input name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:<?php echo $twide;?>px;height:22px;" class="regular-text" value="<?php echo esc_textarea(weaverx_getopt( $value['id'] )); ?>" />
<?php
	if ($media) {
	   weaverx_media_lib_button($value['id']);
	}
?>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_val($value, $unit = '') {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
		<input name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>" type="text" style="width:50px;height:22px;" class="regular-text" value="<?php echo esc_textarea(weaverx_getopt( $value['id'] )); ?>" /> <?php echo $unit; ?>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_text_xy($value,$x='X', $y='Y', $units='px') {
	$xid = $value['id'] . '_' . $x;
	$yid = $value['id'] . '_' . $y;
    $colon = ($value['name']) ? ':' : '';
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); echo $colon;?>&nbsp;</th>
	<td>
		<?php echo '<span class="rtl-break">' . $x;?>:<input name="<?php weaverx_sapi_main_name($xid); ?>" id="<?php echo $xid; ?>" type="text" style="width:40px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt( $xid )); ?>" /> <?php echo $units; ?></span>
		&nbsp;<?php echo '<span class="rtl-break">' . $y;?>:<input name="<?php weaverx_sapi_main_name($yid); ?>" id="<?php echo $yid; ?>" type="text" style="width:40px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt( $yid )); ?>" /> <?php echo $units; ?></span>
	</td>
<?php	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_checkbox($value) {
?>
	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
	<input type="checkbox" name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>"
<?php 		checked(weaverx_getopt_checked( $value['id'] )); ?> >
	</td>
<?php 	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_radio( $value ) {
?>

	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td colspan="2">

    <?php
    $cur_val = weaverx_getopt_default( $value['id'], 'black' );
	foreach ($value['value'] as $option) {
        $desc = $option['val'];
        if ( $desc == 'none' ) {
            $desc = "None";
        } else {
            $icon = weaverx_relative_url('assets/css/icons/search-' . $desc . '.png');
            $desc = '<img style="background-color:#ccc;height:24px; width:24px;" src="' . $icon . '" />';
        }
	?>
        <input type="radio" name="<?php weaverx_sapi_main_name($value['id']); ?>" value="<?php echo $option['val']; ?>"
        <?php checked($cur_val,$option['val']); ?> > <?php echo $desc; ?>&nbsp;
    <?php } ?>
    <?php echo '<br /><small style="margin-left:5%;">' . $value['info'] . '</small>'; ?>
    </td>
	</tr>
<?php
}


function weaverx_form_select_id( $value, $show_row = true ) {
    if ( $show_row ) { ?>

	<tr>
	<th scope="row" align="right"><?php weaverx_echo_name($value); ?>:&nbsp;</th>
	<td>
    <?php } ?>

	<select name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>">
    <?php
	foreach ($value['value'] as $option) {
	?>
		<option value="<?php echo $option['val'] ?>" <?php selected( (weaverx_getopt( $value['id'] ) == $option['val']));?>><?php echo $option['desc']; ?></option>
    <?php } ?>
	</select>
    <?php if ( $show_row ) { ?>
	</td>
    <?php weaverx_form_info($value); ?>
	</tr>
    <?php }
}

function weaverx_form_select_layout($value) {
	$list = array(array('val' => 'default', 'desc' => wvr__('Use Default') ),
        array('val' => 'right', 'desc' => wvr__('Sidebars on Right') ),
        array('val' => 'right-top', 'desc' => wvr__('Sidebars on Right (stack top)') ),
		array('val' => 'left', 'desc' => wvr__('Sidebars on Left') ),
        array('val' => 'left-top', 'desc' => wvr__(' Sidebars on Left (stack top)') ),
		array('val' => 'split', 'desc' => wvr__('Split - Sidebars on Right and Left') ),
        array('val' => 'split-top', 'desc' => wvr__('Split (stack top)') ),
		array('val' => 'one-column', 'desc' => wvr__('No sidebars, content only') )
	);


	$value['value'] = $list;
	weaverx_form_select_id($value);
}

function weaverx_form_link($value) {
    $id = $value['id'];

	$link = array ('name' =>  $value['name'] , 'id' => $id.'_color', 'type' => 'ctext', 'info' => $value['info']);
	$hover = array ('name' => '<small>Hover</small>', 'id' => $id.'_hover_color', 'type' => 'ctext', 'info' => 'Hover Color');

	weaverx_form_ctext($link);
    $id_strong = $id . '_strong';
    $id_em = $id . '_em';
    $id_u = $id . '_u';
?>
    <tr><td><small style="float:right;">Link Attributes:</small></td><td colspan="2">
    <small style="margin-left:5em;"><strong>Bold</strong></small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_strong); ?>" id="<?php echo $id_strong; ?>"
<?php checked(weaverx_getopt_checked( $id_strong )); ?> >

    &nbsp;<small><em>Italic</em></small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_em); ?>" id="<?php echo $id_em; ?>"
<?php checked(weaverx_getopt_checked( $id_em )); ?> >

    &nbsp;<small><u>Underline</u></small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_u); ?>" id="<?php echo $id_u; ?>"
<?php checked(weaverx_getopt_checked( $id_u )); ?> >

<?php

	weaverx_form_ctext($hover, true);
    echo '</td></tr>';
}


function weaverx_form_note($value) {
?>
	<tr>
	<th scope="row" align="right">&nbsp;</th>
		<td style="float:right;font-weight:bold;"><?php weaverx_echo_name($value); ?>&nbsp;
<?php
	weaverx_form_help($value);
?>
		</td>
<?php
	weaverx_form_info($value);
?>
	</tr>
<?php
}

function weaverx_form_info($value) {
	if ($value['info'] != '') {
	echo('<td style="padding-left: 10px"><small>'); echo $value['info']; echo("</small></td>");
	}
}


function weaverx_form_widget_area( $value, $submit = false ) {
	/* build the rows for area settings
     * Defined Areas:
     *  'container' => '0', 'header' => '0', 'header_html' => '0', 'header_sb' => '0',
        'infobar' => '5px', 'content' => 'T:4px, B:8px', 'post' => '0', 'footer' => '0',
        'footer_sb' => '0', 'footer_html' => '0', 'widget' => '0', 'primary' => '0',
        'secondary' => '0', 'extra' => '0', 'top' => '0', 'bottom' => '0', 'wrapper' => '0'
     */

    // defaults - these are determined by the =Padding section of style-weaverx.css
    $default_tb = array(
        'infobar' => '5px', 'content' => 'T:4px, B:8px', 'post' => '0', 'footer' => '8px',
        'footer_sb' => '8px', 'primary' => '8px',
        'secondary' => '8px', 'extra' => '8px', 'top' => '8px', 'bottom' => '8px'
    );

    $default_lr = array(
        'infobar' => '5px', 'content' => '2%', 'post' => '0', 'footer' => '0',
        'footer_sb' => '8px', 'primary' => '8px',
        'secondary' => '8px', 'extra' => '8px', 'top' => '8px', 'bottom' => '8px'
    );

    $default_margins = array(
        'infobar' => '5px', 'content' => 'T:0, B:10', 'footer' => 'T:10, B:30',
        'footer_sb' => 'T:0, B:10',  'primary' => 'T:0, B:10', 'widget' => '0, Auto - First: T:0, Last: B:0',
        'secondary' => 'T:0, B:10', 'extra' => 'T:0, B:10', 'top' => 'T:10, B:10', 'bottom' => 'T:10, B:10',
        'wrapper' => 'T:10, B:30'
    );

    $id = $value['id'];

    $def_tb = '0'; $def_lr = '0' ; $def_marg = '0';
    if ( isset( $default_tb[$id] ) ) $def_tb = $default_tb[$id];
    if ( isset( $default_lr[$id] ) ) $def_lr = $default_lr[$id];
    if ( isset( $default_margins[$id] ) ) $def_marg = $default_margins[$id];

    $use_percent = array('content', 'post');

    //echo '<table><tr><td>';
	$name = $value['name'];


    $lr_type = ( in_array($id, $use_percent) ) ? 'text_lr_percent' : 'text_lr';


    $opts = array (

        array( 'name' => $name,  'id' => '-welcome-widgets-menus', 'type' => 'header_area',
              'info' => $value['info']),

        array(  'name' => $name, 'id' => $id, 'type' => 'titles_area',
            'info' => $name ),

        array(  'name' => 'Padding', 'id' => $id . '_padding', 'type' => 'text_tb',
            'info' => '<em>' . $name . '</em>' . ': Top/Bottom Inner padding (Default: ' . $def_tb . ')' ),

        array(  'name' => '', 'id' => $id . '_padding', 'type' => $lr_type,
            'info' => '<em>' . $name . '</em>' . ': Left/Right Inner padding (Default: ' . $def_lr . ')' ),

        array(  'name' => 'Top/Bottom Margins', 'id' => $id . '_margin', 'type' => 'text_tb',
            'info' => '<em>' . $name . '</em>' . ': Top/Bottom margins. <em>Side margins auto-generated.</em> (Default: ' . $def_marg . ')' )

    );

    weaverx_form_show_options($opts, false, false);


    $no_lr_margins = array(     // areas that can't allow left-right margin or width specifications
        'primary', 'secondary', 'content', 'post', 'widget'
    );
    $no_widgets = array(        // areas that don't have widgets
        'widget', 'content', 'post', 'wrapper', 'container', 'header', 'header_html', 'footer_html', 'footer', 'infobar'
    );

    $no_hide = array(
       'wrapper', 'container', 'content','widget', 'post'
    );


    if ( in_array( $id, $no_lr_margins )) {
        if ( $id != 'widget') {
            weaverx_form_checkbox(array(
                'name' => 'Add Side Margin(s)',
                'id' => $id . '_smartmargin',
                'type' => '',
                'info' => '<em>' . $name . '</em>' .
                ': Automatically add left/right "smart" margins for separation of areas. ' ));
        }

        weaverx_form_note(array('name' => '<strong>Width',
            'info' => 'The width of this area is automatically determined by the enclosing area'));
    } else if ( $id != 'wrapper' ) {

        weaverx_form_val( array(
            'name' => wvr__('Width'),
            'id' => $id . '_width_int', 'type' => '',
            'info' => '<em>' . $name . '</em>' . wvr__(': Set Width of Area in percent of enclosing area (Default: 100%)'),
            'value' => array() ), '%' );

        weaverx_form_align(array(
            'name' => '<small>Align Area</small>',
            'id' => $id . '_align',
            'type' => '',
            'info' => '<em>' . $name . '</em>' . ': How to align this area (Default: Left Align)' )

        );
    }


    if ( $id == 'wrapper' ) {       // setting #wrapper sets theme width.

        $info = '<em>Change Theme Width.</em> Standard width is 940px. Widths less than 768px may give unexpected results on mobile devices. Weaver Xtreme can not create a fixed-width site.';

        weaverx_form_val( array(
            'name' => wvr__('<em style="color:red;">Theme Width</em>'),
            'id' => 'theme_width_int', 'type' => '',
            'info' => $info,
            'value' => array() ), 'px' );
    }

    if ( in_array( $id, array( 'container', 'header', 'footer') ) ) {
        $opts_max = array(
           array(
            'name' => '<small>' . wvr__('Max Width') . '</small>', 'id' => $id . '_max_width_int', 'type' => '+val_px',
            'info' => '<em>' . $name . '</em>' . wvr__(': Set Max Width of Area for Desktop View. Advanced Option. (&starf;Plus)'),
            'value' => array() ),
           array(
            'name' => '<small>Full-width BG</small>', 'id' => $id . '_extend_bgcolor', 'type' => '+color',
            'info' => '<em>' . $name . '</em>' . wvr__(': Extend BG color to full theme width on Desktop View (&starf;Plus)'),
            'value' => array() ),

        );
        weaverx_form_show_options($opts_max, false, false);
    }


    if ( ! in_array( $id, $no_widgets) ) {

        $opts02 = array(
            array('name' => wvr__('Columns'), 'id' => $id . '_cols_int', 'type' => 'val_num',
                'info' => '<em>' . $name . '</em>' . wvr__(': Equal width columns of widgets (Default: 1; max: 8)') ),

            array('name' => '<small>No Smart Widget Margins</small>','id' => $id . '_no_widget_margins', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . ': Do not use "smart margins" between widgets on rows.' ),

            array('name' => '<small>Equal Height Widget Rows</small>','id' => $id . '_eq_widgets', 'type' => '+checkbox',
            'info' => '<em>' . $name . '</em>' . ': Make widgets equal height rows if &gt; 1 column (&starf;Plus)' ),

        );

        weaverx_form_show_options($opts02, false, false);


        $custom_widths = array( 'header_sb', 'footer_sb', 'primary', 'secondary', 'top', 'bottom');
        if ( in_array( $id, $custom_widths) ) { /* if ( $id == 'header_sb' || $id == 'footer_sb' ) { */ ?>
    <tr><th scope="row" align="right"><small>Custom Widget Widths:</small></th><td colspan="2" style="padding-left:20px;">
		<small>You can optionally specify widget widths, including for specific devices. Please read the help entry!
        <?php weaverx_help_link('help.html#CustomWidgetWidth','Help on Custom Widget Widths'); ?> (&starf;Plus) (&diams;)</small></td>
	</tr>
         <?php
         $opts2 = array(
            array('name' => '<small>Desktop</small>', 'id' => '_' . $id . '_lw_cols_list', 'type' => '+textarea',
                'placeholder' => '25,25,50; 60,40; - for example',
                'info' => 'List of widths separated by comma. Use semi-colon (;) for end of each row.  (&starf;Plus) (&diams;)'),
            array('name' => '<small>Small Tablet</small>', 'id' => '_' . $id . '_mw_cols_list', 'type' => '+textarea',
                'info' => 'List of widget widths. (&starf;Plus) (&diams;)'),
            array('name' => '<small>Phone</small>', 'id' => '_' . $id . '_sw_cols_list', 'type' => '+textarea',
                'info' => 'List of widget widths. (&starf;Plus) (&diams;)'),
        );

        weaverx_form_show_options($opts2, false, false);
        }
    }

    $opts3 = array (
        array( 'name' => '<small>Add Border</small>', 'id' => $id . '_border', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . ': Add the "standard" border (as set on Custom tab)'),
        array( 'name' => '<small>Shadow</small>', 'id' => $id .'_shadow', 'type' => 'shadows',
            'info' => '<em>' . $name . '</em>' . ': Wrap Area with Shadow.'),
        array( 'name' => '<small>Rounded Corners</small>', 'id' => $id .'_rounded', 'type' => 'rounded',
            'info' => '<em>' . $name . '</em>' . ': Rounded corners. Needs bg color or borders to show. Set for any overlapping nested area also!' ),


    );

    weaverx_form_show_options($opts3, false, false);



    if ( ! in_array( $id, $no_hide) ) {
        weaverx_form_select_hide(array(
            'name' => '<small>Hide Area</small>',
            'id' => $id .'_hide',
            'info' => '<em>' . $name . '</em>' . ': Hide area on different display devices',
            'value' => '' ) );
    }

    // class names
    $opts4 = array (
        array( 'name' => '<small>Add Classes</small>', 'id' => $id . '_add_class',  'type' => '+widetext',
            'info' => '<em>' . $name . '</em>' . ': Space separated class names to add to this area (<em>Advanced option</em>) (&starf;Plus) '
        )
    );

    weaverx_form_show_options($opts4, false, false);

    if ( $submit )
        weaverx_form_submit('');
    //echo '</td></tr></table>';

}





function weaverx_form_menu_opts( $value, $submit = false ) {
	// build the rows for area settings

    //echo '<table><tr><td>';
	$name = $value['name'];
    $id = $value['id'];

    $opts = array(

        array( 'name' => $name,  'id' => '-menu', 'type' => 'header_area',
              'info' => $value['info']),

        array( 'name' => 'Menu Bar', 'id' => $id, 'type' => 'titles_menu',    // includes color, font size, font family
            'info' => 'Entire Menu Bar' ),

        array( 'name' => 'Item Background', 'id' => $id . '_link_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Background Color for Menu Bar Items (links)' ),

        array( 'name' => '<small>Dividers between menu items</small>', 'id' => $id . '_dividers_color', 'type' => '+color',
              'info' => '<em>' . $name . '</em>' . ': Add colored dividers between menu items. Leave blank for none.  (&starf;Plus)' ),

        array( 'name' => '<small>Hover BG</small>', 'id' => $id . '_hover_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Hover BG Color (Default: rgba(255,255,255,0.15))' ),
        array( 'name' => '<small>Hover Text Color</small>', 'id' => $id . '_hover_color', 'type' => 'color',
            'info' => '<em>' . $name . '</em>' . ': Hover Text Color' ),


        array( 'name' => '<small><em>Mobile</em> Open Submenu Arrow BG</small>', 'id' => $id . '_clickable_bgcolor', 'type' => 'ctext',
        'info' => '<em>' . $name . '</em>' . ': Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. (Default: rgba(255,255,255,0.2))' ),



        array( 'name' => 'Submenu Background', 'id' => $id . '_sub_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Background Color for submenus' ),
        array( 'name' => '<small>Submenu Text Color</small>', 'id' => $id . '_sub_color', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Text Color for submenus' ),

        array( 'name' => '<small>Submenu Hover BG', 'id' => $id . '_sub_hover_bgcolor', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Submenu Hover BG Color (Default: Inherit Top Level)' ),
        array( 'name' => '<small>Submenu Hover Text Color', 'id' => $id . '_sub_hover_color', 'type' => 'color',
            'info' => '<em>' . $name . '</em>' . ': Submenu Hover Text Color (Default: Inherit Top Level)' ),

        // can't get to font properties for the submenus beause no way to add the classes


        array ('name' => 'Align Menu',
        'id' => $id . '_align', 'type' => 'select_id', 'info' => 'Align this menu on desktop view. Mobile menus always left aligned.',
        'value' => array(
			array('val' => 'left', 'desc' => 'Left'),
			array('val' => 'center', 'desc' => 'Center'),
			array('val' => 'right', 'desc' => 'Right')
        )),

        array( 'name' => '<small>Add Border</small>', 'id' => $id . '_border', 'type' => 'checkbox',
              'info' => '<em>' . $name . '</em>' . ': Add the "standard" border (as set on Custom tab)' ),
        array( 'name' => '<small>Shadow</small>', 'id' => $id .'_shadow', 'type' => 'shadows',
            'info' => '<em>' . $name . '</em>' . ': Wrap Menu Bar with Shadow.' ),
        array( 'name' => '<small>Rounded Corners</small>', 'id' => $id .'_rounded', 'type' => 'rounded',
            'info' => '<em>' . $name . '</em>' . ': Add rounded corners to menu.' ),
    );

    weaverx_form_show_options($opts, false, false);


    if ( $id == 'm_primary' ) {
       weaverx_form_checkbox(array(
        'name' => '<small>Move Primary Menu to Top</small>',
        'id' => $id . '_move',
        'info' => '<em>' . $name . '</em>' . ': Move Primary Menu at Top of Header Area (Default: Bottom)',
        'value' => '' ) );
    } elseif ( $id == 'm_secondary' ){
        weaverx_form_checkbox(array(
        'name' => '<small>Move Secondary Menu to Bottom</small>',
        'id' => $id . '_move',
        'info' => '<em>' . $name . '</em>' . ': Move Secondary Menu at Bottom of Header Area (Default: Top)',
        'value' => '' ) );
    }

    $opts2 = array(
        array( 'name' => '<small>Hide Area</small>', 'id' => $id .'_hide', 'type' => 'select_hide',
            'info' => '<em>' . $name . '</em>' . ': Hide menu on different display devices' ),
        array( 'name' => '<small>Hide Arrows</small>', 'id' => $id . '_hide_arrows', 'type' => 'checkbox',
            'info' => '<em>' . $name . '</em>' . ': Hide Arrows on Desktop Menu'),
        array( 'name' => '<small>Desktop Menu Padding</small>', 'id' => $id .'_menu_pad_dec', 'type' => 'val_em',
            'info' => '<em>' . $name . '</em>' . ': Add vertical padding to Desktop menu bar and submenus (Default:none;)' ),
        array( 'name' => '<small>Add Classes</small>', 'id' => $id . '_add_class', 'type' => '+widetext',
            'info' => '<em>' . $name . '</em>' . ': Space separated class names to add to this area (<em>Advanced option</em>) (&starf;Plus)' ),
        array('name' => '<small>Left HTML</small>', 'id' => $id . '_html_left', 'type' => '+textarea',
              'placeholder' => 'Any HTML, including shortcodes.',
              'info' => 'Add HTML Left (Works best with Centered Menu) (&diams;)(&starf;Plus)'),
        array( 'name' => '<small>Hide Area</small>', 'id' => $id .'_hide_left', 'type' => '+select_hide',
            'info' => '<em>' . $name . '</em>' . ': Hide Left HTML ' ),
        array('name' => '<small>Right HTML</small>', 'id' => $id . '_html_right', 'type' => '+textarea',
              'placeholder' => 'Any HTML, including shortcodes.',
              'info' => 'Add HTML to Menu on Right (Works best with Centered Menu) (&diams;)(&starf;Plus)'),
        array( 'name' => '<small>Hide Area</small>', 'id' => $id .'_hide_right', 'type' => '+select_hide',
            'info' => '<em>' . $name . '</em>' . ': Hide Right HTML ' ),
        array( 'name' => '<small>HTML: Text Color</small>', 'id' => $id .'_html_color', 'type' => 'ctext',
            'info' => '<em>' . $name . '</em>' . ': Text Color for Left/Right Menu Bar HTML' ),
        array( 'name' => '<small>HTML: Top Margin</small>', 'id' => $id .'_html_margin_dec', 'type' => 'val_em',
            'info' => '<em>' . $name . '</em>' . ': Margin above Added Menu HTML (Usually needed only with Desktop Menu Padding)' ),

    );

    weaverx_form_show_options($opts2, false, false);


    if ( $submit )
        weaverx_form_submit('');
}



function weaverx_form_text_props( $value, $type = 'titles') {
    // display text properties for an area or title

    $id = $value['id'];
    $name = $value['name'];
    $info = $value['info'];

    $id_colorbg = $id . '_bgcolor';

    $id_color = $id . '_color';
    $id_size = $id . '_font_size';
    $id_family = $id . '_font_family';
    $id_bold = $id . '_bold';
    $id_normal = $id . '_normal';
    $id_italic = $id . '_italic';

    // COLOR BG & COLOR BOX

    weaverx_form_ctext( array(
        'name' => $name . ' BG',
        'id' => $id_colorbg,
        'info' => '<em>' . $info . ':</em> Background Color (use CSS+ to specify custom CSS for area)'));

	if ( $type == 'menu' || $id == 'post_title' )
        weaverx_form_ctext( array(
            'name' => $name . ' Text Color',
            'id' => $id_color,
            'info' => '<em>' . $info . ':</em> Text properties'));
    else
        weaverx_form_color( array(
            'name' => $name . ' Text Color',
            'id' => $id_color,
            'info' => '<em>' . $info . ':</em> Text properties'));

    // FONT PROPERTIES
?>
    <tr>
	<th scope="row" align="right"><small><?php echo ($type == 'titles') ? 'Title' : 'Text';?> Font properties:</small>&nbsp;</th>
	<td colspan="2">
        <?php
        if ( $type != 'content') {
            echo '&nbsp;<span class="rtl-break"><small><em>Size:</em></small>'; weaverx_form_select_font_size(array('id' => $id_size), false); echo '</span>';
        }
        echo '&nbsp;<span class="rtl-break"><small><em>Family:</em></small>'; weaverx_form_select_font_family(array('id' => $id_family), false); echo '</span>'; ?>

        <?php if ( $type == 'titles' ) { ?>
        &nbsp;<span class="rtl-break"><small>Normal Weight</small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_normal); ?>" id="<?php echo $id_normal; ?>"
<?php checked(weaverx_getopt_checked( $id_normal )); ?> ></span>

        <?php } else { ?>
        &nbsp;<span class="rtl-break"><small><strong>Bold</strong></small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_bold); ?>" id="<?php echo $id_bold; ?>"
<?php checked(weaverx_getopt_checked( $id_bold )); ?> ></span>
        <?php } ?>
        &nbsp;<span class="rtl-break"><small><em>Italic</em></small> <input type="checkbox" name="<?php weaverx_sapi_main_name($id_italic); ?>" id="<?php echo $id_italic; ?>"
<?php checked(weaverx_getopt_checked( $id_italic )); ?> ></span>
<?php   if ( apply_filters('weaverx_xtra_type', '+plus_fonts' ) == 'inactive' )
            echo '<small>&nbsp;&nbsp; (Add new fonts with <em>Weaver Xtreme Plus</em>)</small>';
        else
            echo '<small>&nbsp;&nbsp; (Add new fonts from Custom &amp; Fonts tab.)</small>';?>
    </td>
    </tr>
<?php

}

function weaverx_from_fi_location( $value, $is_post = false ) {
    $value['value'] = array(
        array('val' => 'content-top', 'desc' => wvr__('With Content - top') ),
        array('val' => 'content-bottom', 'desc' => wvr__('With Content - bottom') ),
        array('val' => 'title-before', 'desc' => wvr__('Before Title') ),
        array('val' => 'header-image', 'desc' => $is_post ? wvr__('Hide on Blog View') : wvr__('Header Image Replacement') ),
        array('val' => 'post-before', 'desc' => wvr__('Outside of Page/Post') )
	);


	weaverx_form_select_id($value);
}


function weaverx_form_align( $value ) {
    $value['value'] = array(
        array('val' => 'float-left', 'desc' => wvr__('Align Left') ),
        array('val' => 'center', 'desc' => wvr__('Center') ),
        array('val' => 'float-right', 'desc' => wvr__('Align Right') )
	);

	weaverx_form_select_id($value);
}


function weaverx_form_fi_align( $value ) {
    $value['value'] = array(
        array('val' => 'fi-alignleft', 'desc' => wvr__('Align Left') ),
         array('val' => 'fi-aligncenter', 'desc' => wvr__('Center') ),
        array('val' => 'fi-alignright', 'desc' => wvr__('Align Right') ),
        array('val' => 'fi-alignnone', 'desc' => wvr__('No Align') )
	);

	weaverx_form_select_id($value);
}

function weaverx_form_select_hide($value) {
	$value['value'] = array(array('val' => 'hide-none', 'desc' => wvr__('Do Not Hide') ),
        array('val' => 's-hide', 'desc' => wvr__('Hide: Phones') ),
        array('val' => 'm-hide', 'desc' => wvr__('Hide: Small Tablets') ),
		array('val' => 'm-hide s-hide', 'desc' => wvr__('Hide: Phones+Tablets') ),
        array('val' => 'l-hide', 'desc' => wvr__('Hide: Desktop') ),
		array('val' => 'l-hide m-hide', 'desc' => wvr__('Hide: Desktop+Tablets') ),
        array('val' => 'hide', 'desc' => wvr__('Hide on All Devices') )
	);

	weaverx_form_select_id($value);
}

function weaverx_form_select_font_size( $value, $show_row = true ) {
	$value['value'] = array(array('val' => 'default', 'desc' => wvr__('Inherit') ),
        array('val' => 'm-font-size', 'desc' => wvr__('Medium Font') ),
        array('val' => 'xxs-font-size', 'desc' => wvr__('XX-Small Font') ),
        array('val' => 'xs-font-size', 'desc' => wvr__('X-Small Font') ),
        array('val' => 's-font-size', 'desc' => wvr__('Small Font') ),
        array('val' => 'l-font-size', 'desc' => wvr__('Large Font') ),
		array('val' => 'xl-font-size', 'desc' => wvr__('X-Large Font') ),
        array('val' => 'xxl-font-size', 'desc' => wvr__('XX-Large Font') ),
        array('val' => 'customA-font-size', 'desc' => wvr__('Custom Size A') ),
        array('val' => 'customB-font-size', 'desc' => wvr__('Custom Size B') )
	);
    $value['value'] = apply_filters('weaverx_add_font_size', $value['value']);
	weaverx_form_select_id( $value, $show_row);
}


function weaverx_form_select_font_family( $value, $show_row = true ) {
	$value['value'] = array(array('val' => 'default', 'desc' => wvr__('Inherit') ),
        array('val' => 'sans-serif', 'desc' => wvr__('Arial (Sans Serif)') ),
        array('val' => 'arialBlack', 'desc' => wvr__('Arial Black') ),
        array('val' => 'arialNarrow', 'desc' => wvr__('Arial Narrow') ),
        array('val' => 'lucidaSans', 'desc' => wvr__('Lucida Sans') ),
        array('val' => 'trebuchetMS', 'desc' => wvr__('Trebuchet MS') ),
        array('val' => 'verdana', 'desc' => wvr__('Verdana') ),

        array('val' => 'serif', 'desc' => wvr__('Times (Serif)') ),
        array('val' => 'cambria', 'desc' => wvr__('Cambria') ),
        array('val' => 'garamond', 'desc' => wvr__('Garamond') ),
        array('val' => 'georgia', 'desc' => wvr__('Georgia') ),
        array('val' => 'lucidaBright', 'desc' => wvr__('Lucida Bright') ),
        array('val' => 'palatino', 'desc' => wvr__('Palatino') ),

        array('val' => 'monospace', 'desc' => wvr__('Courier (Monospace)') ),
        array('val' => 'consolas', 'desc' => wvr__('Consolas') ),

        array('val' => 'papyrus', 'desc' => wvr__('Papyrus') ),
        array('val' => 'comicSans', 'desc' => wvr__('Comic Sans MS') )
	);
    $value['value'] = apply_filters('weaverx_add_font_family', $value['value']);
    ?>
    <select name="<?php weaverx_sapi_main_name($value['id']); ?>" id="<?php echo $value['id']; ?>">
    <?php
	foreach ($value['value'] as $option) {
	?>
		<option class="font-<?php echo $option['val'];?>" value="<?php echo $option['val'] ?>"<?php selected( (weaverx_getopt( $value['id'] ) == $option['val']));?>><?php echo $option['desc']; ?></option>
    <?php } ?>
	</select>
<?php
}

function weaverx_form_rounded($value) {
	$value['value'] = array(array('val' => 'none', 'desc' => wvr__('None') ),
        array('val' => '-all', 'desc' => wvr__('All Corners') ),
        array('val' => '-left', 'desc' => wvr__('Left Corners') ),
		array('val' => '-right', 'desc' => wvr__('Right Corners') ),
        array('val' => '-top', 'desc' => wvr__('Top Corners') ),
		array('val' => '-bottom', 'desc' => wvr__('Bottom Corners') ),
	);

	weaverx_form_select_id($value);
}

function weaverx_form_shadows($value) {
	$value['value'] = array(array('val' => '-0', 'desc' => wvr__('No Shadow') ), // as in .shadow-0
        array('val' => '-1', 'desc' => wvr__('All Sides, 1px') ),
        array('val' => '-2', 'desc' => wvr__('All Sides, 2px') ),
		array('val' => '-3', 'desc' => wvr__('All Sides, 3px') ),
        array('val' => '-4', 'desc' => wvr__('All Sides, 4px') ),
		array('val' => '-rb', 'desc' => wvr__('Right + Bottom') ),
        array('val' => '-lb', 'desc' => wvr__('Left + Bottom') ),
        array('val' => '-tr', 'desc' => wvr__('Top + Right') ),
        array('val' => '-tl', 'desc' => wvr__('Top + Left') ),
        array('val' => '-custom', 'desc' => wvr__('Custom Shadow') )
	);
    $value['value'] = apply_filters('weaverx_add_shadows', $value['value']);

	weaverx_form_select_id($value);
}

function weaverx_check_version() {

    $version = WEAVERX_VERSION;

    $check_site = 'http://weaverxtra.wordpress.com';
    $home_site = 'http://weavertheme.com';
    $msg = ') is available at <a href="http://weavertheme.com/download/?did=30" target="_blank">WeaverTheme.com/download/</a>.';

    $latest = weaverx_latest_version($check_site);     // check if newer version is available
    if ( $latest != 'unavailable' && version_compare($version,$latest,'<') ) {
        $saveme = 'Current ' . WEAVERX_THEMENAME . ' version is ' . $version . '. A newer version (' . $latest .
            $msg;
        weaverx_save_msg($saveme);
    }


	return '';
}

function weaverx_latest_version($check_site) {
	$rss = fetch_feed($check_site. '/feed/');
	 if (is_wp_error($rss) ) {
		return 'unavailable';
	}
	$out = '';
	$items = 1;
	$num_items = $rss->get_item_quantity($items);
	if ( $num_items < 1 ) {
		$out .= 'unavailable';
		$rss->__destruct();
		unset($rss);
		return $out;
	}
	$rss_items = $rss->get_items(0, $items);
	foreach ($rss_items as $item ) {
		$title = esc_attr(strip_tags($item->get_title()));
		if ( empty($title) )
			$title = 'unavailable';
	}
	if (stripos($title,'announcement') === false) {
		$blank = strpos($title,' ');    // find blank
		if ($blank < 1)     // problem
			$title = 'unavailable';
		else {
			$title = substr($title,0,$blank);
		}
	}
	$out .= $title;
	$rss->__destruct();
	unset($rss);
	return $out;
}


require_once( get_template_directory() . '/includes/lib-forms.php' );

?>
