<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Subtheme
 *
 *  __ added - 12/10/14
 * This is the intro form. It won't have any options because it will be outside the main form
 */

function weaverx_admin_subthemes() {


	weaverx_tab_title(__('Predefined Weaver Xtreme Subthemes','weaverx_axtreme'), 'help.html#PredefinedThemes', __('Help for Weaver Xtreme Predefined Themes','weaver-xtreme' /*adm*/)); ?>
<small style="font-weight:normal;font-size:10px;"><?php _e('You can click the ?\'s found throughout Weaver Xtreme admin pages for context specific help.','weaver-xtreme' /*adm*/);?></small>

<?php _e('<h4>Welcome to Weaver X</h4>','weaver-xtreme' /*adm*/);?>

<?php _e('<p>Weaver Xtreme gives you extreme control of your WordPress blog appearance using the
different admin tabs here. This tab lets you get a quick start by picking one of the many
predefined subthemes. Once you\'ve picked a starter theme, use the <em>Main Options</em> and <em>Advanced Options</em>
tabs to tweak the theme to be whatever you like. After you have a theme you\'re happy with,
you can save it from the Save/Restore tab. The <em>Help</em> tab has much more <b>useful</b> information.</p>','weaver-xtreme' /*adm*/);?>


<h3 class="atw-option-subheader"><span style="color:black;padding:.2em;" class="dashicons dashicons-images-alt2"></span>
<?php _e('Get started by trying one of the predefined subthemes!','weaver-xtreme' /*adm*/);?>
</h3>
<?php
	$theme_dir = trailingslashit(WP_CONTENT_DIR) . 'themes/' . get_template() . '/subthemes/';
	$theme_list = array();
	if ( $media_dir = opendir($theme_dir) ) {	    // build the list of themes from directory
		while ( $m_file = readdir($media_dir) ) {
			$len = strlen($m_file);
			$base = substr( $m_file, 0, $len-4 );
			$ext = $len > 4 ? substr( $m_file, $len-4, 4 ) : '';
			if ( $ext == '.wxt' ) {
				$theme_list[] = $base;
			}
		}
	}

	if (!empty($theme_list)) {
		weaverx_st_pick_theme($theme_list);	// show the theme picker
	} else {
		 _e("<h3>WARNING: Your version of Weaver Xtreme is likely installed incorrectly. Unable to find subtheme definitions.</h3>\n",'weaver-xtreme' /*adm*/);
	}
}

function weaverx_st_pick_theme($list_in) {
	// output the form to select a file list from weaverx-subthemes directory
	$list = $list_in;
	natcasesort($list);
	$cur_theme = weaverx_getopt('theme_filename');
	if ( !$cur_theme ) $cur_theme = WEAVERX_DEFAULT_THEME;	// the default theme
?>
<form enctype="multipart/form-data" name='pick_theme' method='post'>
	&nbsp;&nbsp;<strong><?php _e('Click a Radio Button below to select a subtheme:','weaver-xtreme' /*adm*/);?> &nbsp;</strong>
	<span style="padding-left:100px;"><?php _e('Current theme:','weaver-xtreme' /*adm*/);?> <strong>
<?php
	$cur_addon = weaverx_getopt('addon_name');
	if ($cur_addon == '') {
	echo ucwords(str_replace('-',' ',$cur_theme));
	} else {
		echo 'Add-on Subtheme: ' . ucwords(str_replace('-',' ',$cur_addon));
		$cur_theme = '';
	}
?>
	</strong></span>

	<br /><br /><span class='submit'><input name="set_subtheme" type="submit" value="<?php _e('Set to Selected Subtheme','weaver-xtreme' /*adm*/);?>" /></span>
	<small style="color:#b00;"><br /><?php _e('<strong>Note:</strong> Selecting a new subtheme will change only theme related settings.
	Options labelled with (&diams;) will be retained. You can use the Save/Restore tab to save a copy of all your current settings first.','weaver-xtreme' /*adm*/);?></small><br /><br />
<?php
	weaverx_nonce_field('set_subtheme');

	$thumbs = weaverx_relative_url('/subthemes/');

	foreach ($list as $addon) {
	$name = ucwords(str_replace('-',' ',$addon));
?>
	<div style="float:left; width:200px;">
		<label><input type="radio" name="theme_picked"
<?php	    echo 'value="' . $addon . '" ' . ($cur_theme == $addon ? 'checked' : '') .
		'/> <strong>' . $name . '</strong><br />';
		if (!weaverx_getopt('_hide_theme_thumbs')) {
			echo '<img style="border: 1px solid gray; margin: 5px 0px 10px 0px;" src="' . esc_url($thumbs . $addon . '.jpg') . '" width="150px" height="113px" alt="thumb" /></label></div>' . "\n";
		} else {
			echo "</label></div>\n";
		}
	}

	if (! weaverx_getopt_checked('_hide_theme_thumbs')) {
		weaverx_clear_both();
?>
	<span class='submit' style='padding-top:6px;'><input name="set_subtheme" type="submit" value="<?php _e('Set to Selected Subtheme','weaver-xtreme' /*adm*/);?>" /></span>
<?php
	}
?>

	</form>
	<div style="clear:both;padding-top:6px;"></div>

	<form enctype="multipart/form-data" name='hide_thumbs_form' method='post'>
<?php
	$hide_msg =  (weaverx_getopt('_hide_theme_thumbs')) ? __('Show Subtheme Thumbnails','weaver-xtreme' /*adm*/) :
	__('Hide Subtheme Thumbnails','weaver-xtreme' /*adm*/);
?>
	<input name="hide_thumbs" type="submit" value="<?php echo $hide_msg; ?>" />
<?php	weaverx_nonce_field('hide_thumbs'); ?>
	</form>
	<div style="clear:both;"></div>
	<hr />
<?php
	do_action('weaverx_child_show_extrathemes');
	do_action('weaverxplus_admin','show_subthemes');
}

function weaverx_process_options_themes() {

	if (weaverx_submitted('set_subtheme')) {	// invoked from Weaver Xtreme Subthemes tab (this file)
		if (isset($_POST['theme_picked'])) {
			$theme = weaverx_filter_textarea($_POST['theme_picked']);

			if (weaverx_activate_subtheme($theme))
				weaverx_save_msg(__("Subtheme Selected: ",'weaver-xtreme' /*adm*/) . $theme );
			else
				weaverx_save_msg(__("Invalid Subtheme file detected. Your installation of Weaver Xtreme may be broken.",'weaver-xtreme' /*adm*/));
		} else {
			weaverx_save_msg(__("Please select a subtheme.",'weaver-xtreme' /*adm*/));
		}
		return true;
	}

	if (weaverx_submitted('save_mytheme')) {	// invoked from Save/Restore tab
		weaverx_save_msg(__("Current settings saved in WordPress database.",'weaver-xtreme' /*adm*/));
		global $weaverx_opts_cache;
		if (!$weaverx_opts_cache)
			$weaverx_opts_cache = get_option( apply_filters('weaverx_options','weaverx_settings') ,array());
		if (current_user_can( 'manage_options' )) {
			$compressed = array_filter( $weaverx_opts_cache, 'strlen'); // filter out all null options (strlen == 0)
			update_option(apply_filters('weaverx_options','weaverx_settings_backup'),$compressed);
			if ( apply_filters('weaverx_xtra_type', '+backup' ) != 'inactive')
				delete_option('weaverx_plus_backup');
		}
		return true;
	}

	if (weaverx_submitted('restore_mytheme')) {	// invoked from Save/Restore tab
		global $weaverx_opts_cache;
		$saved = get_option( apply_filters('weaverx_options','weaverx_settings_backup') ,array());
		if (!empty($saved)) {
			$weaverx_opts_cache = $saved;
			weaverx_wpupdate_option('weaverx_settings',$weaverx_opts_cache);
		}
		weaverx_save_msg(__("Current settings restored from WordPress database.",'weaver-xtreme' /*adm*/));
		return true;
	}

	if (weaverx_submitted('hide_thumbs')) {
		$hide = weaverx_getopt('_hide_theme_thumbs');
		weaverx_setopt('_hide_theme_thumbs', !$hide);
		return true;
	}
	return false;
}

function weaverx_activate_subtheme($theme) {
	/* load settings for specified theme */
	global $weaverx_opts_cache;

	/* build the filename - theme files stored in /wp-content/themes/weaverx/subthemes/

	Important: the following code assumes that any of the pre-defined theme files won't have
	and end-of-line character in them, which should be true. A user could muck about with the
	files, and possibly break this assumption. This assumption is necessary because the WP
	theme rules allow file(), but not file_get_contents(). Other than that, the following code
	is really the same as the 'theme' section of weaverx_upload_theme() in the pro library
	*/

	$filename = get_template_directory() . '/subthemes/' . $theme . '.wxt';

	if ( ! weaverx_f_exists( $filename ) )
		return false;

	$contents = weaverx_f_get_contents($filename);	// use either real (pro) or file (standard) version of function

	if (empty($contents)) return false;

	if ( substr($contents,0,10) != 'WXT-V01.00' )
		return false;

	$restore = array();
	$restore = unserialize(substr($contents,10));

	if (!$restore) return false;
	$version = weaverx_getopt('weaverx_version_id');	// get something to force load

	// need to clear some settings
	// first, pickup the per-site settings that aren't theme related...
	$new_cache = array();
	foreach ($weaverx_opts_cache as $key => $val) {
		if ($key[0] == '_') {	// these are non-theme specific settings
			$new_cache[$key] = $weaverx_opts_cache[$key];	// clear
		}
	}
	$opts = $restore['weaverx_base'];	// fetch base opts
	weaverx_delete_all_options();

	foreach ($new_cache as $key => $val) {	// set the values we need to keep
		weaverx_setopt($key,$new_cache[$key],false);
	}
	foreach ($opts as $key => $val) {
		if ($key[0] == '_')
			continue;	// should be here
		weaverx_setopt($key, $val, false);	// overwrite with saved theme values
	}

	weaverx_setopt('theme_filename',$theme);
	weaverx_setopt('last_option','Weaver Xtreme');

	weaverx_save_opts('set subtheme');	// OK, now we've saved the options, update them in the DB
	return true;
}
?>
