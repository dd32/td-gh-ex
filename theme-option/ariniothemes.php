<?php
function arinios_options_init(){
 register_setting( 'ar_options', 'arinio_theme_options');
} 
add_action( 'admin_init', 'arinios_options_init' );
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
		
		 
		$image=get_template_directory_uri().'/theme-option/images/logo.png';
		echo "<h1><img src='".$image."' height='64px'  /> ". __( 'Arinio Theme Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>
<div id="arinio_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic</a> <a id="options-group-3-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-3">Slider</a> <a id="options-group-4-tab" class="nav-tab socialsettings-tab" title="Services Settings" href="#options-group-4">Services </a>   <a id="options-group-11-tab" class="nav-tab socialsettings-tab" title="Blog Settings" href="#options-group-11">Blog</a></h2>
  <div id="arinio_framework-metabox" class="metabox-holder">
    <div id="arinios_framework" class="postbox"> 
      
     
      
      <form method="post" action="options.php" id="form-option" class="theme_option_ar">
        <?php settings_fields( 'ar_options' );  
		$options = get_option( 'arinio_theme_options' ); ?>
        
        <!-------------- First group ----------------->
        
        <div id="options-group-1" class="group basicsettings">
          <h3>Basic Settings</h3>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Site Logo</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[logo]" 
                            value="<?php echo $options['logo']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['logo'] != '') echo "<img src='".$options['logo']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Upload a logo for your Website. </div>
            </div>
          </div>
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Favicon</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[fevicon]" 
                            value="<?php echo $options['fevicon']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['fevicon'] != '') echo "<img src='".$options['fevicon']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Size of fevicon should be exactly 32x32px for best results.</div>
            </div>
          </div>
          
           
          
         
          
          
          
         
             
          
          
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Copyright Text</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="footertext2" class="of-input" name="arinio_theme_options[footertext]" size="32"  value="<?php echo $options['footertext']; ?>">
              </div>
              <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
            </div>
          </div>
          
          
            
            
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Custom CSS</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[customcss]" id="customcss" cols="6" rows="6"><?php echo $options['customcss']; ?></textarea>
              
                
              </div>
              <div class="explain">add your custom CSS code to your theme by writing the code in this block.</div>
            </div>
          </div>
          
          
           
           
           
          
          
          
          
        </div>
        
        <!-------------- Second group ----------------->
        
         
        
        
        
        
        
        
        
 <div id="options-group-3" class="group socialsettings">
 <h3>Slider Settings</h3>
        
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 1 Title </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1title" class="of-input" name="arinio_theme_options[slide1title]" size="30" type="text" value="<?php echo $options['slide1title']; ?>" />
              </div>
              <div class="explain">Mention the Slide 1 Title   for Slider  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 1 SubTitle </h4>
            <div class="option">
              <div class="controls">
                <input id="slide1subtitle" class="of-input" name="arinio_theme_options[slide1subtitle]" size="30" type="text" value="<?php echo $options['slide1subtitle']; ?>" />
              </div>
              <div class="explain">Mention the Slide 1 SubTitle  for Slider  </div>
            </div>
          </div>
          
    
          
          
          
           
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Slide 1 Image</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide1image]" 
                            value="<?php echo $options['slide1image']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['slide1image'] != '') echo "<img src='".$options['slide1image']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Upload a Image for your Slider. </div>
            </div>
            </div> <hr>
          
          
          
           <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 2 Title </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2title" class="of-input" name="arinio_theme_options[slide2title]" size="30" type="text" value="<?php echo $options['slide2title']; ?>" />
              </div>
              <div class="explain">Mention the Slide 2 Title   for Slider  </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 2 SubTitle </h4>
            <div class="option">
              <div class="controls">
                <input id="slide2subtitle" class="of-input" name="arinio_theme_options[slide2subtitle]" size="30" type="text" value="<?php echo $options['slide2subtitle']; ?>" />
              </div>
              <div class="explain">Mention the Slide 2 SubTitle  for Slider  </div>
            </div>
          </div>
          
           
          
          
          <div id="section-logo" class="section section-upload ">
            <h4 class="heading">Slide 2 Image</h4>
            <div class="option">
              <div class="controls">
                <input id="logo" class="upload" type="text" name="arinio_theme_options[slide2image]" 
                            value="<?php echo $options['slide2image']; ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if($options['slide2image'] != '') echo "<img src='".$options['slide2image']."' /><a class='remove-image'>Remove</a>" ?>
                </div>
              </div>
              <div class="explain">Upload a Image for your Slider. </div>
            </div>
            </div> <hr>
          
            
          
          
            
 </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         <div id="options-group-4" class="group socialsettings">
          <h3>Services Settings</h3>
          
          
          <div id="section-bloglayout" class="section section-radio">
            <h4 class="heading">Activate Services Section</h4>
            <div class="option">
              <div class="controls">
                 
                 <input type="radio"  name="arinio_theme_options[servicessection]" value="on" <?php if(!empty($options['servicessection'])) { if($options['servicessection'] == 'on') { ?> checked="checked" <?php }} ?>>ON 
                  <input type="radio" name="arinio_theme_options[servicessection]" value="off"  <?php if(!empty($options['servicessection'])) { if($options['servicessection'] == 'off') { ?> checked="checked" <?php }} ?>>OFF 
                 
                
              </div>
              <div class="explain">Activate Services Section For Front Page</div>
            </div>
          </div>
          
          
          
          
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Main Heading</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[msheading]" size="30" type="text" value="<?php echo $options['msheading']; ?>" />
              </div>
              <div class="explain">Mention the Service Main Heading text for Service section </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Main Heading Description</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[msheadingdes]" id="msheadingdes" cols="6" rows="6"><?php echo $options['msheadingdes']; ?></textarea>
                
              </div>
              <div class="explain">Mention the Main Heading Description text for Service section </div>
            </div>
          </div>
          
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">First Icon</h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon1]" type="text" size="30" value="<?php echo $options['sicon1']; ?>" />
              </div>
              <div class="explain">Enter the CSS class of the icons you want to use on your site like: fa-desktop or fa-group. You can find a list of icon classes here <a href="http://fortawesome.github.io/Font-Awesome" target="_blank">Click here</a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">First Title</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[fstitle]" size="30" type="text" value="<?php echo $options['fstitle']; ?>" />
              </div>
              <div class="explain">Mention the First Service Title text for Service section </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">First Description</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[fdtitle]" id="fdtitle" cols="6" rows="6"><?php echo $options['fdtitle']; ?></textarea>
                
              </div>
              <div class="explain">Mention the First Service Description text for Service section </div>
            </div>
          </div>
          
          
          
           <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Second Icon</h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon2]" type="text" size="30" value="<?php echo $options['sicon2']; ?>" />
              </div>
              <div class="explain">Enter the CSS class of the icons you want to use on your site. You can find a list of icon classes here <a href="http://fortawesome.github.io/Font-Awesome" target="_blank">Click here</a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Second Title</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle]" size="30" type="text" value="<?php echo $options['sstitle']; ?>" />
              </div>
              <div class="explain">Mention the Second Service Title text for Service section </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Second Description</h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle]" id="sdtitle" cols="6" rows="6"><?php echo $options['sdtitle']; ?></textarea>
                 
              </div>
              <div class="explain">Mention the Second Service Description text for Service section</div>
            </div>
          </div>
          
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">Third Icon</h4>
            <div class="option">
              <div class="controls">
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon3]" type="text" size="30" value="<?php echo $options['sicon3']; ?>" />
              </div>
              <div class="explain">Enter the CSS class of the icons you want to use on your site. You can find a list of icon classes here <a href="http://fortawesome.github.io/Font-Awesome" target="_blank">Click here</a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Third Title</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle3]" size="30" type="text" value="<?php echo $options['sstitle3']; ?>" />
              </div>
              <div class="explain">Mention the Third Service Title text for Service section </div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Third Description</h4>
            <div class="option">
              <div class="controls">
              <textarea class="of-input" name="arinio_theme_options[sdtitle3]" id="sdtitle3" cols="6" rows="6"><?php echo $options['sdtitle3']; ?></textarea>
                 
              </div>
              <div class="explain">Mention the Third Service Description text for Service section </div>
            </div>
          </div>
          
          
          
        </div>
        
        
        
        
        
        
        
        
        
         
        
        
        
        
        
        
        
        
        
        
        
        
        <div id="options-group-11" class="group socialsettings">
          <h3>Blog Settings</h3>
          
          <div id="section-bloglayout" class="section section-radio">
            <h4 class="heading">Activate Blog Section</h4>
            <div class="option">
              <div class="controls">
                 
                 <input type="radio"  name="arinio_theme_options[blogsection]" value="on" <?php if(!empty($options['blogsection'])) { if($options['blogsection'] == 'on') { ?> checked="checked" <?php }} ?>>ON 
                  <input type="radio" name="arinio_theme_options[blogsection]" value="off"  <?php if(!empty($options['blogsection'])) { if($options['blogsection'] == 'off') { ?> checked="checked" <?php }} ?>>OFF 
                 
                
              </div>
              <div class="explain">Activate Blog Section For Front Page</div>
            </div>
          </div>
           
           
          
          
          
              <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Blog Heading</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="blogh" class="of-input" name="arinio_theme_options[blogh]" size="32"  value="<?php echo $options['blogh']; ?>">
              </div>
              <div class="explain">Enter here Blog Heading to show on front page.</div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Blog Description</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[bloghdd]" id="customcss" cols="6" rows="6"><?php echo $options['bloghdd']; ?></textarea>
              
                
              </div>
              <div class="explain">Enter here Blog Description to show on front page.</div>
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
</div>
<?php }