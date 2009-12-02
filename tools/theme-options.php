<?php
/*
Plugin Name: Theme Options
Author: Nathan Rice
Author URI: http://www.nathanrice.net/

NOTE: this file requires WordPress 2.7+ to function
*/

define('SP_SETTINGS_FIELD', 'bahama-settings'); // do not change!!!

$defaults = array( // define our defaults
		'blog_layout' => 'Right',
		'comments_pages' => 'No',
		'comments_posts' => 'No',
		'analytics' => 'Yes' // <-- no comma after the last option
);

//	push the defaults to the options database,
//	if options don't yet exist there.
add_option(SP_SETTINGS_FIELD, $defaults, '', 'yes');

/*
///////////////////////////////////////////////
This section hooks the proper functions
to the proper actions in WordPress
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*/
//	this function registers our settings in the db
add_action('admin_init', 'register_theme_settings');
function register_theme_settings() {
	register_setting(SP_SETTINGS_FIELD, SP_SETTINGS_FIELD);
}
//	this function adds the settings page to the Appearance tab
add_action('admin_menu', 'add_theme_options_menu');
function add_theme_options_menu() {
	add_submenu_page('themes.php', 'Bahama '.__('Theme Options','studiopress'), 'Bahama '.__('Theme Options','studiopress'), 8, 'theme-options', 'theme_settings_admin');
}

/*
///////////////////////////////////////////////
This section handles all the admin page
output (forms, update notifications, etc.)
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*/
function theme_settings_admin() { ?>
<?php theme_options_css_js(); ?>
<div class="wrap">
<?php
	// display the proper notification if Saved/Reset
	global $defaults;
	if(sp_get_option('reset')) {
		echo '<div class="updated fade" id="message"><p>'.__('Theme Options', 'studiopress').' <strong>'.__('RESET TO DEFAULTS', 'studiopress').'</strong></p></div>';
		update_option(SP_SETTINGS_FIELD, $defaults);
	} elseif($_REQUEST['updated'] == 'true') {
		echo '<div class="updated fade" id="message"><p>'.__('Theme Options', 'studiopress').' <strong>'.__('SAVED', 'studiopress').'</strong></p></div>';
	}
	// display icon next to page title
	screen_icon('options-general');
?>
	<h2><?php echo get_current_theme() . ' '; _e('Theme Options', 'studiopress'); ?></h2>
	<form method="post" action="options.php">
	<?php settings_fields(SP_SETTINGS_FIELD); // important! ?>

	<?php // first column ?>
    
	<div class="metabox-holder">
        
		<div class="postbox">
		<h3><?php _e("Blog Layout", 'studiopress'); ?></h3>
			<div class="inside">
				<p><?php _e("Select from the following:", 'studiopress'); ?>
				<select name="<?php echo SP_SETTINGS_FIELD; ?>[blog_layout]">
					<option style="padding-right:10px;" value="Left" <?php selected('Left', sp_get_option('blog_layout')); ?>><?php _e("Sidebar/Content", 'studiopress'); ?></option>
					<option style="padding-right:10px;" value="Right" <?php selected('Right', sp_get_option('blog_layout')); ?>><?php _e("Content/Sidebar", 'studiopress'); ?></option>
					<option style="padding-right:10px;" value="Split" <?php selected('Split', sp_get_option('blog_layout')); ?>><?php _e("Sidebar/Content/Sidebar", 'studiopress'); ?></option>
				</select></p>
			</div>
		</div>
		
		<div class="postbox">
		<h3><?php _e("Comments", 'studiopress'); ?></h3>
			<div class="inside">
				<p><?php _e("Disable on posts?", 'studiopress'); ?>
				<select name="<?php echo SP_SETTINGS_FIELD; ?>[comments_posts]">
					<option style="padding-right:10px;" value="No" <?php selected('No', sp_get_option('comments_posts')); ?>><?php _e("No", 'studiopress'); ?></option>
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', sp_get_option('comments_posts')); ?>><?php _e("Yes", 'studiopress'); ?></option>
				</select>
				<?php _e("Disable on pages?", 'studiopress'); ?>
				<select name="<?php echo SP_SETTINGS_FIELD; ?>[comments_pages]">
					<option style="padding-right:10px;" value="No" <?php selected('No', sp_get_option('comments_pages')); ?>><?php _e("No", 'studiopress'); ?></option>
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', sp_get_option('comments_pages')); ?>><?php _e("Yes", 'studiopress'); ?></option>
				</select></p>
				<p><strong><?php _e("Note: ", 'studiopress'); ?></strong><?php _e("Comments can also be disabled on a per post/page basis when creating new posts/pages in your dashboard.", 'studiopress'); ?></p>
			</div>
		</div>
				
		<div class="postbox">
		<h3><?php _e("Analytics/Stat Tracker Code", 'studiopress'); ?></h3>
			<div class="inside">
				<p><?php _e("Do you want to include analytics/stat tracker code?", 'studiopress'); ?>
				<select name="<?php echo SP_SETTINGS_FIELD; ?>[analytics]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', sp_get_option('analytics')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', sp_get_option('analytics')); ?>>No</option>
				</select></p>
                
				<p><?php _e("Enter your analytics/stat tracker code:", 'studiopress'); ?><br />
				<textarea name="<?php echo SP_SETTINGS_FIELD; ?>[analytics_code]" cols=38 rows=5><?php echo sp_get_option('analytics_code'); ?></textarea></p>
            </div>
		</div>
        		
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo SP_SETTINGS_FIELD; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>
		                     
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
    
	<?php // end second column ?>
    
	</form>

</div>
<?php }

// add CSS and JS if necessary
function theme_options_css_js() {
echo <<<CSS

<style type="text/css">
	.metabox-holder { 
		width: 380px; float: left;
		margin: 0px; padding: 0px 10px 0px 0px;
	}
	.metabox-holder .postbox .inside {
		padding: 0px 10px 0px 10px;
	}
</style>

CSS;
echo <<<JS

<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
});
</script>

JS;
}
?>