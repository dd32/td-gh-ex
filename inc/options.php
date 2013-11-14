<?php
/**
 * B3 functions and definitions
 *
 * @package B3
 */

function b3_register_settings() {
	register_setting('b3-settings-group', 'b3_options');
}

function b3_option_input($option_key, $name = '', $type = 'text', $default = '', $options = array()) {
	global $b3_options;

	switch ($type) {
		case 'radio':
			echo '<label>' . $name . '</label>';
			$arr = $options ? $options : array('Y' => __('Yes', 'b3'), 'N' => __('No', 'b3'));
			foreach ($arr as $key => $value ) {
				echo ' <input name="b3_options[' .$option_key . ']" type="radio" value="'. $key . '" '
					. ($b3_options[$option_key] == $key ? 'checked' : ''). '/>'. $value . '&nbsp;';  
			}
			break;

		case 'checkbox':
			echo '<input name="b3_options[' .$option_key . ']" type="hidden" value="N" />';
			echo '<label>' . $name . '</label>';
			echo ' <input name="b3_options[' .$option_key . ']" type="checkbox" value="Y" '
				. ('Y' == $b3_options[$option_key] ? ' checked' : ''). '/>';  
			break;

		case 'color':
				echo '<label>' . $name . '</label>';
				echo '<input name="b3_options[' .$option_key . ']" class="b3-color-option" data-default-color="'
					. $default . '" type="text" value="'. $b3_options[$option_key] . '" />';        
		break;

		case 'text':
			echo '<label>' . $name . '</label>';
			echo '<input name="b3_options[' .$option_key . ']" type="text" value="'. $b3_options[$option_key] . '" />';    
		break;

		case 'hidden':
			echo '<input name="b3_options[' .$option_key . ']" type="hidden" value="'. $b3_options[$option_key] . '" />';    
		break;

		default:
			echo '<label>' . $name . '</label>';
			echo '<input name="b3_options[' .$option_key . ']" type="text" value="'. $b3_options[$option_key] . '" />';  
	}
}

function b3_settings_page() {
	global $b3_options;

	if ( !empty($_GET['noheader']) && 'b3_save_file' == $_GET['action']) {
		$str = serialize($b3_options);
		if ( empty($str) ) die;
		header("Content-Type: application/octet-stream;");
		header('Content-Disposition: attachment; filename='. 'b3-settings-'. date('YmdHis') .'.txt');
		header('Accept-Ranges: bytes');
		header('Content-Length: '.strlen($str));
		die($str);
	}
?>
<div class="wrap"><div id="icon-themes" class="icon32"><br></div>
<h2><?php _e('B3 Custom Settings', 'b3'); ?></h2>
<form method="post" action="options.php" id="b3_options_form" enctype="multipart/form-data">
		<?php settings_fields('b3-settings-group'); ?>
		<?php do_settings_sections('b3-settings-group'); ?>

<table class="form-table" border="0">
	<tr valign="top">
		<td  style="width: 400px;">
			<h3><?php _e('Site Branding', 'b3'); ?></h3>
			<div> <?php b3_option_input('logo_enabled', __('Display logo', 'b3'), 'checkbox'); ?> </div>
			<div> <?php b3_option_input('site_title_enabled', __('Display site title?', 'b3'), 'checkbox'); ?> </div>
			<div> <?php b3_option_input('site_description_enabled', __('Display site description?', 'b3'), 'checkbox'); ?></div>
			<div> <?php b3_option_input('navbar_brand', __('Navigation title', 'b3'), 'text'); ?></div>
			<div> <?php b3_option_input('copyright', __('Copyright text', 'b3'), 'text'); ?></div>
			<div> <?php b3_option_input('carousel', __('Homepage carousel', 'b3'), 'radio', 'demo',
				array('Y' => __('Yes', 'b3'), 'N' => __('No', 'b3'), 'demo' => __('Demo', 'b3'),)); ?></div>
			<div></div>
		</td>
		<td>
			<h3><?php _e('Custom Colors', 'b3'); ?></h3>
			<div> <?php b3_option_input('text_color', __('Text color', 'b3'), 'color', '#333333'); ?></div>
			<div> <?php b3_option_input('headers_color', __('Headers H1...H6 Color', 'b3'), 'color') ?></div>
			<div> <?php b3_option_input('link_color', __('Link color', 'b3'), 'color') ?></div>
			<div> <?php b3_option_input('navbar_color', __('Navigation bar color', 'b3'), 'color', '#F8F8F8'); ?></div>
			<div> <?php b3_option_input('navbar_link_color', __('Navigation link color', 'b3'), 'color', '#777777'); ?></div>
		</td>

	</tr>

	<tr valign="top">
		<td>
			<h3><?php _e('Other Settings', 'b3'); ?></h3>
			<div> <?php b3_option_input('sidebar_main', __('Main sidebar', 'b3'), 'radio', 'left',
				array('left'=> __('Left', 'b3'), 'right'=> __('Right', 'b3'),) ); ?></div>
			<div> <?php b3_option_input('sidebar_top', __('Top sidebar', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('sidebar_bottom', __('Bottom sidebar', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('disable_comment_page', __('Disable comments on pages', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('panel_widget', __('Widget as panel', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('panel_post', __('Post as panel', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('show_home', __('Home link (in pages menu)', 'b3'), 'checkbox') ?></div>

		</td>
		<td>
			<p>&nbsp;</p>
			<div> <?php b3_option_input('excerpt', __('Excerpts in archives', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('post_thumbnail', __('Featured images in excerpts', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('post_date', __('Display post date', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('post_author', __('Display post author', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('image_rounded', __('Rounded images', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('credits', __('Display credits', 'b3'), 'checkbox') ?></div>
			<div> <?php b3_option_input('bootstrap_src', __('Load Bootstrap from', 'b3'), 'radio', 'local',
				array('local' => __('Local theme files', 'b3'), 'cdn' => __('Bootstrap CDN', 'b3'),) ) ?></div>
		</td> 
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>
			<h3><?php _e('Backup/Restore Settings', 'b3'); ?></h3>
			<div><label><?php _e('Export Settings', 'b3'); ?></label><a class="button button-secondary" href="themes.php?page=b3_settings&amp;noheader=1&amp;action=b3_save_file"><?php _e('Save as File', 'b3'); ?></a></div>
			<p>&nbsp;</p>
			<div><input type="file" name="b3_upload_settings" />
			<input type="hidden" id="b3_action_upload" name="b3_action_upload" value="" /><input class="button button-primary" type="button" value="<?php _e('Upload and Apply', 'b3'); ?>" onclick="b3_upload();" /></div>
			<p>&nbsp;</p>
		</td>
	</tr>
	<tr>
		<td> <input type="submit" value="<?php _e('Save Changes', 'b3'); ?>" class="button button-primary" id="b3_save_options"> </td>

		<td><input type="hidden" id="b3_action_reset" name="b3_action_reset" value="" />
				<input type="button" class="button button-secondary" onclick="b3_reset();" value="<?php _e('Reset Options', 'b3'); ?>" /></td>
	</tr>
</table>

</form>
</div>
<?php }
