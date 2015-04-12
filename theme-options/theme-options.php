<?php
function avocation_options_init(){
 register_setting( 'avocation_option', 'avocation_theme_options','avocation_option_validate');
} 
add_action( 'admin_init', 'avocation_options_init' );
function avocation_option_validate($input)
{
	 $input['logo'] = avocation_image_validation(esc_url_raw( $input['logo'] ));
	 $input['favicon'] = avocation_image_validation(esc_url_raw( $input['favicon'] ));
	 $input['footertext'] = sanitize_text_field( $input['footertext'] );
	 $input['blogtitle'] = sanitize_text_field( $input['blogtitle'] );
	 $input['breadcrumbsbg-bg'] = avocation_image_validation(esc_url_raw( $input['breadcrumbsbg-bg'] ));
	  $input['footerbg-bg'] = avocation_image_validation(esc_url_raw( $input['footerbg-bg'] ));
	 
	 
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['rss'] = esc_url_raw( $input['rss'] );	
	 $input['youtube'] = esc_url_raw( $input['youtube'] ); 
	  $input['pinterest'] = esc_url_raw( $input['pinterest'] ); 
	 $input['headertop-bg'] = avocation_image_validation(esc_url_raw( $input['headertop-bg'] ));
	
	 
	  for($avocation_i=1; $avocation_i <=5 ;$avocation_i++ ):
	 $input['slider-img-'.$avocation_i] = avocation_image_validation(esc_url_raw( $input['slider-img-'.$avocation_i] ));
	 $input['slider-title-'.$avocation_i] = sanitize_text_field( $input['slider-title-'.$avocation_i]);
	 $input['slidercontent-'.$avocation_i] = sanitize_text_field( $input['slidercontent-'.$avocation_i]);
	 $input['home-button-title-'.$avocation_i] = sanitize_text_field( $input['home-button-title-'.$avocation_i]);
	 $input['home-button-link-'.$avocation_i] = esc_url_raw( $input['home-button-link-'.$avocation_i]);
	 endfor;
	 
	 $input['home-title'] = sanitize_text_field( $input['home-title'] );
	 $input['home-sub-title'] = sanitize_text_field( $input['home-sub-title'] );
	 $input['purposebg-bg'] = avocation_image_validation(esc_url_raw( $input['purposebg-bg'] ));
	 for($avocation_l=1; $avocation_l <= 3 ;$avocation_l++ ):
	 	$input['section-icon-'.$avocation_l] = sanitize_text_field( $input['section-icon-'.$avocation_l] );
	 	$input['sectiontitle-'.$avocation_l] = sanitize_text_field( $input['sectiontitle-'.$avocation_l] );
	 	$input['sectiondesc-'.$avocation_l] = sanitize_text_field( $input['sectiondesc-'.$avocation_l] );
	 	$input['sectionurl-'.$avocation_l] = esc_url_raw( $input['sectionurl-'.$avocation_l] );
	 endfor;

	  $input['home-button-link'] = esc_url_raw( $input['home-button-link'] );
	  $input['home-blog-title'] = sanitize_text_field( $input['home-blog-title'] );
	  $input['home-blog-sub-title'] = sanitize_text_field( $input['home-blog-sub-title'] );
	  
	  $input['contact-info-title'] = sanitize_text_field( $input['contact-info-title'] );
	  $input['contact-info'] = sanitize_text_field( $input['contact-info'] );
	  $input['contact-telephone'] = wp_filter_nohtml_kses( $input['contact-telephone'] );
	
	  $input['contact-email'] = sanitize_email( $input['contact-email'] );
	  $input['contact-web'] = esc_url_raw( $input['contact-web'] );
	  $input['contact-code'] = sanitize_text_field( $input['contact-code'] );
	   $input['contact-code'] = sanitize_text_field( $input['contact-code'] );
		
    return $input;
}
function avocation_image_validation($avocation_imge_url){
	$avocation_filetype = wp_check_filetype($avocation_imge_url);
	$avocation_supported_image = array('gif','jpg','jpeg','png','ico');
	if (in_array($avocation_filetype['ext'], $avocation_supported_image)) {
		return $avocation_imge_url;
	} else {
	return '';
	}
}
function avocation_framework_load_scripts($hook){
	  if($GLOBALS['avocation_menu'] == $hook){ 
	wp_enqueue_media();
	wp_enqueue_style( 'avocation_themeoptions_framework', get_template_directory_uri(). '/theme-options/css/avocation_themeoptions_framework.css' ,false, '1.0.0');	
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/avocation-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
}
}

