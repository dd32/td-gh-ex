<?php
function arinios_options_init(){
 register_setting( 'ar_options', 'arinio_theme_options','ar_options_validate');
} 
add_action( 'admin_init', 'arinios_options_init' );

function ar_options_validate($input)
{
	$input['logo'] = esc_url_raw( $input['logo'] );
$input['fevicon'] = esc_url_raw( $input['fevicon'] );

$input['blogh'] = wp_filter_nohtml_kses( $input['blogh'] );
$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
$input['customcss'] = esc_html( $input['customcss'] );
$input['slide1title'] = wp_filter_nohtml_kses( $input['slide1title'] );
$input['slide1subtitle'] = wp_filter_nohtml_kses( $input['slide1subtitle'] );
$input['slide1des'] = wp_filter_nohtml_kses( $input['slide1des'] );
$input['slide1image'] = esc_url_raw( $input['slide1image'] );
$input['slide2title'] = wp_filter_nohtml_kses( $input['slide2title'] );
$input['slide2subtitle'] = wp_filter_nohtml_kses( $input['slide2subtitle'] );
$input['slide2des'] = wp_filter_nohtml_kses( $input['slide2des'] );
$input['slide2image'] = esc_url_raw( $input['slide2image'] );
$input['msheading'] = wp_filter_nohtml_kses( $input['msheading'] );
$input['sicon1'] = wp_filter_nohtml_kses( $input['sicon1'] );
$input['fstitle'] = wp_filter_nohtml_kses( $input['fstitle'] );
$input['fdtitle'] = wp_filter_nohtml_kses( $input['fdtitle'] );
$input['sicon2'] = wp_filter_nohtml_kses( $input['sicon2'] );
$input['sstitle'] = wp_filter_nohtml_kses( $input['sstitle'] );
$input['sdtitle'] = wp_filter_nohtml_kses( $input['sdtitle'] );
$input['sicon3'] = wp_filter_nohtml_kses( $input['sicon3'] );
$input['sstitle3'] = wp_filter_nohtml_kses( $input['sstitle3'] );
$input['sdtitle3'] = wp_filter_nohtml_kses( $input['sdtitle3'] );
$input['aboutus'] = wp_filter_nohtml_kses( $input['aboutus'] );
$input['aboutusdh'] = wp_filter_nohtml_kses( $input['aboutusdh'] );
$input['aboutusd'] = esc_html( $input['aboutusd'] );
$input['aboutusimg'] = esc_url_raw( $input['aboutusimg'] );
$input['contacth'] = wp_filter_nohtml_kses( $input['contacth'] );
$input['contactd'] = wp_filter_nohtml_kses( $input['contactd'] );
$input['fwidgett1'] = wp_filter_nohtml_kses( $input['fwidgett1'] );
$input['footert1'] = wp_filter_nohtml_kses( $input['footert1'] );
$input['fwidgett2'] = wp_filter_nohtml_kses( $input['fwidgett2'] );
$input['fwidgett3'] = wp_filter_nohtml_kses( $input['fwidgett3'] );
$input['footert2'] = wp_filter_nohtml_kses( $input['footert2'] );
$input['fwidgett4'] = wp_filter_nohtml_kses( $input['fwidgett4'] );
$input['footert3'] = wp_filter_nohtml_kses( $input['footert3'] );


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
		
		
		echo "<h1>". __( 'Ariwoo Theme Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>

<div class="tnotify">
        <h1><?php _e( 'Get Ariwoo PRO Theme!  Just $21', 'ariwoo' ); ?></h1>
        <p style="font-size:15px; line-height: 20px;"><?php _e( 'You are using the Ariwoo, Free Version of Ariwoo Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and many more Page Templates, Social Link Section, Life time theme support and much more.', 'ariwoo' ); ?></p>
        <a href="<?php echo esc_url( 'http://arinio.com/ariwoo-responsive-multipurpose-wordpress-theme/' ); ?>" target="blank"><?php _e( 'Upgrade to Ariwoo PRO Theme here >>', 'ariwoo' ); ?></a>
    </div>
<div id="arinio_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="" href="<?php echo esc_url( '#options-group-1' ); ?>"><?php _e( 'Basic Settings', 'ariwoo' ); ?></a> <a id="options-group-3-tab" class="nav-tab basicsettings-tab" title="" href="<?php echo esc_url( '#options-group-3' ); ?>"><?php _e( 'Slider Settings', 'ariwoo' ); ?></a> <a id="options-group-4-tab" class="nav-tab socialsettings-tab" title="" href="<?php echo esc_url( '#options-group-4' ); ?>"><?php _e( 'Services Settings', 'ariwoo' ); ?></a>  <a id="options-group-5-tab" class="nav-tab socialsettings-tab" title="" href="<?php echo esc_url( '#options-group-5' ); ?>"><?php _e( 'About us Settings', 'ariwoo' ); ?></a> <a id="options-group-7-tab" class="nav-tab socialsettings-tab" title="" href="<?php echo esc_url( '#options-group-7' ); ?>"><?php _e( 'Contact Settings', 'ariwoo' ); ?></a> <a id="options-group-9-tab" class="nav-tab Footer-tab" title="" href="<?php echo esc_url( '#options-group-9' ); ?>"><?php _e( 'Footer Settings', 'ariwoo' ); ?></a> </h2>
  <div id="arinio_framework-metabox" class="metabox-holder">
    <div id="arinios_framework" class="postbox"> 
    
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ar">
        <?php settings_fields( 'ar_options' );  
		$options = get_option( 'arinio_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
           <h3><?php _e( 'Basic Settings', 'ariwoo' ); ?></h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Site Logo', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[logo]" 
                            value="<?php echo esc_url_raw($options['logo']); ?>" placeholder="<?php _e( 'No file chosen', 'ariwoo' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'ariwoo' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['logo'] != '') echo "<img src='".esc_url_raw($options['logo'])."' /><a class='remove-image'>"._e( 'Remove', 'ariwoo' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a logo for your Website.', 'ariwoo' ); ?> </div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Favicon', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[fevicon]" 
                            value="<?php echo esc_url_raw($options['fevicon']); ?>" placeholder="<?php _e( 'No file chosen', 'ariwoo' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'ariwoo' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['fevicon'] != '') echo "<img src='".esc_url_raw($options['fevicon'])."' /><a class='remove-image'>"._e( 'Remove', 'ariwoo' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Size of fevicon should be exactly 32x32px for best results.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
           
          
          
          
          
          
          
          
          
            
              <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Blog Heading', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="blogh" class="of-input" name="arinio_theme_options[blogh]" size="32"  value="<?php echo esc_attr($options['blogh']); ?>">
              </div>
              <div class="explain"><?php _e( 'Enter here Blog Heading to show on front page.', 'ariwoo' ); ?></div>
            </div>
          </div>
           
          
           
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Copyright Text', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="arinio_theme_options[footertext]" size="32"  value="<?php echo esc_attr($options['footertext']); ?>">
              </div>
              <div class="explain"><?php _e( 'Some text regarding copyright of your site, you would like to display in the footer.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Custom CSS', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[customcss]" id="customcss" cols="6" rows="6"><?php echo esc_attr($options['customcss']); ?></textarea>
              
                
              </div>
              <div class="explain"><?php _e( 'add your custom CSS code to your theme by writing the code in this block.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          
         
          
          
          
          
          
          
          
          
          
          
        </div>
        
        <!-------------- Second group ----------------->
        
         
 <div id="options-group-3" class="group socialsettings">
 <h3><?php _e( 'Slider Settings', 'ariwoo' ); ?></h3>
        
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 1 Title', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1title" class="of-input" name="arinio_theme_options[slide1title]" size="30" type="text" value="<?php  if(!empty($options['slide1title'])) { echo esc_attr($options['slide1title']); }?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 1 Title   for Slider', 'ariwoo' ); ?>  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 1 SubTitle', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1subtitle" class="of-input" name="arinio_theme_options[slide1subtitle]" size="30" type="text" value="<?php if(!empty($options['slide1subtitle'])) { echo esc_attr($options['slide1subtitle']);} ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 1 SubTitle  for Slider', 'ariwoo' ); ?>  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 1 Description', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                 
                <textarea class="of-input" name="arinio_theme_options[slide1des]" id="slide1des" cols="6" rows="6"><?php if(!empty($options['slide1des'])) { echo esc_attr($options['slide1des']); }?></textarea>
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 1 Description   for Slider', 'ariwoo' ); ?>  </div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Slide 1 Image', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide1image]" 
                            value="<?php if(!empty($options['slide1image'])) { echo esc_url_raw($options['slide1image']);} ?>" placeholder="<?php _e( 'No file chosen', 'ariwoo' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'ariwoo' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php  if(!empty($options['slide1image']))  echo "<img src='".esc_url_raw($options['slide1image'])."' /><a class='remove-image'>"._e( 'Remove', 'ariwoo' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a Image for your Slider.', 'ariwoo' ); ?> </div>
            </div>
            </div> <hr>
             <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 2 Title', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2title" class="of-input" name="arinio_theme_options[slide2title]" size="30" type="text" value="<?php if(!empty($options['slide2title'])) {  echo esc_attr($options['slide2title']); } ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 2 Title   for Slider ', 'ariwoo' ); ?> </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 2 SubTitle', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2subtitle" class="of-input" name="arinio_theme_options[slide2subtitle]" size="30" type="text" value="<?php if(!empty($options['slide2subtitle'])) { echo esc_attr($options['slide2subtitle']);} ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 2 SubTitle  for Slider', 'ariwoo' ); ?>  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Slide 1 Description', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                 
                <textarea class="of-input" name="arinio_theme_options[slide2des]" id="slide1des" cols="6" rows="6"><?php if(!empty($options['slide2des'])) { echo esc_attr($options['slide2des']); } ?></textarea>
              </div>
              <div class="explain"><?php _e( 'Mention the Slide 2 Description   for Slider', 'ariwoo' ); ?>  </div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'Slide 2 Image', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide2image]" 
                            value="<?php if(!empty($options['slide2image'])) { echo esc_url_raw($options['slide2image']);} ?>" placeholder="<?php _e( 'No file chosen', 'ariwoo' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'ariwoo' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($options['slide2image'])) echo "<img src='".esc_url_raw($options['slide2image'])."' /><a class='remove-image'>"._e( 'Remove', 'ariwoo' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload a Image for your Slider.', 'ariwoo' ); ?> </div>
            </div>
            </div> <hr>
          
          
          
          
          
            
 </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         <div id="options-group-4" class="group socialsettings">
          <h3><?php _e( 'Services Settings', 'ariwoo' ); ?></h3>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Main Heading', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[msheading]" size="30" type="text" value="<?php echo esc_attr($options['msheading']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Service Main Heading text for Service section', 'ariwoo' ); ?></div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Icon', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon1]" type="text" size="30" value="<?php echo esc_attr($options['sicon1']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'ariwoo' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'ariwoo' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Title', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[fstitle]" size="30" type="text" value="<?php echo esc_attr($options['fstitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the First Service Title text for Service section', 'ariwoo' ); ?> </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'First Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[fdtitle]" id="fdtitle" cols="6" rows="6"><?php echo esc_attr($options['fdtitle']); ?></textarea>
                
              </div>
              <div class="explain"><?php _e( 'Mention the First Service Description text for Service section', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          
           <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Icon', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon2]" type="text" size="30" value="<?php echo esc_attr($options['sicon2']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'ariwoo' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'ariwoo' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Title', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle]" size="30" type="text" value="<?php echo esc_attr($options['sstitle']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Second Service Title text for Service section ', 'ariwoo' ); ?></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Second Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle]" id="sdtitle" cols="6" rows="6"><?php echo esc_attr($options['sdtitle']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Second Service Description text for Service section', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Icon', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon3]" type="text" size="30" value="<?php echo esc_attr($options['sicon3']); ?>" />
              </div>
            <div class="explain"><?php _e( 'Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here', 'ariwoo' ); ?> <a href="<?php echo esc_url( 'http://fortawesome.github.io/Font-Awesome' ); ?>" target="_blank"><?php _e( 'Click here', 'ariwoo' ); ?></a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Title', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle3]" size="30" type="text" value="<?php echo esc_attr($options['sstitle3']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the Third Service Title text for Service section', 'ariwoo' ); ?> </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle3]" id="sdtitle3" cols="6" rows="6"><?php echo esc_attr($options['sdtitle3']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Third Service Description text for Service section', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          
        </div>
        
        
        
        
        
        
        
        
        
        <div id="options-group-5" class="group socialsettings">
          <h3><?php _e( 'About us Settings', 'ariwoo' ); ?></h3>
      <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'About Us Main Heading', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="Aboutus" class="of-input" name="arinio_theme_options[aboutus]" size="30" type="text" value="<?php echo esc_attr($options['aboutus']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the About Us Main Heading text for About Us section', 'ariwoo' ); ?></div>
            </div>
          </div>
          
           <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'About Us Description Heading', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="Aboutus" class="of-input" name="arinio_theme_options[aboutusdh]" size="30" type="text" value="<?php echo esc_attr($options['aboutusdh']); ?>" />
              </div>
              <div class="explain"><?php _e( 'Mention the About Us Description Heading text for About Us section', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'About Us Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[aboutusd]" id="aboutusd" cols="6" rows="6"><?php echo esc_attr($options['aboutusd']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the About Us Description text for About Us section', 'ariwoo' ); ?></div>
            </div>
          </div>
         
         <div id="section-logo" class="section section-upload ">
            <h4 class="heading"><?php _e( 'About Us Header Image', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[aboutusimg]" 
                            value="<?php echo esc_url_raw($options['aboutusimg']); ?>" placeholder="<?php _e( 'No file chosen', 'ariwoo' ); ?>" />
                <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e( 'Upload', 'ariwoo' ); ?>" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['aboutusimg'] != '') echo "<img src='".esc_url_raw($options['aboutusimg'])."' /><a class='remove-image'>"._e( 'Remove', 'ariwoo' )."</a>" ?>
                </div>
              </div>
              <div class="explain"><?php _e( 'Upload here About Us Header Image.', 'ariwoo' ); ?></div>
            </div>
          </div>
         
         
          
        </div>
        
        <div id="options-group-7" class="group socialsettings">
          <h3><?php _e( 'Contact Settings', 'ariwoo' ); ?></h3>
      
           <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Contact Main Heading', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="contact" class="of-input" name="arinio_theme_options[contacth]" size="132"  value="<?php echo esc_attr($options['contacth']); ?>">
              </div>
              <div class="explain"><?php _e( 'Mention the Contact Main Heading text for Contact section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Contact Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[contactd]" id="contactd" cols="6" rows="6"><?php echo esc_attr($options['contactd']); ?></textarea>
              
                
              </div>
              <div class="explain"><?php _e( 'Mention the Contact Description text for Contact section.', 'ariwoo' ); ?></div>
            </div>
          </div>
         
          
        </div>
     
     
     <div id="options-group-9" class="group socialsettings">
          <h3><?php _e( 'Footer Settings', 'ariwoo' ); ?></h3>
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Fisrt widget title', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="fwidgett1" class="of-input" name="arinio_theme_options[fwidgett1]" size="132"  value="<?php echo esc_attr($options['fwidgett1']); ?>">
              </div>
              <div class="explain"><?php _e( 'Mention the widget title text for footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Fisrt widget Description', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[footert1]" id="footert1" cols="6" rows="6"><?php echo esc_attr($options['footert1']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Fisrt widget Description for Footer section.', 'ariwoo' ); ?> </div>
            </div>
          </div>
          
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Second widget title(Recent Post Footer)', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="fwidgett2" class="of-input" name="arinio_theme_options[fwidgett2]" size="132"  value="<?php echo esc_attr($options['fwidgett2']); ?>">
              </div>
              <div class="explain"><?php _e( 'Mention the widget title text for footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Third widget title', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="fwidgett3" class="of-input" name="arinio_theme_options[fwidgett3]" size="132"  value="<?php echo esc_attr($options['fwidgett3']); ?>">
              </div>
              <div class="explain"><?php _e( 'Mention the widget title text for footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Third widget Description', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[footert2]" id="footert2" cols="6" rows="6"><?php echo esc_attr($options['footert2']); ?></textarea>
                </div>
              <div class="explain"><?php _e( 'Mention the Third widget Description for Footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading"><?php _e( 'Fourth widget title (contact details Footer)', 'ariwoo' ); ?> </h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="fwidgett4" class="of-input" name="arinio_theme_options[fwidgett4]" size="132"  value="<?php echo esc_attr($options['fwidgett4']); ?>">
              </div>
              <div class="explain"><?php _e( 'Mention the widget title text for footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
          
           <div id="section-twitter" class="section section-text mini">
            <h4 class="heading"><?php _e( 'Address (contact details Footer)', 'ariwoo' ); ?></h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[footert3]" id="footert3" cols="6" rows="6"><?php echo esc_attr($options['footert3']); ?></textarea>
                 
              </div>
              <div class="explain"><?php _e( 'Mention the Address for Footer section.', 'ariwoo' ); ?></div>
            </div>
          </div>
        </div>
     
     
     
     
        <!-------------- End group ----------------->
        
        <div id="arinios_framework-submit" class="section-submite">  <span class="fb"> <a href="<?php echo esc_url( 'https://www.facebook.com/ArinioThemes' ); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="<?php echo esc_url( 'https://twitter.com/ArinioThemes' ); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span> &nbsp; <span class="tw"> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" target="_blank"><?php esc_attr_e( 'BY: arinio.com' , 'ariwoo' ); ?> </a> </span>
          <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'ariwoo' ); ?>" />
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
	    		<h3><?php esc_attr_e( 'About Ariwoo', 'Ariwoo' ); ?></h3>
      			<div class="inside"> 
					<div class="option-btn"><a class="btn upgrade" target="_blank" href="<?php echo esc_url( 'http://arinio.com/ariwoo-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'Upgrade to Pro' , 'Ariwoo' ); ?></a></div>
                    <div class="option-btn"><a class="btn rate" target="_blank" href="<?php echo esc_url( 'http://arinio.com/' ); ?>"><?php esc_attr_e( 'View More our themes' , 'Ariwoo' ); ?></a></div>
					<div class="option-btn"><a class="btn support" target="_blank" href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>"><?php esc_attr_e( 'Free Support' , 'Ariwoo' ); ?></a></div>
					<div class="option-btn"><a class="btn doc" target="_blank" href="<?php echo esc_url( 'http://arinio.com/document/' ); ?>"><?php esc_attr_e( 'Documentation' , 'Ariwoo' ); ?></a></div>
					<div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://arinio.com/ariwoo-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'View Demo' , 'Ariwoo' ); ?></a></div>
					

	      			<div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
	      				<strong><?php esc_attr_e( 'If you would like to donate to GROW development and want to helping us you can donate to us.
We are also helping poor community so please help us to help and HAVE A BETTER WORLD. Even 2$ really help :)', 'Ariwoo' ); ?></strong>
	      				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <div class="paypal-donations">
        <input type="hidden" name="cmd" value="<?php _e( '_donations', 'ariwoo' ); ?>">
        <input type="hidden" name="business" value="<?php _e( 'LQ7DEYTTUPCLL', 'ariwoo' ); ?>">
        <input type="hidden" name="rm" value="<?php _e( '0', 'ariwoo' ); ?>">
        <input type="hidden" name="currency_code" value="<?php _e( 'USD', 'ariwoo' ); ?>">
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="<?php esc_attr_e( 'PayPal - The safer, easier way to pay online.' , 'ariwoo' ); ?>">
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