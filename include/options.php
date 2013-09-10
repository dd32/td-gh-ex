<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
/* ------------------------------------------------------- */
/* REGISTER options ------------------------------------- */
function theme_options_init(){
	register_setting("theme_options", "theme_options");
	wp_enqueue_style("options-style", get_template_directory_uri() . "/include/options-style.css", false, "1.0", "all");
	wp_enqueue_script("themeoptions-jquery", "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js");
	wp_enqueue_script("themeoptions-plugins", get_template_directory_uri()."/include/options-plugins.js", false, "1.0");
	wp_enqueue_script("themeoptions-scripts", get_template_directory_uri()."/include/options-scripts.js", false, "1.0");
}
/* ------------------------------------------------------- */
/* ADD options PAGE TO MENU ----------------------------- */
function add_settings_page() {
	add_theme_page( __( 'Theme options' ), __( 'Theme Options' ), 'manage_options', 'options', 'theme_options_page', '');
}
/* ------------------------------------------------------- */
/* ADD ACTIONS ------------------------------------------- */
add_action('admin_init', 'theme_options_init');
add_action('admin_menu', 'add_settings_page');
/* ------------------------------------------------------- */
/* ADD MEDIA --------------------------------------------- */
function wp_gear_manager_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
}
function wp_gear_manager_admin_styles() {
	wp_enqueue_style('thickbox');
}
/* ------------------------------------------------------- */
/* ADD ACTIONS ------------------------------------------- */
add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');
/* ------------------------------------------------------- */
/* THEME options OUTPUT --------------------------------- */
function theme_options_page() {
	if ($_POST['update_theme_options'] == 'true') {
		theme_options_update();
	} ?>    
<form id="theme-options" action="" method="post">
	<input type="hidden" name="update_theme_options" value="true" />
	<!-- Header -->
	<div class="row" id="header">
    	<div class="col width-50">
    		<div id="icon-generic" class="icon32"></div>
			<h1 class="title">Theme Options</h1>
        </div>
        <div class="col width-50 last version">Version 1.1</div>
    </div>
    <!-- Header end -->
    <!-- Toolbar -->
    <div class="row" id="toolbar">
    	<div class="col width-80 notices"><a href="http://drewdyer.co.uk/themeoptions/changelog/" target="_blank">Theme Options Changelog</a> | <a href="http://drewdyer.co.uk/themeoptions/documentation/" target="_blank">Theme Options Documentation</a> | <a href="http://drewdyer.co.uk/themeoptions/support/" target="_blank">Theme Options Support</a></div>
    	<input class="col width-20 last" type="submit" value="Save Changes" />
    </div>
    <!-- Toolbar end -->
    <!-- Body -->
    <div class="row" id="body">
    	<!-- Menu -->
    	<ul class="col width-25" id="menu">
        	<li class="general"><a href="#general">General Options</a></li>
            <li class="homepage"><a href="#homepage">Homepage Options</a></li>
            <li class="footer"><a href="#footer">Footer Options</a></li>
            <li class="slider"><a href="#slider">Slider Options</a></li>
            <li class="social"><a href="#social">Social Options</a></li>
        </ul>
        <!-- Menu end -->
        <!-- Content -->
        <div class="col width-75 last" id="content">
        	<!-- General Options -->
            <div class="setting" id="general">
                <div class="title">General Options</div>
                <div class="row">
                	<label class="col width-30">Custom Favicon</label>
					<input class="col width-50" type="text" id="favicon" name="favicon" value="<?php echo get_option('favicon'); ?>" />
                    <input class="col width-20 last upload" id="_btn" type="button" value="Upload" />
                </div>
                <div class="row box">
                	<label class="col width-100 last">
                    	Disable Breadcrumbs
                        <input type="checkbox" name="disable_breadcrumbs" id="disable_breadcrumbs" <?php echo get_option('disable_breadcrumbs'); ?> />
					</label>
                </div>
            </div>
            <!-- General Options end -->
            
        	<!-- Homepage Options -->
            <div class="setting" id="homepage">
                <div class="title">Homepage Options</div>  
                <div class="row box">
                	<label class="col width-100 last">
                    	Enable <a href="#slider">Slider</a>
                        <input type="checkbox" name="homepage_slider" id="homepage_slider" <?php echo get_option('homepage_slider'); ?> />
					</label>
                </div>
                <div class="row box">
                	<label class="col width-100 last">
                    	Enable <a href="#social">Social</a> Icons
                        <input type="checkbox" name="homepage_social_icons" id="homepage_social_icons" <?php echo get_option('homepage_social_icons'); ?> />
					</label>
                </div>
                <div class="row box">
                	<h1 class="title">Featured Content</h1>
                	<label class="col width-100 last">
                    	Enable Featured Content
                        <input type="checkbox" name="homepage_featured_content" id="homepage_featured_content" <?php echo get_option('homepage_featured_content'); ?> />
					</label>
                    <div class="row">
                        <label class="col width-20">Headline</label>
                        <input class="col width-80 last" type="text" id="headline" name="headline" value="<?php echo get_option('headline'); ?>" />
                    </div>
                    <div class="row">
                        <label class="col width-20">Sub Headline</label>
                        <input class="col width-80 last" type="text" id="sub_headline" name="sub_headline" value="<?php echo get_option('sub_headline'); ?>" />
                    </div>
                    <div class="row">
                        <label class="col width-20">Content</label>
                        <textarea class="col width-80 last" id="content" name="content" rows="10" cols="50"><?php echo get_option('content'); ?></textarea>
                    </div>
                    <div class="row">
                        <label class="col width-20">Image</label>
                        <input class="col width-60" type="text" id="image" name="image" value="<?php echo get_option('image'); ?>" />
                        <input class="col width-20 last upload" id="_btn" type="button" value="Upload" />
                    </div>
                </div>
            </div>
            <!-- Homepage Options end -->
            
        	<!-- Footer Options -->
            <div class="setting" id="footer">
                <div class="title">Footer Options</div>  
                <div class="row box">
                	<label class="col width-100 last">
                    	Enable <a href="#social">Social</a> Icons
                        <input type="checkbox" name="footer_social_icons" id="footer_social_icons" <?php echo get_option('footer_social_icons'); ?> />
					</label>
                </div>
                <div class="row">
                	<label class="col width-20">Disclaimer</label>
                    <input class="col width-80 last" type="text" id="disclaimer" name="disclaimer" value="<?php echo get_option('disclaimer'); ?>" />
                </div>
            </div>
            <!-- Footer Options end -->
            
        	<!-- Slider Options -->
            <div class="setting" id="slider">
                <div class="title">Slider Options</div>
                <div class="row">
                	<label class="col width-30">Number of Slides <span class="required">*</span></label>
                    <input class="col width-20 last" type="text" id="slides" name="slides" value="<?php echo get_option('slides'); ?>" />
                </div>
                <?php
				$slides = get_option('slides');
				for($i = 1; $i <= $slides; $i++) : ?>  
                	<div class="box">       
                    	<h1 class="title">Slide Number <?php echo $i; ?></h1>
                        <div class="row">
                            <label class="col width-30">Slide Image <span class="required">*</span></label>
                            <input class="col width-50 last" type="text" id="slide_image_<?php echo $i; ?>" name="slide_image_<?php echo $i; ?>" value="<?php echo get_option('slide_image_'.$i); ?>" />
                            <input class="col width-20 last upload" id="_btn" type="button" value="Upload" />
                        </div>
                        <div class="row">
                            <label class="col width-30">Slide Image Link</label>
                            <input class="col width-70 last" type="text" id="slide_image_link_<?php echo $i; ?>" name="slide_image_link_<?php echo $i; ?>" value="<?php echo get_option('slide_image_link_'.$i); ?>" />
                        </div>
                    </div>
                <?php
                endfor;
				if($slides > 1) : ?>
                    <div class="row">
                        <label class="col width-30">Slide Transition Speed (Milliseconds) <span class="required">*</span></label>
                        <input class="col width-70 last" type="text" id="slide_transition" name="slide_transition" value="<?php echo get_option('slide_transition'); ?>" />
                    </div>
                    <div class="row">
                        <label class="col width-30">Slide Pause Rate (Milliseconds) <span class="required">*</span></label>
                        <input class="col width-70 last" type="text" id="slide_pause" name="slide_pause" value="<?php echo get_option('slide_pause'); ?>" />
                    </div>
                <?php endif; ?>
            </div>
            <!-- Slider Options end -->
                    
        	<!-- Social Options -->
            <div class="setting" id="social">
                <div class="title">Social Options</div>
                <div class="row" id="behance">
                	<label class="col width-20">Behance URL</label>
                    <input class="col width-80 last" type="text" id="behance" name="behance" value="<?php echo get_option('behance'); ?>" />
                </div>
                <div class="row" id="facebook">
                	<label class="col width-20">Facebook URL</label>
                    <input class="col width-80 last" type="text" id="facebook" name="facebook" value="<?php echo get_option('facebook'); ?>" />
                </div>
                <div class="row" id="flickr">
                	<label class="col width-20">Flickr URL</label>
                    <input class="col width-80 last" type="text" id="flickr" name="flickr" value="<?php echo get_option('flickr'); ?>" />
                </div>
                <div class="row" id="foursquare">
                	<label class="col width-20">Foursquare URL</label>
                    <input class="col width-80 last" type="text" id="foursquare" name="foursquare" value="<?php echo get_option('foursquare'); ?>" />
                </div>
                <div class="row" id="googleplus">
                	<label class="col width-20">Google + URL</label>
                    <input class="col width-80 last" type="text" id="googleplus" name="googleplus" value="<?php echo get_option('googleplus'); ?>" />
                </div>
                <div class="row" id="instagram">
                	<label class="col width-20">Instagram URL</label>
                    <input class="col width-80 last" type="text" id="instagram" name="instagram" value="<?php echo get_option('instagram'); ?>" />
                </div>
                <div class="row" id="linkedin">
                	<label class="col width-20">LinkedIn URL</label>
                    <input class="col width-80 last" type="text" id="linkedin" name="linkedin" value="<?php echo get_option('linkedin'); ?>" />
                </div>
                <div class="row" id="myspace">
                	<label class="col width-20">MySpace URL</label>
                    <input class="col width-80 last" type="text" id="myspace" name="myspace" value="<?php echo get_option('myspace'); ?>" />
                </div>
                <div class="row" id="pintrest">
                	<label class="col width-20">Pintrest URL</label>
                    <input class="col width-80 last" type="text" id="pintrest" name="pintrest" value="<?php echo get_option('pintrest'); ?>" />
                </div>
                <div class="row" id="stumbleupon">
                	<label class="col width-20">StumbleUpon URL</label>
                    <input class="col width-80 last" type="text" id="stumbleupon" name="stumbleupon" value="<?php echo get_option('stumbleupon'); ?>" />
                </div>
                <div class="row" id="tumblr">
                	<label class="col width-20">Tumblr URL</label>
                    <input class="col width-80 last" type="text" id="tumblr" name="tumblr" value="<?php echo get_option('tumblr'); ?>" />
                </div>
                <div class="row" id="twitter">
                	<label class="col width-20">Twitter URL</label>
                    <input class="col width-80 last" type="text" id="twitter" name="twitter" value="<?php echo get_option('twitter'); ?>" />
                </div>
                <div class="row" id="vimeo">
                	<label class="col width-20">Vimeo URL</label>
                    <input class="col width-80 last" type="text" id="vimeo" name="vimeo" value="<?php echo get_option('vimeo'); ?>" />
                </div>
                <div class="row" id="wordpress">
                	<label class="col width-20">Wordpress URL</label>
                    <input class="col width-80 last" type="text" id="wordpress" name="wordpress" value="<?php echo get_option('wordpress'); ?>" />
                </div>
                <div class="row" id="yelp">
                	<label class="col width-20">Yelp URL</label>
                    <input class="col width-80 last" type="text" id="yelp" name="yelp" value="<?php echo get_option('yelp'); ?>" />
                </div>
                <div class="row" id="youtube">
                	<label class="col width-20">YouTube URL</label>
                    <input class="col width-80 last" type="text" id="youtube" name="youtube" value="<?php echo get_option('youtube'); ?>" />
                </div>
            </div>
            <!-- Social Options end -->
            
        </div>
        <!-- Content end -->
    </div>
    <!-- Body end -->
    <!-- Footer -->
    <div class="row" id="footer">
    	<div class="col width-80 disclaimer"><a href="http://drewdyer.co.uk/" target="_blank">Theme Options by Drew Dyer</a></div>
    	<input class="col width-20 last" type="submit" value="Save Changes" />
    </div>
    <!-- Footer end -->
</form>
<?php }
/* ------------------------------------------------------- */
/* THEME options UPDATE --------------------------------- */
function theme_options_update() {
	/* --------------------------------------------------- */
	/* GENERAL options ---------------------------------- */
	//Favicon
	update_option('favicon',	sanitize($_POST['favicon']));
	//Breadcrumbs
	if($_POST['disable_breadcrumbs']=='on') { $display = 'checked'; } else { $display = ''; }  
    update_option('disable_breadcrumbs',	$display);  
	/* --------------------------------------------------- */
	/* HOMEPAGE options --------------------------------- */	
	if($_POST['homepage_slider']=='on') { $display = 'checked'; } else { $display = ''; }  
    update_option('homepage_slider',	$display);
	if($_POST['homepage_social_icons']=='on') { $display = 'checked'; } else { $display = ''; }  
    update_option('homepage_social_icons',	$display);
	if($_POST['homepage_featured_content']=='on') { $display = 'checked'; } else { $display = ''; }  
    update_option('	homepage_featured_content',	$display);
	update_option('headline',		sanitize($_POST['headline']));
	update_option('sub_headline',	sanitize($_POST['sub_headline']));
	update_option('content',		$_POST['content']);
	update_option('image',			sanitize($_POST['image']));
	/* --------------------------------------------------- */
	/* FOOTER options ----------------------------------- */	
	if($_POST['footer_social_icons']=='on') { $display = 'checked'; } else { $display = ''; }  
    update_option('footer_social_icons',	$display);
	update_option('disclaimer',		sanitize($_POST['disclaimer']));
	/* --------------------------------------------------- */
	/* SLIDER options ----------------------------------- */
	//Update Slide Quantity
	if(preg_match("/[0-9]/", $_POST['slides'])) :
		update_option('slides', $_POST['slides']);
	else :
		$errors[] = '<b>Number of Slides</b>: Please enter a number between 0 – 9.';
	endif;
	//Update Slides	
	$slides = get_option('slides');
	for($i = 1; $i <= $slides; $i++) :
		if(!empty($_POST['slide_image_'.$i])) :
			update_option('slide_image_'.$i,	sanitize($_POST['slide_image_'.$i]));
		else :
			$errors[] = '<b>Slide Number '.$i.'</b>: Please upload a image.';
		endif;
		update_option('slide_image_link_'.$i,	sanitize($_POST['slide_image_link_'.$i]));
	endfor;
	//Update Slide Transition
	if($slides > 1) :
		if(preg_match("/[0-9]/", $_POST['slide_transition'])) :
			update_option('slide_transition', $_POST['slide_transition']);
		else :
			$errors[] = '<b>Slide Transition Speed</b>: Please enter a number between 0 – 9.';
		endif;
		//Update Slide Pause
		if(preg_match("/[0-9]/", $_POST['slide_pause'])) :
			update_option('slide_pause', $_POST['slide_pause']);
		else :
			$errors[] = '<b>Slide Pause Rate</b>: Please enter a number between 0 – 9.';
		endif;
	endif;
	/* --------------------------------------------------- */
	/* SOCIAL options ----------------------------------- */
	update_option('behance',		sanitize($_POST['behance']));
	update_option('facebook',		sanitize($_POST['facebook']));	
	update_option('flickr',			sanitize($_POST['flickr']));
	update_option('foursquare',		sanitize($_POST['foursquare']));
	update_option('googleplus',		sanitize($_POST['googleplus']));
	update_option('instagram',		sanitize($_POST['instagram']));
	update_option('linkedin',		sanitize($_POST['linkedin']));
	update_option('myspace',		sanitize($_POST['myspace']));
	update_option('pintrest',		sanitize($_POST['pintrest']));
	update_option('stumbleupon',	sanitize($_POST['stumbleupon']));
	update_option('tumblr',			sanitize($_POST['tumblr']));
	update_option('twitter',		sanitize($_POST['twitter']));
	update_option('vimeo',			sanitize($_POST['vimeo']));
	update_option('wordpress',		sanitize($_POST['wordpress']));
	update_option('yelp',			sanitize($_POST['yelp']));
	update_option('youtube',		sanitize($_POST['youtube']));	
	/* --------------------------------------------------- */
	/* THEME options - OUTPUT ERRORS -------------------- */
	if(empty($errors) == false) :
		echo output_errors($errors);
	endif;
	/* --------------------------------------------------- */
	/* THEME options - options SAVED ------------------- */
	echo '<span class="options-saved">options Saved</span>';
}
?>