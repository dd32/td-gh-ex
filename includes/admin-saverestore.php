<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Save/Restore
 *
 * This will come after the Options form has been closed, and is used for non-SAPI options
 *
 */

function weaverx_admin_saverestore() {
    $saved = get_option( apply_filters('weaverx_options','weaverx_settings_backup') ,array());
    $style_date = '';
    if (!empty($saved))
        $style_date = $saved['style_date'];

    if (! $style_date ) $style_date = 'No saved settings';
?>

<div class="atw-option-header" style="clear:both;">Save/Restore Theme Settings <?php weaverx_help_link('help.html#SaveRestore','Help on Save/Restore Themes');?></div><br />
<div class="atw-option-subheader">Save/Restore Current Theme Settings using WordPress Database</div>
<p>This option allows you to save and restore all current theme settings using your host's WordPress
database. Your options will be
preserved across Weaver Xtreme theme upgrades, as well when you change to different themes. There is only one
saved backup avaiable. You can also download your setting to your computer with the options below.</p>
<p>Note: This save option saves <strong>all</strong> settings, including those marked with a &diams;.</p>
<form name="save_mysave_form" method="post">
	<span class="submit"><input type="submit" name="save_mytheme" value="Save Current Theme Settings"/></span>
	<strong>Backup all current themes settings using the WordPress database.</strong>
<?php	 weaverx_nonce_field('save_mytheme'); ?>
	<br /><br />
	<span class="submit"><input type="submit" name="restore_mytheme" value="Restore Settings"/></span>
	<strong>Restore from saved settings.</strong> <em>Last save date: <?php echo $style_date; ?></em>
<?php
    weaverx_nonce_field('restore_mytheme');
    do_action('weaverxplus_admin','save_restore');
?>
	</form>

<?php

	weaverx_saverestore();

	do_action('weaverx_child_saverestore');	// allow additional save/restore in child */


	do_action('weaverx_child_update');
?>
	<div class="atw-option-subheader">Reset Current Settings to Default</div><br />
	<form name="resetweaverx_form" method="post" onSubmit="return confirm('Are you sure you want to reset all Weaver Xtreme settings? This will include the [Saved Current Settings using WordPress Database].');">
		<strong>Click the Clear button to reset all Weaver Xtreme settings to the default values.</strong><br >
		<em style="color:red;">Warning: You will lose all current settings, including settings from "Save Settings using the WordPress Database".</em>
        You should use the "Download Current Settings To Your Computer" option above to save a copy
		of your current settings before clearing! <br />
		<span class="submit"><input type="submit" name="reset_weaverx" value="Clear All Weaver Xtreme Settings"/></span>
		<?php weaverx_nonce_field('reset_weaverx'); ?>
	</form> <!-- resetweaverx_form -->
	<br /><hr />

<?php

}

function weaverx_process_options_admin_standard( $processed ) {
    if ( weaverx_submitted( 'weaverx_clear_messages' )) {
        return true;
    }
	if (weaverx_submitted('reset_weaverx')) {
		if (! current_user_can('manage_options'))
			wp_die('You do not have the capability to do that.');
        // delete everything!
        weaverx_save_msg(wvr__('All Weaver Xtreme settings have been reset to the defaults.','weaverx'));
        delete_option( apply_filters('weaverx_options','weaverx_settings') );
        global $weaverx_opts_cache;
        $weaverx_opts_cache = false;	// clear the cache
        weaverx_init_opts('reset_weaverx');

        delete_option( apply_filters('weaverx_options','weaverx_settings_backup') );
        delete_option( 'weaverx_plus_backup' );

		update_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice', 0 );     // reset the dismiss on the plugin loader
        return true;
	}

	if (weaverx_submitted('uploadtheme') && function_exists('weaverx_loadtheme')) {
		weaverx_loadtheme();
        return true;
	}

	if (weaverx_submitted('check_weaverx')) {
        // perform Weaver Xtreme check
        require_once(get_template_directory() . '/includes/check-theme.php');	// include check code now
        weaverx_perform_check();
        return true;
	}
    return $processed;
}

function weaverx_saverestore(){
	/* admin tab for saving and restoring theme */
	$weaverx_theme_dir = esc_url(weaverx_f_uploads_base_dir() .'weaverx-theme/');
	$download_path = esc_url(weaverx_relative_url('includes/download.php'));
	$download_img_path = esc_url(weaverx_relative_url('assets/images/download.png'));
	$nonce = wp_create_nonce('weaverx_download');
	$a_pro = (function_exists('weaverxplus_plugin_installed')) ? '-plus' : '';

?>
<h3 class="atw-option-subheader" style="color:blue;">Save/Restore Current Theme Settings using Your Computer</h3>
<p>This option allows you to save and restore all current theme settings by uploading and downloading to your
own computer.</p>

<h3>Download Current Settings To Your Computer</h3>

<a href="<?php echo $download_path . '?_wpnonce=' . $nonce; ?>"><img src="<?php echo esc_url($download_img_path); ?>" />&nbsp; <strong>Download</strong>&nbsp;</a> - <strong><em>All</em></strong> current settings to file <strong>weaverx-backup-settings<?php echo $a_pro;?>.wxb</strong> on your computer. (Full settings backup, including those marked with a &diams;.)
<br />
<br />
<a href="<?php echo $download_path . '?_wpnoncet=' . $nonce;?>"><img src="<?php echo esc_url($download_img_path); ?>" />&nbsp;<strong>Download</strong></a>&nbsp; - <strong><em>Only theme related</em></strong> current settings to file <strong>weaverx-theme-settings<?php echo $a_pro;?>.wxt</strong> on your computer.

<?php
if (function_exists('weaverxplus_plugin_installed'))
	echo "<p>Note: Downloaded settings include <em>Weaver Xtreme Plus</em> settings. Setting files from Weaver Xtreme Plus can be uploaded to the Free Weaver Xtreme version,
	but will not be used or saved by the free version.</p>"
?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST">
	<table>
			<tr><td><h3>Upload settings from file saved on your computer</h3></td></tr>
		<tr valign="top">
			<td>Select theme/backup file to upload: <input name="uploaded" type="file" />
			<input type="hidden" name="uploadit" value="yes" />&nbsp;(Restores settings in file to current settings.)
						</td>
		</tr>
				<tr><td><span class='submit'><input name="uploadtheme" type="submit" value="Upload theme/backup" /></span>&nbsp;<small><strong>Upload and Restore</strong> a theme/backup from file on your computer. Will become current settings.</small></td></tr>
				<tr><td><?php if (!function_exists('weaverxplus_plugin_installed')) echo '<small>Note: Any Weaver Xtreme Plus settings will <em>not</em> be restored for Weaver Xtreme Free version.</small>';?>&nbsp;</td></tr>
	</table>
	<?php weaverx_nonce_field('uploadtheme'); ?>
	</form>
<?php
}

