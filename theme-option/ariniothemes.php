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
		
		
		echo "<h1>". __( 'Avnii Theme Options', 'customtheme' ) . "</h1>"; 
		if ( false !== $_REQUEST['settings-updated'] ) :
			echo "<div><p><strong>"._e( 'Options saved', 'customtheme' )."</strong></p></div>";
		endif; 
?>

<div class="tnotify">
        <h1>Get Avnii PRO Theme!  Just $11</h1>
        <p style="font-size:15px; line-height: 20px;">You are using the avnii, Free Version of avnii Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section and many more Page Templates, Social Link Section, Life time theme support and much more.</p>
        <a href="http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/" target="blank">Upgrade to avnii PRO Theme here >></a>
    </div>
<div id="arinio_framework-wrap" class="wrap">
  <h2 class="nav-tab-wrapper"> <a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a> <a id="options-group-3-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-3">Slider Settings</a> <a id="options-group-4-tab" class="nav-tab socialsettings-tab" title="Services Settings" href="#options-group-4">Services Settings</a>  <a id="options-group-5-tab" class="nav-tab socialsettings-tab" title="Work Settings" href="#options-group-5">About us Settings</a> <a id="options-group-7-tab" class="nav-tab socialsettings-tab" title="Work Settings" href="#options-group-7">Contact Settings</a> </h2>
  <div id="arinio_framework-metabox" class="metabox-holder">
    <div id="arinios_framework" class="postbox"> 
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
      
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
            <h4 class="heading">Blog Heading</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="blogh" class="of-input" name="arinio_theme_options[blogh]" size="32"  value="<?php echo $options['blogh']; ?>">
              </div>
              <div class="explain">Enter here Blog Heading to show on front page.</div>
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
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 1 Description </h4>
            <div class="option">
              <div class="controls">
                 
                <textarea class="of-input" name="arinio_theme_options[slide1des]" id="slide1des" cols="6" rows="6"><?php echo $options['slide1des']; ?></textarea>
              </div>
              <div class="explain">Mention the Slide 1 Description   for Slider  </div>
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
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Slide 1 Description </h4>
            <div class="option">
              <div class="controls">
                 
                <textarea class="of-input" name="arinio_theme_options[slide2des]" id="slide1des" cols="6" rows="6"><?php echo $options['slide2des']; ?></textarea>
              </div>
              <div class="explain">Mention the Slide 2 Description   for Slider  </div>
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
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Main Heading</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[msheading]" size="30" type="text" value="<?php echo $options['msheading']; ?>" />
              </div>
              <div class="explain">Mention the Service Main Heading text for Service section </div>
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
                <input id="icon1" class="of-input" name="arinio_theme_options[sicon3]" type="text" size="30" value="<?php echo $options['sicon2']; ?>" />
              </div>
              <div class="explain">Enter the CSS class of the icons you want to use on your site. You can find a list of icon classes here <a href="http://fortawesome.github.io/Font-Awesome" target="_blank">Click here</a></div>
            </div>
          </div>
          <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">Third Title</h4>
            <div class="option">
              <div class="controls">
                <input id="heading" class="of-input" name="arinio_theme_options[sstitle3]" size="30" type="text" value="<?php echo $options['sstitle']; ?>" />
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
        
        
        
        
        
        
        
        
        
        <div id="options-group-5" class="group socialsettings">
          <h3>Work & About us Settings</h3>
      <div id="section-facebook" class="section section-text mini">
            <h4 class="heading">About Us Main Heading</h4>
            <div class="option">
              <div class="controls">
                <input id="Aboutus" class="of-input" name="arinio_theme_options[aboutus]" size="30" type="text" value="<?php echo $options['aboutus']; ?>" />
              </div>
              <div class="explain">Mention the About Us Main Heading text for About Us section</div>
            </div>
          </div>
          <div id="section-twitter" class="section section-text mini">
            <h4 class="heading">About Us Description</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[aboutusd]" id="aboutusd" cols="6" rows="6"><?php echo $options['aboutusd']; ?></textarea>
                 
              </div>
              <div class="explain">Mention the About Us Description text for About Us section</div>
            </div>
          </div>
          
        </div>
        
        <div id="options-group-7" class="group socialsettings">
          <h3>Contact Settings</h3>
      
        <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Contact Main Heading</h4>
            <div class="option">
              <div class="controls">
                <input type="text" id="contact" class="of-input" name="arinio_theme_options[contacth]" size="132"  value="<?php echo $options['contacth']; ?>">
              </div>
              <div class="explain">Mention the Contact Main Heading text for Contact section.</div>
            </div>
          </div>
          <div id="section-footertext2" class="section section-textarea">
            <h4 class="heading">Contact Description</h4>
            <div class="option">
              <div class="controls">
               <textarea class="of-input" name="arinio_theme_options[contactd]" id="contactd" cols="6" rows="6"><?php echo $options['contactd']; ?></textarea>
              
                
              </div>
              <div class="explain">Mention the Contact Description text for Contact section.</div>
            </div>
          </div>
         
          
        </div>
     
        <!-------------- End group ----------------->
        
        <div id="arinios_framework-submit" class="section-submite">  <span class="fb"> <a href="https://www.facebook.com/ArinioThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/fb.png"/> </a> </span> <span class="tw"> <a href="https://twitter.com/ArinioThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-option/images/tw.png"/> </a> </span> &nbsp; <span class="tw"> <a href="http://arinio.com" target="_blank"> BY: arinio.com </a> </span>
          <input type="submit" class="button-primary" value="Save Options" />
          <div class="clear"></div>
        </div>
        
        <!-- Container -->
        
      </form>
      
      <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      
    </div>
    <!-- / #container --> 
    
  </div>
  
  
  
  <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php esc_attr_e( 'About avnii', 'avnii' ); ?></h3>
      			<div class="inside"> 
					<div class="option-btn"><a class="btn upgrade" target="_blank" href="<?php echo esc_url( 'http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'Upgrade to Pro' , 'avnii' ); ?></a></div>
                    <div class="option-btn"><a class="btn rate" target="_blank" href="<?php echo esc_url( 'http://arinio.com/' ); ?>"><?php esc_attr_e( 'View More our themes' , 'avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn support" target="_blank" href="<?php echo esc_url( 'http://arinio.com/support/' ); ?>"><?php esc_attr_e( 'Free Support' , 'avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn doc" target="_blank" href="<?php echo esc_url( 'http://arinio.com/document/' ); ?>"><?php esc_attr_e( 'Documentation' , 'avnii' ); ?></a></div>
					<div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://arinio.com/avnii-responsive-multipurpose-wordpress-theme/' ); ?>"><?php esc_attr_e( 'View Demo' , 'avnii' ); ?></a></div>
					

	      			<div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
	      				<strong><?php esc_attr_e( 'If you would like to donate to GROW development and want to helping us you can donate to us.
We are also helping poor community so please help us to help and HAVE A BETTER WORLD. Even 2$ really help :)', 'avnii' ); ?></strong>
	      				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <div class="paypal-donations">
        <input type="hidden" name="cmd" value="_donations">
        <input type="hidden" name="business" value="LQ7DEYTTUPCLL">
        <input type="hidden" name="rm" value="0">
        <input type="hidden" name="currency_code" value="USD">
        <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online.">
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