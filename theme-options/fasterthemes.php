<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'topmag_theme_options', 'ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate( $input ) {

	if(isset($_POST['breaking-news'])) { $input['breaking-news'] = wp_filter_nohtml_kses( $input['breaking-news'] ); }
	$input['breaking-news-category'] = wp_filter_nohtml_kses( $input['breaking-news-category'] );
 	$input['logo'] = esc_url_raw( $input['logo'] );
	if(isset($_POST['logo-tagline'])) { $input['logo-tagline'] = wp_filter_nohtml_kses( $input['logo-tagline'] ); }
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	
	$input['post-slider-category'] = wp_filter_nohtml_kses( $input['post-slider-category'] );
	$input['recent-post-number'] = wp_filter_nohtml_kses( $input['recent-post-number'] );
	$input['home-post-category'] = wp_filter_nohtml_kses( $input['home-post-category'] );
	$input['post-number'] = wp_filter_nohtml_kses( $input['post-number'] );	 
    return $input;
}
function fasterthemes_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'fasterthemes_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'fasterthemes_framework' );
	
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery' ) );		
}
add_action( 'admin_enqueue_scripts', 'fasterthemes_framework_load_scripts' );
function fasterthemes_framework_menu_settings() {
	$topmag_menu = array(
				'page_title' => __( 'FasterThemes Options', 'fastertheme_framework'),
				'menu_title' => __('FT Options', 'fastertheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $topmag_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$topmag_menu = fasterthemes_framework_menu_settings();
   	add_theme_page($topmag_menu['page_title'],$topmag_menu['menu_title'],$topmag_menu['capability'],$topmag_menu['menu_slug'],$topmag_menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		$topmag_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<h1><img src='".$topmag_image."' height='64px'  /> ". __( 'FasterThemes Options', 'customtheme' ) . "</h1>"; 
		
		echo '<div class="ft-options-saved"><img src="'.get_template_directory_uri().'/theme-options/images/options-saved.png"/></div>';
?>

<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper">
  	<a id="options-group-1-tab" class="nav-tab headersettings-tab" title="Header Settings" href="#options-group-1">Header Settings</a>
  	<a id="options-group-2-tab" class="nav-tab footersettings-tab" title="footer Settings" href="#options-group-2">Footer Settings</a>
    <a id="options-group-3-tab" class="nav-tab homesettings-tab" title="Single Post Settings" href="#options-group-3">Home Page Settings</a>
  </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$topmag_options = get_option( 'topmag_theme_options' ); ?>
        
        <!-------------- Header Settings ----------------->
        
        <div id="options-group-1" class="group headersettings">
          <h3>Header Settings</h3>
          <div id="section-breaking-news" class="section section-textarea">
            <h4 class="heading">Display Breaking News.</h4>
            <div class="option">
              <div>
                <input type="checkbox" id="breaking-news" name="topmag_theme_options[breaking-news]" <?php if(!empty($topmag_options['breaking-news'])) { ?> checked="checked" <?php } ?> value="yes">
				Please check checkbox to display Breaking News.
            </div>
          </div>
          </div>
          <div id="section-breaking-news" class="section section-textarea">
            <h4 class="heading">Select Breaking News Category.</h4>
            <div class="option">
              <div class="controls">
               <?php $topmag_category_id = get_all_category_ids(); ?>
                <select class="of-input" name="topmag_theme_options[breaking-news-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($topmag_category_id as $topmag_cat_id) { ?>
                    <option value="<?php $topmag_slug = get_category ($topmag_cat_id); echo $topmag_slug->slug; ?>" <?php if(!empty($topmag_options['breaking-news-category']) && $topmag_options['breaking-news-category'] == $topmag_slug->slug) { ?> selected="selected" <?php } ?>><?php echo get_cat_name($topmag_cat_id) ?></option>
                    <?php } ?>
                </select>
  				</div>
              </div>
              <div class="explain"> Please Select Category for Breaking News.</div>
          </div>
          <div id="logo" class="section section-text mini">
            <h4 class="heading">Logo</h4>
            <div class="option">
                 <div class="controls">
                <input id="logo-image" class="upload" type="text" name="topmag_theme_options[logo]" value="<?php if(!empty($topmag_options['logo'])) { echo $topmag_options['logo']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="logo-img">
                      <?php if(!empty($topmag_options['logo'])) {  echo "<img src='".$topmag_options['logo']."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
            </div>
          </div>
          <div id="section-tagline" class="section section-textarea">
            <h4 class="heading">Display Tagline.</h4>
            <div class="option">
              <div>
                <input type="checkbox" id="logo-tagline" name="topmag_theme_options[logo-tagline]" <?php if(!empty($topmag_options['logo-tagline'])) { ?> checked="checked" <?php } ?> value="yes">
				Please check checkbox to display tagline in header.
            </div>
          </div>
          </div>
          <div id="favicon" class="section section-text mini">
            <h4 class="heading">Favicon</h4>
            <div class="option">
                 <div class="controls">
                <input id="favicon-image" class="upload" type="text" name="topmag_theme_options[favicon]" value="<?php if(!empty($topmag_options['favicon'])) { echo $topmag_options['favicon']; } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="favicon-img">
                      <?php if(!empty($topmag_options['favicon'])) {  echo "<img src='".$topmag_options['favicon']."' /><a class='remove-image'>Remove</a>"; } ?>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
        <!-------------- Footer Settings ----------------->
        
        <div id="options-group-2" class="group footersettings">
          <h3>Footer Settings</h3>
          <div id="section-footertext" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext" class="of-input" name="topmag_theme_options[footertext]" size="32" value="<?php if(!empty($topmag_options['footertext'])) { echo $topmag_options['footertext']; } ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
        </div>

        <!-------------- Home Page Settings ----------------->
        
        <div id="options-group-3" class="group singlpostsettings">
          <h3>Home Page Settings</h3>
		  <div id="section-home-slider" class="section section-textarea">
            <h4 class="heading">Select Post Slider Category.</h4>
            <div class="option">
              <div class="controls">
               <?php $topmag_category_id = get_all_category_ids(); ?>
                <select class="of-input" name="topmag_theme_options[post-slider-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($topmag_category_id as $topmag_cat_id) { ?>
                    <option value="<?php $topmag_slug = get_category ($topmag_cat_id); echo get_cat_name($topmag_cat_id); ?>" <?php if(!empty($topmag_options['post-slider-category']) && $topmag_options['post-slider-category'] == get_cat_name($topmag_cat_id)) { ?> selected="selected" <?php } ?>><?php echo get_cat_name($topmag_cat_id) ?></option>
                    <?php } ?>
                </select>
  				</div>
              </div>
              <div class="explain"> Please select category for post slider.</div>
          </div>
          <div id="section-recent-post-slider" class="section section-textarea">
            <h4 class="heading">Select recent post slider number.</h4>
            <div class="option">
              <div class="controls">
              <select id="recent-post-number" class="of-input"  name="topmag_theme_options[recent-post-number]">
              		<option value="">--select number--</option>
                	<?php for($recent_post_number = 1; $recent_post_number <= 20; $recent_post_number++ ) { ?>
                	<option value="<?php echo $recent_post_number; ?>"<?php if($topmag_options['recent-post-number'] == $recent_post_number) { echo 'selected="selected"'; } ?>><?php echo $recent_post_number; ?></option>
					<?php } ?>
              </select>
             </div>
              </div>
              <div class="explain"> Please select number of post.</div>
          </div>
          <div id="section-home-slider" class="section section-textarea">
            <h4 class="heading">Select post category.</h4>
            <div class="option">
              <div class="controls">
               <?php $topmag_post_category_id = get_all_category_ids(); ?>
                <select class="of-input" name="topmag_theme_options[home-post-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($topmag_post_category_id as $topmag_post_cat_id) { ?>
                    <option value="<?php $topmag_cat_slug = get_category ($topmag_post_cat_id); echo $topmag_cat_slug->slug; ?>" <?php if(!empty($topmag_options['home-post-category']) && $topmag_options['home-post-category'] == $topmag_cat_slug->slug) { ?> selected="selected" <?php } ?>><?php echo get_cat_name($topmag_post_cat_id) ?></option>
                    <?php } ?>
                </select>
  				</div>
              </div>
              <div class="explain"> Please select category for post slider.</div>
          </div>
          <div id="section-home-slider" class="section section-textarea">
            <h4 class="heading">Select category post number.</h4>
            <div class="option">
              <div class="controls">
              <select id="post-number" class="of-input"  name="topmag_theme_options[post-number]">
              		<option value="">--select number--</option>
                	<?php for($post_number = 1; $post_number <= 20; $post_number++ ) { ?>
                	<option value="<?php echo $post_number; ?>"<?php if($topmag_options['post-number'] == $post_number) { echo 'selected="selected"'; } ?>><?php echo $post_number; ?></option>
					<?php } ?>
              </select>
             </div>
              </div>
              <div class="explain"> Please select number of post.</div>
          </div>
        </div>

        <!-------------- End Settings ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite"> <span>&copy; <a href="http://fasterthemes.com/" target="_blank">fasterthemes.com</a></span> <span class="fb"> <a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a> </span>
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
