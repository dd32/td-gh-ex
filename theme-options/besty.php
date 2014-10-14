<?php
function besty_options_init(){
 register_setting( 'theme_options', 'besty_theme_options', 'theme_options_validate');
} 
add_action( 'admin_init', 'besty_options_init' );
function theme_options_validate( $input ) {
 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 $input['tagline'] = wp_filter_nohtml_kses( $input['tagline'] );
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );	 
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	 	 	 
	 $input['welcome-title'] = wp_filter_nohtml_kses( $input['welcome-title'] );
	 $input['welcome-img'] = esc_url_raw( $input['welcome-img'] ); 
	 $input['welcome_details'] = $input['welcome_details'];

    return $input;
}
function besty_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'besty_framework', get_template_directory_uri(). '/theme-options/css/besty_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'besty_framework' );

	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/besty-custom.js', array('jquery'), '20120106', true );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery'), '20120206', true  );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'besty_framework_load_scripts' );
function besty_framework_menu_settings() {
	$besty_menu = array(
				'page_title' => __( 'Besty Options', 'bestytheme_framework'),
				'menu_title' => __('Theme Options', 'bestytheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'besty_framework',
				'callback' => 'bestytheme_framework_page'
				);
	return apply_filters( 'besty_framework_menu', $besty_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$besty_menu = besty_framework_menu_settings();
   	add_theme_page($besty_menu['page_title'],$besty_menu['menu_title'],$besty_menu['capability'],$besty_menu['menu_slug'],$besty_menu['callback']);
} 
function bestytheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
?>
<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_theme">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$besty_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$besty_image."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'besty' ) . "</h1>"; 			
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
            <li><a id="options-group-3-tab" class="nav-tab homepagesettings-tab" title="Home Page Settings" href="#options-group-3">Home Page Settings</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'theme_options' ); $besty_options = get_option( 'besty_theme_options' ); ?>
        
            <!-------------- Header group ----------------->
          <div id="options-group-1" class="group faster-inner-tabs">   
                 
          	<div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group active">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="besty_theme_options[logo]" value="<?php if(!empty($besty_options['logo'])) { echo esc_url($besty_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($besty_options['logo'])) { echo "<img src='".esc_url($besty_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="besty_theme_options[favicon]" 
                            value="<?php if(!empty($besty_options['favicon'])) { echo esc_url($besty_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($besty_options['favicon'])) { echo "<img src='".esc_url($besty_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>     
            <div id="section-footertext" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext" class="of-input" name="besty_theme_options[footertext]" size="32"  value="<?php if(!empty($besty_options['footertext'])) { echo esc_attr($besty_options['footertext']); } ?>">
                </div>                
              </div>
            </div>

            <div id="section-tagline" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Tagline</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter tagline for your site , you would like to display under the logo.</div>                
                  	<input type="text" id="tagline" class="of-input" name="besty_theme_options[tagline]" size="32"  value="<?php if(!empty($besty_options['tagline'])) { echo esc_attr($besty_options['tagline']); } ?>">
                </div>                
              </div>
            </div>      
          </div>
          <!-------------- Social group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Facebook</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>                
                  	<input id="facebook" class="of-input" name="besty_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($besty_options['fburl'])) { echo esc_url($besty_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Twitter</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Twitter profile or page URL i.e. http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="besty_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($besty_options['twitter'])) { echo esc_url($besty_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
			<div id="section-linkedin" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Linkedin</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Linkedin profile or page URL i.e. https://linkedin.com/username/</div>                
                  	 <input id="linkedin" class="of-input" name="besty_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($besty_options['linkedin'])) { echo esc_url($besty_options['linkedin']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google+</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Googleplus profile or page URL i.e. https://plus.google.com/username/</div>                
                  	<input id="googleplus" class="of-input" name="besty_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($besty_options['googleplus'])) { echo esc_url($besty_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
          </div>            
          <!-------------- Home Page group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs">
		   <div id="section-welcome-title" class="section theme-tabs">
			<a class="heading faster-inner-tab active" href="javascript:void(0)">Welcome Title</a>
		  <div class="faster-inner-tab-group active">
			<div class="ft-control">
				<div class="explain">Enter recent welcome title for your site , you would like to display in the Home Page.</div><input type="text" id="welcome-title" class="of-input" name="besty_theme_options[welcome-title]" size="32" value="<?php if(!empty($besty_options['welcome-title'])) { echo esc_attr($besty_options['welcome-title']); } ?>">
			</div>                
		  </div>
		</div>
          <div class="section theme-tabs theme-welcome-img">
            <a class="heading faster-inner-tab" href="javascript:void(0)">Welcome Image</a>
            <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <input id="welcome-img-img" class="upload" type="text" name="besty_theme_options[welcome-img]" value="<?php if(!empty($besty_options['welcome-img'])) { echo esc_url($besty_options['welcome-img']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="welcome-img-image">
                  <?php if(!empty($besty_options['welcome-img'])) { echo "<img src='".esc_url($besty_options['welcome-img'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-welcome-details" class="section theme-tabs section-textarea">
			<a class="heading faster-inner-tab" href="javascript:void(0)">Welcome Details</a>
		  <div class="faster-inner-tab-group">
			<div class="ft-control">
				<div class="explain"></div>
				<?php 				
				 $besty_content = $besty_options['welcome_details'];
				 $besty_editor_id = 'welcome_details';
				 $besty_settings = array('textarea_name' => 'besty_theme_options[welcome_details]','textarea_rows' => 10);
				 wp_editor($besty_content, $besty_editor_id, $besty_settings);
                 ?> 
			</div>                
		  </div>
		</div>
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
  <h1>Subscribe with us</h1>
  <p>Join our mailing list and we'll keep you updated on new themes as they're released and our exclusive special offers. <a href="http://eepurl.com/SP2nP" target="_blank">Click here to join</a></p>
  <!--End mc_embed_signup--> 
</div>
<?php } ?>
