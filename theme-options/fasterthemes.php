<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'multishop_theme_options','ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate($input)
{
	 $input['logo'] = multishop_image_validation(esc_url_raw( $input['logo']));
	 $input['favicon'] = multishop_image_validation(esc_url_raw( $input['favicon']));
	 $input['footertext'] = sanitize_text_field( $input['footertext'] );
	 
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] ); 
	 
	 $input['img-section-1'] = multishop_image_validation(esc_url_raw( $input['img-section-1']));
	 $input['text-section-1'] = sanitize_text_field( $input['text-section-1']);
	 $input['discount-section-1'] = sanitize_text_field( $input['discount-section-1']);
	 
	 $input['img-section-2'] = multishop_image_validation(esc_url_raw( $input['img-section-2']));
	 $input['text-section-2'] = sanitize_text_field( $input['text-section-2']);
	 $input['discount-section-2'] = sanitize_text_field( $input['discount-section-2']);
	 
	 $input['img-section-3'] = multishop_image_validation(esc_url_raw( $input['img-section-3']));
	 $input['text-section-3'] = sanitize_text_field( $input['text-section-3']);
	 $input['discount-section-3'] = sanitize_text_field( $input['discount-section-3']);

    return $input;
}
function multishop_image_validation($multishop_imge_url){
	$multishop_filetype = wp_check_filetype($multishop_imge_url);
	$multishop_supported_image = array('gif','jpg','jpeg','png','ico');
	if (in_array($multishop_filetype['ext'], $multishop_supported_image)) {
		return $multishop_imge_url;
	} else {
	return '';
	}
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
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
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$multishop_image."' alt='".__('FasterThemes','multishop')."' /></a>";
		?>
    </div>
    <div class="header-right">
		<h1> <?php _e( 'Theme Options', 'multishop' ) ?> </h1>
		<div class='btn-save'><input type='submit' class='button-primary' value='<?php _e('Save Options','multishop'); ?>' /></div>
	</div>

  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1"><?php _e('Basic Settings','multishop'); ?></a></li>
  			<li><a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2"><?php _e('Social Settings','multishop'); ?></a></li>
            <li><a id="options-group-3-tab" class="nav-tab homepagesettings-tab" title="Homepage Settings" href="#options-group-3"><?php _e('Home Page Settings','multishop'); ?></a></li>
       
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
            <a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo  (Preferred size : 117px * 43px)','multishop'); ?></a>
            <div class="faster-inner-tab-group active">
            	<div class="explain"><?php _e('Size of logo should be exactly 117x43px for best results. Leave blank to use text heading.','multishop'); ?>;</div>
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="multishop_theme_options[logo]" value="<?php if(!empty($multishop_options['logo'])) { echo esc_url($multishop_options['logo']); } ?>" placeholder="<?php _e('No file chosen','multishop'); ?>" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','multishop'); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($multishop_options['logo'])) { echo "<img src='".esc_url($multishop_options['logo'])."' /><a class='remove-image'></a>"; } ?>
                </div>
                
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Favicon (Preferred size : 32px * 32px)','multishop'); ?></a>
              <div class="faster-inner-tab-group">
              	<div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results.','multishop'); ?></div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="multishop_theme_options[favicon]" 
                            value="<?php if(!empty($multishop_options['favicon'])) { echo esc_url($multishop_options['favicon']); } ?>" placeholder="<?php _e('No file chosen','multishop'); ?>" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="<?php _e('Upload','multishop'); ?>" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($multishop_options['favicon'])) { echo "<img src='".esc_url($multishop_options['favicon'])."' /><a class='remove-image'></a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
            <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text','multishop'); ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','multishop'); ?></div>                
                  	<input type="text" id="footertext2" class="of-input" name="multishop_theme_options[footertext]" size="32"  value="<?php if(!empty($multishop_options['footertext'])) { echo esc_attr($multishop_options['footertext']); } ?>">
                </div>                
              </div>
            </div>            
          </div>             
          <!-------------- Second group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Facebook','multishop'); ?></a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Facebook profile or page URL i.e.','multishop'); ?> http://facebook.com/username/ </div>                
                  	<input id="facebook" class="of-input" name="multishop_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($multishop_options['fburl'])) { echo esc_url($multishop_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Twitter','multishop'); ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Twitter profile or page URL i.e.','multishop'); ?> http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="multishop_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($multishop_options['twitter'])) { echo esc_url($multishop_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Google Plus','multishop'); ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Google Plus profile or page URL i.e.','multishop'); ?> https://plus.google.com/username/</div>                
                  	 <input id="googleplus" class="of-input" name="multishop_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($multishop_options['googleplus'])) { echo esc_url($multishop_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
          </div>   
          <!-------------- Third group ----------------->
	        <div id="options-group-3" class="group faster-inner-tabs">
          <!-- section-1 -->
          <div id="section-1" class="section section-text mini">
            <h4 class="heading">
				<?php _e('section-1  (Preferred size : 200px * 200px)','multishop'); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="image_section1" class="upload" type="text" name="multishop_theme_options[img-section-1]" value="<?php if(!empty($multishop_options['img-section-1'])) { echo $multishop_options['img-section-1']; } ?>" placeholder="<?php _e('No file chosen','multishop'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','multishop'); ?>" />
                <div class="screenshot" id="image_section1">
                  <?php if(!empty($multishop_options['img-section-1'])) {  echo "<img src='".esc_url($multishop_options['img-section-1'])."' /><a class='remove-image'></a>"; } ?>
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
            <h4 class="heading">
				
				<?php _e('section-2 (Preferred size : 200px * 200px)','multishop'); ?>
				
				</h4>
            <div class="option">
              <div class="controls">
                <input id="image_section2" class="upload" type="text" name="multishop_theme_options[img-section-2]" value="<?php if(!empty($multishop_options['img-section-2'])) { echo $multishop_options['img-section-2']; } ?>" placeholder="<?php _e('No file chosen','multishop'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','multishop'); ?>" />
                <div class="screenshot" id="image_section2">
                  <?php if(!empty($multishop_options['img-section-2'])) {  echo "<img src='".esc_url($multishop_options['img-section-2'])."' /><a class='remove-image'></a>"; } ?>
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
            <h4 class="heading">
				
				<?php _e('section-3 (Preferred size : 200px * 200px)','multishop'); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="image_section3" class="upload" type="text" name="multishop_theme_options[img-section-3]" value="<?php if(!empty($multishop_options['img-section-3'])) { echo $multishop_options['img-section-3']; } ?>" placeholder="<?php _e('No file chosen','multishop'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','multishop'); ?>" />
                <div class="screenshot" id="image_section3">
                  <?php if(!empty($multishop_options['img-section-3'])) {  echo "<img src='".esc_url($multishop_options['img-section-3'])."' /><a class='remove-image'></a>"; } ?>
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
            <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save Options','multishop'); ?>" /></li>
        </ul>
    </div>
    </form>    
</div>
<div class="save-options"><h2><?php _e('Options saved successfully.','multishop'); ?></h2></div>
<div class="newsletter"> 
  <h1><?php _e('Subscribe with us','multishop'); ?></h1>
  <p><?php _e("Join our mailing list and we'll keep you updated on new themes as they're released and our exclusive special offers.","multishop"); ?> <a href="http://fasterthemes.com/freethemesubscribers/" target="_blank"><?php _e('Click here to join','multishop'); ?></a></p>
</div>
<?php } ?>
