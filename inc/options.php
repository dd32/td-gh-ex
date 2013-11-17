<?php
/**
 * B3 functions and definitions
 *
 * @package B3
 */

add_filter('sanitize_option_b3_options', 'b3_sanitize_options');

function b3_sanitize_options($arr) {
	$defaults = array(
		'logo_enabled' => 'Y',
		'site_title_enabled' => 'Y',
		'site_description_enabled' => 'Y',
		'navbar_brand' => 'Project Name',
		'copyright' => date('Y ') . get_option('blogname'),
		'show_home' => 'N',
		'disable_comment_page' => 'N',
		'sidebar_main' => 'right',
		'sidebar_top' => 'Y',
		'sidebar_bottom' => 'Y',
		'panel_widget' => 'N', 
		'panel_post' => 'N',
		'carousel' => 'demo',
		'image_rounded' => 'N',
		'credits' => 'Y',
		'post_thumbnail' => 'Y',
		'post_date' => 'Y',
		'post_author' => 'Y',
		'excerpt' => 'N',
		'text_color' => '#333333',
		'headers_color' => '',
		'link_color' => '',
		'link_hover_color' => '',
		'navbar_color' => '',
		'navbar_color2' => '',
		'navbar_border' => '',
		'navbar_link_color' => '',
		'navbar_link_color2' => '',
		'bootstrap_src' => 'local',
	);

	$out = array();
	foreach ($defaults as $key => $value) {
		$out[$key] = isset($arr[$key]) ? $arr[$key] : $value;
		if (strpos($key, 'color') && !preg_match('/^#[0-9a-f]{6,6}$/i', $out[$key])) {
			$out[$key] = '';
		}
	}

	if ($out['text_color']) {
		$out['text_color2'] = b3_smudge_color($out['text_color'], 40);
	}
	else {
		$out['text_color'] = $out['text_color2'] = '';
	}

	if ($out['link_color']) {
		$out['link_hover_color'] = b3_darken($out['link_color'], 15);
	}
	else {
		$out['link_color'] = $out['link_hover_color'] = '';
	}
	if ($out['navbar_color']) {
		$out['navbar_color2'] = b3_lighten($out['navbar_color'], 75);
		$out['navbar_border'] = b3_lighten($out['navbar_color'], 25);
	}
	else {
		$out['navbar_color'] = $out['navbar_color2'] = $out['navbar_border'] = '';
	}
	if ($out['navbar_link_color']) {
		$out['navbar_link_color2'] = b3_darken($out['navbar_link_color'], 40);
	}
	else {
		$out['navbar_link_color'] = $out['navbar_link_color2'] = '';
	}
	$out['copyright'] = htmlspecialchars($out['copyright']);
	$out['navbar_brand'] = htmlspecialchars($out['navbar_brand']);
	return $out;
}

function b3_darken($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio = 1 - $p*0.01;
	$dec = hexdec(substr($color, 1));
	$b = dechex(floor((0xFF & $dec) * $ratio));
	if (strlen($b) == 1) $b = '0'.$b;
	$g = dechex(floor(((0xFF00 & $dec) >> 8) * $ratio));
	if (strlen($g) == 1) $g = '0'.$g;
	$r = dechex(floor(((0xFF0000 & $dec) >> 16) * $ratio));
	if (strlen($r) == 1) $r = '0'.$r;
	return "#$r$g$b";
}

function b3_lighten($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio =  1 + $p*0.01;
	$dec = hexdec(substr($color, 1));
	$b = dechex(min( floor((0xFF & $dec) * $ratio), 255 ));
	if (strlen($b) == 1) $b = '0'.$b;
	$g = dechex(min( floor(((0xFF00 & $dec) >> 8) * $ratio), 255 ));
	if (strlen($g) == 1) $g = '0'.$g;
	$r = dechex(min( floor(((0xFF0000 & $dec) >> 16) * $ratio), 255 ));
	if (strlen($r) == 1) $r = '0'.$r;
	return "#$r$g$b";
}

function b3_smudge($c, $r) {
	$x = dechex(floor($c*(1-$r) + (255-$c)*$r));				
	if (strlen($x) == 1) $b = '0'.$x;
	return $x;
}

function b3_smudge_color($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio = $p*0.01;
	$dec = hexdec(substr($color, 1));
	$b = b3_smudge(0xFF & $dec, $ratio);
	$g = b3_smudge((0xFF00 & $dec) >> 8, $ratio);
	$r = b3_smudge((0xFF0000 & $dec) >> 16, $ratio);
	return "#$r$g$b";
}

