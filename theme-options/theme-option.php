<?php
function avocation_options_init(){
 register_setting( 'avocation_options', 'avocation_theme_options','avocation_options_validate');
} 
add_action( 'admin_init', 'avocation_options_init' );
function avocation_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'avocation_framework', get_template_directory_uri(). '/theme-options/css/theme-option_framework.css' ,false, '1.0.0');	
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/theme-option-custom.js', array('jquery','wp-color-picker'));
	wp_localize_script('options-custom', 'admin_url', admin_url('admin-ajax.php'));
}
add_action( 'admin_enqueue_scripts', 'avocation_framework_load_scripts' );
function avocation_framework_menu_settings() {
	$avocation_menu = array(
		'page_title' => __( 'avocation Options', 'avocation'),
		'menu_title' => __('Avocation Pro Features', 'avocation'),
		'capability' => 'edit_theme_options',
		'menu_slug' => 'avocation_framework',
		'callback' => 'avocation_framework_page'
	);
	return apply_filters( 'avocation_framework_menu', $avocation_menu );
}
add_action( 'admin_menu', 'avocation_options_add_page' ); 
function avocation_options_add_page() {
	$avocation_menu = avocation_framework_menu_settings();
   	add_theme_page($avocation_menu['page_title'],$avocation_menu['menu_title'],$avocation_menu['capability'],$avocation_menu['menu_slug'],$avocation_menu['callback']);
} 
function avocation_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false; ?>
<div class="theme-option-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="theme-option-header">
    <div class="logo">
       <?php $avocation_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fruitthemes.com' target='_blank'><img src='".$avocation_image."' alt='fruitthemes' /></a>"; ?>
    </div>
  </div>
  <div class="theme-option-details">
    <div class="theme-option-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('PRO Theme Features','avocation'); ?>" href="#options-group-1"><?php _e('PRO Theme Features','avocation'); ?></a></li>            
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'avocation_options' );
          	$avocation_options = get_option( 'avocation_theme_options' ); ?>
           <!-- Start Basic Settings -->
          <div id="options-group-1" class="group theme-option-inner-tabs"> 
				<div class="avocation-pro-header">
              <h2 class="avocation-pro-logo"><?php _e('AVOCATION PRO','avocation'); ?></h2>
              <a href="http://fruitthemes.com/wordpress-themes/Avocation" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/avocation-buy-now.png" class="avocation-pro-buynow" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro.png" class="avocation-pro-image" />
		  </div>
        <!-- F I N A L - - T H E M E - - O P T I O N S --> 
      </div>
     </div>
	</div>
    </form>    
</div>
<?php } ?>