function weaverx_loadtheme() {
	if (!(isset($_POST['uploadit']) && $_POST['uploadit'] == 'yes')) return;

   // upload theme from users computer
	// they've supplied and uploaded a file

	$ok = true;     // no errors so far

	if (isset($_FILES['uploaded']['name']))
		$filename = $_FILES['uploaded']['name'];
	else
		$filename = "";

	if (isset($_FILES['uploaded']['tmp_name'])) {
		$openname = $_FILES['uploaded']['tmp_name'];
	} else {
		$openname = "";
	}

	//Check the file extension
	$check_file = strtolower($filename);
	$pat = '.';				// PHP version strict checking bug...
	$end = explode($pat, $check_file);
	$ext_check = end($end);


	if ($filename == "") {
		$errors[] = "You didn't select a file to upload.<br />";
		$ok = false;
	}

	if ($ok && $ext_check != 'wxt' && $ext_check != 'wxb'){
		$errors[] = "Theme files must have <em>.wxt</em> or <em>.wxb</em> extension.<br />";
		$ok = false;
	}

		if ($ok) {
			if (!weaverx_f_exists($openname)) {
				$errors[] = '<strong><em style="color:red;">Sorry, there was a problem uploading your file.
		You may need to check your folder permissions or other server settings.</em></strong>'.
					"<br />(Trying to use file '$openname')";
				$ok = false;
			}
		}
	if (!$ok) {
		echo '<div id="message" class="updated fade"><p><strong><em style="color:red;">ERROR</em></strong></p><p>';
		foreach($errors as $error){
            echo $error.'<br />';
		}
		echo '</p></div>';
	} else {    // OK - read file and save to My Saved Theme
			// $handle has file handle to temp file.
			$contents = weaverx_f_get_contents($openname);

			if ( ! weaverx_ex_set_current_to_serialized_values($contents,'weaverx_uploadit:'.$openname ) ) {
				echo '<div id="message" class="updated fade"><p><strong><em style="color:red;">Sorry,
                there was a problem uploading your file. The file you picked was not a valid
                Weaver Xtreme theme file.</em></strong></p></div>';
            } else {
				weaverx_save_msg( 'Weaver Xtreme theme options reset to uploaded theme.' );
			}
		}
}

function weaverx_ex_set_current_to_serialized_values($contents)  {
	global $weaverx_opts_cache;	// need to mess with the cache

	if (substr($contents,0,10) == 'WXT-V01.00')
        $type = 'theme';
	else if (substr($contents,0,10) == 'WXB-V01.00')
        $type = 'backup';
	else
        return weaverx_f_fail(wvr__("Wrong theme file format version")); 	/* simple check for one of ours */
	$restore = array();
	$restore = unserialize(substr($contents,10));

    if (!$restore) return weaverx_f_fail("Unserialize failed");

	$version = weaverx_getopt('weaverx_version_id');	// get something to force load

	if ($type == 'theme') {
        // need to clear some settings
        // first, pickup the per-site settings that aren't theme related...
        $new_cache = array();
        foreach ($weaverx_opts_cache as $key => $val) {
            if ($key[0] == '_')	// these are non-theme specific settings
                $new_cache[$key] = $val;	// keep
        }
        $opts = $restore['weaverx_base'];	// fetch base opts
        weaverx_delete_all_options();

        foreach ($opts as $key => $val) {
            if ($key[0] != '_')
                weaverx_setopt($key, $val, false);	// overwrite with saved theme values
        }

        foreach ($new_cache as $key => $val) {	// set the values we need to keep
            weaverx_setopt($key,$val,false);
        }
	} else if ($type == 'backup') {
        weaverx_delete_all_options();

        $opts = $restore['weaverx_base'];	// fetch base opts
        foreach ($opts as $key => $val) {
            weaverx_setopt($key, $val, false);	// overwrite with saved values
        }
	}
	weaverx_setopt('weaverx_version_id',$version); // keep version, force save of db
    weaverx_setopt('wvrx_css','');
	weaverx_setopt('last_option','Weaver Xtreme');
	weaverx_save_opts('loading theme');	// OK, now we've saved the options, update them in the DB
	return true;
}
?>
