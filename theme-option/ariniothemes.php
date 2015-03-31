<?php
function arinios_options_init(){
 register_setting( 'ar_options', 'arinio_theme_options','ar_options_validate');
} 
add_action( 'admin_init', 'arinios_options_init' );

function ar_options_validate($input)
{
	$input['logo'] = esc_url_raw( $input['logo'] );
$input['fevicon'] = esc_url_raw( $input['fevicon'] );

$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
$input['customcss'] = esc_html( $input['customcss'] );
$input['slide1title'] = wp_filter_nohtml_kses( $input['slide1title'] );
$input['slide1subtitle'] = wp_filter_nohtml_kses( $input['slide1subtitle'] );

$input['slide1image'] = esc_url_raw( $input['slide1image'] );
$input['slide2title'] = wp_filter_nohtml_kses( $input['slide2title'] );
$input['slide2subtitle'] = wp_filter_nohtml_kses( $input['slide2subtitle'] );

$input['slide2image'] = esc_url_raw( $input['slide2image'] );
$input['msheading'] = wp_filter_nohtml_kses( $input['msheading'] );
$input['msheadingdes'] = wp_filter_nohtml_kses( $input['msheadingdes'] );
$input['sicon1'] = wp_filter_nohtml_kses( $input['sicon1'] );
$input['fstitle'] = wp_filter_nohtml_kses( $input['fstitle'] );
$input['fdtitle'] = wp_filter_nohtml_kses( $input['fdtitle'] );
$input['sicon2'] = wp_filter_nohtml_kses( $input['sicon2'] );
$input['sstitle'] = wp_filter_nohtml_kses( $input['sstitle'] );
$input['sdtitle'] = wp_filter_nohtml_kses( $input['sdtitle'] );
$input['sicon3'] = wp_filter_nohtml_kses( $input['sicon3'] );
$input['sstitle3'] = wp_filter_nohtml_kses( $input['sstitle3'] );
$input['sdtitle3'] = wp_filter_nohtml_kses( $input['sdtitle3'] );
$input['blogh'] = wp_filter_nohtml_kses( $input['blogh'] );
$input['bloghdd'] = wp_filter_nohtml_kses( $input['bloghdd'] );


    return $input;
}

