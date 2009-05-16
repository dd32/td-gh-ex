<?php
//Original Framework http://theundersigned.net/2006/06/wordpress-how-to-theme-options/ 
//Updated and added additional options by Jeremy Clark
//http://clarktech.no-ip.com/

//arrays
$themename = "10PAD2RISINGSUN";
$shortname = "themetwo";
$options = array (
	array(
		"name" => "Toggle Banner Image",
		"id" => $shortname."_bannerimage_toggle",
		"type" => "radio",
		"std" => "Use Default",
		"options" => array("Use Default", "Use Custom", "Use None")
	)
);

//functions
function mytheme_add_admin() {
	global $themename, $shortname, $options;
		if ( $_GET['page'] == basename(__FILE__) ) {
			if ( 'save' == $_REQUEST['action'] ) {
				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
				header("Location: themes.php?page=controlpanel.php&saved=true");
				die;
		}
		else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] ); 
				update_option( $value['id'], $value['std'] );}
			header("Location: themes.php?page=controlpanel.php&reset=true");
			die;
        }
    }
	add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
	global $themename, $shortname, $options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<!--tables-->
<style type="text/css">
/*.wrap div.button-submit {
	float: left;
	}*/
.wrap div.button-submit input {
	background: #ff7700;
	border: 1px solid #ff7700;
	color: #ffffff;
	font-weight: bold;
	margin-bottom: 1em;
	padding: 3px;
	text-align: center;
	width: 150px;
	}
.previewframe {
	clear: both;
	}
.optiontable {
	background: #efefef;
	border: 1px solid #dfdfdf;
	float: left;
	font-family: Arial, Helvetica, sans-serif;
	margin-right: 1em;
	padding: 1em 1em 0 1em;
	width: 350px;
	}
.optiontable td {
	padding-bottom: 1em;
	}
h2.optiontitle {
	background: #000000;
	color: #ffffff;
	display: block;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .9em;
	font-style: normal;
	font-weight: bold;
	line-height: normal;
	margin-bottom: 1em;
	padding: 1em;
	text-transform: uppercase;
	}
.wrap h2.main {
	font-style: normal;
	}
.wrap small {
	text-transform: uppercase;
	}
.wrap input[type="checkbox"], .wrap input[type="radio"] {
	vertical-align: middle;
	}
</style>
<div class="wrap">
	<h2 class="main"><?php echo $themename; ?> Options</h2>
	<form method="post">
		<table class="optiontable">
			<?php foreach ($options as $value) { if ($value['name'] == "Toggle Banner Image") { ?>
			<tr> 
				<td>
					<h2 class="optiontitle"><?php echo $value['name']; ?></h2>
					<p><small>If you want to use a custom banner just add an image or a set of images to the images/banner directory of the theme directory. Click <a href="<?php bloginfo('url'); ?>/wp-content/themes/10pad2_rising_sun/images/banners" target="_blank">here</a> to view it. The banner dimensions are 530x230.</small></p>
					<?php foreach ($value['options'] as $option) { ?>
					<small><?php echo $option; ?></small> <input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo 'checked'; } ?>/>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>
		</table>
		<div class="button-submit">
			<input name="save" type="submit" value="Save Changes" />    
			<input type="hidden" name="action" value="save" />
		</div>
	</form>
	<form method="post">
		<div class="button-submit">
			<input name="reset" type="submit" value="Reset Changes" />
			<input type="hidden" name="action" value="reset" />
		</div>
	</form>
	<div class="previewframe">
		<h2 class="main">Preview (updated when options are saved)</h2>
		<iframe src="../?preview=true" width="100%" height="400" ></iframe>
	</div>
</div>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>