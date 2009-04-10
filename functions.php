<?php
if ( !function_exists( 'get_avatar' ) ) :
/**
 * Retrieve the avatar for a user who provided a user ID or email address.
 *
 * @since 2.5
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @param int $size Size of the avatar image
 * @param string $default URL to a default image to use if no avatar is available
 * @return string <img> tag for the user's avatar
*/
function get_avatar( $id_or_email, $size = '96', $default = '' ) {
	

	if ( !is_numeric($size) )
		$size = '96';

	$email = '';
	if ( is_numeric($id_or_email) ) {
		$id = (int) $id_or_email;
		$user = get_userdata($id);
		if ( $user )
			$email = $user->user_email;
	} elseif ( is_object($id_or_email) ) {
		if ( !empty($id_or_email->user_id) ) {
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ( $user)
				$email = $user->user_email;
		} elseif ( !empty($id_or_email->comment_author_email) ) {
			$email = $id_or_email->comment_author_email;
		}
	} else {
		$email = $id_or_email;
	}

	if ( empty($default) ) {
		$avatar_default = get_option('avatar_default');
		if ( empty($avatar_default) )
			$default = 'mystery';
		else
			$default = $avatar_default;
	}

	if ( 'custom' == $default )
		$default = add_query_arg( 's', $size, $defaults[$avatar_default][1] );
	elseif ( 'mystery' == $default )
		$default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s={$size}"; // ad516503a11cd5ca435acc9bb6523536 == md5('unknown@gravatar.com')
	elseif ( 'blank' == $default )
		$default = includes_url('images/blank.gif');
	elseif ( !empty($email) && 'gravatar_default' == $default )
		$default = '';
	elseif ( 'gravatar_default' == $default )
		$default = "http://www.gravatar.com/avatar/s={$size}";
	elseif ( empty($email) )
		$default = "http://www.gravatar.com/avatar/?d=$default&amp;s={$size}";

	if ( !empty($email) ) {
		$out = 'http://www.gravatar.com/avatar/';
		$out .= md5( strtolower( $email ) );
		$out .= '?s='.$size;
		$out .= '&amp;d=' . urlencode( $default );

		$rating = get_option('avatar_rating');
		if ( !empty( $rating ) )
			$out .= "&amp;r={$rating}";

		$avatar = "<img alt='' src='{$out}' class='avatar avatar-{$size}' height='{$size}' width='{$size}' />";
	} else {
		$avatar = "<img alt='' src='{$default}' class='avatar avatar-{$size} avatar-default' height='{$size}' width='{$size}' />";
	}

	return apply_filters('get_avatar', $avatar, $id_or_email, $size, $default);
}
endif;


if(get_option('peersing_theme_description')==""){
	update_option('peersing_theme_description', 'This widget will appear if you set in wigdet with name notitle', 'For web description', 'yes');
}

if ( function_exists('register_sidebars') )
	register_sidebars(1,array(
    'before_widget' => '<li class="sideblock">',
    'after_widget' => '</li>',
 		'before_title' => '<h2>',
    'after_title' => '</h2>'
    ));


// widget to notitle

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('NoTitle'), 'andre_notitle');

	function andre_notitle() {
 		echo stripslashes(get_option('peersing_theme_description')); 
	}
	
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_peersing_search');
			
// WP-anthosias Search Box 	
	function widget_peersing_search() {
?>
<li class="sideblock">
	<h2>Search</h2>
   <ul>
<li>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s"/> <input type="submit" id="sidebarsubmit" value="Search"  />

 </form>
</li>
 </ul>
</li>





<?php
}

	function andre_comment() {
    	global $comment;
		global $wpdb;
    if ( $comments = $wpdb->get_results("SELECT comment_author, comment_author_url, comment_ID, comment_post_ID FROM $wpdb->comments WHERE comment_approved='1' ORDER BY comment_date_gmt DESC LIMIT 5") ) :
?>

  <li class="sideblock"><h2><?php _e('Comments'); ?></h2>
    <ul>
      <?php
        foreach ($comments as $comment) {
          echo '<li><a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">'.$comment->comment_author .' on '. get_the_title($comment->comment_post_ID).'</a>';
					echo '</li>';
        }
      ?>
    </ul>
  </li>
  <?php endif; ?>
<?php
}

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Recent Comments'), 'andre_comment');



