<?php

function olo_options() {
add_theme_page( __( 'olo Options', 'olo' ), __( 'olo Options', 'olo' ), 'edit_theme_options', 'theme_options', 'olo_form' );
add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

	//register our settings
	register_setting( 'olo-settings', 'icp');
	register_setting( 'olo-settings', 'gravatar');		
	register_setting( 'olo-settings', 'olo_icp');	
}

function olo_form(){
global $themename;
if ( !empty($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.'' .__('Options take effect.', 'olo').'</strong></p></div>';
 ?>
<style>
fieldset {border: 1px solid #DDDDDD;border-radius: 5px 5px 5px 5px;margin: 5px 0 10px;padding: 0 15px;}
fieldset legend {font-size: 14px;padding: 0 5px;}
</style>

 <div class="icon32" id="icon-themes"><br></div>
<h2><?php _e('olo Options', 'olo'); ?></h2>
<form method="post" action="options.php">
<?php settings_fields('olo-settings'); ?>
<fieldset>
<legend><?php _e('olo Options', 'olo'); ?></legend>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Gravatar Cache Option', 'olo'); ?>: </th>
					<td>
						<input name="gravatar" type="checkbox" id="7" value="1" <?php checked(get_option('gravatar'), 1 ); ?>/><?php _e('Enable Gravatar cache. If host not supported,cancel it.', 'olo'); ?> <span style="color:red;"><?php _e('Before Enable Gravatar cache, Create a folder named avatar, and upload default.jpg', 'olo'); ?></span></td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('ICP No.', 'olo'); ?>: </th>
					<td>
						<input name="olo_icp" type="checkbox" id="7" value="1" <?php checked(get_option('olo_icp'), 1 ); ?>/><?php _e('Enable ICP ', 'olo'); ?><br/><br/>
						<input type="text" style="width:30em;" name="icp" value="<?php echo esc_attr(get_option('icp')); ?>" /></td>
				</tr>
			</tbody>
		</table>
		
<p class="submit"><input type="submit" value="<?php _e('Save Changes', 'olo') ?>" name="save" id="button-primary" /></p>
</form>
</fieldset>
<?php
}
add_action('admin_menu', 'olo_options');

if (get_option('gravatar')!='') {
function my_avatar($avatar) {
	$tmp = strpos($avatar, 'http');
	$g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
	$tmp = strpos($g, 'avatar/') + 7;
	$f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
	$w = home_url();
	$e = ABSPATH .'avatar/'. $f .'.jpg';
	$t = 1209600;
	if ( !is_file($e) || (time() - filemtime($e)) > $t ) {
	copy(htmlspecialchars_decode($g), $e);
	} else $avatar = strtr($avatar, array($g => $w.'/avatar/'.$f.'.jpg'));
	if ( filesize($e) < 500 ) copy($w.'/avatar/default.jpg', $e);
	return $avatar;
}
add_filter('get_avatar', 'my_avatar');
}
?>