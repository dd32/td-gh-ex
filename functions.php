<?php 
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 
add_action( 'init', 'absolum_media' ); 


function theme_options_init() {
	register_setting( 'absolum_options', 'absolum', 'theme_options_validate' );
  wp_register_style('mycss', WP_CONTENT_URL . '/themes/absolum/css/theme-options.css');
}

function absolum_styles() {
       wp_enqueue_style('mycss');
}     
   
function absolum_media() {
	if( is_admin() ) return;
	wp_enqueue_script( 'hoverIntent' );  
  
if( !is_admin()){
	wp_enqueue_script('jquery');
  wp_enqueue_style('absolum_css', WP_CONTENT_URL . '/themes/absolum/style.css');
}
  
  
$options = get_option('absolum');  
if ($options['abs_header_slider'] == "disable" || $options['abs_header_slider'] == "" || $options['abs_header_slider'] == "one") { 

 } else { 
  
  wp_enqueue_script( 'carousel', WP_CONTENT_URL . '/themes/absolum/js/carousel.js' );
  
  }   
}   
 

$themename = "Absolum";
$template_url = get_template_directory_uri();

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename." Settings", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  
    add_action('admin_print_styles-' . $page, 'absolum_styles'); 

}

$select_scheme = array(
	'0' => array(
		'value' =>	'silver',
		'label' => __( 'Silver &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'grey',
		'label' => __( 'Grey' )
	),
	'2' => array(
		'value' =>	'black',
		'label' => __( 'Black' )
	),
	'3' => array(
		'value' =>	'purple',
		'label' => __( 'Purple' )
	),
	'4' => array(
		'value' =>	'orange',
		'label' => __( 'Orange' )
	),
	'5' => array(
		'value' =>	'red',
		'label' => __( 'Red' )
	),
	'6' => array(
		'value' =>	'green',
		'label' => __( 'Green' )
	),
	'7' => array(
		'value' =>	'blue',
		'label' => __( 'Blue' )
	)                     
); 


$select_content_font = array(
	'0' => array(
		'value' =>	'georgia',
		'label' => __( 'Trebuchet MS &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'segoe',
		'label' => __( 'Segoe UI' )
	),
	'2' => array(
		'value' =>	'arial',
		'label' => __( 'Arial' )
	),
	'3' => array(
		'value' =>	'times',
		'label' => __( 'Times' )
	),  
	'4' => array(
		'value' =>	'courier',
		'label' => __( 'Courier New' )
	),
	'5' => array(
		'value' =>	'calibri',
		'label' => __( 'Calibri' )
	)
);


$select_slider = array(
	'0' => array(
		'value' =>	'disable',
		'label' => __( 'Disable &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'one',
		'label' => __( 'Last post - static' )
	),
	'2' => array(
		'value' =>	'slow',
		'label' => __( 'Slow slideshow' )
	),
	'3' => array(
		'value' =>	'normal',
		'label' => __( 'Normal slideshow' )
	),
	'4' => array(
		'value' =>	'fast',
		'label' => __( 'Fast slideshow' )
)     
                     
);


$select_title = array(
	'0' => array(
		'value' =>	'black',
		'label' => __( 'Black &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'blue',
		'label' => __( 'Blue' )
	),
	'2' => array(
		'value' =>	'silver',
		'label' => __( 'Silver' )
	),
	'3' => array(
		'value' =>	'brown',
		'label' => __( 'Brown' )
	),
	'4' => array(
		'value' =>	'red',
		'label' => __( 'Red' )
	),
	'5' => array(
		'value' =>	'green',
		'label' => __( 'Green' )
	)                  
); 


$select_background = array(
	'0' => array(
		'value' =>	'blue',
		'label' => __( 'Blue &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'green',
		'label' => __( 'Green' )
	),
	'2' => array(
		'value' =>	'silver',
		'label' => __( 'Silver' )
	),
	'3' => array(
		'value' =>	'black',
		'label' => __( 'Black' )
	),
	'4' => array(
		'value' =>	'red',
		'label' => __( 'Red' )
	),
	'5' => array(
		'value' =>	'yellow',
		'label' => __( 'Yellow' )
	),
	'6' => array(
		'value' =>	'brown',
		'label' => __( 'Brown' )
	)                     
); 


$select_sidebar = array(
	'0' => array(
		'value' =>	'right',
		'label' => __( 'Right &nbsp;&nbsp;&nbsp;(default)' )
	),
	'1' => array(
		'value' =>	'left',
		'label' => __( 'Left' )
	),
	'2' => array(
		'value' =>	'disable',
		'label' => __( 'Disable' )
	)                 
); 



$shortname = "abs";

$optionlist = array (

// Design


array( "type" => "open"),


array(  "name" => "Blog title color scheme",
        "desc" => "",
        "id" => $shortname."_title_scheme",
        "type" => "select4",
        "std" => "false"
),  

array(  "name" => "Menu color scheme",
        "desc" => "",
        "id" => $shortname."_color_scheme",
        "type" => "select1",
        "std" => "false"
),  

array(  "name" => "Background color scheme",
        "desc" => "",
        "id" => $shortname."_back_scheme",
        "type" => "select5",
        "std" => "false"
), 


array(  "name" => "Sidebar position",
        "desc" => "",
        "id" => $shortname."_pos_sidebar",
        "type" => "select6",
        "std" => "false"
),


array(  "name" => "Display last post static/slideshow",
        "desc" => "Choose if you want to display last post or last 10 posts in a slideshow",
        "id" => $shortname."_header_slider",
        "type" => "select3",
        "std" => "false"
),       



// Subscribe buttons

  
// RSS Feed
  


array(  "name" => "RSS Feed",
        "desc" => "Insert custom RSS Feed URL, e.g. <strong>http://feeds.feedburner.com/Example</strong>",
        "id" => $shortname."_rss_feed",
        "type" => "text",
        "std" => ""),  



// Newsletter



array(  "name" => "Newsletter",
        "desc" => "Insert custom newsletter URL, e.g. <strong>http://feedburner.google.com/fb/a/mailverify?uri=Example&amp;loc=en_US</strong>",
        "id" => $shortname."_newsletter",
        "type" => "text",
        "std" => ""),  



// Facebook



array(  "name" => "Facebook",
        "desc" => "Insert your Facebook ID",
        "id" => $shortname."_facebook",
        "type" => "text",
        "std" => ""),  



// Twitter
 

array(  "name" => "Twitter",
        "desc" => "Insert your Twitter ID",
        "id" => $shortname."_twitter_id",
        "type" => "text",
        "std" => ""),  



// Styles

      
array(  "name" => "Content font",
        "desc" => "Examples: <span style='font-style:normal;font-size:23px;font-weight:bold;letter-spacing:-1px;'><span style='font-family:Trebuchet MS;'>Trebuchet MS</span> <span style='font-family:Segoe UI,Calibri,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Segoe UI</span> <span style='font-family:arial;'>Arial</span>
        <span style='font-family:times new roman;'>Times</span> <span style='font-family:courier new;'>Courier New</span> <span style='font-family:Calibri,Segoe UI,Myriad Pro,Myriad,Trebuchet MS,Helvetica,Arial,sans-serif;'>Calibri</span>
        </span>",
        "id" => $shortname."_content_font",
        "type" => "select2",
        "std" => "false"),        

array(  "name" => "Custom CSS",
        "desc" => '<strong>For advanced users only</strong>: insert custom CSS, default <a href="'.$template_url.'/style.css" target="_blank">style.css</a> file',
        "id" => $shortname."_css_content",
        "type" => "textarea",
        "std" => "false"),

array( "type" => "close"),

);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist, $select_scheme, $select_slider, $select_content_font, $select_title, $select_background, $select_sidebar; 
	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'absolum'";
            $wpdb->query($query);
            header("Location: themes.php?page=theme_options");
            die;
     } 
   
?>
 



	<div class="wrap">
  
 
  
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />


 <div style="margin-bottom:15px;padding:0 20px;clear:both;float:right;background:#FBFBFB;border:2px solid #ccc;-moz-border-radius:4px;-moz-box-shadow:0 1px 8px #bbb;">
  
   <?php $theme_data = get_theme_data(get_bloginfo( 'stylesheet_url' ));?>  
    
   <div style="float:right;font-weight:bold;position:relative;top:20px;">Developed by <?php echo $theme_data['Author']; ?></div>
    
    
    <h2 style="font-size:18px;float:left;">Thanks for using Absolum</h2>
   
   <div style="position:relative;top:14px;float:left;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XD9JU39SQUEPW">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

     <p style="clear:both;">Do you enjoy this theme? <a rel="bookmark" href="http://theme4press.com/absolum">Send your ideas - issues - wishes</a> or help in development by a donation. Thank you!</p>
     
    
    </div>  

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  


 

  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    
      

 
    
    <div id="setContainer">




		
			<?php settings_fields( 'absolum_options' ); ?>
			<?php $options = get_option( 'absolum' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />

 
<?php break;
 
case 'text':
?>


 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><input style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>" id="<?php echo 'absolum['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo $options[$value['id']] ; } else { echo $value['std'] ; } ?>" /></td>

                                                                                                                                                                                       

</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
   





<?php
break;
 
case 'textarea':
?>
 
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><textarea id="<?php echo 'absolum['.$value['id'].']'; ?>" name="<?php echo 'absolum['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>
 
</tr>
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_scheme as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
                    
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
     


<?php
break;
 
case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_content_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
 
case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;
 
case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_title as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
    

<?php
break;
 
case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_background as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
          
          
<?php
break;
 
case 'select6':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'absolum['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_sidebar as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . selected( $options['value'], $label ). "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
</select></td>
</tr> 
 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
                             
                    
<?php
break;
 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'absolum['.$value['id'].']'; ?>" id="<?php echo 'absolum['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>



 
<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


 
<?php break;
 
}
}
?>



      
    
    
      </div>  
  
      

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>
    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>Be carefull, all options will be removed!</small>
</p>
</form> 


	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_scheme, $select_slider, $select_content_font, $select_title, $select_background, $select_sidebar;
  
  $input['abs_rss_feed'] = wp_filter_nohtml_kses( $input['abs_rss_feed'] );
  
  $input['abs_newsletter'] = wp_filter_nohtml_kses( $input['abs_newsletter'] );
  
  $input['abs_facebook'] = wp_filter_nohtml_kses( $input['abs_facebook'] );
  
  $input['abs_twitter_id'] = wp_filter_nohtml_kses( $input['abs_twitter_id'] );
  
  $input['abs_twitter_id'] = wp_filter_nohtml_kses( $input['abs_twitter_id'] );
  
 	$input['abs_css_content'] = wp_filter_post_kses( $input['abs_css_content'] );
  
	return $input;
}

if ( ! isset( $content_width ) )
	$content_width = 590;


add_action( 'after_setup_theme', 'absolum_setup' );

if ( ! function_exists( 'absolum_setup' ) ):


function absolum_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'absolum' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/blue.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to absolum_header_image_width and absolum_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'absolum_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'absolum_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See absolum_admin_header_style(), below.
	add_custom_image_header( '', 'absolum_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'grassland' => array(
			'url' => '%s/images/headers/red.jpg',
			'thumbnail_url' => '%s/images/headers/red-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Red', 'absolum' )
		),
		'clouds' => array(
			'url' => '%s/images/headers/green.jpg',
			'thumbnail_url' => '%s/images/headers/green-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Green', 'absolum' )
		),
		'city' => array(
			'url' => '%s/images/headers/yellow.jpg',
			'thumbnail_url' => '%s/images/headers/yellow-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Yellow', 'absolum' )
		),
		'squares' => array(
			'url' => '%s/images/headers/violet.jpg',
			'thumbnail_url' => '%s/images/headers/violet-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Violet', 'absolum' )
		),
		'flowers' => array(
			'url' => '%s/images/headers/black.jpg',
			'thumbnail_url' => '%s/images/headers/black-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Black', 'absolum' )
		),
		'circles' => array(
			'url' => '%s/images/headers/brown.jpg',
			'thumbnail_url' => '%s/images/headers/brown-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Brown', 'absolum' )
		),
		'ink' => array(
			'url' => '%s/images/headers/silver.jpg',
			'thumbnail_url' => '%s/images/headers/silver-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Silver', 'absolum' )
		),
		'stripes' => array(
			'url' => '%s/images/headers/blue.jpg',
			'thumbnail_url' => '%s/images/headers/blue-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Blue', 'absolum' )
		)   
	) );
}
endif;