function avocation_framework_menu_settings() {
	$avocation_menu = array(
				'page_title' => __( 'Theme Options', 'avocation_framework'),
				'menu_title' => __('Theme Options', 'avocation_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'avocation_framework',
				'callback' => 'avocation_framework_page'
				);
	return apply_filters( 'avocation_framework_menu', $avocation_menu );
}
add_action( 'admin_menu', 'avocation_options_add_page' ); 
function avocation_options_add_page() {
	$avocation_menu = avocation_framework_menu_settings();
   	$GLOBALS['avocation_menu']=add_theme_page($avocation_menu['page_title'],$avocation_menu['menu_title'],$avocation_menu['capability'],$avocation_menu['menu_slug'],$avocation_menu['callback']);
   	add_action( 'admin_enqueue_scripts', 'avocation_framework_load_scripts' );
} 
function avocation_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
?>
<div class="themeoption-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="themeoption-header">
    <div class="logo">
      <?php
		$avocation_image=get_template_directory_uri().'/theme-options/images/logo.png';
			echo "<a href='http://fruitthemes.com' target='_blank'><img src='".esc_url($avocation_image)."' alt='".__('FruitThemes','avocation')."'  /></a>";
		?>
    </div>
    <div class="header-right">
    	<div class='btn-save'><input type='submit' class='button-primary' value='<?php _e('Save Options','avocation'); ?>' />
	</div>
    </div>
  </div>
  <div class="themeoption-details">
    <div class="themeoption-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <div class="option-title">
            <h2><?php _e('Theme Options','avocation'); ?></h2>
          </div>  
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('Basic Settings','avocation');?>" href="#options-group-1"><?php _e('Basic Settings','avocation');?></a></li>
            <li><a id="options-group-2-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings','avocation');?>" href="#options-group-2"><?php _e('Home Page Settings','avocation');?></a></li>
            <li><a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="<?php _e('Social Settings','avocation');?>" href="#options-group-3"><?php _e('Social Settings','avocation');?></a></li>
             <li><a id="options-group-6-tab" class="nav-tab contactsettings-tab" title="<?php _e('Contact Us Settings','avocation');?>" href="#options-group-6"><?php _e('Contact Us Settings','avocation');?></a></li>
 		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'avocation_option' );  
			$avocation_options = get_option( 'avocation_theme_options' );
		 ?>
          <!-------------- Basic Settings group ----------------->
          <div id="options-group-1" class="group theme-option-inner-tabs">   
			<div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo (Recommended Size : 182px * 39px)','avocation'); ?></a>
            <div class="theme-option-inner-tab-group active">
				<div class="explain"><?php _e('Size of Logo should be exactly 182x39px for best results.','avocation'); ?></div>
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="avocation_theme_options[logo]" 
                            value="<?php if(!empty($avocation_options['logo'])) { echo esc_url_raw($avocation_options['logo']); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','avocation'); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($avocation_options['logo'])) { ?>
					  <img src="<?php echo esc_url($avocation_options['logo']) ?>" alt="<?php _e('logo','avocation'); ?>" />
					  <a class='remove-image'> </a>
				  <?php } ?>
                </div>
              </div>
            </div>
            </div>
              <?php /** new */?>	
	       <div id="breadcrumbsbg-bg" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Breadcrumbs Backgroung Image (Recommended Size : 1329px * 89px)','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              		<div class="ft-control">
                <input id="breadcrumbsbg-bg" class="upload" type="text" name="avocation_theme_options[breadcrumbsbg-bg]" 
                            value="<?php if(!empty($avocation_options['breadcrumbsbg-bg'])) { echo esc_url($avocation_options['breadcrumbsbg-bg']); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','avocation'); ?>" />
                <div class="screenshot" id="breadcrumbsbg-bg">
                  <?php if(!empty($avocation_options['breadcrumbsbg-bg'])) { echo "<img src='".esc_url($avocation_options['breadcrumbsbg-bg'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
              </div>
            </div>
	<?php /** end **/ ?>
	 <?php /** new for footer background*/?>	
	       <div id="footerbg-bg" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Footer Backgroung Image (Recommended Size : 1329px * 1035px)','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              		<div class="ft-control">
                <input id="footerbg-bg" class="upload" type="text" name="avocation_theme_options[footerbg-bg]" 
                            value="<?php if(!empty($avocation_options['footerbg-bg'])) { echo esc_url($avocation_options['footerbg-bg']); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','avocation'); ?>" />
                <div class="screenshot" id="footerbg-bg">
                  <?php if(!empty($avocation_options['footerbg-bg'])) { echo "<img src='".esc_url($avocation_options['footerbg-bg'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
              </div>
            </div>
	<?php /** end **/ ?>
	
            <div class="section theme-tabs theme-favicon">
              <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Favicon (Recommended Size : 32px * 32px)','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="explain"><?php _e('Size of favicon should be exactly 32x32px for best results.','avocation'); ?></div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="avocation_theme_options[favicon]" 
                            value="<?php if(!empty($avocation_options['favicon'])) { echo esc_url_raw($avocation_options['favicon']); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="<?php _e('Upload','avocation'); ?>" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($avocation_options['favicon'])) { ?>
						<img src="<?php echo esc_url($avocation_options['favicon']) ?>" alt="<?php _e('favicon','avocation'); ?>" />	<a class='remove-image'> </a>
					<?php } ?>
                  </div>
                </div>
              </div>
            </div>
           
             <div id="section-blogtitle" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Blog Title','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<input type="text" id="blogtitle" class="of-input" name="avocation_theme_options[blogtitle]" maxlength="30" size="32"  value="<?php if(!empty($avocation_options['blogtitle'])) { echo sanitize_text_field($avocation_options['blogtitle']); } ?>">
                </div>                
              </div>
            </div> 
            <div id="section-footertext" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','avocation'); ?></div>                
                  	<input type="text" id="footertext" class="of-input" maxlength="100" name="avocation_theme_options[footertext]" size="32"  value="<?php if(!empty($avocation_options['footertext'])) { echo sanitize_text_field($avocation_options['footertext']); } ?>">
                </div>                
              </div>
            </div> 
               
            </div>    
         
       
          <!-------------- Home Page Settings group ----------------->
          <div id="options-group-2" class="group theme-option-inner-tabs">
			   <h3><?php _e('Banner Slider','avocation'); ?></h3>
			<?php for($avocation_i=1; $avocation_i <=3 ;$avocation_i++ ):?> 
            <div class="section theme-tabs theme-slider-img">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Slider','avocation'); ?><?php echo $avocation_i;?><?php  _e(' (Recommended Size : 1350px * 667px)','avocation');?></a>
            <div class="theme-option-inner-tab-group">
                <div class="ft-control">
                <input id="slider-img-<?php echo $avocation_i;?>" class="upload" type="text" name="avocation_theme_options[slider-img-<?php echo $avocation_i;?>]" 
                            value="<?php if(!empty($avocation_options['slider-img-'.$avocation_i])) { echo esc_url($avocation_options['slider-img-'.$avocation_i]); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'avocation' ); ?>" />
                <div class="screenshot" id="slider-img-<?php echo $avocation_i;?>">
                  <?php if(!empty($avocation_options['slider-img-'.$avocation_i])) { echo "<img src='".esc_url($avocation_options['slider-img-'.$avocation_i])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
				<div class="ft-control">
                    <input type="text" placeholder="<?php _e('Slide Tiltle','avocation'); ?><?php echo $avocation_i; ?> <?php _e('Title','avocation'); ?>" id="slider-title-<?php echo $avocation_i;?>" class="of-input" name="avocation_theme_options[slider-title-<?php echo $avocation_i;?>]" size="32"  value="<?php if(!empty($avocation_options['slider-title-'.$avocation_i])) { echo esc_attr($avocation_options['slider-title-'.$avocation_i]); } ?>">
              </div>
              
            
                <div class="ft-control">
                    <input type="text" placeholder="<?php _e('Slide','avocation'); ?><?php echo $avocation_i; ?> <?php _e('Content','avocation'); ?>" id="slidercontent-<?php echo $avocation_i;?>" class="of-input" name="avocation_theme_options[slidercontent-<?php echo $avocation_i;?>]" size="32"  value="<?php if(!empty($avocation_options['slidercontent-'.$avocation_i])) { echo esc_attr($avocation_options['slidercontent-'.$avocation_i]); } ?>">
              </div>
					<div class="ft-control">	
					<input id="home-button-title-<?php echo $avocation_i;?>" class="of-input" maxlength="50" name="avocation_theme_options[home-button-title-<?php echo $avocation_i;?>]" type="text" size="46" value="<?php if(!empty($avocation_options['home-button-title-'.$avocation_i])) { echo esc_attr($avocation_options['home-button-title-'.$avocation_i]); } ?>"  placeholder="<?php _e('Button Title','avocation'); ?><?php echo $avocation_i; ?> <?php _e('Button Title','avocation'); ?>" />
				  </div>
					
					<div class="ft-control">	
					<input id="home-button-link-<?php echo $avocation_i;?>" class="of-input" name="avocation_theme_options[home-button-link-<?php echo $avocation_i;?>]" type="text" size="46" value="<?php if(!empty($avocation_options['home-button-link-'.$avocation_i])) { echo esc_attr($avocation_options['home-button-link-'.$avocation_i]); } ?>"  placeholder="<?php _e('Button Link','avocation'); ?><?php echo $avocation_i; ?> <?php _e('Button Link','avocation'); ?>" />
				  </div>
				  <div style="display: block;">
				<div class="ft-control">
					<input type="checkbox" id="avocation-remove-slider-url-<?php echo $avocation_i; ?>" name="avocation_theme_options[remove-slider-url-<?php echo $avocation_i;?>]" <?php if(!empty($avocation_options['remove-slider-url-'.$avocation_i])) { ?> checked="checked" <?php } ?> value="yes">
					<label class="remove-slider-class" for="avocation-remove-slider-url-<?php $avocation_i;?>"><?php _e('Check this if you  want to open in new tab.','avocation') ?></label>
               </div>
			   </div>
                              
            </div>
            
            </div>
            <?php endfor; ?>
		 <h3><?php _e('About Us Section','avocation'); ?></h3>		  
		 <div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('About Us Title Bar','avocation');?> </a>
               <div class="theme-option-inner-tab-group">
				  <div class="ft-control">
					<input id="home-title" class="of-input" name="avocation_theme_options[home-title]" type="text" maxlength="30" size="46" value="<?php if(!empty($avocation_options['home-title'])) { echo esc_attr($avocation_options['home-title']); } ?>"  placeholder="<?php _e('About Title ','avocation'); ?>" />
				  </div>
				  
				  <div class="ft-control">	
					<?php 				
						 $avocation_content = wpautop($avocation_options['homedesc']);
						 $avocation_editor_id = 'homedesc';
						 $avocation_settings = array(
								'textarea_name' => 'avocation_theme_options[homedesc]',
								'textarea_rows' => 20,
								'media_buttons' => false,
								);
						 wp_editor($avocation_content, $avocation_editor_id, $avocation_settings);
					 ?> 
                  </div>
                </div>
         </div>
	  <?php /** About Us... **/	 ?> 		
		 	 
		 <?php for($avocation_j=1; $avocation_j <= 4 ;$avocation_j++ ):?> 
           <div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Tab','avocation');?> <?php echo $avocation_j; ?></a>
               <div class="theme-option-inner-tab-group">
				  <div class="ft-control">
					  <div class="explain"><?php _e('You have to enter the class name like this way fa fa-icon','avocation');?> </div>
					<input id="section-icon-<?php echo $avocation_j; ?>" class="of-input" maxlength="30" name="avocation_theme_options[section-icon-<?php echo $avocation_j; ?>]" type="text" size="46" value="<?php if(!empty($avocation_options['section-icon-'.$avocation_j])) { echo  esc_attr($avocation_options['section-icon-'.$avocation_j]); } ?>"  placeholder="<?php _e('Section Icon','avocation'); ?>" />
					<span><?php _e('Font Awesome icon names','avocation'); ?> <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"><?php _e('[View all]','avocation'); ?></a></span>
				  </div>
				  <div class="ft-control">	
					<input id="sectiontitle-<?php echo $avocation_j; ?>" class="of-input" maxlength="50" name="avocation_theme_options[sectiontitle-<?php echo $avocation_j; ?>]" type="text" size="46" value="<?php if(!empty($avocation_options['sectiontitle-'.$avocation_j])) { echo esc_attr($avocation_options['sectiontitle-'.$avocation_j]); } ?>"  placeholder="<?php _e('Section Title','avocation'); ?>" />
				  </div>
				  <div class="ft-control">	
					<textarea name="avocation_theme_options[sectiondesc-<?php echo $avocation_j; ?>]" id="sectiondesc-<?php echo $avocation_j; ?>" class="of-input" placeholder="<?php _e('Section Description','avocation'); ?>" maxlength="150" rows="5" ><?php if(!empty($avocation_options['sectiondesc-'.$avocation_j])) { echo esc_textarea($avocation_options['sectiondesc-'.$avocation_j]); } ?></textarea>
                  </div>
                  <div class="ft-control">	
					<input id="sectionurl-<?php echo $avocation_j; ?>" class="of-input" maxlength="50" name="avocation_theme_options[sectionurl-<?php echo $avocation_j; ?>]" type="text" size="46" value="<?php if(!empty($avocation_options['sectionurl-'.$avocation_j])) { echo esc_attr($avocation_options['sectionurl-'.$avocation_j]); } ?>"  placeholder="<?php _e('Section Url','avocation'); ?>" />
				  </div>
				  
				<div style="display: block;">
				<div class="ft-control">
					<input type="checkbox" id="avocation-remove-url-<?php echo $avocation_j; ?>" name="avocation_theme_options[remove-url-<?php echo $avocation_j;?>]" <?php if(!empty($avocation_options['remove-url-'.$avocation_j])) { ?> checked="checked" <?php } ?> value="yes">
					<label class="remove-slider-class" for="avocation-remove-url-<?php $avocation_l;?>"><?php _e('Check this if you  want to open in new tab.','avocation') ?></label>
               </div>
			   </div>
			
              </div>
           </div>
         <?php endfor; ?>
         
		 <h3><?php _e('Purpose Business Section','avocation'); ?></h3>		  
		 <div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Purpose Business Title Bar','avocation');?> </a>
               <div class="theme-option-inner-tab-group">
				  <div class="ft-control">
					<input id="perfect-title" class="of-input" name="avocation_theme_options[perfect-title]" type="text" maxlength="50" size="46" value="<?php if(!empty($avocation_options['perfect-title'])) { echo esc_attr($avocation_options['perfect-title']); } ?>"  placeholder="<?php _e('Perfect Title ','avocation'); ?>" />
				  </div>
				  
				  <div class="ft-control">	
					<?php 				
						 $avocation_content = wpautop($avocation_options['perfectdesc']);
						 $avocation_editor_id = 'perfectdesc';
						 $avocation_settings = array(
								'textarea_name' => 'avocation_theme_options[perfectdesc]',
								'textarea_rows' => 20,
								'media_buttons' => false,
								);
						 wp_editor($avocation_content, $avocation_editor_id, $avocation_settings);
					 ?> 
                  </div>
                  <div class="ft-control">
					  <div class="explain"><?php _e('Here background image 1280 x 853 set in the purpose section ','avocation');?> </div>
                <input id="purposebg-bg" class="upload" type="text" name="avocation_theme_options[purposebg-bg]" 
                            value="<?php if(!empty($avocation_options['purposebg-bg'])) { echo esc_url($avocation_options['purposebg-bg']); } ?>" placeholder="<?php _e('No file chosen','avocation'); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','avocation'); ?>" />
                <div class="screenshot" id="purposebg-bg">
                  <?php if(!empty($avocation_options['purposebg-bg'])) { echo "<img src='".esc_url($avocation_options['purposebg-bg'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
                </div>
                
              	
         </div>
         
		 <h3><?php _e('Blog Section','avocation'); ?></h3>		  
		  <div class="section theme-tabs theme-logo">
            <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Blog Section','avocation');?> </a>
               <div class="theme-option-inner-tab-group">
				   <div class="ft-control">
					<input id="home-blog-title" class="of-input" name="avocation_theme_options[home-blog-title]" type="text" maxlength="30" size="46" value="<?php if(!empty($avocation_options['home-blog-title'])) { echo esc_attr($avocation_options['home-blog-title']); } ?>"  placeholder="<?php _e('Blog Title','avocation'); ?>" />
				  </div>		
				  <div class="ft-control">
					<textarea name="avocation_theme_options[home-blog-sub-title]" id="home-blog-sub-title" class="of-input" placeholder="<?php _e('Blog Sub Title','avocation'); ?>" maxlength="300" rows="5" ><?php if(!empty($avocation_options['home-blog-sub-title'])) { echo esc_textarea($avocation_options['home-blog-sub-title']); } ?></textarea>  
					
				  </div>
				  	<div class="ft-control">
                <select name="avocation_theme_options[post-category]" id="category">
                  <option value=""><?php echo esc_attr(__('Select Category','avocation')); ?></option>
                  <?php 
				$avocation_args = array(
				'meta_query' => array(
									array(
									'key' => '_thumbnail_id',
									'compare' => 'EXISTS'
										),
									)
								);  
				$avocation_post = new WP_Query( $avocation_args );
				$avocation_cat_id=array();
				while($avocation_post->have_posts()){
				$avocation_post->the_post();
				$avocation_post_categories = wp_get_post_categories( get_the_id());   
				$avocation_cat_id[]=$avocation_post_categories[0];
				}
				$avocation_cat_id=array_unique($avocation_cat_id);
				$avocation_args = array(
				'orderby' => 'name',
				'parent' => 0,
				'include'=>$avocation_cat_id
				);
				$avocation_categories = get_categories($avocation_args); 
                  foreach ($avocation_categories as $avocation_category) {
					  if($avocation_category->term_id == $avocation_options['post-category'])
					  	$avocation_selected="selected=selected";
					  else
					  	$avocation_selected='';
                    $avocation_option = '<option value="'.$avocation_category->term_id .'" '.$avocation_selected.'>';
                    $avocation_option .= $avocation_category->cat_name;
                    $avocation_option .= '</option>';
                    echo $avocation_option;
                  }
                 ?>
                </select>
                </div>   
				 
              </div>
         </div>
           </div>
          <!-------------- Social Settings group ----------------->
          <div id="options-group-3" class="group theme-option-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Facebook','avocation'); ?></a>
              <div class="theme-option-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Facebook profile or page URL ','avocation'); ?>i.e. http://facebook.com/username/ </div>      	<input id="facebook" class="of-input" name="avocation_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($avocation_options['fburl'])) { echo esc_url_raw($avocation_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Twitter','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Twitter profile or page URL ','avocation'); ?>i.e. http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="avocation_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($avocation_options['twitter'])) { echo esc_url_raw($avocation_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-youtube" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Youtube','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('youtube profile or page URL ','avocation'); ?>i.e. https://youtube.com/username/</div>                
                  	 <input id="youtube" class="of-input" name="avocation_theme_options[youtube]" type="text" size="30" value="<?php if(!empty($avocation_options['youtube'])) { echo esc_url_raw($avocation_options['youtube']); } ?>" />
                </div>                
              </div>
            </div>
			<div id="section-rss" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('RSS','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('RSS profile or page URL ','avocation'); ?>i.e. https://www.rss.com/username/</div>                
                  	<input id="rss" class="of-input" name="avocation_theme_options[rss]" type="text" size="30" value="<?php if(!empty($avocation_options['rss'])) { echo esc_url_raw($avocation_options['rss']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-pinterest" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Pinterest','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"><?php _e('Pinterest profile or page URL ','avocation'); ?>i.e. https://www.pinterest.com/username/</div>                
                  	<input id="pinterest" class="of-input" name="avocation_theme_options[pinterest]" type="text" size="30" value="<?php if(!empty($avocation_options['pinterest'])) { echo esc_url_raw($avocation_options['pinterest']); } ?>" />
                </div>                
              </div>
            </div>
          </div>
		  <!-------------- Contact page Settings group ----------------->
          <div id="options-group-6" class="group theme-option-inner-tabs">       
			<div id="section-contact-info-title" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Info Title','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<input type="text" id="contactinfotitle" class="of-input" name="avocation_theme_options[contact-info-title]" maxlength="30" size="32"  value="<?php if(!empty($avocation_options['contact-info-title'])) { echo sanitize_text_field($avocation_options['contact-info-title']); } ?>">
                </div>                
              </div>
            </div>
            <div id="section-contact-info" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Info','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<textarea name="avocation_theme_options[contact-info]" id="contact-info" class="of-input" placeholder="<?php _e('Description','avocation'); ?>" maxlength="200" rows="5" ><?php if(!empty($avocation_options['contact-info'])) { echo esc_textarea($avocation_options['contact-info']); } ?></textarea>
                </div>                
              </div>
            </div>
            <div id="section-contact-telephone" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Telephone','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<input type="text" id="contact-telephone" class="of-input" name="avocation_theme_options[contact-telephone]" maxlength="30" size="32"  value="<?php if(!empty($avocation_options['contact-telephone'])) { echo sanitize_text_field($avocation_options['contact-telephone']); } ?>">
                </div>                
              </div>
            </div>
           
            <div id="section-contact-email" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Email','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<input type="text" id="contact-fax" class="of-input" name="avocation_theme_options[contact-email]" maxlength="30" size="32"  value="<?php if(!empty($avocation_options['contact-email'])) { echo sanitize_text_field($avocation_options['contact-email']); } ?>">
                </div>                
              </div>
            </div>
            <div id="section-contact-web" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact web','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<input type="text" id="contactweb" class="of-input" name="avocation_theme_options[contact-web]" maxlength="30" size="32"  value="<?php if(!empty($avocation_options['contact-web'])) { echo esc_url_raw($avocation_options['contact-web']); } ?>">
                </div>                
              </div>
            </div>
            <div id="section-contact-address" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Address','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
              	<div class="ft-control">
                  	<textarea name="avocation_theme_options[contact-address]" id="contactaddress" class="of-input" placeholder="<?php _e('Contact Address','avocation'); ?>" maxlength="150" rows="5"><?php if(!empty($avocation_options['contact-address'])) { echo esc_textarea($avocation_options['contact-address']); } ?></textarea>
                </div>                
              </div>
            </div>
            <div id="section-contact-shortcode" class="section theme-tabs">
            	<a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Contact Short Code','avocation'); ?></a>
              <div class="theme-option-inner-tab-group">
				  <div class="explain"><?php _e('here you have to write the shortcode ','avocation'); ?>i.e. [contact-form-7 id="60" title="Contact form 1"]</div>
              	<div class="ft-control">
                  	<input name="avocation_theme_options[contact-code]" id="contactcode" class="of-input" placeholder="<?php _e('Shortcode','avocation'); ?>" size="40" maxlength="130" value="<?php if(!empty($avocation_options['contact-code'])) { echo esc_attr($avocation_options['contact-code']); } ?>"/>
                </div>                
              </div>
            </div>
        </div>   
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="themeoption-footer">
      	<ul>        	
            <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save Options','avocation');?>" /></li>
        </ul>
    </div>
    </form>    
</div>
<?php } ?>
