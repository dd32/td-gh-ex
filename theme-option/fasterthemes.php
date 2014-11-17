<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
	 $input['welcome-image'] = esc_url( $input['welcome-image'] );
	 $input['welcome-title'] = wp_filter_nohtml_kses( $input['welcome-title'] );
	 $input['welcome-content'] = wp_filter_nohtml_kses( $input['welcome-content'] );
	 
	 $input['why-chooseus-image'] = esc_url( $input['why-chooseus-image'] );
	 $input['why-chooseus-title'] = wp_filter_nohtml_kses( $input['why-chooseus-title'] );
	 $input['why-chooseus-content'] = wp_filter_nohtml_kses( $input['why-chooseus-content'] );
	 
	 $input['logo'] = esc_url( $input['logo'] );
	 $input['fevicon'] = esc_url( $input['fevicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 
	 $input['fburl'] = esc_url( $input['fburl'] );
	 $input['twitter'] = esc_url( $input['twitter'] );
	 $input['linkedin'] = esc_url( $input['linkedin'] );
	 
	 $input['first-slider-image'] = esc_url( $input['first-slider-image'] );
	 $input['first-slider-link'] = esc_url( $input['first-slider-link'] );
	 
	 $input['second-slider-image'] = esc_url( $input['second-slider-image'] );
	 $input['second-slider-link'] = esc_url( $input['second-slider-link'] );
	 
	 $input['third-slider-image'] = esc_url( $input['third-slider-image'] );
	 $input['third-slider-link'] = esc_url( $input['third-slider-link'] );
	 
	 $input['forth-slider-image'] = esc_url( $input['forth-slider-image'] );
	 $input['forth-slider-link'] = esc_url( $input['forth-slider-link'] );
	 
	 $input['fifth-slider-image'] = esc_url( $input['fifth-slider-image'] );
	 $input['fifth-slider-link'] = esc_url( $input['fifth-slider-link'] );
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$booster_menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
				'menu_title' => __('Theme Options', 'fastertheme_framework'),
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
		$booster_image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$booster_image."' height='64px'  /> ". __( 'FasterThemes Options', 'booster' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'booster' )."</strong></p></div>";
		endif; 
?>
<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> 
  		<a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Home Settings" href="#options-group-1">Home Settings</a> 
        <a id="options-group-2-tab" class="nav-tab thirdsettings-tab" title="Social Settings" href="#options-group-2">Home Slider</a>
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
                <input id="welcome" class="upload" type="text" name="faster_theme_options[welcome-image]" value="<?php if(!empty($booster_options['welcome-image'])) { echo $booster_options['welcome-image']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="welcome-image">
                      <?php if(!empty($booster_options['welcome-image'])) { echo "<img src='".esc_url($booster_options['welcome-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
            </div>
          </div>
          <div id="welcome-title-div" class="section section-text mini">
            <h4 class="heading">Welcome Title</h4>
            <div class="option">
              <div class="controls">
                <input id="welcome-title" class="of-input" name="faster_theme_options[welcome-title]" type="text" size="30" value="<?php if(!empty($booster_options['welcome-title'])) { echo wp_filter_nohtml_kses($booster_options['welcome-title']); } ?>" />
              </div>
            </div>
          </div>
          <div id="welcome-content-div" class="section section-text mini">
            <h4 class="heading">Welcome Content</h4>
            <div class="option">
              <div class="controls">
                <textarea id="welcome-content" class="of-input" name="faster_theme_options[welcome-content]"><?php if(!empty($booster_options['welcome-content'])) { echo wp_filter_nohtml_kses($booster_options['welcome-content']); } ?></textarea>
              </div>
            </div>
          </div>
          <div id="why-choose-us-image" class="section section-text mini">
            <h4 class="heading">Why Choose us Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="why-choose-us" class="upload" type="text" name="faster_theme_options[why-chooseus-image]" value="<?php if(!empty($booster_options['why-chooseus-image'])) { echo esc_url($booster_options['why-chooseus-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="logo-image">
                      <?php if(!empty($booster_options['why-chooseus-image'])) { echo "<img src='".$booster_options['why-chooseus-image']."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
            </div>
          </div>
          <div id="welcome-title-div" class="section section-text mini">
            <h4 class="heading">Why Choose us Title</h4>
            <div class="option">
              <div class="controls">
                <input id="why-chooseus-title" class="of-input" name="faster_theme_options[why-chooseus-title]" type="text" size="30" value="<?php if(!empty($booster_options['why-chooseus-title'])) { echo wp_filter_nohtml_kses($booster_options['why-chooseus-title']); } ?>" />
              </div>
            </div>
          </div>
          <div id="welcome-content-div" class="section section-text mini">
            <h4 class="heading">Why Choose us Content</h4>
            <div class="option">
              <div class="controls">
                <textarea id="why-chooseus-content" class="of-input" name="faster_theme_options[why-chooseus-content]"><?php if(!empty($booster_options['why-chooseus-content'])) { echo wp_filter_nohtml_kses($booster_options['why-chooseus-content']); } ?></textarea>
              </div>
            </div>
          </div>
        </div>
        
        <!-------------- Second group ----------------->
        
        <div id="options-group-2" class="group basicsettings">
          <h3>First Slide</h3>
          <div id="first-slider-image" class="section section-upload">
            <h4 class="heading">Slide Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="first-slider" class="upload" type="text" name="faster_theme_options[first-slider-image]" value="<?php if(!empty($booster_options['first-slider-image'])) { echo esc_url($booster_options['first-slider-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="first-image">
                      <?php if(!empty($booster_options['first-slider-image'])) { echo "<img src='".esc_url($booster_options['first-slider-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                  </div>
                <div class="explain">Size of banner should be exactly 1200x400px for best results.</div>
            </div>
          </div>
          <div id="first-slider-div" class="section section-text mini">
            <h4 class="heading">Slide Link</h4>
            <div class="option">
              <div class="controls">
                <input id="first-slider-link" class="of-input" name="faster_theme_options[first-slider-link]" type="text" size="30" value="<?php if(!empty($booster_options['first-slider-link'])) { echo esc_url($booster_options['first-slider-link']); } ?>" />
              </div>
            </div>
          </div>
          <h3>Second Slide</h3>
          <div id="second-slider-image" class="section section-upload">
            <h4 class="heading">Slide Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="second-slider" class="upload" type="text" name="faster_theme_options[second-slider-image]" value="<?php if(!empty($booster_options['second-slider-image'])) { echo esc_url($booster_options['second-slider-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="second-image">
                      <?php if(!empty($booster_options['second-slider-image'])) { echo "<img src='".esc_url($booster_options['second-slider-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
                <div class="explain">Size of banner should be exactly 1200x400px for best results.</div>
            </div>
          </div>
          <div id="second-slider-div" class="section section-text mini">
            <h4 class="heading">Slide Link</h4>
            <div class="option">
              <div class="controls">
                <input id="second-slider-link" class="of-input" name="faster_theme_options[second-slider-link]" type="text" size="30" value="<?php if(!empty($booster_options['second-slider-link'])) { echo esc_url($booster_options['second-slider-link']); } ?>" />
              </div>
            </div>
          </div>
          <h3>Third Slide</h3>
          <div id="third-slider-image" class="section section-upload">
            <h4 class="heading">Slide Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="third-slider" class="upload" type="text" name="faster_theme_options[third-slider-image]" value="<?php if(!empty($booster_options['third-slider-image'])) { echo esc_url($booster_options['third-slider-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="third-image">
                      <?php if(!empty($booster_options['third-slider-image'])) { echo "<img src='".esc_url($booster_options['third-slider-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
                <div class="explain">Size of banner should be exactly 1200x400px for best results.</div>
            </div>
          </div>
          <div id="third-slider-div" class="section section-text mini">
            <h4 class="heading">Slide Link</h4>
            <div class="option">
              <div class="controls">
                <input id="third-slider-link" class="of-input" name="faster_theme_options[third-slider-link]" type="text" size="30" value="<?php if(!empty($booster_options['third-slider-link'])) { echo esc_url($booster_options['third-slider-link']); } ?>" />
              </div>
            </div>
          </div> 
          <h3>Forth Slide</h3>
          <div id="forth-slider-image" class="section section-upload">
            <h4 class="heading">Slide Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="forth-slider" class="upload" type="text" name="faster_theme_options[forth-slider-image]" value="<?php if(!empty($booster_options['forth-slider-image'])) { echo esc_url($booster_options['forth-slider-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="forth-image">
                      <?php if(!empty($booster_options['forth-slider-image'])) { echo "<img src='".esc_url($booster_options['forth-slider-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
                <div class="explain">Size of banner should be exactly 1200x400px for best results.</div>
            </div>
          </div>
          <div id="forth-slider-div" class="section section-text mini">
            <h4 class="heading">Slide Link</h4>
            <div class="option">
              <div class="controls">
                <input id="forth-slider-link" class="of-input" name="faster_theme_options[forth-slider-link]" type="text" size="30" value="<?php if(!empty($booster_options['forth-slider-link'])) { echo esc_url($booster_options['forth-slider-link']); } ?>" />
              </div>
            </div>
          </div> 
          <h3>Fifth Slide</h3>
          <div id="fifth-slider-image" class="section section-upload">
            <h4 class="heading">Slide Image</h4>
            <div class="option">
                 <div class="controls">
                <input id="fifth-slider" class="upload" type="text" name="faster_theme_options[fifth-slider-image]" value="<?php if(!empty($booster_options['fifth-slider-image'])) { echo esc_url($booster_options['fifth-slider-image']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="fifth-image">
                      <?php if(!empty($booster_options['fifth-slider-image'])) { echo "<img src='".esc_url($booster_options['fifth-slider-image'])."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
                <div class="explain">Size of banner should be exactly 1200x400px for best results.</div>
            </div>
          </div>
          <div id="fifth-slider-div" class="section section-text mini">
            <h4 class="heading">Slide Link</h4>
            <div class="option">
              <div class="controls">
                <input id="fifth-slider-link" class="of-input" name="faster_theme_options[fifth-slider-link]" type="text" size="30" value="<?php if(!empty($booster_options['fifth-slider-link'])) { echo esc_url($booster_options['fifth-slider-link']); } ?>" />
              </div>
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
                <input id="main-logo" class="upload" type="text" name="faster_theme_options[logo]" value="<?php if(!empty($booster_options['logo'])) { echo esc_url($booster_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="main-logo-image">
                  <?php if(!empty($booster_options['logo'])) { echo "<img src='".esc_url($booster_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of logo should be exactly 250x125px for best results.</div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[fevicon]" value="<?php if(!empty($booster_options['fevicon'])) { echo esc_url($booster_options['fevicon']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($booster_options['fevicon'])) { echo "<img src='".esc_url($booster_options['fevicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              <div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($booster_options['footertext'])) { echo wp_filter_nohtml_kses($booster_options['footertext']); } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
        </div>
        
        <!-------------- Forth group ----------------->
        
        <div id="options-group-4" class="group socialsettings">
          <h3>Social Settings</h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Facebook</h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($booster_options['fburl'])) { echo esc_url($booster_options['fburl']); } ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($booster_options['twitter'])) { echo esc_url($booster_options['twitter']); } ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Linkedin</h4>
            <div class="option">
              <div class="controls">
                <input id="linkedin" class="of-input" name="faster_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($booster_options['linkedin'])) { echo esc_url($booster_options['linkedin']); } ?>" />
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