<?php 
/*
Theme Name: adStyle
Author:  Gordon French
*/
$themename = "adstyle";
$shortname = "adstyle";

$adStyleOptions = array(
	'ads' => 'car'
);
add_option('myOptions', $myOptions);


if ( function_exists('register_sidebar') ) register_sidebar(); 




//Determine the location
$path =  get_bloginfo( 'stylesheet_directory' );


//Add the menu to the Settings sidenav in wp-admin
function adStyle_admin_menu() {
	//add_menu_page(page_title, menu_title, access_level/capability, file, [function], [icon_url]);
	
	add_menu_page('adStyle', 'adStyle', 8, __FILE__, 'adStyle_panel_setting', get_bloginfo( 'stylesheet_directory' ).'/images/dollar-sign.png');
	//add_submenu_page(__FILE__, 'Page title', 'Gordon\'s subLink1', 8, __FILE__, 'my_magic_function');
	//add_submenu_page(__FILE__, 'Page title', 'Gordon\'s subLink2', 8, __FILE__, 'my_magic_function');
	
}
add_action('admin_menu', 'adStyle_admin_menu');




//codefor settings in admin panel
function adStyle_panel_setting() {

  $options = get_option("adStyleOptions");
  if (!is_array( $options )){
         $options = array( 'ads' => 'sample ads go here'); 
  }
  
  if ($_POST['adStyle-Submit']) {
    $options['ads'] = $_POST['adStyle-ads'];
    update_option("adStyleOptions", $options);
  }

?>
	<h1 style="padding-left:0px">adStyle</h1><p style="padding-left:55px; margin-top:-15px"> by <a href="http://gordonfrench.com">Gordon French</a> </p>
  
  

  <h3>Recommended Colors</h3>
  <div style="margin-left:25px; margin-bottom:20px; margin-top:-15px;">
      <table width="200" border="0">
      <tr>
        <td width="35px"><div style="width:25px; height:25px; background-color:#FDF4E2"></div></td>
        <td width="50px">#FDF4E2</td>
        <td width="50px">Border</td>
      </tr>
      <tr>
        <td ><div style="width:25px; height:25px; background-color:#DA944A"></div></td> 
        <td>#DA944A</td>
		<td>Title</td>
      </tr>
      <tr>
        <td ><div style="width:25px; height:25px; background-color:#FDF4E2"></div></td>
        <td>#FDF4E2</td>
        <td>Background</td>
      </tr>
      <tr>
        <td><div style="width:25px; height:25px; background-color:#54340D"></div></td>
        <td>#54340D</td>
        <td>Text</td>
      </tr>
      <tr>
        <td><div style="width:25px; height:25px; background-color:#AEC2E1"></div></td>
        <td>#AEC2E1</td>
        <td>URL </td>
      </tr>
      </table>
  </div>
  
     <h3>Adsense Code</h3>
  <p style="margin-top:-15px;">Please input complete adsense code</p>
  <div style="margin-left:25px; margin-bottom:20px; margin-top:-5px;">
        <form name="adstyle" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
        <textarea name="adStyle-ads" id="adStyle-ads" cols="40" rows="15"><?php echo  stripslashes($options['ads']); ?></textarea><br />
        <input type="hidden" id="adStyle-Submit" name="adStyle-Submit" value="1" />
        <input name="save" value="Save" type="submit" />
        </form>
  </div>
  
<?php
}