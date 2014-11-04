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
/*
	========================= Weaver Xtreme Admin Tab - Main Options ==============
*/
function weaverx_do_admin() {
/* theme admin page */

/* This generates the startup script calls, etc, for the admin page */
	global $weaverx_opts_cache, $weaverx_main_options, $weaverx_main_opts_list;

	if (!current_user_can('edit_theme_options'))
        wp_die("No permission to access that page.");

	weaverx_admin_page_process_options();	// cess non-sapi options

	echo('<div class="wrap">');
?>
<div style="float:left;"><h2><?php echo WEAVERX_THEMEVERSION; ?> Options
<?php if (function_exists('weaverxplus_plugin_installed')) echo '<span style="font-size:smaller;"> -  Plus </span><span style="font-size:small;">(' . WEAVER_XPLUS_VERSION . ')</span>'; ?>
<?php if (is_child_theme()) echo " &mdash; " . wp_get_theme(); ?>


</h2>
	<a name="top_main" id="top_main"></a></div>
<?php weaverx_donate_button();
	//weaverx_check_theme();
	weaverx_clear_messages();

    if ( WEAVERX_SELF_HOST )
        weaverx_check_version();           // check version RSS @@@@@@

	// print_r(get_option('weaverx_settings'));
    weaverx_clear_both();
?>

<div id="tabwrap">
  <div id="taba-admin" class='yetii'>
	<ul id="taba-admin-nav" class='yetii'>
	  <li><a href="#tab_themes" title="Select from pre-defined subthemes"><?php echo(wvr__('Weaver Xtreme Subthemes')); ?></a></li>
	  <li><a href="#tab_main" title="Main options for most theme elements: site appearance, layout, header, menus, content, footer, fonts, more."><?php echo(wvr__('Main Options')); ?></a></li>
	  <li><a href="#tab_advanced" title="Advanced options: HTML, code, CSS insertion; page templates, background images, SEO, site options."><?php echo(wvr__('Advanced Options')); ?></a></li>

	  <li><a href="#tab_pro" title="Weaver Xtreme Theme Add-ons."><?php echo(wvr__('Add-ons')); ?></a></li>


	  <li><a href="#tab_saverestore" title="Save and Restore theme settings."><?php echo(wvr__('Save/Restore')); ?></a></li>
	  <li><a href="#tab_help" title="Table of Content links to Weaver Xtreme Help files"><?php echo(wvr__('Help')); ?></a></li>
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
        add_settings_error('weaverx_settings', 'settings_updated', wvr__('Save Button pressed'), 'updated');
        $vers = weaverx_getopt('style_version');
        weaverx_setopt('style_version', $vers + 1 );
    }

	 weaverx_save_opts('Weaver Xtreme Admin');			/* FINALLY - SAVE ALL OPTIONS AND UPDATE CURRENT CSS FILE */

}

