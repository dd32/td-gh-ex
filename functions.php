<?php

/*
	Functions
	
	Establishes the core iFeature functions.
	
	Copyright (C) 2011 CyberChimps
*/

add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
	$content_width = 600;
	
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

// This theme allows users to set a custom background
	add_custom_background();
	
// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Coin Slider 


function cs_head(){
	 
	$path =  get_template_directory_uri() ."/library/cs/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."scripts/coin-slider.min.js\"></script>
		";
	
	echo $script;
}

add_action('wp_head', 'cs_head');


	// Register superfish scripts
	
function add_our_scripts() {
 
    if (!is_admin()) { // Add the scripts, but not to the wp-admin section.
    // Adjust the below path to where scripts dir is, if you must.
    $scriptdir = get_template_directory_uri() ."/library/sf/";
 
    // Remove the wordpresss inbuilt jQuery.
    wp_deregister_script('jquery');
    
    // Lets use the one from Google AJAX API instead.
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', false, '1.4.2');
    // Register the Superfish javascript file
    wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    // Now the superfish CSS
   
    
    //load the scripts and style.
	wp_enqueue_style('superfish-css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('superfish');
    } // end the !is_admin function
} //end add_our_scripts function
 
//Add our function to the wp_head. You can also use wp_print_scripts.
add_action( 'wp_head', 'add_our_scripts',0);
	
	// Register menu names
	
	function register_my_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
	add_action( 'init', 'register_my_menus' );
	
	// Menu fallback
	
	function menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}
	
	// Add RSS links to <head> section
	add_theme_support('automatic-feed-links');

	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="sidebar-widget-title">',
    		'after_title'   => '</h2>'
    	));
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<div class="footer-widgets">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="footer-widget-title">',
	'after_title' => '</h3>',
	));
    }
?>
<?php  
  
$themename = "iFeature";  
$shortname = "if";

$categories = get_categories('hide_empty=0&orderby=name');  
$wp_cats = array();  
foreach ($categories as $category_list ) {  
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;  
}  
array_unshift($wp_cats, "Choose a category");

$options = array (  
  
array( "name" => $themename." Options",  
    "type" => "title"),  
  
array( "name" => "General",  
    "type" => "section"),  
array( "type" => "open"),  

array( "name" => "Site Tagline",  
    "desc" => "Enter the tagline of your site here.",  
    "id" => $shortname."_home_title",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Cantarell)",  
    "id" => $shortname."_font",  
    "type" => "select",  
    "options" => array("Cantarell", "Arial", "Courier New", "Georgia", "Lucida Grande", "Tahoma", "Tangerine", "Times New Roman", "Ubuntu"),  
    "std" => ""),
    
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => home_url()  ."images/favicon.ico"),   

array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),   
    
array( "name" => "Show Facebook Like Button",  
    "desc" => "Check this box to show the Facebook Like Button on blog posts",  
    "id" => $shortname."_show_fb_like",  
    "type" => "checkbox"),  
    
array( "type" => "close"),  
array( "name" => "Header",  
    "type" => "section"),  
array( "type" => "open"),

array( "name" => "Logo URL",  
    "desc" => "Enter the link to your logo image (max-height 60px), or to use your site title text enter the word: hide.",  
    "id" => $shortname."_logo",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Header Contact Area",  
    "desc" => "Enter contact info such as phone number for the top right corner of the header. It can be HTML (to hide enter the word: hide).",  
    "id" => $shortname."_header_contact",  
    "type" => "textarea",
    "std" => ""),

array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL to display the Facebook social icon (to hide enter the word: hide).",  
    "id" => $shortname."_facebook",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL to display the Twitter social icon (to hide enter the word: hide).",  
    "id" => $shortname."_twitter",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL to display the LinkedIn social icon (to hide enter the word: hide).",  
    "id" => $shortname."_linkedin",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL to display the YouTUbe social icon (to hide enter the word: hide).",  
    "id" => $shortname."_youtube",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL to display the Google Maps social icon (to hide enter the word: hide).",  
    "id" => $shortname."_googlemaps",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address to display the email social icon (to hide enter the word: hide).",  
    "id" => $shortname."_email",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed (to hide enter the word: hide).",  
    "id" => $shortname."_rsslink",  
    "type" => "text",  
    "std" => ""),
  
