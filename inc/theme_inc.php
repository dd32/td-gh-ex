<?php

function olo_options() {
add_theme_page("olo Options", "olo Options", 'administrator', basename(__FILE__), 'olo_form');
add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

	//register our settings
	register_setting( 'olo-settings', 'description');
	register_setting( 'olo-settings', 'keywords');
	register_setting( 'olo-settings', 'adx');
	register_setting( 'olo-settings', 'adxx');
	register_setting( 'olo-settings', 'adxxx');
	register_setting( 'olo-settings', 'icp');
	register_setting( 'olo-settings', 'stat');
	register_setting( 'olo-settings', 'bottom_home_link');
	register_setting( 'olo-settings', 'bottom_all_link');
	register_setting( 'olo-settings', 'gravatar');	
}

function olo_form(){
global $themename;
if ( $_REQUEST['settings-updated'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.'' .__('Options take effect.', 'olo').'</strong></p></div>';
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
					<th scope="row"><?php _e('SEO Option', 'olo'); ?>:
					<br/>
					<small style="font-weight:normal;"><?php _e('meta tags', 'olo'); ?></small></th>
					<td>
						<div align="left">
						<?php _e('keywords[comma-separated, no more than 100 characters]', 'olo'); ?><br />
						<input type="text" style="width:50em;" name="keywords" value="<?php echo get_option('keywords'); ?>" />
						<br /><br />
						<?php _e('description, no more than 150 characters.', 'olo'); ?><br />
						<input type="text" style="width:50em;" name="description" value="<?php echo get_option('description'); ?>" />
						</div></td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Gravatar Cache Option', 'olo'); ?>: </th>
					<td>
						<input name="gravatar" type="checkbox" id="7" value="1" <?php if (get_option('gravatar')!='') echo 'checked="checked"'; ?>/><?php _e('Enable Gravatar cache. If host not supported,cancel it.', 'olo'); ?> <span style="color:red;"><?php _e('Before Enable Gravatar cache, Create a folder named avatar, and upload default.jpg', 'olo'); ?></span></td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('336 x 280 AD', 'olo'); ?>: 
					<br/>
					<small style="font-weight:normal;"><?php _e('Single Right AD', 'olo'); ?>: </small></th>
					<td>
						<textarea style="width:50em; height:8em;" name="adx"><?php echo get_option('adx'); ?></textarea></td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('468 x 60 AD', 'olo'); ?>: 
					<br/>
					<small style="font-weight:normal;"><?php _e('Single bottom AD', 'olo'); ?>: </small></th>
					<td>
						<textarea style="width:50em; height:8em;" name="adxx"><?php echo get_option('adxx'); ?></textarea></td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('468 x 60 AD', 'olo'); ?>: 
					<br/>
					<small style="font-weight:normal;"><?php _e('Archive Top AD', 'olo'); ?>: </small></th>
					<td>
						<textarea style="width:50em; height:8em;" name="adxxx"><?php echo get_option('adxxx'); ?></textarea></td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Home Links on bottom', 'olo'); ?>: </th>
					<td>
						<textarea style="width:50em; height:8em;" name="bottom_home_link"><?php echo get_option('bottom_home_link'); ?></textarea></td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('All Links on bottom', 'olo'); ?>: </th>
					<td>
						<textarea style="width:50em; height:8em;" name="bottom_all_link"><?php echo get_option('bottom_all_link'); ?></textarea></td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('ICP No.', 'olo'); ?>: </th>
					<td>
						<input type="text" style="width:30em;" name="icp" value="<?php echo get_option('icp'); ?>" /></td>
				</tr>
			</tbody>
		</table>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Stat Code', 'olo'); ?>: </th>
					<td>
						<textarea style="width:50em; height:8em;" name="stat"><?php echo get_option('stat'); ?></textarea></td>
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