<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'multishop_theme_options','ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate($input)
{
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] ); 
	 
	 $input['img-section-1'] = esc_url_raw( $input['img-section-1']);
	 $input['text-section-1'] = wp_filter_nohtml_kses( $input['text-section-1']);
	 $input['discount-section-1'] = wp_filter_nohtml_kses( $input['discount-section-1']);
	 
	 $input['img-section-2'] = esc_url_raw( $input['img-section-2']);
	 $input['text-section-2'] = wp_filter_nohtml_kses( $input['text-section-2']);
	 $input['discount-section-2'] = wp_filter_nohtml_kses( $input['discount-section-2']);
	 
	 $input['img-section-3'] = esc_url_raw( $input['img-section-3']);
	 $input['text-section-3'] = wp_filter_nohtml_kses( $input['text-section-3']);
	 $input['discount-section-3'] = wp_filter_nohtml_kses( $input['discount-section-3']);

    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$multishop_menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
				'menu_title' => __('Theme Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $multishop_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$multishop_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($multishop_menu['page_title'],$multishop_menu['menu_title'],$multishop_menu['capability'],$multishop_menu['menu_slug'],$multishop_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;				
?>
<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$multishop_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$multishop_image."' alt='FasterThemes' /></a>";
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
            <li><a id="options-group-3-tab" class="nav-tab homepagesettings-tab" title="Homepage Settings" href="#options-group-3">Home Page Settings</a></li>
       
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'ft_options' );  
		$multishop_options = get_option( 'multishop_theme_options' ); ?>
     
          <!-------------- First group ----------------->
          <div id="options-group-1" class="group faster-inner-tabs">
          	<div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group active">
            	<div class="explain">Size of logo should be exactly 117x43px for best results. Leave blank to use text heading.</div>
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="multishop_theme_options[logo]" value="<?php if(!empty($multishop_options['logo'])) { echo esc_url($multishop_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($multishop_options['logo'])) { echo "<img src='".esc_url($multishop_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
                
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="multishop_theme_options[favicon]" 
                            value="<?php if(!empty($multishop_options['favicon'])) { echo esc_url($multishop_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($multishop_options['favicon'])) { echo "<img src='".esc_url($multishop_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
            <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext2" class="of-input" name="multishop_theme_options[footertext]" size="32"  value="<?php if(!empty($multishop_options['footertext'])) { echo esc_attr($multishop_options['footertext']); } ?>">
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
                  	<input id="facebook" class="of-input" name="multishop_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($multishop_options['fburl'])) { echo esc_url($multishop_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Twitter</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Twitter profile or page URL i.e. http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="multishop_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($multishop_options['twitter'])) { echo esc_url($multishop_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google Plus</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Google Plus profile or page URL i.e. https://plus.google.com/username/</div>                
                  	 <input id="googleplus" class="of-input" name="multishop_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($multishop_options['googleplus'])) { echo esc_url($multishop_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
          </div>   
          <!-------------- Third group ----------------->
	        <div id="options-group-3" class="group faster-inner-tabs">
          <!-- section-1 -->
          <div id="section-1" class="section section-text mini">
            <h4 class="heading">section-1</h4>
            <div class="option">
              <div class="controls">
                <input id="image_section1" class="upload" type="text" name="multishop_theme_options[img-section-1]" value="<?php if(!empty($multishop_options['img-section-1'])) { echo $multishop_options['img-section-1']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="image_section1">
                  <?php if(!empty($multishop_options['img-section-1'])) {  echo "<img src='".esc_url($multishop_options['img-section-1'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
           </div> 
          <div id="text_section1" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="text_section1" class="of-input" name="multishop_theme_options[text-section-1]" size="30" type="text" value="<?php if(!empty($multishop_options['text-section-1'])) { echo esc_attr($multishop_options['text-section-1']); } ?>" />
              </div>
            </div>
          </div>
          <div id="discount_section1" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="discount_section1" class="of-input" name="multishop_theme_options[discount-section-1]" size="30" type="text" value="<?php if(!empty($multishop_options['discount-section-1'])) { echo esc_attr($multishop_options['discount-section-1']); } ?>" />
              </div>
            </div>
          </div>
          <!-- section-2 -->
          <div id="section-2" class="section section-text mini">
            <h4 class="heading">section-2</h4>
            <div class="option">
              <div class="controls">
                <input id="image_section2" class="upload" type="text" name="multishop_theme_options[img-section-2]" value="<?php if(!empty($multishop_options['img-section-2'])) { echo $multishop_options['img-section-2']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="image_section2">
                  <?php if(!empty($multishop_options['img-section-2'])) {  echo "<img src='".esc_url($multishop_options['img-section-2'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
           </div> 
          <div id="text_section2" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="text_section2" class="of-input" name="multishop_theme_options[text-section-2]" size="30" type="text" value="<?php if(!empty($multishop_options['text-section-2'])) { echo esc_attr($multishop_options['text-section-2']); } ?>" />
              </div>
            </div>
          </div>
          <div id="discount_section2" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="discount_section2" class="of-input" name="multishop_theme_options[discount-section-2]" size="30" type="text" value="<?php if(!empty($multishop_options['discount-section-2'])) { echo esc_attr($multishop_options['discount-section-2']); } ?>" />
              </div>
            </div>
          </div>
          <!-- section-3 -->
          <div id="section-3" class="section section-text mini">
            <h4 class="heading">section-3</h4>
            <div class="option">
              <div class="controls">
                <input id="image_section3" class="upload" type="text" name="multishop_theme_options[img-section-3]" value="<?php if(!empty($multishop_options['img-section-3'])) { echo $multishop_options['img-section-3']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="image_section3">
                  <?php if(!empty($multishop_options['img-section-3'])) {  echo "<img src='".esc_url($multishop_options['img-section-3'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
           </div> 
          <div id="text_section3" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="text_section3" class="of-input" name="multishop_theme_options[text-section-3]" size="30" type="text" value="<?php if(!empty($multishop_options['text-section-3'])) { echo esc_attr($multishop_options['text-section-3']); } ?>" />
              </div>
            </div>
          </div>
          <div id="discount_section3" class="section section-text mini">
            <div class="option">
              <div class="controls">
                <input id="discount_section3" class="of-input" name="multishop_theme_options[discount-section-3]" size="30" type="text" value="<?php if(!empty($multishop_options['discount-section-3'])) { echo esc_attr($multishop_options['discount-section-3']); } ?>" />
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
  <p>Join our mailing list and we'll keep you updated on new themes as they're released and our exclusive special offers. <a href="http://fasterthemes.com/freethemesubscribers/" target="_blank">Click here to join</a></p>
  <!--End mc_embed_signup--> 
</div>
<?php } ?>