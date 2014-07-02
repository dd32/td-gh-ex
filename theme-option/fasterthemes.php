<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 $input['email'] = wp_filter_nohtml_kses( $input['email'] );
	 $input['phone'] = wp_filter_nohtml_kses( $input['phone'] );
	 $input['home-title'] = wp_filter_nohtml_kses( $input['home-title'] );
	 $input['home-content'] = wp_filter_nohtml_kses( $input['home-content'] );
	 $input['post-title'] = wp_filter_nohtml_kses( $input['post-title'] );
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['dribbble'] = esc_url_raw( $input['dribbble'] );
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );
	 $input['rss'] = esc_url_raw( $input['rss'] );
	 
	 for($generator_i=1; $generator_i <=5 ;$generator_i++ ):
	 $input['slider-img-'.$generator_i] = esc_url_raw( $input['slider-img-'.$generator_i] );
	 $input['slidelink-'.$generator_i] = esc_url_raw( $input['slidelink-'.$generator_i]);
	 endfor;
	 
	 for($generator_section_i=1; $generator_section_i <=4 ;$generator_section_i++ ):
	 $input['home-icon-'.$generator_section_i] = esc_url_raw( $input['home-icon-'.$generator_section_i]);
	 $input['section-title-'.$generator_section_i] = wp_filter_nohtml_kses($input['section-title-'.$generator_section_i]);
	 $input['section-content-'.$generator_section_i] = wp_filter_nohtml_kses($input['section-content-'.$generator_section_i]);
	 endfor;
	 
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-option/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );

	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery' ) );		
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$generator_menu = array(
				'page_title' => __( 'Faster Themes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $generator_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$generator_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($generator_menu['page_title'],$generator_menu['menu_title'],$generator_menu['capability'],$generator_menu['menu_slug'],$generator_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$generator_image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$generator_image."' height='64px'  /> ". __( 'Faster Themes Options', 'customtheme' ) . "</h1>"; 
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
		$generator_options = get_option( 'faster_theme_options' ); ?>
        
        <!-------------- first group ----------------->
        
        <div id="options-group-1" class="group socialsettings">
          <h3>Basic Settings</h3>
          <div id="logo" class="section section-text mini">
            <h4 class="heading">Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo-image" class="upload" type="text" name="faster_theme_options[logo]" value="<?php if(!empty($generator_options['logo'])) { echo $generator_options['logo']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-img">
                  <?php if(!empty($generator_options['logo'])) {  echo "<img src='".$generator_options['logo']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="favicon" class="section section-text mini">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="favicon-image" class="upload" type="text" name="faster_theme_options[favicon]" value="<?php if(!empty($generator_options['favicon'])) { echo $generator_options['favicon']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="favicon-img">
                  <?php if(!empty($generator_options['favicon'])) {  echo "<img src='".$generator_options['favicon']."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($generator_options['footertext'])) { echo $generator_options['footertext']; } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
          <div id="section-email" class="section section-textarea">
            <h4 class="heading">Email</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="email" class="of-input" name="faster_theme_options[email]" size="32"  value="<?php if(!empty($generator_options['email'])) { echo $generator_options['email']; } ?>">
              </div>
              <div class="explain">Enter e-mail id for your site , you would like to display in the Top Header.</div>
            </div>
          </div>
          <div id="section-phone" class="section section-textarea">
            <h4 class="heading">Phone</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="phone" class="of-input" name="faster_theme_options[phone]" size="32"  value="<?php if(!empty($generator_options['phone'])) { echo $generator_options['phone']; } ?>">
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
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($generator_options['twitter'])) { echo $generator_options['twitter']; } ?>" />
              </div>
              <div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Facebook</h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($generator_options['fburl'])) { echo $generator_options['fburl']; } ?>" />
              </div>
              <div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>
            </div>
          </div>
          <div id="section-dribbble" class="section section-text mini">
            <h4 class="heading">Dribbble</h4>
            <div class="option">
              <div class="controls">
                <input id="dribbble" class="of-input" name="faster_theme_options[dribbble]" type="text" size="30" value="<?php if(!empty($generator_options['dribbble'])) { echo $generator_options['dribbble']; } ?>" />
              </div>
              <div class="explain">dribbble profile or page URL i.e. https://dribbble.com/username/</div>
            </div>
          </div>
          <div id="section-linkedin" class="section section-text mini">
            <h4 class="heading">Linkedin</h4>
            <div class="option">
              <div class="controls">
                <input id="linkedin" class="of-input" name="faster_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($generator_options['linkedin'])) { echo $generator_options['linkedin']; } ?>" />
              </div>
              <div class="explain">Linkedin profile or page URL i.e. https://linkedin.com/username/</div>
            </div>
          </div>
          <div id="section-rss" class="section section-text mini">
            <h4 class="heading">RSS</h4>
            <div class="option">
              <div class="controls">
                <input id="rss" class="of-input" name="faster_theme_options[rss]" type="text" size="30" value="<?php if(!empty($generator_options['rss'])) { echo $generator_options['rss']; } ?>" />
              </div>
              <div class="explain">RSS profile or page URL i.e. https://www.rss.com/username/</div>
            </div>
          </div>
        </div>
        
        <!-------------- Third group ----------------->
        
        <div id="options-group-3" class="group homesettings">
          <h3>Banner Slider</h3>
          <?php for($generator_i=1; $generator_i <=5 ;$generator_i++ ):?>
          <div id="section-slider-upload" class="section section-text">
            <h4 class="heading"></h4>
            <div class="option">
              <div class="controls">
                <input id="slider-img-<?php echo $generator_i;?>" class="upload" type="text" name="faster_theme_options[slider-img-<?php echo $generator_i;?>]" 
                            value="<?php if(!empty($generator_options['slider-img-'.$generator_i])) echo $generator_options['slider-img-'.$generator_i]; ?>" placeholder="No file chosen" />
                <input id="slider" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="slider-image">
                  <?php if(!empty($generator_options['slider-img-'.$generator_i])) echo "<img src='".$generator_options['slider-img-'.$generator_i]."' /><a class='remove-image'>Remove</a>"; ?>
                </div>
              </div>
              <div class="explain"></div>
            </div>
          </div>
          <div id="section-link" class="section section-text mini">
            <h4 class="heading">Slide<?php echo $generator_i; ?> Link</h4>
            <div class="option">
              <div class="controls">
                <input id="slidelink-<?php echo $generator_i; ?>" class="of-input" name="faster_theme_options[slidelink-<?php echo $generator_i; ?>]" type="text" size="30" value="<?php if(!empty($generator_options['slidelink-'.$generator_i])) { echo $generator_options['slidelink-'.$generator_i]; } ?>" />
              </div>
              <div class="explain"></div>
            </div>
          </div>
          <?php endfor; ?>
          <h3>Title Bar</h3>
          <div id="section-title" class="section section-textarea">
            <h4 class="heading">Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="title" class="of-input" name="faster_theme_options[home-title]" size="32"  value="<?php if(!empty($generator_options['home-title'])) { echo $generator_options['home-title']; } ?>">
              </div>
              <div class="explain">Enter home page title for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          <div id="section-content" class="section section-textarea">
            <h4 class="heading">Short Description</h4>
            <div class="option">
              <div class="controls">
                <textarea id="home-content" class="of-input" name="faster_theme_options[home-content]" size="32"><?php if(!empty($generator_options['home-content'])) { echo $generator_options['home-content']; } ?>
</textarea>
              </div>
              <div class="explain">Enter home content for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          <h3>First Section</h3>
          <?php for($generator_section_i=1; $generator_section_i <=4 ;$generator_section_i++ ): ?>
          <div id="first-section-<?php echo $generator_section_i; ?>" class="section section-text mini">
            <h4 class="heading">Icon <?php echo $generator_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <input id="first-image-<?php echo $generator_section_i; ?>" class="upload" type="text" name="faster_theme_options[home-icon-<?php echo $generator_section_i; ?>]" value="<?php if(!empty($generator_options['home-icon-'.$generator_section_i])) { echo $generator_options['home-icon-'.$generator_section_i]; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button_<?php echo $generator_section_i; ?>" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="first-img-<?php echo $generator_section_i; ?>">
                  <?php if(!empty($generator_options['home-icon-'.$generator_section_i])) {  echo "<img src='".$generator_options['home-icon-'.$generator_section_i]."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          <div id="section-title-<?php echo $generator_section_i; ?>" class="section section-textarea">
            <h4 class="heading">Title <?php echo $generator_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="title-<?php echo $generator_section_i; ?>" class="of-input" name="faster_theme_options[section-title-<?php echo $generator_section_i; ?>]" size="32"  value="<?php if(!empty($generator_options['section-title-'.$generator_section_i])) { echo $generator_options['section-title-'.$generator_section_i]; } ?>">
              </div>
              <div class="explain">Enter <?php echo $generator_section_i; ?> secion title for your home template , you would like to display in the Home Page.</div>
            </div>
          </div>
          <div id="section-content-<?php echo $generator_section_i; ?>" class="section section-textarea">
            <h4 class="heading">Content <?php echo $generator_section_i; ?></h4>
            <div class="option">
              <div class="controls">
                <textarea id="content-<?php echo $generator_section_i; ?>" class="of-input" name="faster_theme_options[section-content-<?php echo $generator_section_i; ?>]" size="32"><?php if(!empty($generator_options['section-content-'.$generator_section_i])) { echo $generator_options['section-content-'.$generator_section_i]; } ?>
</textarea>
              </div>
              <div class="explain">Enter <?php echo $generator_section_i; ?> section content for home template , you would like to display in the Home Page.</div>
            </div>
          </div>
          <?php endfor; ?>
          <h3>Second Section</h3>
          <div id="section-post" class="section section-textarea">
            <h4 class="heading">Recent Post Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="post" class="of-input" name="faster_theme_options[post-title]" size="32"  value="<?php if(!empty($generator_options['post-title'])) { echo $generator_options['post-title']; } ?>">
              </div>
              <div class="explain">Enter recent post title for your site , you would like to display in the Home Page.</div>
            </div>
          </div>
          <div id="section-category" class="section section-textarea">
            <h4 class="heading">Category</h4>
            <div class="option">
              <div class="controls">
                <select name="faster_theme_options[post-category]" id="category">
                  <option value=""><?php echo esc_attr(__('Select Category','generator')); ?></option>
                  <?php 
				 $generator_args = array(
				  'orderby' => 'name',
				  'parent' => 0
				  );
                  $generator_categories = get_categories($generator_args); 
                  foreach ($generator_categories as $generator_category) {
					  if($generator_category->term_id == $generator_options['post-category'])
					  	$generator_selected="selected=selected";
					  else
					  	$generator_selected='';
                    $generator_option = '<option value="'.$generator_category->term_id .'" '.$generator_selected.'>';
                    $generator_option .= $generator_category->cat_name;
                    $generator_option .= '</option>';
                    echo $generator_option;
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
  </div>
</div>
<?php }
