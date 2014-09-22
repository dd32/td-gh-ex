<?php
function fasterthemes_options_init(){
 register_setting( 'mywiki_options', 'faster_theme_options', 'mywiki_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function mywiki_options_validate( $input ) {
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );

	$input['fburl'] = esc_url_raw( $input['fburl'] );
	$input['twitter'] = esc_url_raw( $input['twitter'] );
	$input['googleplus'] = esc_url_raw( $input['googleplus'] );
	$input['linkedin'] = esc_url_raw( $input['linkedin'] );

    return $input;
}
function mywiki_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'mywiki_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'mywiki_framework' );
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery') );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'mywiki_framework_load_scripts' );
function mywiki_framework_menu_settings() {
	$menu = array(
				'page_title' => __( 'FasterThemes Options', 'mywiki_framework'),
				'menu_title' => __('Theme Options', 'mywiki_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'mywiki_framework',
				'callback' => 'mywiki_framework_page'
				);
	return apply_filters( 'mywiki_framework_menu', $menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$menu = mywiki_framework_menu_settings();
   	add_theme_page($menu['page_title'],$menu['menu_title'],$menu['capability'],$menu['menu_slug'],$menu['callback']);
} 
function mywiki_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
?>
<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$mywiki_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$mywiki_image."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'customtheme' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
    </div>
  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a></li>
  			<li><a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a></li>
            <li><a id="options-group-3-tab" class="nav-tab profeatures-tab" title="Pro Settings" href="#options-group-3">PRO Theme Features</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'mywiki_options' );  
		$mywiki_options = get_option( 'faster_theme_options' ); ?>
     
          <!-------------- First group ----------------->
          <div id="options-group-1" class="group faster-inner-tabs">
          	<div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group active">
            	<div class="explain">Size of logo should be exactly 117x43px for best results. Leave blank to use text heading.</div>
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="faster_theme_options[logo]" value="<?php if(!empty($mywiki_options['logo'])) { echo esc_url($mywiki_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($mywiki_options['logo'])) { echo "<img src='".esc_url($mywiki_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="faster_theme_options[favicon]" 
                            value="<?php if(!empty($mywiki_options['favicon'])) { echo esc_url($mywiki_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button11" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($mywiki_options['favicon'])) { echo "<img src='".esc_url($mywiki_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
            <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($mywiki_options['footertext'])) { echo esc_attr($mywiki_options['footertext']); } ?>">
                </div>                
              </div>
            </div>            
          </div>             
          <!-------------- Second group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Facebook</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>                
                  	<input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($mywiki_options['fburl'])) { echo esc_url($mywiki_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Twitter</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Twitter profile or page URL i.e. http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($mywiki_options['twitter'])) { echo esc_url($mywiki_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google Plus</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Google Plus profile or page URL i.e. https://plus.google.com/username/</div>                
                  	 <input id="googleplus" class="of-input" name="faster_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($mywiki_options['googleplus'])) { echo esc_url($mywiki_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
            
            <div id="section-linkedin" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Linkedin</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Linkedin profile or page URL i.e. https://www.linkedin.com/username/</div>                
                  	<input id="pintrest" class="of-input" name="faster_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($mywiki_options['linkedin'])) { echo esc_url($mywiki_options['linkedin']); } ?>" />
                </div>                
              </div>
            </div>
          </div>   
          <!-------------- Third group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs fasterthemes-pro-image">
          	<div class="fasterthemes-pro-header">
              <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/theme-logo.png" class="fasterthemes-pro-logo" />
              <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=Mywiki" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" class="fasterthemes-pro-buynow" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro-featured.jpg" />
          </div>
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="fasterthemes-footer">
      	<ul>
        	<li>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></li>
            <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a></li>
            <li><a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a></li>
            <li class="btn-save"><input type="submit" class="button-primary" value="Save Options" /></li>
        </ul>
    </div>
    </form>    
</div>
<div class="save-options"><h2>Options saved successfully.</h2></div>
<div class="newsletter">    
      <!-- Begin MailChimp Signup Form -->
      <div id="mc_embed_signup">
        <form action="http://ommune.us2.list-manage.com/subscribe/post?u=9c754572be34858540694990b&amp;id=4ae2e7fd84" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <h2>Enter your email to join our mailing list and we'll keep you updated on new themes as they're
            released and our exclusive special offers.</h2>          
          <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address <span class="asterisk">*</span> </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;">
            <input type="text" name="b_9c754572be34858540694990b_4ae2e7fd84" value="">
          </div>
          <div class="clear">
            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
        </form>
      </div>
      <!--End mc_embed_signup--> 
    </div>
<?php } ?>