function timeless_add_theme_menu() 
{
  if ( $_GET['page'] == basename(__FILE__) ) 
  {
    // save settings
	if ( 'save' == $_REQUEST['action'] ) 
	{
      update_option( 'timeless_asideid', $_REQUEST[ 's_asideid' ] );
      if( isset( $_POST[ 'hiddenpages' ] ) ) 
      { 
        update_option( 'timeless_hiddenpages', implode(',', $_POST['hiddenpages']) ); 
      } 
      else 
      { 
        delete_option( 'timeless_hiddenpages' ); 
      }
	  
	  // goto theme edit page
	  header("Location: themes.php?page=functions.php&saved=true");
	  die;
	} // reset settings
	else if( 'reset' == $_REQUEST['action'] ) 
	{
	  delete_option( 'timeless_asideid' );
      delete_option( 'timeless_hiddenpages' );
			
	  // goto theme edit page
	  header("Location: themes.php?page=functions.php&reset=true");
	  die;
	}
  }

  add_theme_page("WinterCol3  Theme Options", "WinterCol3  Theme Options", 'edit_themes', basename(__FILE__), 'timeless_theme_page');
}

function timeless_theme_page() 
{
  // --------------------------
  // TimeLess theme page content
  // --------------------------

  if ( $_REQUEST['saved'] ) 
  {
    echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
  }
  else if ( $_REQUEST['reset'] ) 
  {
    echo '<div id="message" class="updated fade"><p><strong>Settings reset.</strong></p></div>';
  }
	
?>
<style>
	.wrap { border:#ccc 1px dashed;}
	.block { margin:1em;padding:1em;line-height:1.6em;}
	table tr td {border:#ddd 1px solid;font-family:Verdana, Arial, Serif;font-size:0.9em;}
	h4 {font-size:1.3em;color:#969669;font-weight:bold;margin:0;padding:10px 0;}	
</style>
<div class="wrap">
 <h2>Theme Options: WinterCol3  Theme</h2>
 <div class="block">
  <h4>Designed by: WinterCol3  Theme Designs</h4>
 </div>

 <form method="post">

 <!-- blog layout options -->
 <fieldset class="options">
  <legend>Theme Settings</legend>

  <p>These options allow you to modify the look and feel of the WinterCol3  theme.</p>

  <table width="100%" cellspacing="5" cellpadding="10" class="editform">
   <tr>
    <td valign="top" colspan="2" style="border:0px;margin:0;padding:0;">
	 <input type="hidden" name="action" value="save" />
	 <?php tl_user_input( "save", "submit", "", "Save Settings" );?>
    </td>
   </tr>
   <tr valign="top">
    <td align="left">
<?php
  tl_option_heading("Page Navigation Options");
  echo "These options allow you to control the navigation of your blog.";		
  global $wpdb;
  $results = $wpdb->get_results("SELECT ID, post_title from $wpdb->posts WHERE post_type='page' or post_status='static' AND post_parent=0 ORDER BY post_title");
  $hiddenpages = explode(',', get_settings('timeless_hiddenpages'));
				
  if($results) 
  {				
	echo "<br/>The Following Pages will be hidden from the Top Navigation Links<br/><br/>";
	foreach($results as $page) 
	{
	  echo '<input type="checkbox" name="hiddenpages[]" value="' . $page->ID . '"';
	  if(in_array($page->ID, $hiddenpages)) 
	  { 
	    echo ' checked="checked"'; 
	  }
	  echo ' /> <a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a><br />';
	}		
  }		

  echo "<br/>";
?>
    </td>
    <td>
    </td>
   </tr>	
   <tr>
    <td valign="top" colspan="2" style="border:0px;margin:0;padding:0;">
	 <input type="hidden" name="action" value="save" />
	 <?php tl_user_input( "save", "submit", "", "Save Settings" );?>
    </td>
   </tr>
  </table>
 </fieldset>
 </form>

 <form method="post">

 <fieldset class="options">
  <legend>Reset</legend>

  <p>If for some reason you want to uninstall WinterCol3  then press the reset button to clean options in the database.</p>
  <p>You then must delete the the theme folder, if you want to completely remove the theme.</p>
<?php
  tl_user_input( "reset", "submit", "", "Reset Settings" );
?>

  </div>
   <input type="hidden" name="action" value="reset" />
  </form>

<?php
}
add_action('admin_menu', 'timeless_add_theme_menu');

// This is just a helper function to save from rewriting a lot of html code
function tl_user_input( $var, $type, $description = "", $value = "", $selected="" ) 
{
  // --------------------------------
  // Echo the form input control code
  // --------------------------------
  echo "\n";
 	
  switch( $type )
  {
    case "text":
	  echo "<input name=\"$var\" id=\"$var\" type=\"$type\" style=\"width: 60%\" class=\"textbox\" value=\"$value\" />";
	  break;
	case "submit":
	  echo "<p class=\"submit\"><input name=\"$var\" type=\"$type\" value=\"$value\" /></p>";
	  break;
	case "option":
	  if( $selected == $value ) 
	  { 
	    $extra = "selected=\"true\""; 
	  }
	  echo "<option value=\"$value\" $extra >$description</option>";
	  break;
  	case "radio":
  	  if( $selected == $value ) 
  	  { 
  	    $extra = "checked=\"true\""; 
  	  }
  	  echo "<label><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
  	  break;
  	case "checkbox":
	  if( $selected == $value ) 
	  { 
	    $extra = "checked=\"true\""; 
	  }
	  echo "<label for=\"$var\"><input name=\"$var\" id=\"$var\" type=\"$type\" value=\"$value\" $extra /> $description</label><br/>";
	  break;
	case "textarea":
	  echo "<textarea name=\"$var\" id=\"$var\" style=\"width: 80%; height: 10em;\" class=\"code\">$value</textarea>";
	  break;
  }
}

function tl_option_heading( $title ) 
{
  // -----------------------
  // Echo the option heading
  // -----------------------

  echo "<h4>" .$title . "</h4>";
}

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 850);
define('HEADER_IMAGE_HEIGHT', 168);
define( 'NO_HEADER_TEXT', true );

function tl_header2_style() {
?>
<style type="text/css">
#headimg {
	background: #000000 url(<?php header_image() ?>) no-repeat;
}
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, 
#headimg #desc {
	display: none;
}
</style>
<?php
}
function tl_header_style() {
?>
<style type="text/css">
#headerimage {
	background: #000000 url(<?php header_image() ?>) no-repeat;
}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
//	add_custom_image_header('tl_header_style', 'tl_header2_style');
}



function mt_add_pages() {
		add_theme_page( "Setting Theme Decription", "Text Without Title",8,'','coba');
//		add_theme_page( "Setting Theme", "Setting",8,'/wp-content/themes/timeless-10/menu1.php','');		
//		add_theme_page( "Setting Theme", "Setting",8, 'menu1.php','');

}
//add_action('admin_menu', 'mt_add_pages');

function coba(){
	global $wpdb;
	if($_POST['send']=='setting'){
		$tmp_name =& $_FILES['gambar']['tmp_name'];
 		$author_id ="test";
		$ext="jpg";
		$name = ABSPATH . 'wp-content/authors/' . $author_id . '.' . $ext;
		@move_uploaded_file($tmp_name, $name);
		@chmod($name, 0666);
	}
?>
<div class="wrap">
<form action="#" method="post" enctype="multipart/form-data">
<input type="hidden" name="send" value="setting">
<table width="80%" border="0">
<tr><td align="center" colspan="2"><b>Upload photo</b></td></tr>
<tr><td align="center"><input type="file" name="gambar"></td></tr>
<tr><td align="center"><input type="submit"></td></tr>
</table> 
</form>
</div>
<?
}
?>