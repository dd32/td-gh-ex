<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
	 $input['welcome-image'] = esc_url_raw( $input['welcome-image'] );
	 $input['welcome-title'] = wp_filter_nohtml_kses( $input['welcome-title'] );
	 $input['welcome-content'] = wp_filter_nohtml_kses( $input['welcome-content'] );
	 
	 $input['why-chooseus-image'] = esc_url_raw( $input['why-chooseus-image'] );
	 $input['why-chooseus-title'] = wp_filter_nohtml_kses( $input['why-chooseus-title'] );
	 $input['why-chooseus-content'] = wp_filter_nohtml_kses( $input['why-chooseus-content'] );
	 
	 $input['address1'] = wp_filter_nohtml_kses( $input['address1'] );
	 $input['address2'] = wp_filter_nohtml_kses( $input['address2'] );
	 $input['gmaddress'] = wp_filter_nohtml_kses( $input['gmaddress'] );
	 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['fevicon'] = esc_url_raw( $input['fevicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	wp_enqueue_style( 'wp-color-picker', get_template_directory_uri(). '/theme-option/css/color-picker.min.css' );
	wp_enqueue_style( 'wp-color-picker' );
	
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'wp-color-picker', get_template_directory_uri(). '/theme-option/js/color-picker.min.js', array( 'jquery', 'iris' ) );
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery','wp-color-picker' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery', 'iris' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$booster_menu = array(
				'page_title' => __( 'Faster Themes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $booster_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$booster_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($booster_menu['page_title'],$booster_menu['menu_title'],$booster_menu['capability'],$booster_menu['menu_slug'],$booster_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$booster_image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$booster_image."' height='64px'  /> ". __( 'Faster Themes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>
<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> 
  		<a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Home Settings" href="#options-group-1">Home Settings</a> 
        <a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Contact Settings" href="#options-group-2">Contact Address</a>
        <a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="Basic Settings" href="#options-group-3">Basic Settings</a>
  		<a id="options-group-4-tab" class="nav-tab thirdsettings-tab" title="Social Settings" href="#options-group-4">Social Settings</a>
  </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$booster_options = get_option( 'faster_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
          <h3>Home Settings</h3>
          <div id="welcome-image" class="section section-text mini">
            <h4 class="heading">Welcome Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[welcome-image]" value="<?php echo $booster_options['welcome-image']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="logo-image">
                      <?php if($booster_options['welcome-image'] != '') echo "<img src='".$booster_options['welcome-image']."' /><a class='remove-image'>Remove</a>" ?>
                    </div>
                </div>
            </div>
          </div>
          <div id="welcome-title-div" class="section section-text mini">
            <h4 class="heading">Welcome Title</h4>
            <div class="option">
              <div class="controls">
                <input id="welcome-title" class="of-input" name="faster_theme_options[welcome-title]" type="text" size="30" value="<?php echo $booster_options['welcome-title']; ?>" />
              </div>
            </div>
          </div>
          <div id="welcome-content-div" class="section section-text mini">
            <h4 class="heading">Welcome Content</h4>
            <div class="option">
              <div class="controls">
                <textarea id="welcome-content" class="of-input" name="faster_theme_options[welcome-content]"><?php echo $booster_options['welcome-content']; ?></textarea>
              </div>
            </div>
          </div>
          <div id="why-choose-us-image" class="section section-text mini">
            <h4 class="heading">Why Choose us Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[why-chooseus-image]" value="<?php echo $booster_options['why-chooseus-image']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="logo-image">
                      <?php if($booster_options['why-chooseus-image'] != '') echo "<img src='".$booster_options['why-chooseus-image']."' /><a class='remove-image'>Remove</a>" ?>
                    </div>
                </div>
            </div>
          </div>
          <div id="welcome-title-div" class="section section-text mini">
            <h4 class="heading">Why Choose us Title</h4>
            <div class="option">
              <div class="controls">
                <input id="why-chooseus-title" class="of-input" name="faster_theme_options[why-chooseus-title]" type="text" size="30" value="<?php echo $booster_options['why-chooseus-title']; ?>" />
              </div>
            </div>
          </div>
          <div id="welcome-content-div" class="section section-text mini">
            <h4 class="heading">Why Choose us Content</h4>
            <div class="option">
              <div class="controls">
                <textarea id="why-chooseus-content" class="of-input" name="faster_theme_options[why-chooseus-content]"><?php echo $booster_options['why-chooseus-content']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        
        <!-------------- Second group ----------------->
        
        <div id="options-group-2" class="group socialsettings">
          <h3>Contact Address</h3>
          <div id="section-address1" class="section section-text mini">
            <h4 class="heading">Address 1</h4>
            <div class="option">
              <div class="controls">
                <textarea id="address1" name="faster_theme_options[address1]"><?php echo $booster_options['address1']; ?></textarea>
              </div>
              <div class="explain">.</div>
            </div>
          </div>
          <div id="section-address2" class="section section-text mini">
            <h4 class="heading">Address 2</h4>
            <div class="option">
              <div class="controls">
                <textarea id="address2" name="faster_theme_options[address2]"><?php echo $booster_options['address2']; ?></textarea>
              </div>
              <div class="explain"></div>
            </div>
          </div>
          <div id="section-address2" class="section section-text mini">
            <h4 class="heading">Google Map Address</h4>
            <div class="option">
              <div class="controls">
                <textarea id="address2" name="faster_theme_options[gmaddress]"><?php echo $booster_options['gmaddress']; ?></textarea>
              </div>
              <div class="explain"></div>
            </div>
          </div>
        </div>
        
        <!-------------- Third group ----------------->
        
        <div id="options-group-3" class="group socialsettings">
          <h3>Basic Settings</h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Site Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[logo]" 
                            value="<?php echo $booster_options['logo']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($booster_options['logo'] != '') echo "<img src='".$booster_options['logo']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Size of logo should be exactly 250x125px for best results. Leave blank to use text heading.</div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[fevicon]" 
                            value="<?php echo $booster_options['fevicon']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($booster_options['fevicon'] != '') echo "<img src='".$booster_options['fevicon']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php echo $booster_options['footertext']; ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
        </div>
        
        <!-------------- Fourth group ----------------->
        
        <div id="options-group-4" class="group socialsettings">
          <h3>Social Settings</h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Facebook</h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php echo $booster_options['fburl']; ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php echo $booster_options['twitter']; ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Linkedin</h4>
            <div class="option">
              <div class="controls">
                <input id="linkedin" class="of-input" name="faster_theme_options[linkedin]" type="text" size="30" value="<?php echo $booster_options['linkedin']; ?>" />
              </div>
              <div class="explain">Linkedin profile or page URL i.e. https://in.linkedin.com/username/</div>
            </div>
          </div>
        </div>
        
        <!-------------- End group ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite"> <span>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></span> <span class="fb"> <a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span>
          <input type="submit" class="button-primary" value="Save Options" />
          <div class="clear"></div>
        </div>
        
        <!-- Container -->
        
      </form>
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      
    </div>
    <!-- / #container --> 
    
  </div>
</div>
<?php }