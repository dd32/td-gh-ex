<?php
function fasterthemes_options_init(){
 register_setting( 'ft_options', 'faster_theme_options','ft_options_validate');
} 
add_action( 'admin_init', 'fasterthemes_options_init' );
function ft_options_validate($input)
{
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['fevicon'] = esc_url_raw( $input['fevicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );

	$input['fburl'] = esc_url_raw( $input['fburl'] );
	$input['twitter'] = esc_url_raw( $input['twitter'] );

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
	$menu = array(
				'page_title' => __( 'FasterThemes Options', 'redpro'),
				'menu_title' => __('Theme Options', 'redpro'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'fasterthemes_framework',
				'callback' => 'fastertheme_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$menu = fasterthemes_framework_menu_settings();
   	add_theme_page($menu['page_title'],$menu['menu_title'],$menu['capability'],$menu['menu_slug'],$menu['callback']);
} 
function fastertheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		$image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$image."' height='64px'  /> ". __( 'FasterThemes Options', 'redpro' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'redpro' )."</strong></p></div>";
		endif; 
?>
<div id="fasterthemes_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> 
	  <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1"><?php _e('Basic Settings','redpro') ?></a> 
	  <a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2"><?php _e('Social Settings','redpro') ?></a> </h2>
  <div id="fasterthemes_framework-metabox" class="metabox-holder">
    <div id="fasterthemes_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ft">
        <?php settings_fields( 'ft_options' );  
		$options = get_option( 'faster_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
          <h3><?php _e('Basic Settings','redpro') ?></h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e('Site Logo','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[logo]" 
                            value="<?php if(!empty($options['logo'])) { echo $options['logo']; } ?>"placeholder="<?php _e('No file chosen','redpro') ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','redpro') ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['logo'])) { echo "<img src='".esc_url_raw($options['logo'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
              <div class="explain"><?php _e('Size of logo should be exactly 360x125px for best results. Leave blank to use text heading.','redpro') ?></div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e('Favicon','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="faster_theme_options[fevicon]" 
                            value="<?php if(!empty($options['fevicon'])) { echo $options['fevicon']; } ?>"placeholder="<?php _e('No file chosen','redpro') ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','redpro') ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['fevicon'])) { echo "<img src='".esc_url_raw($options['fevicon'])."' /><a class='remove-image'></a>"; } ?>
                </div>
              </div>
              <div class="explain"><?php _e('Size of fevicon should be exactly 32x32px for best results.','redpro') ?></div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e('Copyright Text','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="faster_theme_options[footertext]" size="32"  value="<?php if(!empty($options['footertext']))echo wp_filter_nohtml_kses($options['footertext']); ?>">
              </div>
              <div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.','redpro') ?></div>
            </div>
          </div>
          <div id="section-bloglayout" class="section section-radio">
            <h4 class="heading"><?php _e('Blog Page Layout','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <select name="faster_theme_options[bloglayout]">
                  <option value="left" <?php if(!empty($options['bloglayout'])) { if($options['bloglayout'] == 'left') { ?> selected="selected" <?php }} ?>><?php _e('Left Sidebar','redpro') ?></option>
                  <option value="right"  <?php if(!empty($options['bloglayout'])) { if($options['bloglayout'] == 'right') { ?> selected="selected" <?php }} ?>><?php _e('Right Sidebar','redpro') ?></option>
                  <option value="full"  <?php if(!empty($options['bloglayout'])) { if($options['bloglayout'] == 'full') { ?> selected="selected" <?php }} ?>><?php _e('Full Width','redpro') ?></option>
                </select>
              </div>
              <div class="explain"><?php _e('Select Blog Page Layout.','redpro') ?></div>
            </div>
          </div>
        </div>
        
        <!-------------- Second group ----------------->
        
        <div id="options-group-2" class="group socialsettings">
          <h3><?php _e('Social Settings','redpro') ?></h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e('Facebook','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <input id="facebook" class="of-input" name="faster_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($options['fburl'])) { echo esc_url_raw($options['fburl']); } ?>" />
              </div>
              <div class="explain"><?php _e('Facebook profile or page URL i.e. ','redpro'); ?>http://facebook.com/username/</div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e('Twitter','redpro') ?></h4>
            <div class="option">
              <div class="controls">
                <input id="twitter" class="of-input" name="faster_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($options['twitter'])) { echo esc_url_raw($options['twitter']); } ?>" />
              </div>
               <div class="explain"><?php _e('Twitter profile or page URL i.e.','redpro'); ?> http://twitter.com/username/</div>
            </div>
          </div>
        </div>
        
        <!-------------- End group ----------------->
        
        <div id="fasterthemes_framework-submit" class="section-submite">
          <input type="submit" class="button-primary" value="<?php _e('Save Options','redpro') ?>" />
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
