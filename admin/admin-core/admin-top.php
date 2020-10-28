<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/*
	Weaver Xtreme Admin - Uses yetii JavaScript to build tabs.
	Tabs include:
	Weaver Xtreme Themes		( in atw-subthemes.php )
	Main Options		( in this file )
	Advanced Options	( in wvr_advancedopts.php )
	Save/Restore Themes	( in atw-subthemes.php )
	Snippets		( in atw-help.php )
	CSS Help		ditto
	Help			ditto

*  __ added - 12/10/14
/*
	========================= Weaver Xtreme Admin Tab - Main Options ==============
*/
function weaverx_do_admin() {
	/* theme admin page */

	/* This generates the startup script calls, etc, for the admin page */

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'No permission to access that page.', 'weaver-xtreme') );
	} else {
		weaverx_check_editor_style();
	}        // see if we need an update...

	weaverx_admin_page_process_options();    // Process non-sapi options

	echo( '<div class="wrap">' );
	?>
	<div style="float:left;"><h2><?php echo WEAVERX_THEMEVERSION; ?> Options
			<?php if ( function_exists( 'weaverxplus_plugin_installed' ) ) {
				echo '<span style="font-size:smaller;"> - ' . esc_html__( 'Plus', 'weaver-xtreme') .
				     '</span><span style="font-size:small;"> ( ';
				echo WEAVER_XPLUS_VERSION;
				echo ' )</span>';
			} ?>

			<?php if ( is_child_theme() ) {
				echo " &mdash; " . wp_get_theme();
			} ?>


		</h2>
		<a name="top_main" id="top_main"></a></div>
	<?php weaverx_donate_button();
	//weaverx_check_theme();
	weaverx_clear_messages();

	weaverx_check_support_plugin_version();

	weaverx_clear_both();
	$link_url = get_admin_url();
	$link_url = str_replace( 'http://', '//', $link_url );
	$link_url = str_replace( 'https://', '//', $link_url );
	$ret_url         = str_replace( '/', '%2F', $link_url );
	$customizer_link = $link_url . '/customize.php?return=' . $ret_url . 'themes.php%3Fpage%3DWeaverX';

	if ( ! weaverx_getopt( '_disable_customizer' ) ) {
		?>
		<a href="<?php echo $customizer_link; ?>" title="Switch to Customizer" style="text-decoration:none;font-weight:bold; border:1px solid blue;padding-left:5px; padding-right:5px; background-color:yellow;">Switch to Customizer</a>
	<?php } ?>

	<div id="tabwrap">
		<div id="taba-admin" class='yetii'>
			<ul id="taba-admin-nav" class='yetii'>
				<?php
				weaverx_elink( '#tab_help', esc_html__( 'Table of Content links to Weaver Xtreme Help files', 'weaver-xtreme'), esc_html__( 'Theme Help', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );


				weaverx_elink( '#tab_themes', esc_html__( 'Select from pre-defined subthemes', 'weaver-xtreme'), esc_html__( 'Weaver Xtreme Subthemes', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );

				weaverx_elink( '#tab_main', esc_html__( 'Main options for most theme elements: site appearance, layout, header, menus, content, footer, fonts, more', 'weaver-xtreme'), esc_html__( 'Main Options', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );

				if ( has_action( 'weaverx_admin_advancedopts' ) ) {
					weaverx_elink( '#tab_advanced', esc_html__( 'Advanced options: HTML, code, CSS insertion; page templates, background images, SEO, site options', 'weaver-xtreme'), esc_html__( 'Advanced Options', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );
				}

				weaverx_elink( '#tab_pro', esc_html__( 'Weaver Xtreme Theme Add-ons', 'weaver-xtreme'), esc_html__( 'Add-ons', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );

				weaverx_elink( '#tab_saverestore', esc_html__( 'Save and Restore theme settings', 'weaver-xtreme'), esc_html__( 'Save/Restore', 'weaver-xtreme'), $before = '<li>', $after = '</li>' );


				?>
			</ul>

			<?php //  list is order specific - above and below must match ?>

			<div id="tab_help" class="tab">
				<?php weaverx_admin_help(); ?>
			</div>


			<div id="tab_themes" class="tab">
				<?php  do_weaverx_admin_subthemes(); ?>
			</div>

			<?php


			// ====================== Begin the big form here =====================
			weaverx_sapi_form_top( 'weaverx_settings_group', 'weaverx_options_form' );
			?>
			<div id="tab_main" class="tab">
				<?php  do_weaverx_admin_mainopts(); ?>
			</div>

			<?php if ( has_action( 'weaverx_admin_advancedopts' ) ) { ?>

				<div id="tab_advanced" class="tab">
					<?php  do_weaverx_admin_advancedopts(); ?>
				</div>
				<?php
			}


			weaverx_sapi_form_bottom();        // end of SAPI opts here. Can't cross <div>s! Non-sapi forms follow
			// ===================== end of big form  =====================
			?>

			<div id="tab_pro" class="tab">
				<?php  weaverx_admin_pro(); ?>
			</div>

			<div id="tab_saverestore" class="tab">
				<?php  do_weaverx_admin_saverestore(); ?>
			</div>

		</div> <!-- #tab-saverestore -->
	</div> <!-- #tabwrap -->

	<?php weaverx_end_of_section( 'Options' ); ?>

	<script type="text/javascript">
		var tabberAdmin = new Yetii({
			id: 'taba-admin',
			tabclass: 'tab',
			persist: true
		});
	</script>

	<?php
}    /* end weaverx_do_admin */

/*
	================= process settings when enter admin pages ================
*/
function weaverx_admin_page_process_options() {
	/* Process all options - called upon entry to options forms */

	// Most options are handled by the SAPI filter.

	settings_errors( WEAVER_SETTINGS_NAME );            // display results from SAPI save settings

	$processed = false;

	if ( function_exists( 'wvrx_ts_installed' ) ) {
		$processed = weaverx_process_options_themes();               // >>>> Weaver Xtreme Themes Tab
	}

	do_action( 'weaverx_child_process_options' );    // let the child theme do something
	do_action( 'weaverxplus_admin', 'process_options' );
	do_action( 'weaverx_process_license_options' );


	/* this tab has the most individual forms and submit commands */

	/* ====================================================== */

	if ( ! $processed && isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
		add_settings_error( WEAVER_SETTINGS_NAME, 'settings_updated', esc_html__( 'Saved', 'weaver-xtreme'), 'updated' );
		$vers = weaverx_getopt( 'style_version' ) + 1;
		weaverx_setopt( 'style_version', $vers );
		if ( ! WEAVERX_DEV_MODE ) {
			$themename = weaverx_getopt( 'themename' );
			if ( strpos( $themename, '-V-' ) === false )        // fixup theme name
			{
				$themename .= '-V-';
			}
			$themename = rtrim( $themename, '0..9' );
			weaverx_setopt( 'themename', $themename . $vers );
		}
	}

	weaverx_save_opts( 'Weaver Xtreme Admin' );            /* FINALLY - SAVE ALL OPTIONS AND UPDATE CURRENT CSS FILE */

}

function weaverx_admin_admin() {    // compatibility version - code moved to theme support plugin as weaverx_admin_admin_ts
	?>
	<div class="atw-option-header"><span style="color:black; padding:.2em;" class="dashicons dashicons-admin-generic"></span>
		<?php echo esc_html__( 'Basic Administrative Options', 'weaver-xtreme'); ?>
		<?php weaverx_help_link( 'help.html#AdminOptions', 'Help for Admin Options' ); ?></div>

	<p style="font-weight:bold">
		<?php echo esc_html__( 'Please update to the latest version of Weaver Xtreme Theme Support Plugin.', 'weaver-xtreme'); ?>
	</p>
	<?php
}

/* ^^^^^ end weaverx_admin_page_process_options ^^^^^^ */

// ============================= link functions to the Theme Support Plugin =============

function do_weaverx_admin_saverestore() {
	if ( ! has_action( 'weaverx_admin_saverestore' ) ) {
		echo '<br /><h2>';
		echo sprintf( weaverx_filter_text( __( 'Please install the %s plugin to enable Legacy <em>Save/Restore</em>.', 'weaver-xtreme' ) ),
			'<a href="//wordpress.org/plugins/weaverx-theme-support" target="_blank">Weaver Xtreme Theme Support</a>' );
		echo '</h3><p>';
		echo weaverx_filter_text( __( 'The <em>Weaver Xtreme Theme Support Plugin</em> provides the full set of theme Save/Restore options.
Please open the <em>Appearance &rarr; Recommended Plugins</em> menu or go to WordPress.com to install this plugin.', 'weaver-xtreme' ) );
		echo '</p>';
		//$t_dir = weaverx_relative_url( '' ) . 'assets/images/core-subthemes.jpg';
		//echo '<img style="margin-left:5%;" src="' . $t_dir . '" />';
	} else {
		do_action( 'weaverx_admin_saverestore' );
	}
}

function do_weaverx_admin_subthemes() {
	if ( ! has_action( 'weaverx_admin_subthemes' ) ) {
		echo '<br /><h2>';
		echo sprintf( weaverx_filter_text( __( 'Please install the %s plugin to enable <em>Weaver Xtreme Subthemes</em>.', 'weaver-xtreme' ) ),
			'<a href="//wordpress.org/plugins/weaverx-theme-support" target="_blank">Weaver Xtreme Theme Support</a>' );
		echo '</h3><p>';
		echo weaverx_filter_text( __( 'The <em>Weaver Xtreme Theme Support Plugin</em> provides a full set of theme options, including pre-defined subthemes, and the complete legacy
options interface which gives you even more ways to customize your site design.
Please open the <em>Appearance &rarr; Recommended Plugins</em> menu or go to WordPress.com to install this plugin.', 'weaver-xtreme' ) );
		echo '</p>';
		$t_dir = weaverx_relative_url( '' ) . 'assets/images/core-subthemes.jpg';
		echo '<img style="margin-left:5%;" src="' . $t_dir . '" />';
	} else {
		do_action( 'weaverx_admin_subthemes' );
	}
}

function do_weaverx_admin_mainopts() {
	if ( ! has_action( 'weaverx_admin_mainopts' ) ) {
		echo '<br /><h2>';
		echo sprintf( weaverx_filter_text( __( 'Please install the %s plugin to enable <em>Main and Advanced Options</em>.', 'weaver-xtreme' ) ),
			'<a href="//wordpress.org/plugins/weaverx-theme-support" target="_blank">Weaver Xtreme Theme Support</a>' );
		echo '</h3><p>';
		echo weaverx_filter_text( __( 'The <em>Weaver Xtreme Theme Support Plugin</em> provides a full set of theme options, including pre-defined subthemes, and the complete legacy
options interface which gives you even more ways to customize your site design.
Please open the <em>Appearance &rarr; Recommended Plugins</em> menu or go to WordPress.com to install this plugin.', 'weaver-xtreme' ) );
		echo '</p>';
		$t_dir = weaverx_relative_url( '' ) . 'assets/images/legacy-options.jpg';
		echo '<img style="margin-left:5%;" src="' . $t_dir . '" />';
	} else {
		do_action( 'weaverx_admin_mainopts' );
	}
}

function do_weaverx_admin_advancedopts() {
	if ( ! has_action( 'weaverx_admin_advancedopts' ) ) {
		?>
		<h2>Install Weaver Theme Support to view Advanced Options</h2>
		<?php
	} else {
		do_action( 'weaverx_admin_advancedopts' );
	}
}

// ===================================== include other stuff ==========================

require_once( get_theme_file_path( WEAVERX_ADMIN_DIR . '/admin-core/admin-plus.php' ) );
require_once( get_theme_file_path( WEAVERX_ADMIN_DIR . '/admin-core/admin-help.php' ) );