if ( ! function_exists( 'absolum_admin_header_style' ) ) :

function absolum_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;


function absolum_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'absolum_page_menu_args' );


function absolum_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'absolum_excerpt_length' );


function absolum_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( '<span class="read-more">Read more <span class="meta-nav">&raquo;</span></span>', 'absolum' ) . '</a>';
}


function absolum_auto_excerpt_more( $more ) {
	return ' &hellip;' . absolum_continue_reading_link();
}
add_filter( 'excerpt_more', 'absolum_auto_excerpt_more' );


function absolum_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= absolum_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'absolum_custom_excerpt_more' );


function absolum_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'absolum_remove_gallery_css' );

if ( ! function_exists( 'absolum_comment' ) ) :


function absolum_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 50 ); ?>
			<?php printf( __( '%s', 'absolum' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'absolum' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'absolum' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit', 'absolum' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'absolum' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'absolum'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


function absolum_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'absolum' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'absolum' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'absolum' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'absolum' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'absolum' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'absolum' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'absolum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	) );
}

/** Register sidebars by running absolum_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'absolum_widgets_init' );


function absolum_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'absolum_remove_recent_comments_style' );

if ( ! function_exists( 'absolum_posted_on' ) ) :

function absolum_posted_on() {
	printf( __( '<a href="%1$s"><span class="%2$s">Posted on</span> %3$s</a> <span class="meta-sep">by</span> %4$s', 'absolum' ),
		post_permalink(),
    'meta-prep meta-prep-author',        
		sprintf( '<span class="entry-date">%3$s</span>',
      get_permalink(), 
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'absolum' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'absolum_posted_in' ) ) :


function absolum_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'absolum' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'absolum' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'absolum' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;


function absolum_new_excerpt_length($length) {
	return 28;
}
add_filter('excerpt_length', 'absolum_new_excerpt_length');

function absolum_new_excerpt_more($more) {
	return ' [..]';
}
add_filter('excerpt_more', 'absolum_new_excerpt_more');




// Need to remove background image if a color is set

add_custom_background('absolum_custom_background');
function absolum_custom_background() {
    $color = get_background_color();
    if ( ! $color )  return;  
    $style = $color ? "background-image:none;" : '';
?>
<style type="text/css">
body { <?php echo trim( $style ); ?> }
</style>
<?php
} 


/* Truncate */

function absolum_truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function absolum_get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
} 

