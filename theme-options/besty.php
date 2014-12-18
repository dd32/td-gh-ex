<?php
function besty_options_init(){
 register_setting( 'theme_options', 'besty_theme_options', 'besty_options_validate');
} 
add_action( 'admin_init', 'besty_options_init' );
function besty_options_validate( $input ) {
 
	 $input['logo'] = besty_image_validation(esc_url_raw( $input['logo']));
	 $input['favicon'] = besty_image_validation(esc_url_raw( $input['favicon']));	 
	 $input['footertext'] = sanitize_text_field( $input['footertext'] );	
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );	 
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	 	 	 
	 $input['welcome-title'] = sanitize_text_field($input['welcome-title']);	
	 $input['welcome-img'] = besty_image_validation(esc_url_raw( $input['welcome-img']));	 
	 $input['welcome_details'] = wp_kses_post($input['welcome_details']);

    return $input;
}
 function besty_image_validation($besty_imge_url){
$besty_filetype = wp_check_filetype($besty_imge_url);

$besty_supported_image = array('gif','jpg','jpeg','png','ico');

if (in_array($besty_filetype['ext'], $besty_supported_image)) {
return $besty_imge_url;
} else {
return '';
}
}
function besty_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'besty-framework', get_template_directory_uri(). '/theme-options/css/besty_framework.css' ,false, '1.0.0');	

	// Enqueue custom option panel JS
	wp_enqueue_script( 'besty-options-custom', get_template_directory_uri(). '/theme-options/js/besty-custom.js', array('jquery'), '20120106', true );
	wp_enqueue_script( 'besty-media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery'), '20120206', true  );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'besty_framework_load_scripts' );

function besty_framework_menu_settings() {
	$besty_menu = array(
				'page_title' => __( 'Besty Options', 'besty'),
				'menu_title' => __('Theme Options', 'besty'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'besty_framework',
				'callback' => 'besty_framework_page'
				);
	return apply_filters( 'besty_framework_menu', $besty_menu );
}
add_action( 'admin_menu', 'besty_options_add_page' ); 
function besty_options_add_page() {
	$besty_menu = besty_framework_menu_settings();
   	add_theme_page($besty_menu['page_title'],$besty_menu['menu_title'],$besty_menu['capability'],$besty_menu['menu_slug'],$besty_menu['callback']);
} 
function besty_framework_page(){ 
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
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".esc_url($besty_image)."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
			<h1> <?php _e( 'Theme Options', 'besty' ) ?> </h1>
			<div class='btn-save'><input type='submit' class='button-primary' value='<?php _e('Save Options','besty') ?>' /></div>
    </div>
  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('Basic Settings','besty') ?>" href="#options-group-1"><?php _e('Basic Settings','besty') ?></a></li>
            <li><a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="<?php _e('Social Settings','besty') ?>" href="#options-group-2"><?php _e('Social Settings','besty') ?></a></li>
            <li><a id="options-group-3-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings','besty') ?>" href="#options-group-3"><?php _e('Home Page Settings','besty') ?></a></li>
            <li><a id="options-group-4-tab" class="nav-tab profeatures-tab" title="Pro Settings" href="#options-group-4"><?php _e('PRO Theme Features','besty') ?></a></li>
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
            <a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo','besty') ?></a>
            <div class="faster-inner-tab-group active">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="besty_theme_options[logo]" value="<?php if(!empty($besty_options['logo'])) { echo esc_url($besty_options['logo']); } ?>" placeholder="<?php _e('No file chosen','besty') ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($besty_options['logo'])) { echo "<img src='".esc_url($besty_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Favicon','besty') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results.','besty') ?></div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="besty_theme_options[favicon]" 
                            value="<?php if(!empty($besty_options['favicon'])) { echo esc_url($besty_options['favicon']); } ?>" placeholder="<?php _e('No file chosen','besty') ?>" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($besty_options['favicon'])) { echo "<img src='".esc_url($besty_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>     
            <div id="section-footertext" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text','besty') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','besty') ?></div>                
                  	<input type="text" id="footertext" class="of-input" name="besty_theme_options[footertext]" size="32"  value="<?php if(!empty($besty_options['footertext'])) { echo esc_attr($besty_options['footertext']); } ?>">
                </div>                
              </div>
            </div>
            
          </div>
          <!-------------- Social group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Facebook','besty') ?></a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Facebook profile or page URL i.e.','besty') ?> http://facebook.com/username/ </div>                
                  	<input id="facebook" class="of-input" name="besty_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($besty_options['fburl'])) { echo esc_url($besty_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Twitter','besty') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Twitter profile or page URL i.e.','besty') ?> http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="besty_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($besty_options['twitter'])) { echo esc_url($besty_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
			<div id="section-linkedin" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Linkedin','besty') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Linkedin profile or page URL i.e.','besty') ?> https://linkedin.com/username/</div>                
                  	 <input id="linkedin" class="of-input" name="besty_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($besty_options['linkedin'])) { echo esc_url($besty_options['linkedin']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google+<?php _e('Save Options','besty') ?></a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Googleplus profile or page URL i.e.','besty') ?> https://plus.google.com/username/</div>                
                  	<input id="googleplus" class="of-input" name="besty_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($besty_options['googleplus'])) { echo esc_url($besty_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
          </div>            
          <!-------------- Home Page group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs">
		   <div id="section-welcome-title" class="section theme-tabs">
			<a class="heading faster-inner-tab active" href="javascript:void(0)"><?php _e('Welcome Title','besty') ?></a>
		  <div class="faster-inner-tab-group active">
			<div class="ft-control">
				<div class="explain"><?php _e('Enter recent welcome title for your site , you would like to display in the Home Page.','besty') ?></div><input type="text" id="welcome-title" class="of-input" name="besty_theme_options[welcome-title]" size="32" value="<?php if(!empty($besty_options['welcome-title'])) { echo esc_attr($besty_options['welcome-title']); } ?>">
			</div>                
		  </div>
		</div>
          <div class="section theme-tabs theme-welcome-img">
            <a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Welcome Image','besty') ?></a>
            <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <input id="welcome-img-img" class="upload" type="text" name="besty_theme_options[welcome-img]" value="<?php if(!empty($besty_options['welcome-img'])) { echo esc_url($besty_options['welcome-img']); } ?>" placeholder="<?php _e('No file chosen','besty') ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="welcome-img-image">
                  <?php if(!empty($besty_options['welcome-img'])) { echo "<img src='".esc_url($besty_options['welcome-img'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-welcome-details" class="section theme-tabs section-textarea">
			<a class="heading faster-inner-tab" href="javascript:void(0)"><?php _e('Welcome Details','besty') ?></a>
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
          
          <!-------------- fourth group ----------------->
          <div id="options-group-4" class="group faster-inner-tabs fasterthemes-pro-image">
          	<div class="fasterthemes-pro-header">
              <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/theme-logo.png" class="fasterthemes-pro-logo" />
              <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=besty" target="_blank" class="fasterthemes-pro-buynow"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro-featured.png" />
          </div>
          
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="fasterthemes-footer">
      	<ul>
            <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save options', 'besty') ?>" /></li>
        </ul>
    </div>
    </form>    
</div>
<div class="save-options"><h2><?php _e('Options saved successfully.','besty'); ?></h2></div>
<?php } ?>
