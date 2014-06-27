<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	$input['headingtext'] = wp_filter_nohtml_kses( $input['headingtext'] );

	 for($customizable_k=1; $customizable_k <= 5 ;$customizable_k++ ):
	 	$input['slider-img-'.$customizable_k] = esc_url_raw( $input['slider-img-'.$customizable_k] );
	 	$input['slidelink-'.$customizable_k] = esc_url_raw( $input['slidelink-'.$customizable_k] );
	 endfor;

	 for($customizable_l=1; $customizable_l <= 3 ;$customizable_l++ ):
	 	$input['section-icon-'.$customizable_l] = esc_url_raw( $input['section-icon-'.$customizable_l] );
	 	$input['sectiontitle'.$customizable_l] = wp_filter_nohtml_kses( $input['sectiontitle-'.$customizable_l] );
	 	$input['sectiondesc-'.$customizable_l] = wp_filter_nohtml_kses( $input['sectiondesc-'.$customizable_l] );
	 endfor;

	$input['post-title'] = wp_filter_nohtml_kses( $input['post-title'] );
	$input['downloadcaption'] = wp_filter_nohtml_kses( $input['downloadcaption'] );
	$input['downloadlink'] = wp_filter_nohtml_kses( $input['downloadlink'] );
    return $input;
}
add_action( 'admin_init', 'fasterthemes_options_init' );
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	wp_enqueue_style( 'wp-color-picker', get_template_directory_uri(). '/theme-options/css/color-picker.min.css' );
	wp_enqueue_style( 'wp-color-picker' );
	
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'wp-color-picker', get_template_directory_uri(). '/theme-options/js/color-picker.min.js', array( 'jquery', 'iris' ) );
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery','wp-color-picker' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery', 'iris' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$customizable_menu = array(
				'page_title' => __( 'Faster Themes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $customizable_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$customizable_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($customizable_menu['page_title'],$customizable_menu['menu_title'],$customizable_menu['capability'],$customizable_menu['menu_slug'],$customizable_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		screen_icon(); 
		$customizable_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<h1><img src='".$customizable_image."' height='64px'  /> ". __( 'Faster Themes Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>

<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> 
  <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a> 
  <a id="options-group-2-tab" class="nav-tab thirdsettings-tab" title="Home page settings" href="#options-group-2">Home Page Settings</a>  
  </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$customizable_options = get_option( 'faster_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
          <h3>Basic Settings</h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Site Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[logo]" 
                            value="<?php if(!empty($customizable_options['logo'])) echo $customizable_options['logo']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($customizable_options['logo'])) echo "<img src='".$customizable_options['logo']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Size of logo should be exactly 360x125px for best results. Leave blank to use text heading.</div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[favicon]" 
                            value="<?php if(!empty($customizable_options['favicon'])) echo $customizable_options['favicon']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($customizable_options['favicon'])) echo "<img src='".$customizable_options['favicon']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
            </div>
          </div>
          <div id="section-headingtext" class="section section-textarea">
            <h4 class="heading">Home page heading Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="headingtext" class="of-input" name="faster_theme_options[headingtext]" size="32"  value="<?php if(!empty($customizable_options['headingtext'])) echo $customizable_options['headingtext']; ?>">
              </div>
              <div class="explain">Some text regarding default home page title.</div>
            </div>
          </div>
          <div id="section-footertext" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($customizable_options['footertext'])) echo $customizable_options['footertext']; ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
        </div>
        
        <!-------------- Second group ----------------->
 
        
        <div id="options-group-2" class="group homesettings">
          <h3>Home page slider images</h3>
           <?php for($customizable_i=1; $customizable_i <= 5 ;$customizable_i++ ):?> 
           <div id="section-slider-upload" class="section section-text">
            <h4 class="heading">Slide<?php echo $customizable_i; ?></h4>

          
            <div class="option">
              <div class="controls">
                <input id="slider-img-<?php echo $customizable_i;?>" class="upload" type="text" name="faster_theme_options[slider-img-<?php echo $customizable_i;?>]" 
                            value="<?php if(!empty($customizable_options['slider-img-'.$customizable_i])) echo $customizable_options['slider-img-'.$customizable_i]; ?>" placeholder="No file chosen" />
                <input id="slider" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="slider-image">
                  <?php if(!empty($customizable_options['slider-img-'.$customizable_i])) echo "<img src='".$customizable_options['slider-img-'.$customizable_i]."' /><a class='remove-image'>Remove</a>"; ?>
                </div>
               
              </div>
              <div class="explain"></div>
            </div>
            
          </div>
          
          <div id="section-link" class="section section-text mini">
            <h4 class="heading">Slide<?php echo $customizable_i; ?> Link</h4>
            <div class="option">
              <div class="controls">
                <input id="slidelink-<?php echo $customizable_i; ?>" class="of-input" name="faster_theme_options[slidelink-<?php echo $customizable_i; ?>]" type="text" size="30" value="<?php if(!empty($customizable_options['slidelink-'.$customizable_i])) { echo $customizable_options['slidelink-'.$customizable_i]; } ?>" />
              </div>
              <div class="explain"></div>
            </div>
          </div>
          
		  <?php endfor; ?>
		<h3>Section Settings</h3>
		<div id="section-sectionhead" class="section section-text mini">
            <h4 class="heading">Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="sectionhead" class="of-input" name="faster_theme_options[sectionhead]" size="32"  value="<?php if(!empty($customizable_options['sectionhead'])) { echo $customizable_options['sectionhead']; } ?>">
              </div>
              <div class="explain"></div>
            </div>
          </div>        
		<?php for($customizable_j=1; $customizable_j <= 3 ;$customizable_j++ ):?> 
        <div id="section-slider-upload" class="section section-text">
        <h4 class="heading">Section <?php echo $customizable_j; ?></h4>
        
        
        <div class="option">
          <div class="controls">
            <input id="section-icon-<?php echo $customizable_j;?>" class="upload" type="text" name="faster_theme_options[section-icon-<?php echo $customizable_j;?>]" 
                        value="<?php if(!empty($customizable_options['section-icon-'.$customizable_j])) echo $customizable_options['section-icon-'.$customizable_j]; ?>" placeholder="No file chosen" />
            <input id="icon" class="upload-button button" type="button" value="Upload" />
            <div class="screenshot" id="slider-image">
              <?php if(!empty($customizable_options['section-icon-'.$customizable_j])) echo "<img src='".$customizable_options['section-icon-'.$customizable_j]."' /><a class='remove-image'>Remove</a>"; ?>
            </div>
           
          </div>
          <div class="explain"></div>
        </div>
        
        </div>
        
        <div id="section-title" class="section section-text mini">
        <div class="option">
          <div class="controls">
            <input id="sectiontitle-<?php echo $customizable_j; ?>" class="of-input" name="faster_theme_options[sectiontitle-<?php echo $customizable_j; ?>]" type="text" size="30" value="<?php if(!empty($customizable_options['sectiontitle-'.$customizable_j])) { echo $customizable_options['sectiontitle-'.$customizable_j]; } ?>"  placeholder="Section Title" />
          </div>
          <div class="explain"></div>
        </div>
        </div>
		<div id="section-desc" class="section section-textarea">
        <div class="option">
          <div class="controls">
          <textarea name="faster_theme_options[sectiondesc-<?php echo $customizable_j; ?>]" id="sectiondesc-<?php echo $customizable_j; ?>" class="of-input" placeholder="Section Description" rows="5" ><?php if(!empty($customizable_options['sectiondesc-'.$customizable_j])) { echo $customizable_options['sectiondesc-'.$customizable_j]; } ?></textarea>
          </div>
          <div class="explain"></div>
        </div>
        </div>          
		  <?php endfor; ?>
		<h3>Recent Post Settings</h3>
          <div id="section-post" class="section section-text mini">
            <h4 class="heading">Recent Post Title</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="post" class="of-input" name="faster_theme_options[post-title]" size="32"  value="<?php if(!empty($customizable_options['post-title'])) { echo $customizable_options['post-title']; } ?>">
              </div>
              <div class="explain">Enter recent post title for your site , you would like to display in the Home Page.</div>
            </div>
          </div>

          <div id="section-category" class="section section-textarea">
            <h4 class="heading">Category</h4>
            <div class="option">
              <div class="controls">
               <select name="faster_theme_options[post-category]" id="category"> 
                 <option value=""><?php echo esc_attr(__('Select Category','customizable')); ?></option> 
                 <?php 
				 $customizable_args = array(
				  'orderby' => 'name',
				  'parent' => 0
				  );
                  $customizable_categories = get_categories($customizable_args); 
                  foreach ($customizable_categories as $customizable_category) {
					  if($customizable_category->term_id == $customizable_options['post-category'])
					  	$customizable_selected="selected=selected";
					  else
					  	$customizable_selected='';
                    $customizable_option = '<option value="'.$customizable_category->term_id .'" '.$customizable_selected.'>';
                    $customizable_option .= $customizable_category->cat_name;
                    $customizable_option .= '</option>';
                    echo $customizable_option;
                  }
                 ?>
                </select>
              </div>
              <div class="explain"></div>
            </div>
          </div>

		<h3>Download Settings</h3>
       <div id="section-caption" class="section section-textarea">
       <h4 class="heading">Download Caption</h4>
        <div class="option">
          <div class="controls">
          <textarea name="faster_theme_options[downloadcaption]" id="downloadcaption" class="of-input" rows="5" placeholder="Caption" ><?php if(!empty($customizable_options['downloadcaption'])) { echo $customizable_options['downloadcaption']; } ?></textarea>
          </div>
          <div class="explain"></div>
        </div>
        </div>
          
          <div id="section-downloadlink" class="section section-textarea">
            <h4 class="heading">Download Link</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="downloadlink" class="of-input" name="faster_theme_options[downloadlink]" size="32" placeholder="Download Link"  value="<?php if(!empty($customizable_options['downloadlink'])) { echo $customizable_options['downloadlink']; } ?>">
              </div>
              <div class="explain"></div>
            </div>
          </div>


        </div>
        
        <!-------------- End group ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite"> <span>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></span> <span class="fb"> <a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a> </span>
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


