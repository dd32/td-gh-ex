<?php
$themename = "Artsavius Blog";
$shortname = "artsavius";
$options = array (
	
array( "name" => "Header information",
        "type" => "title"),
		
			array(  "type" => "open"),
		
	array(  "name" => "Blog title",
			"desc" => "Leave blank if you want to use blog settings (by default)",
			"id" => $shortname."_header_title",
			"std" => "",
			"type" => "text"),
		
	array(  "name" => "Blog description",
			"desc" => "Leave blank if you want to use blog settings (by default)",
			"id" => $shortname."_header_description",
			"std" => "",
			"type" => "text"),
		
	array(  "name" => "Show random avatar?",
			"desc" => "Ckeck this if you want to show a random avatar on the left of your header",
			"id" => $shortname."_header_showavatar",
			"type" => "select",
			"std" => "Yes",
			"options" => array("Yes", "No")),
			
			array(  "type" => "close"),
			
array( "name" => "Top links",
        "type" => "title"),
			
			array(  "type" => "open"),
			
	array(  "name" => "Include pages in the top menu",
			"desc" => "Here you can specify the pages to include in the top menu. Seperate page ids by commas. By default all pages are included. <br> Note: By including here any pages, you exlude all the others.",
			"id" => $shortname."_toplinks_include",
			"std" => "",
			"type" => "text"),
	array(  "name" => "Exclude pages in the top menu",
			"desc" => "You can exlude a page from the top menu by typing here its id. Separate different ids by commas. <br>Note: All the other pages will be included. <br>If you have filled in the field above this will not work.",
			"id" => $shortname."_toplinks_exclude",
			"std" => "",
			"type" => "text"),
			
	array(  "name" => "Include Home link?",
			"desc" => "Ckeck this if you want to include a Home link in your top menu",
			"id" => $shortname."_toplinks_home",
			"type" => "select",
			"std" => "Yes",
			"options" => array("Yes", "No")),
			
	array(  "name" => "Home link title",
			"desc" => "By default it is Home",
			"id" => $shortname."_toplinks_hometitle",
			"std" => "",
			"type" => "text"),
			
			array(  "type" => "close"),
		
		
array( "name" => "Footer information",
        "type" => "title"),

			array(  "type" => "open"),

	array(  "name" => "Copyright text",
			"desc" => "By default it prints your Blog Title from this page or from your blog settings if empty",
			"id" => $shortname."_footer_copytext",
			"std" => "",
			"type" => "text"),
			
	array(  "name" => "Copyright URL",
			"desc" => "If you have filled in the field above you can link this text to any URL that you prefer",
			"id" => $shortname."_footer_copyurl",
			"std" => "",
			"type" => "text"),
			
	array(  "name" => "Show Powered by text?",
			"desc" => "You may decide it yourself.",
			"id" => $shortname."_footer_showpowered",
			"type" => "select",
			"std" => "Yes, I am clever and I respect Wordpress and Art Saveliev because they have worked hard to make me happier",
			"options" => array("Yes, I am clever and I respect Wordpress and Art Saveliev because they have worked hard to make me happier", "No, I am stupid and I am ashamed to use Wordpress and Artsavius cause I would like to do everything myself but I cannot")),
		
		
	array(  "name" => "Entries RSS link",
			"desc" => "Leave blank if you want to use blog settings (by default)",
			"id" => $shortname."_footer_rssentries",
			"std" => "",
			"type" => "text"),
		
	array(  "name" => "Comments RSS link",
			"desc" => "Leave blank if you want to use blog settings (by default)",
			"id" => $shortname."_footer_rsscomments",
			"std" => "",
			"type" => "text"),
			
			array(  "type" => "close"),
		
array( "name" => "Sidebar option",
        "type" => "title"),
		
			array(  "type" => "open"),
		
	array(  "name" => "Sidebar number and position",
			"desc" => "Leave blank if you want to use blog settings (by default)",
			"id" => $shortname."_sidebar_position",
			"type" => "select",
			"std" => "both sidebars on the right",
			"options" => array("both sidebars on the right", "both sidebars on the left","content between two sidebars","one sidebar on the right","one sidebar on the left")),

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

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<div style="margin-bottom:10px;"><a href="http://artsav.com" target="_blank">Artsav Creative Agency</a> / <a href="http://artsaveliev.ru" target="_blank">Art Saveliev in Russian</a> / <a href="http://artsaveliev.com" target="_blank">Art Saveliev in French</a> (links open in a new window)</div>

<form method="post">

<?php foreach ($options as $value) {

switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

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

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

if ( function_exists('register_sidebars') ) {
	
	 if (get_option('artsavius_sidebar_position') == 'one sidebar on the right') {
	    register_sidebar(array(
	    'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div id="before_title"><h1>',
		'after_title' => '</h1></div>',
	 )); }
	 
	 elseif (get_option('artsavius_sidebar_position') == 'one sidebar on the left') {
	    register_sidebar(array(
	    'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div id="before_title"><h1>',
		'after_title' => '</h1></div>',
	 )); }
	 
	 else  {
	    register_sidebars(2,array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div id="before_title"><h1>',
		'after_title' => '</h1></div>',
	)); }
}

load_theme_textdomain('artsavius');

?>