array( "type" => "close"),  
array( "name" => "iFeature Slider",  
    "type" => "section"),  
array( "type" => "open"), 

array( "name" => "Hide iFeature Slider",  
    "desc" => "Check this box to remove the Feature Slider on the homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox"),  

array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 7000)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Image custom field:",  
    "desc" => "(Default is feature-image)",  
    "id" => $shortname."_slider_image_field",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Text custom field:",  
    "desc" => "(Default is feature-text)",  
    "id" => $shortname."_slider_text_field",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Show post from category:",  
    "desc" => "(Default is all)",  
    "id" => $shortname."_slider_category",  
    "type" => "text",  
    "std" => ""),
  
array( "type" => "close"),  
array( "name" => "Footer",  
    "type" => "section"),  
array( "type" => "open"),  

  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (to hide enter the word: hide).",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
  
array( "type" => "close")  
  
);

function mytheme_add_admin() {  
  
global $themename, $shortname, $options;  
  
if (( isset($_GET['page'])) && ($_GET['page'] == basename(__FILE__) )) {
  
    if ( 'save' == $_REQUEST['action'] ) {  
  
        foreach ($options as $value) {  
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }  
  
foreach ($options as $value) {  
    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }  
  
    header("Location: admin.php?page=functions.php&saved=true");  
die;  
  
}  
else if( 'reset' == $_REQUEST['action'] ) {  
  
    foreach ($options as $value) {  
        delete_option( $value['id'] ); }  
  
    header("Location: admin.php?page=functions.php&reset=true");  
die;  
  
}  
}  
  
add_object_page($themename, $themename , 'administrator', basename(__FILE__), 'mytheme_admin');  
}  
  
function mytheme_add_init() {  
$file_dir=get_bloginfo('template_directory');  
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");  
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");  
}   

function mytheme_admin() {  
  
global $themename, $shortname, $options;  
$i=0;  
  
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';  
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';  
  
?>  
<div class="wrap rm_wrap">  
<h2><?php echo $themename; ?> Settings</h2>  
  
<div class="rm_opts">  
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
<p>Want more features? Click below to upgrade to iFeature Pro, which includes additional sections, color options, fonts, theme .PSD files and much much more.</p>
<a href="http://cyberchimps.com/ifeature-pro"><img src="<?php bloginfo('template_url'); ?>/images/getifeaturepro.png ?>" alt="Get iFeature Pro"></a> 
<p>Want to stick with iFeature, but want to support the developers? Please consider making a donation.</p>
<a href="http://cyberchimps.com/donate"><img src="<?php bloginfo('template_url'); ?>/images/paypal.gif ?>" alt="Donate"></a> 
<p>Click on the panes below to edit your iFeature settings.</p> 

  
<?php break;  
  
case 'text':  
?>   
<div class="rm_input rm_text">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />  
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
  
 </div>  
<?php  
break;  
  
case 'textarea':  
?>  
  
<div class="rm_input rm_textarea">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>  
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
  
 </div>  
  
<?php  
break;  
  
case 'select':  
?>  
  
<div class="rm_input rm_select">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
  
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
<?php foreach ($value['options'] as $option) { ?>  
        <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>  
</select>  
  
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
</div>  
<?php  
break;  
  
case "checkbox":  
?>  
  
<div class="rm_input rm_checkbox">  
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
  
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>  
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />  
  
    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
 </div>  
<?php break;
case "section":  
  
$i++;  
  
?>  
<div class="rm_section">  
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />  
</span><div class="clearfix"></div></div>  
<div class="rm_options">   
<?php break;  
  
}  
}  
?>   


<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/forum"><img src="<?php bloginfo('template_url'); ?>/images/forum.png ?>" alt="Forum"></a> <a href="http://cyberchimps.com/ifeature-pro/docs"><img src="<?php bloginfo('template_url'); ?>/images/docs.png ?>" alt="Docs"></a> 

<p>Press to reset your settings (WARNING, THIS RESTORES TO DEFAULT)</p>
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
<?php  
add_action('admin_init', 'mytheme_add_init');  
add_action('admin_menu', 'mytheme_add_admin');  
?>