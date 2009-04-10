<?php

$themename = "3COL-RDMBAN RR";
$shortname = "theme";
$options = array (
	array(	"name" => "Number of random banner pictures",
		"id" => $shortname."banners",
		"type" => "text",
		"before" => "",
		"after" => "<em>Note: This number must match the number of total banners or else you will see blank areas in the banner.</em>",
		"std" => "8"),
	array(  "type" => "close")
);

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

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); 
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=controlpanel.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "3COL-RDMBAN RR Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
	<h2><?php echo $themename; ?> Theme Options</h2>
	<form method="post">
	<table class="form-table">
	<?php foreach ($options as $value) { 
		if ($value['type'] == "text") { ?>
			<tr valign="top"> 
    				<th scope="row"><?php echo $value['name']; ?></th>
    				<td>
					<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="5" /> <span class="setting-description"><?php echo $value['after']; ?></span>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>
<p class="submit">
	<input class="button-primary" name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
	<input name="reset" type="submit" value="Reset" />
	<input type="hidden" name="action" value="reset" />
</p>
</form>
<?php } add_action('admin_menu', 'mytheme_add_admin'); ?>