function arinios_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'arinios_framework', get_template_directory_uri(). '/theme-option/css/arinios_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'arinios_framework' );
	wp_enqueue_style( 'wp-color-picker', get_template_directory_uri(). '/theme-option/css/color-picker.min.css' );
	wp_enqueue_style( 'wp-color-picker' );
	
	// Enqueue colorpicker scripts for versions below 3.5 for compatibility
	wp_enqueue_script( 'wp-color-picker', get_template_directory_uri(). '/theme-option/js/color-picker.min.js', array( 'jquery', 'iris' ) );
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-option/js/arinios-custom.js', array( 'jquery','wp-color-picker' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-option/js/media-uploader.js', array( 'jquery', 'iris' ) );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'arinios_framework_load_scripts' );
function arinios_framework_menu_settings() {
	$menu = array(
				'page_title' => __( 'Arinio Themes Options', 'arinio_framework'),
				'menu_title' => __('AR Options', 'arinio_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'arinios_framework',
				'callback' => 'arinio_framework_page'
				);
	return apply_filters( 'arinios_framework_menu', $menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$menu = arinios_framework_menu_settings();
   	add_theme_page($menu['page_title'],$menu['menu_title'],$menu['capability'],$menu['menu_slug'],$menu['callback']);
} 
function arinio_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;
		
		 
		echo "<h1>". __( 'Avnii Theme Options', 'customtheme' ) . "</h1>";  
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>

<div class="tnotify">
        <h1><?php _e( 'Get Avnii PRO Theme!  Just $25', 'avnii' ); ?></h1>
        <p style="font-size:15px; line-height: 20px;"><?php _e( 'You are using the Avnii, Free Version of Avnii Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and many more Page Templates, Social Link Section, Life time theme support and much more.', 'avnii' ); ?></p>
        <a href="<?php echo esc_url( 'http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/' ); ?>" target="blank"><?php _e( 'Upgrade to Avnii PRO Theme here >>', 'avnii' ); ?></a>
    </div>
<div id="arinio_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="<?php echo esc_url( '#options-group-1' ); ?>"><?php _e( 'Basic Settings', 'avnii' ); ?></a> <a id="options-group-3-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="<?php echo esc_url( '#options-group-3' ); ?>"><?php _e( 'Slider Settings', 'avnii' ); ?></a> <a id="options-group-4-tab" class="nav-tab socialsettings-tab" title="Services Settings" href="<?php echo esc_url( '#options-group-4' ); ?>"><?php _e( 'Services Settings', 'avnii' ); ?> </a>   <a id="options-group-11-tab" class="nav-tab socialsettings-tab" title="Blog Settings" href="<?php echo esc_url( '#options-group-11' ); ?>"><?php _e( 'Blog Settings', 'avnii' ); ?></a></h2>
  <div id="arinio_framework-metabox" class="metabox-holder">
    <div id="arinios_framework" class="postbox"> 
      
     
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ar">
        <?php settings_fields( 'ar_options' );  
		$options = get_option( 'arinio_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
           <h3><?php _e( 'Basic Settings', 'avnii' ); ?></h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Site Logo', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[logo]" 
                            value="<?php echo esc_url_raw($options['logo']); ?>" placeholder="<?php _e( 'No file chosen', 'avnii' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'avnii' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['logo'] != '') echo "<img src='".esc_url_raw($options['logo'])."' /><a class='remove-image'>"._e( 'Remove', 'avnii' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a logo for your Website.', 'avnii' ); ?> </div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Favicon', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[fevicon]" 
                            value="<?php echo esc_url_raw($options['fevicon']); ?>" placeholder="<?php _e( 'No file chosen', 'avnii' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'avnii' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['fevicon'] != '') echo "<img src='".esc_url_raw($options['fevicon'])."' /><a class='remove-image'>"._e( 'Remove', 'avnii' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Size of fevicon should be exactly 32x32px for best results.', 'avnii' ); ?></div>
            </div>
          </div>
          
           
          
         
          
          
          
         
             
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Copyright Text', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="arinio_theme_options[footertext]" size="32"  value="<?php echo esc_attr($options['footertext']); ?>">
              </div>
              <div class="explain"><?php _e( 'Some text regarding copyright of your site, you would like to display in the footer.', 'avnii' ); ?></div>
            </div>
          </div>
          
          
            
            
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Custom CSS', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[customcss]" id="customcss" cols="6" rows="6"><?php echo esc_attr($options['customcss']); ?></textarea>
              
                
              </div>
              <div class="explain"><?php _e( 'add your custom CSS code to your theme by writing the code in this block.', 'avnii' ); ?></div>
            </div>
          </div>
          
          
           
           
           
          
          
          
          
        </div>
        
        <!-------------- Second group ----------------->
        
         
        
        
        
        
        
        
        
 <div id="options-group-3" class="group socialsettings">
 <h3><?php _e( 'Slider Settings', 'avnii' ); ?></h3>
        
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slider 1 Title', 'avnii' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1title" class="of-input" name="arinio_theme_options[slide1title]" size="30" type="text" value="<?php echo esc_attr($options['slide1title']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slider 1 Title   for Slider', 'avnii' ); ?>  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slider 1 SubTitle', 'avnii' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1subtitle" class="of-input" name="arinio_theme_options[slide1subtitle]" size="30" type="text" value="<?php echo esc_attr($options['slide1subtitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slider 1 SubTitle  for Slider', 'avnii' ); ?>  </div>
            </div>
          </div>
          
    
          
          
          
           
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Slider 1 Image', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide1image]" 
                            value="<?php if(!empty($options['slide1image'])) { echo esc_url_raw($options['slide1image']);} ?>" placeholder="<?php _e( 'No file chosen', 'avnii' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'avnii' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php  if(!empty($options['slide1image']))  echo "<img src='".esc_url_raw($options['slide1image'])."' /><a class='remove-image'>"._e( 'Remove', 'avnii' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a Image for your Slider.', 'avnii' ); ?> </div>
            </div>
            </div> <hr>
          
          
          
           <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slider 2 Title', 'avnii' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2title" class="of-input" name="arinio_theme_options[slide2title]" size="30" type="text" value="<?php echo esc_attr($options['slide2title']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slider 2 Title   for Slider', 'avnii' ); ?>  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slider 2 SubTitle', 'avnii' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2subtitle" class="of-input" name="arinio_theme_options[slide2subtitle]" size="30" type="text" value="<?php echo esc_attr($options['slide2subtitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slider 2 SubTitle  for Slider ', 'avnii' ); ?> </div>
            </div>
          </div>
          
           
          
          
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Slider 2 Image', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide2image]" 
                            value="<?php if(!empty($options['slide2image'])) { echo esc_url_raw($options['slide2image']);} ?>" placeholder="<?php _e( 'No file chosen', 'avnii' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'avnii' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['slide2image'])) echo "<img src='".esc_url_raw($options['slide2image'])."' /><a class='remove-image'>"._e( 'Remove', 'avnii' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a Image for your Slider.', 'avnii' ); ?> </div>
            </div>
            </div> <hr>
          
            
          
          
            
 </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         <div id="options-group-4" class="group socialsettings">
          <h3><?php _e( 'Services Settings', 'avnii' ); ?></h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Main Heading', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[msheading]" size="30" type="text" value="<?php echo esc_attr($options['msheading']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Service Main Heading text for Service section', 'avnii' ); ?></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Main Heading Description', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[msheadingdes]" id="msheadingdes" cols="6" rows="6"><?php if(!empty($options['msheadingdes'])) { echo esc_attr($options['msheadingdes']); }?></textarea>
                
              </div>
              <div class="explain"><?php _e( 'Mention the Main Heading Description text for Service section', 'avnii' ); ?> </div>
            </div>
          </div>
          
          
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Icon', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon1]" type="text" size="30" value="<?php echo esc_attr($options['sicon1']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'avnii' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'avnii' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Title', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[fstitle]" size="30" type="text" value="<?php echo esc_attr($options['fstitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the First Service Title text for Service section', 'avnii' ); ?> </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Description', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[fdtitle]" id="fdtitle" cols="6" rows="6"><?php echo esc_attr($options['fdtitle']); ?></textarea>
                
              </div>
              <div class="explain"><?php _e( 'Mention the First Service Description text for Service section', 'avnii' ); ?></div>
            </div>
          </div>
          
          
          
           <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Icon', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon2]" type="text" size="30" value="<?php echo esc_attr($options['sicon2']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'avnii' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'avnii' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Title', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle]" size="30" type="text" value="<?php echo esc_attr($options['sstitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Second Service Title text for Service section ', 'avnii' ); ?></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Description', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle]" id="sdtitle" cols="6" rows="6"><?php echo esc_attr($options['sdtitle']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Second Service Description text for Service section', 'avnii' ); ?></div>
            </div>
          </div>
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Icon', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon3]" type="text" size="30" value="<?php echo esc_attr($options['sicon3']); ?>" />
              </div>
            <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'avnii' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'avnii' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Title', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle3]" size="30" type="text" value="<?php echo esc_attr($options['sstitle3']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Third Service Title text for Service section', 'avnii' ); ?> </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Description', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle3]" id="sdtitle3" cols="6" rows="6"><?php echo esc_attr($options['sdtitle3']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Third Service Description text for Service section', 'avnii' ); ?></div>
            </div>
          </div>
          
          
          
        </div>
        
        
        
        
        
        
        
        
         
        
        
        
        
        
        
        
        
        
        
        
        
        <div id="options-group-11" class="group socialsettings">
          <h3><?php _e( 'Blog Settings', 'avnii' ); ?></h3>
          
            
              <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Blog Heading', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="blogh" class="of-input" name="arinio_theme_options[blogh]" size="32"  value="<?php echo esc_attr($options['blogh']); ?>">
              </div>
              <div class="explain"><?php _e( 'Enter here Blog Heading to show on front page.', 'avnii' ); ?></div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Blog Description', 'avnii' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[bloghdd]" id="customcss" cols="6" rows="6"><?php if(!empty($options['bloghdd'])) { echo esc_attr($options['bloghdd']); } ?></textarea>
              
                
              </div>
              <div class="explain"><?php _e( 'Enter here Blog Description to show on front page.', 'avnii' ); ?></div>
            </div>
          </div>
          
            
          
          
          
         
          
             </div>
        
        
        
        
         
        
        
        
        <!-------------- End group ----------------->
        
        <div id="arinios_framework-submit" class="section-submite">  <span class="fb"> <a href="<?php echo esc_url( 'https://www.facebook.com/ArinioThemes' ); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="<?php echo esc_url( 'https://twitter.com/ArinioThemes' ); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span> &nbsp; <span class="tw"> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" target="_blank"><?php esc_attr_e( 'BY: arinio.com' , 'avnii' ); ?> </a> </span>
          <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'avnii' ); ?>" />
          <div class="clear"></div>
        </div>
        
        <!-- Container -->
        
      </form>
      
     
      
    </div>
    <!-- / #container --> 
    
  </div>
  
  
  
  
  
  <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php esc_attr_e( 'About Avnii', 'Avnii' ); ?></h3>
      			<div class="inside"> 
					<div class="option-btn"><a class="btn upgrade" target="_blank" href="<?php echo esc_url( 'http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'Upgrade to Pro' , 'Avnii' ); ?></a></div>
                    <div class="option-btn"><a class="btn rate" target="_blank" href="<?php echo esc_url( 'http://arinio.com/' ); ?>"><?php esc_attr_e( 'View More our themes' , 'Avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn support" target="_blank" href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>"><?php esc_attr_e( 'Free Support' , 'Avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn doc" target="_blank" href="<?php echo esc_url( 'http://arinio.com/document/' ); ?>"><?php esc_attr_e( 'Documentation' , 'Avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'View Demo' , 'Avnii' ); ?></a></div>
					

	      			<div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
	      				<strong><?php esc_attr_e( 'If you like our work. Buy us a Coffee :)', 'Avnii' ); ?></strong>
	      				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <div class="paypal-donations">
        <input type="hidden" name="cmd" value="<?php _e( '_donations', 'avnii' ); ?>">
        <input type="hidden" name="business" value="<?php _e( 'LQ7DEYTTUPCLL', 'avnii' ); ?>">
        <input type="hidden" name="rm" value="<?php _e( '0', 'avnii' ); ?>">
        <input type="hidden" name="currency_code" value="<?php _e( 'USD', 'avnii' ); ?>">
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="<?php esc_attr_e( 'PayPal - The safer, easier way to pay online.' , 'avnii' ); ?>">
        <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </div>
</form>
					</div>
      			</div><!-- inside -->
	    	</div><!-- .postbox -->
	  	</div><!-- .metabox-holder -->
	</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
</div>
<?php }