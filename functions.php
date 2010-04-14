<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
define('belle_CURRENT', '1.6');

$content_width = 450;

define('HEADER_TEXTCOLOR', '34a0cc');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 760); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 163); //use height 


function register_scripts() {
wp_register_script('livesearch',
	get_bloginfo('template_directory') . '/js/livesearch.js',
	array('jquery'), belle_CURRENT, true);
			
wp_register_script('functions',
	get_bloginfo('template_directory') . '/js/functions.js',
	array('jquery'), belle_CURRENT);
			
wp_enqueue_script('livesearch');
wp_enqueue_script('functions');
wp_enqueue_script('jquery');
}
add_action('init', 'register_scripts');

//remove recent comments style
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

//admin menu definitions
$themename = "Belle";
$shortname = "wpb";
$options = array (
array(    "name" => "Customize your Belle Theme Here",
        "type" => "title"),
array(    "type" => "open"),

   array(  "name" => "Color Scheme",
           "id" => $shortname."_color_scheme",																		
	    "desc" => "Select your color scheme choice",
           "type" => "select",
           "std" => "blue",
           "options" => array("blue","orange", "pink", "green", "red","yellow")),
   array(  "name" => "Disable Blog Title in Header?",
           "desc" => "Check this box if you would like to DISABLE the blog title in Header.",
           "id" => $shortname."_title_disable",
           "type" => "checkbox",
           "std" => "false"),
   array(  "name" => "Disable Header Tag Line?",
           "desc" => "Check this box if you would like to DISABLE the tag line from Header.",
           "id" => $shortname."_tagline_disable",
           "type" => "checkbox",
           "std" => "false"),
   array(  "name" => "Display Header Social Link 1?",
           "desc" => "Check this box if you would like to ENABLE the social media link 1 in Header.",
           "id" => $shortname."_sociallink1_enable",
           "type" => "checkbox",
           "std" => "false"),
   array(  "name" => "Social Link 1 Url",
           "id" => $shortname."_link1_url",
           "type" => "text",
	    "std" => "http://www.twitter.com/"),
   array(  "name" => "Social Link 1 Title",
           "id" => $shortname."_link1_title",
           "type" => "text",
	    "std" => "Twitter"),
   array(  "name" => "Social Link 1 Desc",
           "desc" => "Maximum 15 characters",
           "id" => $shortname."_link1_desc",
           "type" => "text",
	    "std" => "Follow me on Twitter"),
   array(  "name" => "Display Header Social Link 2?",
           "desc" => "Check this box if you would like to ENABLE the social media link 1 in Header.",
           "id" => $shortname."_sociallink2_enable",
           "type" => "checkbox",
           "std" => "false"),
   array(  "name" => "Social Link 2 Url",
           "id" => $shortname."_link2_url",
           "type" => "text"),
   array(  "name" => "Social Link 2 Title",
           "id" => $shortname."_link2_title",
           "type" => "text"),
   array(  "name" => "Social Link 2 Desc",
           "desc" => "Maximum 15 characters",
           "id" => $shortname."_link2_desc",
           "type" => "text"),


array("type" => "close")


);

/**
* Displays Belle Options page
*/
	function belle_admin() {
		   global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

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
                <td width="80%"><?php if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

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

/**
* Add admin
*/
 function belle_add_admin() {
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

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'belle_admin');

}

add_action('admin_menu', 'belle_add_admin'); 

// gets included in the site header
function header_style() {
    ?><style type="text/css">
        #content-head {
            background:url(<?php header_image(); ?>) no-repeat 90% 90%;
			position: relative;
			padding:0px;
			height:170px;
        }
    </style><?php
}

// gets included in the admin header
function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
			}
		#headimg{
	        position: relative;
	        padding: 35px 0px 0px 7px;
	        height: 100px;
        }
        #headimg h1 {
			float:left;
			margin-right:10px;
			margin-top:23px;
		}
		#headimg a{
			color: #41add9;
			text-decoration: none;
		}
		#desc{
			width:165px;
			border-left:1px solid #dcdcdc;
			float:left;
			font-size: 1em;
			height:30px;
			margin-top:18px;
			padding-left:10px;
			padding-bottom:3px;
		}
    </style><?php
}

add_custom_image_header('header_style', 'admin_header_style');

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
?>
