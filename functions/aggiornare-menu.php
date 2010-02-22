<?php
// create custom plugin settings menu
add_action('admin_menu', 'aggiornare_settings');

function aggiornare_settings() {

	//create new sub-level menu
	add_submenu_page('themes.php', 'Aggiornare Custom Settings', 'Aggiornare Settings', 'administrator', 'aggiornare_menu.php', 'aggiornare_settings_page', 'aggiornareIcon.png');

	//call register settings function
	add_action( 'admin_init', 'register_settings' );
}

function register_settings() {
	//register our settings
	register_setting( 'aggiornare_settings_page', 'aggiornare_logo' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_logo_width' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_logo_height' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_homepage_image' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_homepage_headline' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_headline_color' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_homepage_intro' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_homepage_linkText' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_homepage_linkPage' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_footer_title' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_footer_text' );
	register_setting( 'aggiornare_settings_page', 'aggiornare_tagline' );
}


function aggiornare_settings_page() {
?>
<style type="text/css">
	.homePageStuff { border: 1px solid #DFDFDF;  -moz-border-radius: 15px; -webkit-border-radius: 15px; padding: 0 0 15px 0; width: 550px; margin: 0 0 15px 0; }
	input, select { width: 300px; }
	input.short { width: 100px; }
	input.checkbox { width: 15px; }
</style>
<div class="wrap">

<h2>Aggiornare Custom Settings</h2>
<p><em>Aggiornare</em> is Italian for <strong>&lsquo;to update&rsquo;</strong>. May you update many times over!</p>
<?php
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>settings saved.</strong></p></div>';
    if ( $_REQUEST['updated'] ) echo '<div id="message" class="updated fade"><p><strong>Settings have been updated.  Thank you!</strong></p></div>';
?>
<form method="post" action="/wp-admin/options.php">
	<?php wp_nonce_field('update-options');
	settings_fields( 'aggiornare_settings_page' );
 ?>
 
 <div class=" homePageStuff">
    <table class="form-table">
   		<tr>
    		<th colspan="2"><h3>Logo Settings</h3></th>
   		</tr>
		<tr valign="top">
			<th scope="row">Logo image URL:</th>
				<td><input type="text" name="aggiornare_logo" value="<?php echo get_option('aggiornare_logo'); ?>" /></td>
		</tr>
		<tr>
			<td colspan="2">Put the complete URL here <em>(i.e. <?php bloginfo('url'); ?>/wp-content/uploads/IMAGEFILE.png)</em>. Image must be no larger 278 pixels wide by 160 pixels tall.</td>
		</tr>
		<tr>
			<td><p>Width (whole number only):<br /><input type="text" name="aggiornare_logo_width" value="<?php echo get_option('aggiornare_logo_width'); ?>" class="short" /></p></td>
			<td><p>Height (whole number only):<br /><input type="text" name="aggiornare_logo_height" value="<?php echo get_option('aggiornare_logo_height'); ?>" class="short" /></p></td>
		</tr>
		<tr valign="top">
			<th scope="row" colspan="2"><input class="checkbox" type="checkbox" name="aggiornare_tagline"<?php if(get_option('aggiornare_tagline')=='on') { echo ' checked="checked"'; } ?> /> Display tagline?</th>
		</tr>
	</table>
</div>

 <div class=" homePageStuff">
    <table class="form-table">
   		<tr>
    		<th colspan="2"><h3>Homepage Settings</h3></th>
   		</tr>
		<tr valign="top">
			<th scope="row">Banner image URL:</th>
				<td><input type="text" name="aggiornare_homepage_image" value="<?php echo get_option('aggiornare_homepage_image'); ?>" /></td>
		</tr>
		<tr>
			<td colspan="2">Put the complete URL here <em>(i.e. <?php bloginfo('url'); ?>/wp-content/uploads/IMAGEFILE.jpg)</em>. Image should be 600 pixels wide by 227 pixels tall but if it's larger, the image will be centered in the "frame" and trust me, it'll look nice :)</td>
		</tr>
		<tr valign="top">
			<th scope="row">Banner headline:</th>
				<td><input type="text" name="aggiornare_homepage_headline" value="<?php echo get_option('aggiornare_homepage_headline'); ?>" /></td>
		</tr>
		<tr valign="top">
			<th scope="row">Banner headline color:</th>
				<td>#<input class="short" type="text" name="aggiornare_headline_color" value="<?php echo get_option('aggiornare_headline_color'); ?>" /> Hexidecimal value please (<a href="http://html-color-codes.com/">help?</a>)</td>
		</tr>
		<tr valign="top">
			<th scope="row">Introduction:</th>
				<td><textarea name="aggiornare_homepage_intro" style="width: 300px; height: 200px;"><?php echo get_option('aggiornare_homepage_intro'); ?></textarea></td>
		</tr>
		<tr valign="top">
			<th scope="row">Link text:</th>
				<td><input type="text" name="aggiornare_homepage_linkText" value="<?php echo get_option('aggiornare_homepage_linkText'); ?>" /></td>
		</tr>
		<tr valign="top">
			<th scope="row">Link to page:</th>
				<td><select name="aggiornare_homepage_linkPage">
					<option value="">Please Select</option>
<?php

	$pages = get_pages(); 
  	foreach ($pages as $pagg) {
  	$option = '<option value="'.get_page_link($pagg->ID).'"';
  	if(get_option('aggiornare_homepage_linkPage') == get_page_link($pagg->ID)) {
  		$option .= ' selected="selected"';
  	}
  	$option .= '>';
	$option .= $pagg->post_title;
	$option .= '</option>';
	echo $option;
  }


?>
</select>
</td>
</tr>


</table>
</div>
 <div class=" homePageStuff">
    <table class="form-table">
   		<tr>
    		<th colspan="2"><h3>Footer Settings</h3></th>
   		</tr>
		<tr valign="top">
			<th scope="row">Footer header:</th>
				<td><input type="text" name="aggiornare_footer_title" value="<?php echo get_option('aggiornare_footer_title'); ?>" /></td>
		</tr>
		<tr valign="top">
			<th scope="row">Footer text:</th>
				<td><textarea name="aggiornare_footer_text" style="width: 300px; height: 200px;"><?php echo get_option('aggiornare_footer_text'); ?></textarea></td>
		</tr>
	</table>
</div>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="aggiornare_homepage_image, aggiornare_homepage_headline, aggiornare_homepage_intro, aggiornare_homepage_linkText, aggiornare_homepage_linkPage, aggiornare_logo, aggiornare_logo_width, aggiornare_logo_height, aggiornare_footer_title, aggiornare_footer_text, aggiornare_tagline, aggiornare_headline_color" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?php } ?>