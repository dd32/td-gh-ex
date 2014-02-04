<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );


function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_register_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	wp_register_style( 'wp-color-picker', get_template_directory_uri(). '/theme-option/css/color-picker.min.css' );
	wp_enqueue_style( 'wp-color-picker' );
	
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_register_script( 'wp-color-picker', get_template_directory_uri(). '/theme-option/js/color-picker.min.js', array( 'jquery', 'iris' ) );
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery','wp-color-picker' ) );
	wp_register_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery', 'iris' ) );		
	wp_enqueue_script('media-uploader');


}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );

function fasterthemes_framework_menu_settings() {

	$menu = array(
				'page_title' => __( 'Faster Themes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $menu );
}

add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$menu = fasterthemes_framework_menu_settings();
   // add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);  
 	add_theme_page($menu['page_title'],$menu['menu_title'],$menu['capability'],$menu['menu_slug'],$menu['callback']);
} 

function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$image."' height='64px'  /> ". __( 'Faster Themes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>
	<div id="fasterthemes_framework-wrap" class="wrap">

		<h2 class="nav-tab-wrapper">
        	<a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a>
            <a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a>
        </h2>
    <div id="fasterthemes_framework-metabox" class="metabox-holder">
	    <div id="fasterthemes_framework" class="postbox">
<!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <?php settings_fields( 'ft_options' );  
		$options = get_option( 'faster_theme_options' ); ?>
<!-------------- First group ----------------->
                
        <div id="options-group-1" class="group basicsettings">
          <h3>Basic Settings</h3>
          		<div id="section-logo" class="section section-upload ">
            		<h4 class="heading">Site Logo</h4>
            		<div class="option">
              			<div class="controls">
                			<input id="logo" class="upload" type="text" name="faster_theme_options[logo]" 
                            value="<?php echo $options['logo']; ?>" placeholder="No file chosen" />
                            
                			<input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                			<div class="screenshot" id="logo-image"> <?php if($options['logo'] != '') echo "<img src='".$options['logo']."' /><a class='remove-image'>Remove</a>" ?> </div>
              			</div>
              			<div class="explain">Size of logo should be exactly 360x125px for best results. Leave blank to use text heading.</div>
            		</div>
          		</div>
                
                <div id="section-logo" class="section section-upload ">
            		<h4 class="heading">Fevicon Icon</h4>
            		<div class="option">
              			<div class="controls">
                			<input id="logo" class="upload" type="text" name="faster_theme_options[fevicon]" 
                            value="<?php echo $options['fevicon']; ?>" placeholder="No file chosen" />
                            
                			<input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                			<div class="screenshot" id="logo-image"> <?php if($options['fevicon'] != '') echo "<img src='".$options['fevicon']."' /><a class='remove-image'>Remove</a>" ?> </div>
              			</div>
              			<div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
            		</div>
          		</div>
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            	<div class="option">
              		<div class="controls">
                		<input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php echo $options['footertext']; ?>">
              		</div>
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            	</div>
          </div>
          
          <div id="section-bloglayout" class="section section-radio">
            <h4 class="heading">Blog Page Layout</h4>
            	<div class="option">
              		<div class="controls">
                	<select name="faster_theme_options[bloglayout]">
                    	
                    	<option value="left" <?php if($options['bloglayout'] == 'left') { ?> selected="selected" <?php } ?>>Left Sidebar</option>
                        <option value="right"  <?php if($options['bloglayout'] == 'right') { ?> selected="selected" <?php }else if($options['bloglayout'] == '') { ?> selected="selected" <?php } ?>>Right Sidebar</option>
                        <option value="full"  <?php if($options['bloglayout'] == 'full') { ?> selected="selected" <?php } ?>>Full Width</option>
                    </select>	
              		</div>
              		<div class="explain">Select Blog Page Layout.</div>
            	</div>
          </div>
          
        </div>
<!-------------- Second group ----------------->                
		<div id="options-group-2" class="group socialsettings">
			<h3>Social Settings</h3>
          		<div id="section-facebook" class="section section-text mini">
            		<h4 class="heading">Facebook</h4>
            			<div class="option">
              				<div class="controls">
                			<input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php echo $options['fburl']; ?>" />
              				</div>
              				<div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            			</div>
          		</div>
                <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php echo $options['twitter']; ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
        </div>
<!-------------- End group ----------------->                        
                
        <div id="fasterthemes_framework-submit" class="section-submite">
        <span>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></span>
        <span class="fb">
        	<a href="https://www.facebook.com/faster.themes" target="_blank">
        		<img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/>
            </a>
        </span>
        <span class="tw">
        	<a href="https://twitter.com/FasterThemes" target="_blank">
            	<img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/>
            </a>
        </span>        

          <input type="submit" class="button-primary" value="Save Options" />
		 <!-- <input type="submit" value="<?php // _e( 'Save Options', 'customtheme' ); ?>" /> -->
          <div class="clear"></div>
        </div>
  <!-- Container -->

</form>
<!--======================== F I N A L - - T H E M E - - O P T I O N ===================--> 
</div> <!-- / #container -->
	</div>

	</div>
<?php }