function b3_admin_init() {
	global $b3_options;
	register_setting('b3-settings-group', 'b3_options');

	if ( !empty($_GET['noheader']) && 'b3_save_file' == $_GET['action']) {
		$str = serialize($b3_options);
		if ( empty($str) ) die;
		header("Content-Type: application/octet-stream;");
		header('Content-Disposition: attachment; filename='. 'b3-settings-'. date('YmdHis') .'.txt');
		header('Accept-Ranges: bytes');
		header('Content-Length: '.strlen($str));
		die($str);
	}
	add_action('admin_notices', 'b3_update_options_notice');
	if ( !empty($_POST['b3_action']) ) {
		$b3_action = preg_replace('/[^a-z0-9_]/', '', $_POST['b3_action']);
		if ( !wp_verify_nonce( $_POST['_wpnonce'], 'b3-settings-group-options' ) ) {
			wp_die( 'Invalid or expired nonce marker.' ); 
		}
		switch ($b3_action) {
			case 'upload':
				if ( ($file = $_FILES['b3_upload_settings']) && !$file['error'] && $file['size']) {
					require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
					require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
					$f = new WP_Filesystem_Direct('');
					$content = $f->get_contents($file['tmp_name']);
// I can obtain it by one call file get contents but Theme-Check grumbles
					$import = maybe_unserialize($content);
					$f->delete($file['tmp_name']);
					if (is_array($import)) {
						update_option('b3_options', $import);
					}
					else {
						$b3_action = 'import_failed';
					}
				}
				else {
					$b3_action = 'import_failed';
				}
				break;
			case 'reset':
				update_option('b3_options', array());
				break;
			case 'update':
				$b3_new_options = array_merge($b3_options, $_POST['b3_options']);
				update_option('b3_options', $b3_new_options);
				break;
		}
		wp_redirect( admin_url('themes.php?page=b3_settings&notice=' . $b3_action) );
		die;
	}
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

function b3_update_options_notice() {
	if ( empty($_GET['notice']) ) return;
	$type = 'updated';
	switch($_GET['notice']) {
		case 'update':
			$message = __('Theme settings have been updated.', 'b3');
			break;
		case 'reset':
			$message = __('Theme settings have been reset.', 'b3');
			break;
		case 'upload':
			$message = __('Theme settings have been imported from the uploded file.', 'b3');
			break;
		case 'import_failed':
			$type = 'error';
			$message = __('Error: theme settings import failed.', 'b3');
			break;
	}
	if ( !empty($message) ) {
		echo '<div id="message" class="'. $type . ' "><p>' . $message . '</p></div>';
	}
}

function b3_settings_page() {
	global $b3_options;
?>
<div class="wrap"><div id="icon-themes" class="icon32"><br></div>
<h2><?php _e('B3 Custom Settings', 'b3'); ?></h2>
<form method="post" action="themes.php?page=b3_settings" id="b3_options_form" enctype="multipart/form-data">
	<?php settings_fields('b3-settings-group'); ?>
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
			<h3>&nbsp;</h3>
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
		<td>
			<h3><?php _e('Backup/Restore Settings', 'b3'); ?></h3>
			<div><label><?php _e('Export Settings', 'b3'); ?></label><a class="button button-secondary" href="themes.php?page=b3_settings&amp;noheader=1&amp;action=b3_save_file"><?php _e('Save as File', 'b3'); ?></a></div>
			<p>&nbsp;</p>
		</td>
		<td><h3>&nbsp;</h3>
			<div><input type="file" name="b3_upload_settings" />
			<input class="button button-primary" type="button" value="<?php _e('Upload and Apply', 'b3'); ?>" onclick="b3_upload();" /></div>

		</td>
	</tr>
	</table>
<?php
	do_settings_sections('b3_settings');
// (so an external plugin can add some output here)
?>
	<table class="form-table">
	<tr>
		<td style="width: 400px;">
		<input name="b3_save_options" type="submit" value="<?php _e('Save Changes', 'b3'); ?>" class="button button-primary" id="b3_save_options"> </td>

		<td><input type="button" class="button button-secondary" onclick="b3_reset();" value="<?php _e('Reset Options', 'b3'); ?>" />
				</td>
	</tr>
	<tr><td></td>
		<td><label></label>
		<small><?php
	$readme = '<a href="' . B3_URI .'/readme.txt">readme.txt</a>';
	printf( __('Any questions? Look %1$s.', 'b3'), $readme); ?></small></td>
	
	</tr>
	</table>
	<input type="hidden" id="b3_action" name="b3_action" value="update" />
</form>

</div>
<?php
}
