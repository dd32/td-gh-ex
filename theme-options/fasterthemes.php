<?php
function medium_options_init(){
 register_setting( 'medium_options', 'medium_theme_options','medium_options_validate');
} 
add_action( 'admin_init', 'medium_options_init' );
function medium_options_validate($input)
{
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
        $input['scmessage'] = wp_filter_nohtml_kses( $input['scmessage'] );
	
	$input['fburl'] = esc_url_raw( $input['fburl'] );
	$input['twitter'] = esc_url_raw( $input['twitter'] );
	$input['googleplus'] = esc_url_raw( $input['googleplus'] ); 
	$input['linkedin'] = esc_url_raw( $input['linkedin'] );
        
        $input['search-text'] = wp_filter_nohtml_kses( $input['search-text'] );
        $input['blog-title'] = wp_filter_nohtml_kses( $input['blog-title'] );
		
    return $input;
}
function medium_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'medium_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'medium_framework' );
	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'medium_framework_load_scripts' );
function medium_framework_menu_settings() {
	$medium_menu = array(
				'page_title' => __( 'medium Options', 'medium_framework'),
				'menu_title' => __('Theme Options', 'medium_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'medium_framework',
				'callback' => 'medium_framework_page'
				);
	return apply_filters( 'medium_framework_menu', $medium_menu );
}
add_action( 'admin_menu', 'medium_theme_options_add_page' ); 
function medium_theme_options_add_page() {
	$medium_menu = medium_framework_menu_settings();
   	add_theme_page($medium_menu['page_title'],$medium_menu['menu_title'],$medium_menu['capability'],$medium_menu['menu_slug'],$medium_menu['callback']);
} 
function medium_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		$medium_image=get_template_directory_uri().'/theme-options/images/logo.png';		
?>

<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$medium_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$medium_image."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'medium' ) . "</h1>"; 
			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";
			
			?>
    </div>
  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-2-tab" class="nav-tab basicsettings-tab" title="Header Settings" href="#options-group-2">Header Settings</a></li>
            <li><a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="Footer Settings" href="#options-group-3">Footer Settings</a></li>            
          </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
        
          <?php settings_fields( 'medium_options' );  
		$medium_options = get_option( 'medium_theme_options' ); ?>
          
        
        <!-------------- Header group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">   
            <div class="section theme-tabs theme-logo">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Site Logo</a>
              <div class="faster-inner-tab-group active">
              	<div class="explain">Size of logo should be exactly 260x75px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="medium_theme_options[logo]" 
                            value="<?php if(!empty($medium_options['logo'])) { echo esc_url($medium_options['logo']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($medium_options['logo'])) { echo "<img src='".esc_url($medium_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
              
              
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="medium_theme_options[favicon]" 
                            value="<?php if(!empty($medium_options['favicon'])) { echo esc_url($medium_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($medium_options['favicon'])) { echo "<img src='".esc_url($medium_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
              
              <div class="section theme-tabs theme-search-text">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Search Text</a>
              <div class="faster-inner-tab-group">              	
                <div class="ft-control">
              		<div class="explain">Search text display in the search popup.</div>
                  	<input id="scmessage" name="medium_theme_options[search-text]" type="text" value="<?php if(!empty($medium_options['search-text'])) { echo wp_filter_nohtml_kses($medium_options['search-text']); } ?>" placeholder="i.e. Find Portfolio,Blog and contact" size="32" />
                </div>
                
              </div>
            </div>
              
              <div class="section theme-tabs theme-blog-title">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Blog Title</a>
              <div class="faster-inner-tab-group">              	
                <div class="ft-control">
              		<div class="explain">Blog title display in the blog page.</div>
                  	<input id="scmessage" name="medium_theme_options[blog-title]" type="text" value="<?php if(!empty($medium_options['blog-title'])) { echo wp_filter_nohtml_kses($medium_options['blog-title']); } ?>" placeholder="i.e. Blog" size="32" />
                </div>
                
              </div>
            </div>
          </div>
          
          <!-------------- Third group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs">            
            <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext2" class="of-input" name="medium_theme_options[footertext]" size="32"  value="<?php if(!empty($medium_options['footertext'])) { echo esc_attr($medium_options['footertext']); } ?>">
                </div>                
              </div>
            </div>
            
            <div id="section-social" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Social Media</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
              		<div class="explain">Social Media Message</div>
                  	<input id="scmessage" name="medium_theme_options[scmessage]" type="text" value="<?php if(!empty($medium_options['scmessage'])) { echo wp_filter_nohtml_kses($medium_options['scmessage']); } ?>" placeholder="i.e. Connect With Me" size="32" />
                </div>
              	<div class="ft-control">
              		<div class="explain">Facebook profile</div>                
                  	<input id="facebook" name="medium_theme_options[fburl]" type="text" value="<?php if(!empty($medium_options['fburl'])) { echo esc_url($medium_options['fburl']); } ?>" placeholder="i.e. http://facebook.com/username/ " size="32" />
                </div>
                <div class="ft-control">
              		<div class="explain">Twitter profile</div>                
                  	<input id="twitter" name="medium_theme_options[twitter]" type="text" value="<?php if(!empty($medium_options['twitter'])) { echo esc_url($medium_options['twitter']); } ?>" placeholder="i.e. http://www.twitter.com/username/" size="32" />
                </div>
                <div class="ft-control">
              		<div class="explain">Google Plus profile</div>                
                  	 <input id="googleplus" name="medium_theme_options[googleplus]" type="text" value="<?php if(!empty($medium_options['googleplus'])) { echo esc_url($medium_options['googleplus']); } ?>" placeholder="i.e. https://plus.google.com/username/" size="32" />
                </div>
                <div class="ft-control">
              		<div class="explain">Linkedin profile</div>                
                  	<input id="linkedin" name="medium_theme_options[linkedin]" type="text" value="<?php if(!empty($medium_options['linkedin'])) { echo esc_url($medium_options['linkedin']); } ?>" placeholder="http://www.linkedin.com/company/username" size="32" />
                </div>                
              </div>
            </div>
          </div>
          
          
          <!-------------- End group ----------------->         
          
        
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
<?php }

?>
