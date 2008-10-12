<?php
$themeName = "adept";
$options = array (
	
	array(	"name"	=> "Contact Info",
					"type"	=> "subhead"),
	    
	array(	"name" 	=> "Your contact info",
					"id" 		=> $themeName."_contactInfo",
					"desc" 	=> "Phone or email.",
					"def" 	=> "phone# | email@site.com",
					"type" 	=> "text"),
					
	array(	"name" 	=> "Theme Custom Color Options",
					"type" 	=> "subhead"),
	        
	array(	"name" 	=> "Custom colors",
					"desc" 	=> "Your theme can use the colors you choose below. Use Hex values without leading '#' symbol. Try out <a href='http://www.colorjack.com/sphere/' target='_blank'>Color Jack</a>, to create a color scheme (be careful when you copy and paste NOT to insert a space character before the six digit hex value.)",
					"id" 		=> $themeName."_customOptions",
					"def" 	=> "off",
					"type" 	=> "select",
					"options" => array("off","on")),
					
	// bkg and light text in footer, search text input color	          
	array(	"name" 	=> "Background color",
					"id" 		=> $themeName."_bkgColor",
					"desc" 	=> "Your background, text in footer and search text input colors.",
					"def" 	=> "a7a7a7",
					"type" 	=> "text"),
					
	// mouse over & rule below header
	array(	"name" 	=> "Mouse over",
					"id" 		=> $themeName."_hoverColor",
					"desc" 	=> "Your mouse over color for links, buttons & rule below header colors.",
					"def" 	=> "e81e25",
					"type" 	=> "text"),
					
	// sidebar one top, rule above footer
	array(	"name" 	=> "Sidebar #1 (top)",
					"id" 		=> $themeName."_sidebarOneTop",
					"desc" 	=> "Your colors for sidebar #1 (top) and headings.",
					"def" 	=> "0082be",
					"type" 	=> "text"),
					
	// sidebar one lower
	array(	"name" 	=> "Sidebar #1 (lower)",
					"id" 		=> $themeName."_sidebarOneLower",
					"desc" 	=> "Your colors for sidebar #1 (lower) and rule above footer.",
					"def" 	=> "39af4c",
					"type" 	=> "text"),

	// sidebar two, search button
	array(	"name" 	=> "Sidebar #2",
					"id" 		=> $themeName."_sidebarTwo",
					"desc" 	=> "Your colors for sidebar two, search button.",
					"def" 	=> "f39a2b",
					"type" 	=> "text"),

	array(	"name" => "Footer",
					"type" => "subhead"),
					
	// custom field for footer scripts
	array(	"name" => "Tracking code",
					"id" => $themeName."_trackingCode",
					"desc" => "If you use Google Analytics or need any other tracking script in your footer just copy and paste it here.<br /> The script will be inserted before the closing <code>&#60;/body&#62;</code> tag.",
					"def" => get_option('Adept_trackingCode'),
					"type" => "textarea",
					"options" => array("rows" => "5",
									   "cols" => "40") ),
);

function customize_add_admin() {
global $themeName, $options;
if ( $_GET['page'] == "customize.php"  ) { // basename(__FILE__)
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
		foreach ($options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
			} else { delete_option( $value['id'] ); } }
		header("Location: themes.php?page=customize.php&saved=true");
		die;
	} else if( 'reset' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
			delete_option( $value['id'] ); }
		header("Location: themes.php?page=customize.php&reset=true");
		die;
	}
}
	add_theme_page("Adept Options", "Adept Options", 'edit_themes', basename(__FILE__), 'customize_admin');
}

function customize_admin() {
	global $themeName, $options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="notice"><h4>Adept custom settings saved.</strong></h4>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="notice"><h4>Adept custom settings reset.</h4></div>';
?>


<div id="customThemeOptions" class="wrap">
<h2 class="updatehook" style=" padding-top: 20px; font-size: 2.8em;">Adept Options</h2>
<div class="updated" style="margin: 15px 10px 15px 25px;"><p style="line-height: 1.6em; font-size: 1.2em; width: 75%;">On this page you create custom colors, add your contact info, and analytics tracking code. 
</div>

<form method="post">
<table class="form-table">
<?php 
foreach ($options as $value) { 
	switch ( $value['type'] ) {
		case 'subhead':
?>
	</table>
	<h3><?php echo $value['name']; ?></h3>
	
	<table class="form-table">
<?php
		break;
		case 'text':
option_wrapper_header($value);
?>
	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['def']; } ?>" />
<?php
option_wrapper_footer($value);
		break;

		case 'select':
option_wrapper_header($value);
?>
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
				<option <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['def']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
				<?php } ?>
	</select>
<?php
option_wrapper_footer($value);
		break;

			case 'textarea':
$ta_options = $value['options'];
option_wrapper_header($value);
?>
	<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
if( get_settings($value['id']) != "") {
		echo stripslashes(get_settings($value['id']));
	}else{
		echo stripslashes($value['def']);
}?></textarea>
<?php
option_wrapper_footer($value);
		break;

		case "radio":
option_wrapper_header($value);

		foreach ($value['options'] as $key=>$option) 
		{ 
			$radio_setting = get_settings($value['id']);
			if($radio_setting != '')
			{
		  	if ($key == get_settings($value['id']) ) 
				{
				$checked = "checked=\"checked\"";
				} 
				else 
				{
					$checked = "";
				}
			}
			else
			{
				if($key == $value['def']) 
				{
					$checked = "checked=\"checked\"";
				} 
				else 
				{
					$checked = "";
				}
			}
?>
	<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
<?php 
		}
 
		option_wrapper_footer($value);
		break;

		case "checkbox":
		option_wrapper_header($value);
		if(get_settings($value['id']))
		{
			$checked = "checked=\"checked\"";
		}
		else
		{
			$checked = "";
		}
?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
<?php
		option_wrapper_footer($value);
		break;

		default:
		break;
	}
}
?>

</table>

<p class="submit">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
	<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
<br />
<p>See <a href="http://overhaulindustries.com">http://overhaulindustries.com</a> for more themes</p>
<br />
<?php
}
function option_wrapper_header($values){
?>
	<tr valign="top"> 
		<th scope="row"><?php echo $values['name']; ?>:</th>
	<td>
<?php
}
function option_wrapper_footer($values){
	?>
		<br /><br />
		<?php echo $values['desc']; ?>
		</td>
	</tr>
<?php 
}
add_action('admin_menu', 'customize_add_admin'); 
?>