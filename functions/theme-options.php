<?php
$themename = "Aplau";
$shortname = "aplau";
$version = "1.2.1";

// Create theme options
global $options;
$options = array (


//ADVERTISEMENTS --- POST ADS 
array( "name" => "Advertisements",
	"type" => "section"),

array( "name" => __('Insert Ads code to show on your website/blog','aplau'),
	"type" => "section-desc"),
	
array( "type" => "open"),

array( "name" => "Header Ad",
					"desc" => "Enter your Advertisement code here. This ad will be displayed at header area. Recommended size 468x60",
					"id" => $shortname."_header_ad",
					"std" => "",
					"type" => "textarea"),

array( "type" => "close"),


//Analytics Code
array( "name" => "Website Tracking / Analytics",
	"type" => "section"),

array( "name" => __('Insert Website tracking / analytics code','aplau'),
	"type" => "section-desc"),
	
array( "type" => "open"),

array( "name" => __('Analytics/Tracking Code','aplau'),
	"desc" => __('Insert your Google Analytics or any other website tracking code here.','aplau'),
	"id" => $shortname."_analytics_code",
	"type" => "textarea",
	"std" => ""),	

array( "type" => "close"),

);
	
function aplau_add_admin() {

    global $themename, $shortname, $options;

	if ( isset ( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {

		if ( isset ($_REQUEST['action']) && ( 'save' == $_REQUEST['action'] ) ){

			foreach ( $options as $value ) {
				if ( array_key_exists('id', $value) ) {
					if ( isset( $_REQUEST[ $value['id'] ] ) ) { 
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
					} 
					else {
						delete_option( $value['id'] );
					}
				}
			}
			$_REQUEST['saved'] = 1;
		} 
		else if ( isset ($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ) ) {
			foreach ($options as $value) {
				if ( array_key_exists('id', $value) ) {
					delete_option( $value['id'] );
				}
			}
			$_REQUEST['reset'] = 1;
		}
	}

add_theme_page($themename, $themename, 'administrator', basename(__FILE__), 'aplau_admin');
add_theme_page(basename(__FILE__), $themename . ' Theme Options', 'Theme Options', 'administrator',  basename(__FILE__),'aplau_admin'); // Default
add_object_page($themename, $themename, 'administrator', basename(__FILE__), 'aplau_admin', content_url ('themes/aplau/images/a.ico', __FILE__),3);
add_object_page(basename(__FILE__), $themename . ' Theme Options', 'Theme Options', 'administrator',  basename(__FILE__),'aplau_admin');
}

function aplau_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("aplauCss", $file_dir."/functions/ap.css", false, "1.0", "all");
wp_enqueue_script("aplauScript", $file_dir."/functions/ap.js", false, "1.0");
}

function aplau_admin() {
    global $themename, $shortname, $version, $options;
	$i=0;
	if ( isset ($_REQUEST['saved']) && ($_REQUEST['saved'] ) )echo '<div id="message" class="updated"><p>'.$themename.' settings saved.</p></div>';
	if ( isset ($_REQUEST['reset']) && ($_REQUEST['reset'] ) ) echo '<div id="message" class="updated"><p>'.$themename.' settings reset.</p></div>';  
?>

<div class="wrap">
<div class="options_wrap">
<h2 class="settings-title"><?php echo $themename; ?> Settings</h2>
<p class="top-notice"> Use these options to customize <?php echo $themename; ?> theme.</p>
<div class="mainbox">
	<h2>
	You are using <strong><a href="http://aplau.com/aplaupro/" target="_blank"><?php echo $themename; ?> </a><?php echo $version; ?></strong>
	</h2>
	<div align=center><ul>
	<li><?php printf(__('<a href="%s">Change Logo </a>', 'aplau'), admin_url('themes.php?page=custom-header')); ?></li>
	<li><a href="http://aplau.com/forums/" target="_blank">Theme Support</a></li>
	<li><a href="http://aplau.com/donate/" target="_blank">Donate</a></li>
	<li></li>
	<li><a href="http://aplau.com/aplaupro/" target="_blank">Upgrade to Pro</a></li>
	<li><a href="http://aplau.com/aplaupro/" target="_blank"># Why Upgrade?</a></li>
	</ul>
	<br><br><br>
	</div>
<form method="post">
<?php foreach ($options as $value) { 
switch ( $value['type'] ) {
case "section":
?>
	<div class="section_wrap">
	<h3 class="section_title"><?php echo $value['name']; ?> 

<?php break; 
case "section-desc":
?>
	<span><?php echo $value['name']; ?></span></h3>
	<div class="section_body">

<?php
break;
case "radio":
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		  <?php foreach ($value['options'] as $key=>$option) { 
			$radio_setting = get_option($value['id']);
			if($radio_setting != ''){
				if ($key == get_option($value['id']) ) {
					$checked = "checked=\"checked\"";
					} else {
						$checked = "";
					}
			}else{
				if($key == $value['std']){
					$checked = "checked=\"checked\"";
				}else{
					$checked = "";
				}
			}?>
			<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
			<?php } ?>
	</div>
	
<?php 
break;
case 'text':
?>

	<div class="options_input options_text">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"/>
	</div>
<?php
break;
case 'textarea':
?>
	<div class="options_input options_textarea">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	</div>

<?php 
break;
case 'select':
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>
	</div>

<?php
break;
case "close":
$i++;
?>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save Changes" /></span>
</div><!--#section_body-->
</div><!--#section_wrap-->

<?php break;
}
}
?>

<input type="hidden" name="action" value="save" />
<span class="submit">
<input name="save" type="submit" value="Save All Changes" />
</span>
</form>


<form method="post">
<span class="submit">
<input name="reset" type="submit" value="Delete / Reset / Clear All Settings" />
<input type="hidden" name="action" value="reset" />
</span>
</form>
<br/>
</div><!--#options-wrap-->
	</div>
<?php
}
add_action('admin_init', 'aplau_add_init');
add_action('admin_menu' , 'aplau_add_admin'); 
?>
