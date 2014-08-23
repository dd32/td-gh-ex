<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'besty_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 	 
	 $input['welcome-title'] = wp_filter_nohtml_kses( $input['welcome-title'] );	 
	 $input['tagline'] = wp_filter_nohtml_kses( $input['tagline'] );
	 $input['welcome_details'] = $input['welcome_details'];
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );	 
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	
	 
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	
	
	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery') );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$besty_menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $besty_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$besty_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($besty_menu['page_title'],$besty_menu['menu_title'],$besty_menu['capability'],$besty_menu['menu_slug'],$besty_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$besty_image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$besty_image."' height='64px'  /> ". __( 'FasterThemes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>
<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab socialsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a> <a id="options-group-2-tab" class="nav-tab thirdsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a> <a id="options-group-3-tab" class="nav-tab thirdsettings-tab" title="Home page slider images" href="#options-group-3">Home Page Settings</a> </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$besty_options = get_option( 'besty_theme_options' ); ?>
        
        <!-------------- first group ----------------->
        
        <div id="options-group-1" class="group socialsettings">
          <h3>Basic Settings</h3>
          <div id="logo" class="section section-text">
            <h4 class="heading">Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo-image" class="upload" type="text" name="besty_theme_options[logo]" value="<?php if(!empty($besty_options['logo'])) { echo $besty_options['logo']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-img">
                  <?php if(!empty($besty_options['logo'])) {  echo "<img src='".$besty_options['logo']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of logo should be exactly 121x121px for best results. Leave blank to use text heading.</div>
            </div>
          </div>
          <div id="tagline" class="section section-text">
            <h4 class="heading">Tagline</h4>
            <div class="option">
              <div class="controls">
                <input id="tagline-text" type="text" class="of-input" name="besty_theme_options[tagline]" value="<?php if(!empty($besty_options['tagline'])) { echo $besty_options['tagline']; } ?>" placeholder="Tagline" />
              </div>
              <div class="explain">Your Tagline is display bottom of the logo.</div>
            </div>
          </div>
          <div id="favicon" class="section section-text mini">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="favicon-image" class="upload" type="text" name="besty_theme_options[favicon]" value="<?php if(!empty($besty_options['favicon'])) { echo $besty_options['favicon']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                
                <div class="screenshot" id="favicon-img">
                  <?php if(!empty($besty_options['favicon'])) {  echo "<img src='".$besty_options['favicon']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
              
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="besty_theme_options[footertext]" size="32"  value="<?php if(!empty($besty_options['footertext'])) { echo $besty_options['footertext']; } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
        </div>
        
        <!-------------- second group ----------------->
        
        <div id="options-group-2" class="group socialsettings">
          <h3>Social Settings </h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Facebook</h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="besty_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($besty_options['fburl'])) { echo $besty_options['fburl']; } ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="besty_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($besty_options['twitter'])) { echo $besty_options['twitter']; } ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-googleplus" class="section section-text mini">
            <h4 class="heading">Google Plus</h4>
            <div class="option">
              <div class="controls">
                <input id="googleplus" class="of-input" name="besty_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($besty_options['googleplus'])) { echo $besty_options['googleplus']; } ?>" />
              </div>
              <div class="explain">RSS profile or page URL i.e. https://www.rss.com/username/</div>
            </div>
          </div>                    
          <div id="section-linkedin" class="section section-text mini">
            <h4 class="heading">Linkedin</h4>
            <div class="option">
              <div class="controls">
                <input id="linkedin" class="of-input" name="besty_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($besty_options['linkedin'])) { echo $besty_options['linkedin']; } ?>" />
              </div>
              <div class="explain">Linkedin profile or page URL i.e. https://linkedin.com/username/</div>
            </div>
          </div>          
        </div>
        
        <!-------------- Third group ----------------->
        
        <div id="options-group-3" class="group homesettings">
          <h3>Home Details</h3>
          <div id="section-post" class="section section-textarea">
            <h4 class="heading">Welcome Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="post" class="of-input" name="besty_theme_options[welcome-title]" size="32"  value="<?php if(!empty($besty_options['welcome-title'])) { echo $besty_options['welcome-title']; } ?>">
              </div>
              <div class="explain">Enter recent welcome title for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          
          <div id="home-image" class="section section-textarea">
            <h4 class="heading">Welcome Image</h4>
            <div class="option">              
              <div class="controls	">
                <input id="welcome-img" class="upload" type="text" name="besty_theme_options[welcome-img]" 
                            value="<?php if(!empty($besty_options['welcome-img'])) echo $besty_options['welcome-img']; ?>" placeholder="No file chosen" />
                <input id="welcome-img" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="slider-image">
                  <?php if(!empty($besty_options['welcome-img'])) echo "<img src='".$besty_options['welcome-img']."' /><a class='remove-image'>Remove</a>"; ?>
                </div>
              </div>
              <div class="explain">Enter recent welcome image for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          
          <div id="section-category" class="section section-textarea">
            <h4 class="heading">Welcome Details</h4>
            <div class="option">
              <div class="of-input">
                <?php 				
				 $besty_content = $besty_options['welcome_details'];
				 $besty_editor_id = 'welcome_details';
				 $besty_settings = array('textarea_name' => 'besty_theme_options[welcome_details]','textarea_rows' => 10);
				 wp_editor($besty_content, $besty_editor_id, $besty_settings);
                 ?>                 
              </div>
              <div class="explain"></div>
            </div>
          </div>
        </div>
        
        <!-------------- End group ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite"> <span>&copy; <a href="http://fasterthemes.com/" target="_blank">fasterthemes.com</a></span> <span class="fb"> <a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span>
          <input type="submit" class="button-primary" value="Save Options" />
          <div class="clear"></div>
        </div>
        <!-- Container -->
      </form>
      <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
    </div>
    <!-- / #container --> 
          <br />
          <div id="section-title" class="section">

            <!-- Begin MailChimp Signup Form -->
            <div id="mc_embed_signup">
            <form action="http://ommune.us2.list-manage.com/subscribe/post?u=9c754572be34858540694990b&amp;id=4ae2e7fd84" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <h2>Enter your email to join our mailing list and we’ll keep you updated on new themes as they’re
released and our exclusive special offers.</h2>
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
            </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;"><input type="text" name="b_9c754572be34858540694990b_4ae2e7fd84" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </form>
            </div>
            <!--End mc_embed_signup-->

          </div>  
  </div>
</div>
   
<?php }