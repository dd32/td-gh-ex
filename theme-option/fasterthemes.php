<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );

	$input['fburl'] = esc_url_raw( $input['fburl'] );
	$input['twitter'] = esc_url_raw( $input['twitter'] );
	$input['googleplus'] = esc_url_raw( $input['googleplus'] );
	$input['linkedin'] = esc_url_raw( $input['linkedin'] );

    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery','wp-color-picker' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery', 'iris' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
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
   	add_theme_page($menu['page_title'],$menu['menu_title'],$menu['capability'],$menu['menu_slug'],$menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$image."' height='64px'  /> ". __( 'FasterThemes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>
<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a> <a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a> </h2>
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
                <input id="logo" class="upload" type="text" name="faster_theme_options[logo]" value="<?php if(!empty($options['logo'])) { echo $options['logo']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['logo'])) { echo "<img src='".$options['logo']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of logo should be exactly 360x125px for best results. Leave blank to use text heading.</div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[favicon]" value="<?php if(!empty($options['favicon'])) { echo $options['favicon']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['favicon'])) { echo "<img src='".$options['favicon']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($options['footertext'])) { echo $options['footertext']; } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
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
                <input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($options['fburl'])) { echo $options['fburl']; } ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($options['twitter'])) { echo $options['twitter']; } ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Google +</h4>
            <div class="option">
              <div class="controls">
                <input id="googleplus" class="of-input" name="faster_theme_options[googleplus]" size="30" type="text" value="<?php if(!empty($options['googleplus'])) { echo $options['googleplus']; } ?>" />
              </div>
              <div class="explain">google+ profile or page URL i.e. http://plus.google.com/username/ </div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Linkedin</h4>
            <div class="option">
              <div class="controls">
                <input id="linkedin" class="of-input" name="faster_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($options['linkedin'])) { echo $options['linkedin']; } ?>" />
              </div>
              <div class="explain">Linkedin profile or page URL i.e. https://www.linkedin.com/username/</div>
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