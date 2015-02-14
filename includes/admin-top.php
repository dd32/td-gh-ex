<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/*
	Weaver Xtreme Admin - Uses yetii JavaScript to build tabs.
	Tabs include:
	Weaver Xtreme Themes		(in atw-subthemes.php)
	Main Options		(in this file)
	Advanced Options	(in wvr_advancedopts.php)
	Save/Restore Themes	(in atw-subthemes.php)
	Snippets		(in atw-help.php)
	CSS Help		ditto
	Help			ditto

*  __ added - 12/10/14
/*
	========================= Weaver Xtreme Admin Tab - Main Options ==============
*/
function weaverx_do_admin() {
/* theme admin page */

/* This generates the startup script calls, etc, for the admin page */
	global $weaverx_opts_cache, $weaverx_main_options, $weaverx_main_opts_list;

	if (!current_user_can('edit_theme_options'))
		wp_die(__('No permission to access that page.', 'weaver-xtreme' /*adm*/));

	weaverx_admin_page_process_options();	// Process non-sapi options

	echo('<div class="wrap">');
?>
<div style="float:left;"><h2><?php echo WEAVERX_THEMEVERSION; ?> Options
<?php if (function_exists('weaverxplus_plugin_installed')) {
	echo '<span style="font-size:smaller;"> - ' .  __('Plus', 'weaver-xtreme' /*adm*/) .
'</span><span style="font-size:small;"> ('; echo WEAVER_XPLUS_VERSION; echo ')</span>';
	}?>

<?php if (is_child_theme()) echo " &mdash; " . wp_get_theme(); ?>


</h2>
	<a name="top_main" id="top_main"></a></div>
<?php weaverx_donate_button();
	//weaverx_check_theme();
	weaverx_clear_messages();

	weaverx_check_version();           // check version RSS

	weaverx_clear_both();
?>

<div id="tabwrap">
  <div id="taba-admin" class='yetii'>
	<ul id="taba-admin-nav" class='yetii'>
	<?php
	weaverx_elink( '#tab_themes', __('Select from pre-defined subthemes', 'weaver-xtreme' /*adm*/), __('Weaver Xtreme Subthemes', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	weaverx_elink( '#tab_main', __('Main options for most theme elements: site appearance, layout, header, menus, content, footer, fonts, more', 'weaver-xtreme' /*adm*/), __('Main Options', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	weaverx_elink( '#tab_advanced', __('Advanced options: HTML, code, CSS insertion; page templates, background images, SEO, site options', 'weaver-xtreme' /*adm*/), __('Advanced Options', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	weaverx_elink( '#tab_pro', __('Weaver Xtreme Theme Add-ons', 'weaver-xtreme' /*adm*/), __('Add-ons', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	weaverx_elink( '#tab_saverestore', __('Save and Restore theme settings', 'weaver-xtreme' /*adm*/), __('Save/Restore', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	weaverx_elink( '#tab_help', __('Table of Content links to Weaver Xtreme Help files', 'weaver-xtreme' /*adm*/), __('Help', 'weaver-xtreme' /*adm*/), $before='<li>', $after='</li>');
	?>
	</ul>

<?php //  list is order specific - above and below must match ?>

	  <div id="tab_themes" class="tab" >
<?php 	weaverx_admin_subthemes(); ?>
	  </div>
<?php
	  // ====================== Begin the big form here =====================
	weaverx_sapi_form_top('weaverx_settings_group','weaverx_options_form');
?>
	  <div id="tab_main" class="tab" >
<?php weaverx_admin_mainopts(); ?>
	  </div>

	  <div id="tab_advanced" class="tab" >
<?php weaverx_admin_advancedopts(); ?>
	  </div>


<?php
	weaverx_sapi_form_bottom();		// end of SAPI opts here. Can't cross <div>s! Non-sapi forms follow
	// ===================== end of big form  =====================
?>

	  <div id="tab_pro" class="tab" >
<?php weaverx_admin_pro(); ?>
	  </div>


   <div id="tab_saverestore" class="tab" >
<?php weaverx_admin_saverestore(); ?>
	</div>
	<div id="tab_help" class="tab" >
<?php weaverx_admin_help(); ?>
	</div>
   </div> <!-- #tab-saverestore -->
</div> <!-- #tabwrap -->

<?php   weaverx_end_of_section('Options'); ?>

<script type="text/javascript">
	var tabberAdmin = new Yetii({
	id: 'taba-admin',
	tabclass: 'tab',
	persist: true
	});
</script>

<?php
}	/* end weaverx_do_admin */

/*
	================= process settings when enter admin pages ================
*/
function weaverx_admin_page_process_options() {
	/* Process all options - called upon entry to options forms */

	// Most options are handled by the SAPI filter.

	settings_errors('weaverx_settings');			// display results from SAPI save settings

	$processed = weaverx_process_options_themes(); 	            // >>>> Weaver Xtreme Themes Tab

	do_action('weaverx_child_process_options');	// let the child theme do something
	do_action('weaverxplus_admin','process_options');
	do_action('weaverx_process_license_options');

	$processed = weaverx_process_options_admin_standard( $processed );	// setting from admin page

	/* this tab has the most individual forms and submit commands */

	/* ====================================================== */

	if (  !$processed && isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
		add_settings_error('weaverx_settings', 'settings_updated', __('Saved', 'weaver-xtreme' /*adm*/), 'updated');
		$vers = weaverx_getopt('style_version');
		weaverx_setopt('style_version', $vers + 1 );
	}

	 weaverx_save_opts('Weaver Xtreme Admin');			/* FINALLY - SAVE ALL OPTIONS AND UPDATE CURRENT CSS FILE */

}

function weaverx_admin_admin() {
?>
<div class="atw-option-header"><span style="color:black; padding:.2em;" class="dashicons dashicons-admin-generic"></span>
<?php _e('Basic Administrative Options', 'weaver-xtreme' /*adm*/); ?>
<?php weaverx_help_link('help.html#AdminOptions','Help for Admin Options'); ?></div>

<p>
<?php _e('These options control some administrative options and appearance features.', 'weaver-xtreme' /*adm*/); ?>
</p>

<br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_donate'); ?>" id="hide_donate" <?php checked(weaverx_getopt_checked( '_hide_donate' )); ?> />
	<?php _e('I\'ve Donated - <small>Thank you for donating to the Weaver Xtreme theme.
This will hide the Donate button. Purchasing Weaver Xtreme Plus also hides the Donate button.</small> &diams;', 'weaver-xtreme' /*adm*/); ?>
	</label><br /><br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_editor_style'); ?>" id="_hide_editor_style" <?php checked(weaverx_getopt_checked( '_hide_editor_style' )); ?> />
<?php _e('Disable Page/Post Editor Styling - <small>Checking this box will disable the Weaver Xtreme subtheme based styling in the Page/Post editor.
If you have a theme using transparent backgrounds, this option will likely improve the Post/Page editor visibility. &diams;</small>', 'weaver-xtreme' /*adm*/); ?></label><br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_auto_css_rules'); ?>" id="hide_auto_css_rules" <?php checked(weaverx_getopt_checked( '_hide_auto_css_rules' )); ?> />
<?php _e('Don\'t auto-display CSS rules - <small>Checking this box will disable the auto-display of Main Option elements that have CSS settings.</small> &diams;', 'weaver-xtreme' /*adm*/); ?></label><br />

	<input name="<?php weaverx_sapi_main_name('_css_rows'); ?>" id="css_rows" type="text" style="width:30px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt('_css_rows')); ?>" />
<?php _e('lines - Set CSS+ text box height - <small>You can increase the default height of the CSS+ input area (1 to 25 lines).</small> &diams;', 'weaver-xtreme' /*adm*/); ?>
<br />
 <br />
 <h3 class="atw-option-subheader"><?php _e('Per Page and Per Post Option Panels by Roles<', 'weaver-xtreme' /*adm*/); ?>/h3>
 <p>
<?php _e('Single site Administrator and Multi-Site Super Administrator will always have the Per Page and Per Post options panel displayed.
You may selectively disable these options for other User Roles using the check boxes below.', 'weaver-xtreme' /*adm*/); ?>
 </p>


	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_mu_admin_per'); ?>" id="_hide_mu_admin_per" <?php checked(weaverx_getopt_checked( '_hide_mu_admin_per' )); ?> />
	<?php _e('Hide Per Page/Post Options for MultiSite Admins', 'weaver-xtreme' /*adm*/); ?></label> &diams;<br />
	   <label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_editor_per'); ?>" id="_hide_editor_per" <?php checked(weaverx_getopt_checked( '_hide_editor_per' )); ?> />
	<?php _e('Hide Per Page/Post Options for Editors', 'weaver-xtreme' /*adm*/); ?></label> &diams;<br />
	   <label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_author_per'); ?>" id="_hide_author_per" <?php checked(weaverx_getopt_checked( '_hide_author_per' )); ?> />
	<?php _e('Hide Per Page/Post Options for Authors and Contributors', 'weaver-xtreme' /*adm*/); ?></label> &diams;<br />
	<br />
	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_show_per_post_all'); ?>" id="_hide_author_per" <?php checked(weaverx_getopt_checked( '_show_per_post_all' )); ?> />
	<?php _e('Show Per Post Options for Custom Post Types &diams; - <small>Shows the Per Post options box on "Custom Post Type Editor" admin pages', 'weaver-xtreme' /*adm*/); ?></small>
	</label>
<br />
<br /><br />
	<div class="atw-option-subheader"><?php _e('Theme Name and Description', 'weaver-xtreme' /*adm*/); ?></div>
<p>
<?php _e('You can change the name and description of your current settings if you would like to create a new theme
theme file for sharing with others, or for you own identification.', 'weaver-xtreme' /*adm*/); ?>
</p>
<?php _e('Theme Name:', 'weaver-xtreme' /*adm*/); ?> <input name="<?php weaverx_sapi_main_name('themename'); ?>" id="themename" value="<?php echo weaverx_getopt('themename'); ?>" />
	<br />
	<?php _e('Description:', 'weaver-xtreme' /*adm*/); ?>&nbsp;&nbsp;&nbsp;
	<?php weaverx_textarea(weaverx_getopt('theme_description'), 'theme_description', 2, __('Describe the theme','weaver-xtreme' /*adm*/),'width:65%;'); ?>
<br />
<br />
 <h3 class="atw-option-subheader"><?php _e('Subtheme Notes', 'weaver-xtreme' /*adm*/); ?></h3>
 <p>
<?php _e('This box may be used to keep notes and instructions about settings made for a custom subtheme.
It will be saved in the both \'.wxt\' and \'.wxb\' settings files.', 'weaver-xtreme' /*adm*/); ?>
 </p>
 <?php
	weaverx_textarea(weaverx_getopt('subtheme_notes'), 'subtheme_notes', 2, __('Notes about theme','weaver-xtreme' /*adm*/), 'width:75%;');

	do_action('weaverxplus_admin','admin_options');

}
/* ^^^^^ end weaverx_admin_page_process_options ^^^^^^ */

// ===================================== include other stuff ==========================

require_once( get_template_directory() . '/includes/lib-admin.php' );
require_once( get_template_directory() . '/includes/lib-admin-part2.php' );

require_once( get_template_directory() . '/includes/admin-subthemes.php' );
require_once( get_template_directory() . '/includes/admin-mainopts.php' );
require_once( get_template_directory() . '/includes/admin-advancedopts.php' );
require_once( get_template_directory() . '/includes/admin-plus.php' );
require_once( get_template_directory() . '/includes/admin-saverestore.php' );
require_once( get_template_directory() . '/includes/admin-help.php' );
?>