function weaverx_admin_admin() {
?>
<div class="atw-option-header"><span style="color:black; padding:.2em;" class="dashicons dashicons-admin-generic"></span>
Basic Administrative Options <?php weaverx_help_link('help.html#AdminOptions','Help for Admin Options'); ?></div>

 <p>   These options control some administrative options and appearance features.</p>

<br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_donate'); ?>" id="hide_donate" <?php checked(weaverx_getopt_checked( '_hide_donate' )); ?> />
	I've Donated - </label><small>Thank you for donating to the Weaver Xtreme theme.
This will hide the Donate button. Purchasing Weaver Xtreme Plus also hides the Donate button.</small> &diams;<br /><br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_editor_style'); ?>" id="_hide_editor_style" <?php checked(weaverx_getopt_checked( '_hide_editor_style' )); ?> />
	Disable Page/Post Editor Styling - </label><small>Checking this box will disable the Weaver Xtreme subtheme based styling in the Page/Post editor.
	If you have a theme using transparent backgrounds, this option will likely improve the Post/Page editor visibility.</small> &diams;<br />

	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_auto_css_rules'); ?>" id="hide_auto_css_rules" <?php checked(weaverx_getopt_checked( '_hide_auto_css_rules' )); ?> />
	Don't auto-display CSS rules - </label><small>Checking this box will disable the auto-display of Main Option elements that have CSS settings.</small> &diams;<br />

	<input name="<?php weaverx_sapi_main_name('_css_rows'); ?>" id="css_rows" type="text" style="width:30px;height:20px;" class="regular-text" value="<?php weaverx_esc_textarea(weaverx_getopt('_css_rows')); ?>" />
	<label>lines - Set CSS+ text box height - </label><small>You can increase the default height of the CSS+ input area (1 to 25 lines).</small> &diams;
<br />
 <br />
 <h3 class="atw-option-subheader">Per Page and Per Post Option Panels by Roles</h3>
 <p>Single site Administrator and Multi-Site Super Administrator will always have the Per Page and Per Post options panel displayed.
 You may selectively disable these options for other User Roles using the check boxes below.</p>


	<label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_mu_admin_per'); ?>" id="_hide_mu_admin_per" <?php checked(weaverx_getopt_checked( '_hide_mu_admin_per' )); ?> />
	Hide Per Page/Post Options for MultiSite Admins</label> &diams;<br />
	   <label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_editor_per'); ?>" id="_hide_editor_per" <?php checked(weaverx_getopt_checked( '_hide_editor_per' )); ?> />
	Hide Per Page/Post Options for Editors</label> &diams;<br />
	   <label><input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_author_per'); ?>" id="_hide_author_per" <?php checked(weaverx_getopt_checked( '_hide_author_per' )); ?> />
	Hide Per Page/Post Options for Authors and Contributors</label> &diams;<br />
    <br />
    <label><input type="checkbox" name="<?php weaverx_sapi_main_name('_show_per_post_all'); ?>" id="_hide_author_per" <?php checked(weaverx_getopt_checked( '_show_per_post_all' )); ?> />
	Show Per Post Options for Custom Post Types</label> &diams; - <small>Shows the Per Post options box on "Custom Post Type Editor" admin pages</small><br />

<br/><br />
	<div class="atw-option-subheader">Theme Name and Description</div>
		<p>You can change the name and description of your current settings if you would like to create a new theme
	theme file for sharing with others, or for you own identification.
	</p>
	Theme Name: <input name="<?php weaverx_sapi_main_name('themename'); ?>" id="themename" value="<?php echo weaverx_getopt('themename'); ?>" />
	<br />
	Description:&nbsp;&nbsp;&nbsp; <textarea name="<?php weaverx_sapi_main_name('theme_description'); ?>" id="theme_description" rows=2 style="width: 350px"><?php echo(esc_textarea(weaverx_getopt('theme_description'))); ?></textarea>
	<br />

<br />
 <h3 class="atw-option-subheader">Subtheme Notes</h3>
 <p>This box may be used to keep notes and instructions about settings made for a custom subtheme. It
 will be saved in the both '.wxt' and '.wxb' settings files.</p>
 <textarea name="<?php weaverx_sapi_main_name('subtheme_notes'); ?>" rows=8 style="width: 95%"><?php weaverx_esc_textarea(weaverx_getopt('subtheme_notes')); ?></textarea>
<?php
    do_action('weaverxplus_admin','admin_options');

}
/* ^^^^^ end weaverx_admin_page_process_options ^^^^^^ */

// ===================================== include other stuff ==========================

require_once( get_template_directory() . '/includes/lib-admin.php' );

require_once( get_template_directory() . '/includes/admin-subthemes.php' );
require_once( get_template_directory() . '/includes/admin-mainopts.php' );
require_once( get_template_directory() . '/includes/admin-advancedopts.php' );
require_once( get_template_directory() . '/includes/admin-plus.php' );
require_once( get_template_directory() . '/includes/admin-saverestore.php' );
require_once( get_template_directory() . '/includes/admin-help.php' );
?>
