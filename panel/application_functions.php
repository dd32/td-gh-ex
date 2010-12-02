<?php
//initialize

add_action('admin_init', 'application_init');
add_action('admin_menu', 'application_add_admin');
?>
<?php
//core functions

function application_add_admin() {

global $themename, $shortname, $options;

if ( isset($_GET['page'])== basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option($value['id'], $_REQUEST[ $value['id'] ] )  ; }
 
foreach ($options as $value) {
	if(  $_REQUEST[ $value['id'] ]  ) { update_option( $value['id'], $_REQUEST[ $value['id'] ] ) ; } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=application_functions.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=application_functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'application_admin');
}

function application_init() {

wp_enqueue_style("tzen", get_template_directory_uri()."/panel/css/admin.css", false, "1.0", "all");
wp_enqueue_script("tzen", get_template_directory_uri()."/panel/js/admin.js", false, "1.0");

}
function application_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( isset( $_REQUEST['saved'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset($_REQUEST['reset'] )) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="option_wrapper">
<div class="logo_tz"><a href="http://www.themeszen.com">logo</a></div>
<div id="go_pro"><h2>Go for Pro Version!</h2>This is a free version of application. Get your own copy of professional version for more features, tutorials, support forum and much more! <a href="http://www.themeszen.com">Click Here to Learn More Now</a></div>
<div class="tz_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<h2><?php echo $themename; ?> Options Panel</h2>


<?php break;
 
case 'text':
?>

<div class="tz_base tz_input">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;

case 'savebutton':
?>
		<div class="tz_base submit">
			<input type="hidden" name="action" value="save" />
			<input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
		</div>


<?php
break; 
 
case 'textarea':
?>

<div class="tz_base tz_input">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="tz_base tz_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>

<?php break;
case "multicheckbox":
?>

<div class="tz_base">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div class="box-option">
		<?php foreach ($value['options'] as $keys =>$values) { 
		$checked = ""; 
			if (get_option( $value['id'])) { 
				if (@in_array($keys, get_option($value['id'] ))) $checked = "checked=\"checked\"";
			} 
		else {
		} 
		?>	
	
		<label class="button">
		<input type="checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $keys; ?>" value="<?php echo $keys; ?>" <?php echo $checked; ?> />
		<?php echo $values; ?>
		</label>
		<?php } ?>		
	</div>

<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div>


<?php
break;
 
case "checkbox":
?>

<div class="tz_base tz_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
 
<?php break;
case "radio":
?>

<div class="tz_base">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div class="box-option">
			<?php
						foreach ($value['options'] as $key=>$option) { 
							if(get_option($value['id'])){
								if ($key == get_option($value['id']) ) {
									$checked = " checked=\"checked\"";
								} else {
									$checked = "";
								}
							} else {
								if($key == $value['std']) {
									$checked = " checked=\"checked\"";
								} else {
									$checked = "";
								}
							} ?>
							  
          <label class="button"><input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>"<?php echo $checked; ?> /><?php echo '&nbsp;'.$option; ?></label>
							<?php } ?>
	</div>

<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

</div>
 
<?php break; 
case "section":

$i++;

?>

<div class="tz_section">
<div class="tz_title"><h3><img src="<?php get_template_directory_uri(); ?>/functions/images/trans.gif" class="inactive" alt="" /><?php echo $value['name']; ?></h3><div class="clearfix"></div></div>
<div class="tz_options">

 
<?php break;
 
}
}
?>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save all changes" />
</span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div> 
 

<?php
}
?>