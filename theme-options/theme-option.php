<?php
function deserve_options_init(){
 register_setting( 'deserve_options', 'deserve_theme_options','deserve_options_validate');
} 
add_action( 'admin_init', 'deserve_options_init' );
function deserve_options_validate($input)
{
	 $input['logo'] = deserve_image_validation(esc_url_raw( $input['logo']));
	
	
	 $input['footertext'] = sanitize_text_field( $input['footertext'] );
	 $input['email'] = sanitize_email( $input['email'] );
	 $input['phone'] = sanitize_text_field( $input['phone'] );
	 $input['home-title'] = sanitize_text_field( $input['home-title'] );
	 $input['home-content'] = sanitize_text_field( $input['home-content'] );
	 $input['post-title'] = sanitize_text_field( $input['post-title'] );
	 
	 $input['shome-title'] = sanitize_text_field( $input['shome-title'] );
	 $input['shome-content'] = sanitize_text_field( $input['shome-content'] );
	 
	 
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['gplus'] = esc_url_raw( $input['gplus'] );
	 $input['skype'] = esc_url_raw( $input['skype'] );

	 
	 for($deserve_i=1; $deserve_i <=5 ;$deserve_i++ ):
	 $input['slider-img-'.$deserve_i] = deserve_image_validation(esc_url_raw( $input['slider-img-'.$deserve_i] ));
	 $input['slidercontent-'.$deserve_i] = sanitize_text_field( $input['slidercontent-'.$deserve_i]);
	 endfor;
	 
	 for($deserve_section_i=1; $deserve_section_i <=4 ;$deserve_section_i++ ):
	 $input['home-icon-'.$deserve_section_i] = esc_url_raw( $input['home-icon-'.$deserve_section_i]);
	 $input['section-title-'.$deserve_section_i] = sanitize_text_field($input['section-title-'.$deserve_section_i]);
	 $input['section-content-'.$deserve_section_i] = sanitize_text_field($input['section-content-'.$deserve_section_i]);
	 endfor;
    return $input;
}

 function deserve_image_validation($deserve_imge_url)
 {
		$deserve_filetype = wp_check_filetype($deserve_imge_url);

		$deserve_supported_image = array('gif','jpg','jpeg','png','ico');

		if (in_array($deserve_filetype['ext'], $deserve_supported_image))
		 {
			return $deserve_imge_url;
		 }	   
		else 
		{
			return '';
		}
}
function deserve_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'deserve_framework', get_template_directory_uri(). '/theme-options/css/theme-option_framework.css' ,false, '1.0.0');	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/theme-option-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
}
add_action( 'admin_enqueue_scripts', 'deserve_framework_load_scripts' );
function deserve_framework_menu_settings() {
	$deserve_menu = array(
				'page_title' => __( 'Deserve Options', 'deserve_framework'),
				'menu_title' => __('Theme Options', 'deserve_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'deserve_framework',
				'callback' => 'deserve_framework_page'
				);
	return apply_filters( 'deserve_framework_menu', $deserve_menu );
}
add_action( 'admin_menu', 'deserve_options_add_page' ); 
function deserve_options_add_page() {
	$deserve_menu = deserve_framework_menu_settings();
   	add_theme_page($deserve_menu['page_title'],$deserve_menu['menu_title'],$deserve_menu['capability'],$deserve_menu['menu_slug'],$deserve_menu['callback']);
} 
function deserve_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		

?>
<div class="theme-option-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="theme-option-header">
    <div class="logo">
      <?php
		$deserve_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fruitthemes.com' target='_blank'><img src='".$deserve_image."' alt='fruitthemes' /></a>";
		?>
    </div>
    <div class="header-right">
     
	
						
			<div class='btn-save'><input type='submit' class='button-primary' value='<?php _e('Save Options','deserve'); ?>' /></div>			
			
    </div>
  </div>
  <div class="theme-option-details">
    <div class="theme-option-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
			 <div class="option-title">
            <h2><?php _e('Theme Options','deserve'); ?> </h2>
          </div>
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('Basic Settings','deserve'); ?>" href="#options-group-1"><?php _e('Basic Settings','deserve'); ?></a></li>
            <li><a id="options-group-2-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings','deserve'); ?>" href="#options-group-2"><?php _e('Home Page Settings','deserve'); ?></a></li>
            <li><a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="<?php _e('Social Settings','deserve'); ?>" href="#options-group-3"><?php _e('Social Settings','deserve'); ?></a></li>
           
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'deserve_options' );  
		$deserve_options = get_option( 'deserve_theme_options' );
		 ?>
        
            <!-------------- Header group ----------------->
          <div id="options-group-1" class="group theme-option-inner-tabs">   
                 
          	<div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo (Recommended Size : 169px * 40px)','deserve'); ?></a>
            <div class="theme-option-inner-tab-group active">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="deserve_theme_options[logo]" 
                            value="<?php if(!empty($deserve_options['logo'])) { echo esc_url($deserve_options['logo']); } ?>" placeholder="<?php _e('No file chosen','deserve'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'deserve' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($deserve_options['logo'])) { echo "<img src='".esc_url($deserve_options['logo'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
              
            </div>
          </div>
          
   
            <div id="section-footertext" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','deserve'); ?></div>                
                  	<input type="text" id="footertext" class="of-input" name="deserve_theme_options[footertext]" size="32"  value="<?php if(!empty($deserve_options['footertext'])) { echo esc_attr($deserve_options['footertext']); } ?>">
                </div>                
              </div>
            </div>

            <div id="section-email" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Email','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Enter e-mail id for your site , you would like to display in the top header.','deserve'); ?></div>                
                  	<input type="text" id="email" class="of-input" name="deserve_theme_options[email]" size="32"  value="<?php if(!empty($deserve_options['email'])) { echo esc_attr($deserve_options['email']); } ?>">
                </div>                
              </div>
            </div>

            <div id="section-phone" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Phone','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Enter phone number for your site , you would like to display in the top header.','deserve'); ?></div>                
                  	<input type="text" id="phone" class="of-input" name="deserve_theme_options[phone]" size="32"  value="<?php if(!empty($deserve_options['phone'])) { echo esc_attr($deserve_options['phone']); } ?>">
                </div>                
              </div>
            </div>
                        
          </div>          
          <!-------------- Home Page group ----------------->
          <div id="options-group-2" class="group theme-option-inner-tabs">
          <h3><?php _e('Banner Slider','deserve'); ?></h3>
			<?php for($deserve_i=1; $deserve_i <=5 ;$deserve_i++ ):?> 
            <div class="section theme-tabs theme-slider-img">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Slider','deserve'); ?><?php echo $deserve_i;?><?php  _e(' (Recommended Size : 1350px * 350px)','deserve');?></a>
            <div class="theme-option-inner-tab-group">
                <div class="ft-control">
                <input id="slider-img-<?php echo $deserve_i;?>" class="upload" type="text" name="deserve_theme_options[slider-img-<?php echo $deserve_i;?>]" 
                            value="<?php if(!empty($deserve_options['slider-img-'.$deserve_i])) { echo esc_url($deserve_options['slider-img-'.$deserve_i]); } ?>" placeholder="<?php _e('No file chosen','deserve'); ?>" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'deserve' ); ?>" />
                <div class="screenshot" id="slider-img-<?php echo $deserve_i;?>">
                  <?php if(!empty($deserve_options['slider-img-'.$deserve_i])) { echo "<img src='".esc_url($deserve_options['slider-img-'.$deserve_i])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
            
                <div class="ft-control">
                    <input type="text" placeholder="<?php _e('Slide','deserve'); ?><?php echo $deserve_i; ?> <?php _e('Content','deserve'); ?>" id="slidercontent-<?php echo $deserve_i;?>" class="of-input" name="deserve_theme_options[slidercontent-<?php echo $deserve_i;?>]" size="32"  value="<?php if(!empty($deserve_options['slidercontent-'.$deserve_i])) { echo esc_attr($deserve_options['slidercontent-'.$deserve_i]); } ?>">
              </div>
                              
            </div>
            
            </div>
            <?php endfor; ?>
            <h3><?php _e('First Section Title Bar','deserve'); ?></h3>
            <div id="section-title" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Title','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Enter home page title for your site , you would like to display in the home page.','deserve'); ?></div>                
                  	<input id="title" class="of-input" name="deserve_theme_options[home-title]" type="text" maxlength="40" size="40" value="<?php if(!empty($deserve_options['home-title'])) { echo esc_attr($deserve_options['home-title']); } ?>" />
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-short_description">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Short Description','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                <div class="explain"><?php _e('Enter home content for your site , you would like to display in the home page.','deserve'); ?></div>
              <textarea name="deserve_theme_options[home-content]" rows="3" id="home-content1" maxlength="130" class="of-input"><?php if(!empty($deserve_options['home-content'])) { echo $deserve_options['home-content']; } ?></textarea>
                </div>                
              </div>
            </div>
			<h3><?php _e('First Section','deserve'); ?></h3>
          <?php for($deserve_section_i=1; $deserve_section_i <=3 ;$deserve_section_i++ ): ?>
            <div class="section theme-tabs theme-slider-img">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Tab','deserve'); ?><?php echo $deserve_section_i; ?><?php  _e(' (Recommended Size : 94px * 93px)','deserve');?></a>
            <div class="theme-option-inner-tab-group">
                <div class="ft-control">
                <input id="first-image-<?php echo $deserve_section_i;?>" class="upload" type="text" name="deserve_theme_options[home-icon-<?php echo $deserve_section_i;?>]" 
                            value="<?php if(!empty($deserve_options['home-icon-'.$deserve_section_i])) { echo esc_url($deserve_options['home-icon-'.$deserve_section_i]); } ?>" placeholder="<?php _e('No file chosen','deserve'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'deserve' ); ?>" />
                <div class="screenshot" id="first-img-<?php echo $deserve_section_i;?>">
                  <?php if(!empty($deserve_options['home-icon-'.$deserve_section_i])) { echo "<img src='".esc_url($deserve_options['home-icon-'.$deserve_section_i])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
            
                <div class="ft-control">
                <div class="explain"><?php _e('Enter section title for your home template , you would like to display in the home page.','deserve'); ?></div>
                    <input type="text" placeholder="<?php _e('Enter title here','deserve'); ?>"  maxlength="25" id="title-<?php echo $deserve_section_i;?>" class="of-input" name="deserve_theme_options[section-title-<?php echo $deserve_section_i;?>]" size="32"  value="<?php if(!empty($deserve_options['section-title-'.$deserve_section_i])) { echo esc_attr($deserve_options['section-title-'.$deserve_section_i]); } ?>">
              </div>
				<div class="ft-control">
                 <div class="explain"><?php _e('Enter section content for home template , you would like to display in the home page.','deserve'); ?></div>
              <textarea maxlength="110" name="deserve_theme_options[section-content-<?php echo $deserve_section_i; ?>]" rows="3" id="content-<?php echo $deserve_section_i; ?>" placeholder="<?php _e('Enter Content here','deserve'); ?>" class="of-input"><?php if(!empty($deserve_options['section-content-'.$deserve_section_i])) { echo $deserve_options['section-content-'.$deserve_section_i]; } ?></textarea>
              
              </div>                              
            </div>
            
            </div>
            <?php endfor; ?>
                 <h3><?php _e('Second Section Title Bar','deserve'); ?></h3>
            <div id="section-title" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Title','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Enter home page title for your site , you would like to display in the Home Page.','deserve'); ?></div>                
                  	<input id="stitle" class="of-input" name="deserve_theme_options[shome-title]" type="text"  maxlength="40" size="40" value="<?php if(!empty($deserve_options['shome-title'])) { echo esc_attr($deserve_options['shome-title']); } ?>" />
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-short_description">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Short Description','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                <div class="explain"><?php _e('Enter home content for your site , you would like to display in the Home Page.','deserve'); ?></div>
              <textarea  maxlength="130" name="deserve_theme_options[shome-content]" rows="3" id="shome-content1" class="of-input"><?php if(!empty($deserve_options['shome-content'])) { echo $deserve_options['shome-content']; } ?></textarea>
                </div>                
              </div>
            </div>
            
          
          
          
          </div>    
          <!-------------- Social group ----------------->
          <div id="options-group-3" class="group theme-option-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Facebook','deserve'); ?></a>
              <div class="theme-option-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Facebook profile or page URL i.e.','deserve'); ?> http://facebook.com/username/</div>                
                  	<input id="facebook" class="of-input" name="deserve_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($deserve_options['fburl'])) { echo esc_url($deserve_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Twitter','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Twitter profile or page URL i.e.','deserve'); ?>http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="deserve_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($deserve_options['twitter'])) { echo esc_url($deserve_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-gplus" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Google+','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('gplus profile or page URL i.e.','deserve'); ?>https://plus.google.com/username/</div>                
                  	 <input id="gplus" class="of-input" name="deserve_theme_options[gplus]" type="text" size="30" value="<?php if(!empty($deserve_options['gplus'])) { echo esc_url($deserve_options['gplus']); } ?>" />
                </div>                
              </div>
            </div>

			<div id="section-skype" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Skype','deserve'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('skype profile or page URL i.e.','deserve'); ?>https://www.skype.com/username/</div>                
                  	 <input id="skype" class="of-input" name="deserve_theme_options[skype]" type="text" size="30" value="<?php if(!empty($deserve_options['skype'])) { echo esc_url($deserve_options['skype']); } ?>" />
                </div>                
              </div>
            </div>
            
            
          </div>
          <!-------------- Social group ----------------->          
         
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="theme-option-footer">
      	<ul>
            <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save Options','deserve'); ?>" /></li>
        </ul>
    </div>
    </form>    
</div>


<?php } ?>
