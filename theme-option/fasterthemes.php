<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'medics_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 $input['email'] = is_email( $input['email'] );
	 $input['phone'] = wp_filter_nohtml_kses( $input['phone'] );
	 $input['home-title'] = wp_filter_nohtml_kses( $input['home-title'] );
	 $input['home-content'] = wp_filter_nohtml_kses( $input['home-content'] );
	 $input['homeblogtitle'] = wp_filter_nohtml_kses( $input['homeblogtitle'] );
     $input['home-download-text'] = wp_filter_nohtml_kses( $input['home-download-text'] );
	 $input['home-download-link'] = esc_url_raw( $input['home-download-link'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	 
		 
	 for($medics_section_i=1; $medics_section_i <=3 ;$medics_section_i++ ):
	 $input['home-icon-'.$medics_section_i] = esc_url_raw( $input['home-icon-'.$medics_section_i]);
	 $input['section-title-'.$medics_section_i] = wp_filter_nohtml_kses($input['section-title-'.$medics_section_i]);
	 $input['section-content-'.$medics_section_i] = wp_filter_nohtml_kses($input['section-content-'.$medics_section_i]);
	 endfor;
	 
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery') );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery') );			
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$medics_menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $medics_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$medics_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($medics_menu['page_title'],$medics_menu['menu_title'],$medics_menu['capability'],$medics_menu['menu_slug'],$medics_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		

		$medics_image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$medics_image."' height='64px'  /> ". __( 'FasterThemes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>

<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab socialsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a> <a id="options-group-2-tab" class="nav-tab thirdsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a> <a id="options-group-3-tab" class="nav-tab thirdsettings-tab" title="Home page slider images" href="#options-group-3">Home Page Settings</a> </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$medics_options = get_option( 'medics_theme_options' ); ?>
        
        <!-------------- first group ----------------->
        
        <div id="options-group-1" class="group socialsettings">
          <h3>Basic Settings</h3>
          <div id="logo" class="section section-text mini">
            <h4 class="heading">Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo-image" class="upload" type="text" name="medics_theme_options[logo]" value="<?php if(!empty($medics_options['logo'])) { echo $medics_options['logo']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-img">
                  <?php if(!empty($medics_options['logo'])) {  echo "<img src='".$medics_options['logo']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="favicon" class="section section-text mini">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="favicon-image" class="upload" type="text" name="medics_theme_options[favicon]" value="<?php if(!empty($medics_options['favicon'])) { echo $medics_options['favicon']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="favicon-img">
                  <?php if(!empty($medics_options['favicon'])) {  echo "<img src='".$medics_options['favicon']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="medics_theme_options[footertext]" size="32"  value="<?php if(!empty($medics_options['footertext'])) { echo $medics_options['footertext']; } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
          <div id="section-email" class="section section-textarea">
            <h4 class="heading">Email</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="email" class="of-input" name="medics_theme_options[email]" size="32"  value="<?php if(!empty($medics_options['email'])) { echo $medics_options['email']; } ?>">
              </div>
              <div class="explain">Enter e-mail id for your site , you would like to display in the Top Header.</div>
            </div>
          </div>
          <div id="section-phone" class="section section-textarea">
            <h4 class="heading">Phone</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="phone" class="of-input" name="medics_theme_options[phone]" size="32"  value="<?php if(!empty($medics_options['phone'])) { echo $medics_options['phone']; } ?>">
              </div>
              <div class="explain">Enter phone number for your site , you would like to display in the Top Header.</div>
            </div>
          </div>
        </div>
        
        <!-------------- second group ----------------->
        
        <div id="options-group-2" class="group socialsettings">
          <h3>Social Settings </h3>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Twitter</h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="medics_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($medics_options['twitter'])) { echo $medics_options['twitter']; } ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Facebook</h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="medics_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($medics_options['fburl'])) { echo $medics_options['fburl']; } ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          
          
          <div id="section-googleplus" class="section section-text mini">
            <h4 class="heading">Google plus</h4>
            <div class="option">
              <div class="controls">
                <input id="googleplus" class="of-input" name="medics_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($medics_options['googleplus'])) { echo $medics_options['googleplus']; } ?>" />
              </div>
              <div class="explain">Google plus profile or page URL i.e. https://www.googleplus.com/username/</div>
            </div>
          </div>
        </div>
        
        <!-------------- Third group ----------------->
        
        <div id="options-group-3" class="group homesettings">
        	          
          <h3>Title Bar</h3>
          <div id="section-title" class="section section-textarea">
            <h4 class="heading">Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="title" class="of-input" name="medics_theme_options[home-title]" size="32"  value="<?php if(!empty($medics_options['home-title'])) { echo $medics_options['home-title']; } ?>">
              </div>
              <div class="explain">Enter home page title for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          <div id="section-content" class="section section-textarea">
            <h4 class="heading">Short Description</h4>
            <div class="option">
              <div class="controls">
                <textarea id="home-content" class="of-input" name="medics_theme_options[home-content]" size="32"><?php if(!empty($medics_options['home-content'])) { echo $medics_options['home-content']; } ?>
</textarea>
              </div>
              <div class="explain">Enter home content for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          <h3>First Section</h3>
          <?php for($medics_section_i=1; $medics_section_i <=3 ;$medics_section_i++ ): ?>
          <div id="first-section-<?php echo $medics_section_i; ?>" class="section section-text mini">
            <h4 class="heading">Icon <?php echo $medics_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <input id="first-image-<?php echo $medics_section_i; ?>" class="upload" type="text" name="medics_theme_options[home-icon-<?php echo $medics_section_i; ?>]" value="<?php if(!empty($medics_options['home-icon-'.$medics_section_i])) { echo $medics_options['home-icon-'.$medics_section_i]; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button_<?php echo $medics_section_i; ?>" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="first-img-<?php echo $medics_section_i; ?>">
                  <?php if(!empty($medics_options['home-icon-'.$medics_section_i])) {  echo "<img src='".$medics_options['home-icon-'.$medics_section_i]."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-title-<?php echo $medics_section_i; ?>" class="section section-textarea">
            <h4 class="heading">Title <?php echo $medics_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="title-<?php echo $medics_section_i; ?>" class="of-input" name="medics_theme_options[section-title-<?php echo $medics_section_i; ?>]" size="32"  value="<?php if(!empty($medics_options['section-title-'.$medics_section_i])) { echo $medics_options['section-title-'.$medics_section_i]; } ?>">
              </div>
              <div class="explain">Enter <?php echo $medics_section_i; ?> secion title for your home template , you would like to display in the Home Page.</div>
            </div>
          </div>
          <div id="section-content-<?php echo $medics_section_i; ?>" class="section section-textarea">
            <h4 class="heading">Content <?php echo $medics_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <textarea id="content-<?php echo $medics_section_i; ?>" class="of-input" name="medics_theme_options[section-content-<?php echo $medics_section_i; ?>]" size="32"><?php if(!empty($medics_options['section-content-'.$medics_section_i])) { echo $medics_options['section-content-'.$medics_section_i]; } ?>
</textarea>
              </div>
              <div class="explain">Enter <?php echo $medics_section_i; ?> section content for home template , you would like to display in the Home Page.</div>
            </div>
          </div>
          <?php endfor; ?>
          
          <div id="section-content" class="section section-textarea">
            <h4 class="heading">Home Download Text</h4>
            <div class="option">
              <div class="controls">
                <textarea id="home-download-text" class="of-input" name="medics_theme_options[home-download-text]" size="32"><?php if(!empty($medics_options['home-download-text'])) { echo $medics_options['home-download-text']; } ?>
</textarea>
              </div>
              <div class="explain">Enter Download Link for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          
          <div id="section-link" class="section section-text mini">
            <h4 class="heading">Home Download Link</h4>
            <div class="option">
              <div class="controls">
                <input id="home-download-link" class="of-input" name="medics_theme_options[home-download-link]" type="text" size="30" value="<?php if(!empty($medics_options['home-download-link'])) { echo $medics_options['home-download-link']; } ?>" />
              </div>
              <div class="explain"></div>
            </div>
          </div>
         
          <div id="section-phone" class="section section-textarea">
            <h4 class="heading">Home Blog Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="homeblogtitle" class="of-input" name="medics_theme_options[homeblogtitle]" size="32"  value="<?php if(!empty($medics_options['homeblogtitle'])) { echo $medics_options['homeblogtitle']; } ?>">
              </div>
              <div class="explain">Enter From the Blog for your site , you would like to display in Home page.</div>
            </div>
          </div>
          <div id="section-category" class="section section-textarea">
            <h4 class="heading">Category</h4>
            <div class="option">
              <div class="controls">
                <select name="medics_theme_options[post-category]" id="category">
                  <option value=""><?php echo esc_attr(__('Select Category','medics')); ?></option>
                  <?php 
				 $medics_args = array(
				  'orderby' => 'name',
				  'parent' => 0
				  );
                  $medics_categories = get_categories($medics_args); 
                  foreach ($medics_categories as $medics_category) {
					  if($medics_category->term_id == $medics_options['post-category'])
					  	$medics_selected="selected=selected";
					  else
					  	$medics_selected='';
                    $medics_option = '<option value="'.$medics_category->term_id .'" '.$medics_selected.'>';
                    $medics_option .= $medics_category->cat_name;
                    $medics_option .= '</option>';
                    echo $medics_option;
                  }
                 ?>
                </select>
              </div>
              <div class="explain"></div>
            </div>
          </div>  	
        </div>
        
        <!-------------- End group ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite"> <span>&copy; <a href="http://fasterthemes.com/" target="_blank">fasterthemes.com</a></span> <span class="fb"> <a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span>
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
                <label for="mce-EMAIL">Email addresss  <span class="asterisk">*</span>
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