function absolum_footer_hook() { ?>

<script type='text/javascript'>
var $jx = jQuery.noConflict();
  $jx("div.post").mouseover(function() {
    $jx(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
    $jx("div.type-page").mouseover(function() {
    $jx(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
      $jx("div.type-attachment").mouseover(function() {
    $jx(this).find("span.edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find("span.edit-link").css('visibility', 'hidden');
  });
  
  $jx("li.comment").mouseover(function() {
    $jx(this).find(".comment-edit-link").css('visibility', 'visible');
  }).mouseout(function(){
    $jx(this).find(".comment-edit-link").css('visibility', 'hidden');
  });
</script>



<?php $options = get_option('absolum');

if (!empty($options['abs_header_slider'])) {


  if ($options['abs_header_slider'] == "normal") { ?>

<script type="text/javascript">
var $j = jQuery.noConflict();
	$j(function(){
		$j('#slide_holder').loopedSlider({
			autoStart: 7000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['abs_header_slider'] == "slow") { ?>

<script type="text/javascript">
var $j = jQuery.noConflict();
	$j(function(){
		$j('#slide_holder').loopedSlider({
			autoStart: 10000,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } if ($options['abs_header_slider'] == "fast") { ?>

<script type="text/javascript">
var $j = jQuery.noConflict();
	$j(function(){
		$j('#slide_holder').loopedSlider({
			autoStart: 3500,
			restart: 15000,
			slidespeed: 1200,
			containerClick: false
		});
	});
</script>

<?php } } ?>

<?php } ?>