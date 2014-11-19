<?php
function a1_options_init(){
 register_setting( 'a1_options', 'a1_theme_options', 'a1_options_validate');
} 
add_action( 'admin_init', 'a1_options_init' );
function a1_options_validate( $input ) {
	
	/*-------------- Basic Settings----------------*/
    $input['logo'] = esc_url_raw( $input['logo'] );
    $input['favicon'] = esc_url_raw( $input['favicon'] );
  
	/*------------Top Header Settings--------------*/
    $input['phone'] = wp_filter_nohtml_kses( $input['phone'] ); 
    $input['header-location'] = wp_filter_nohtml_kses( $input['header-location'] );       
    $input['email'] = sanitize_email( $input['email'] );
    $input['fburl'] = esc_url_raw( $input['fburl'] );
    $input['twitter'] = esc_url_raw( $input['twitter'] );
    $input['googleplus'] = esc_url_raw( $input['googleplus'] );
    $input['pinterest'] = esc_url_raw( $input['pinterest'] );       

	/*-------------- Footer Settings-----------------*/
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
    
   	/*-------------- Homepage Settings----------------*/
    for($a1_i=1; $a1_i <=5 ;$a1_i++ ):
    $input['slider-img-'.$a1_i] = esc_url_raw( $input['slider-img-'.$a1_i] );
    $input['slidecaption-'.$a1_i] = wp_filter_nohtml_kses( $input['slidecaption-'.$a1_i]);
	$input['slidebuttontext-'.$a1_i] = wp_filter_nohtml_kses( $input['slidebuttontext-'.$a1_i]);
	$input['slidebuttonlink-'.$a1_i] = esc_url_raw( $input['slidebuttonlink-'.$a1_i]);
    endfor;       
    $input['coretitle'] = wp_filter_nohtml_kses( $input['coretitle'] );       
    $input['corecaption'] = wp_filter_nohtml_kses( $input['corecaption'] );       
    for($a1_section_i=1; $a1_section_i <=3 ;$a1_section_i++ ):
	$input['home-icon-'.$a1_section_i] = esc_url_raw( $input['home-icon-'.$a1_section_i]);
	$input['section-title-'.$a1_section_i] = wp_filter_nohtml_kses($input['section-title-'.$a1_section_i]);
	$input['section-content-'.$a1_section_i] = wp_filter_nohtml_kses($input['section-content-'.$a1_section_i]);
	endfor;   
    $input['producttitle'] = wp_filter_nohtml_kses( $input['producttitle'] );
    $input['productcaption'] = wp_filter_nohtml_kses( $input['productcaption'] );
    $input['product-form-email'] = sanitize_email( $input['product-form-email'] );
    $input['portfolio-title'] = wp_filter_nohtml_kses( $input['portfolio-title'] );
    $input['portfolio-caption'] = wp_filter_nohtml_kses( $input['portfolio-caption'] );
    $input['portfolio-number'] = wp_filter_nohtml_kses( $input['portfolio-number'] );
    $input['testimonials-title'] = wp_filter_nohtml_kses( $input['testimonials-title'] );
    $input['testimonials-caption'] = wp_filter_nohtml_kses( $input['testimonials-caption'] ); 
    $input['get-touch-title'] = wp_filter_nohtml_kses( $input['get-touch-title'] );
    $input['get-touch-caption'] = wp_filter_nohtml_kses( $input['get-touch-caption'] );
    $input['testimonials-caption'] = wp_filter_nohtml_kses( $input['testimonials-caption'] );
	$input['get-touch-logo'] = esc_url_raw( $input['get-touch-logo'] );
	$input['contactus-now-text'] = wp_filter_nohtml_kses( $input['contactus-now-text'] );
	$input['get-touch-page'] = esc_url_raw( $input['get-touch-page'] );
	$input['company-title'] = wp_filter_nohtml_kses( $input['company-title'] );
    $input['companies-caption'] = wp_filter_nohtml_kses( $input['companies-caption'] );
    
    	/*-------------- Blog Settings-----------------*/
    $input['blogtitle'] = wp_filter_nohtml_kses( $input['blogtitle'] );
    $input['entry-meta-by'] = wp_filter_nohtml_kses( $input['entry-meta-by'] ); 
    $input['entry-meta-on'] = wp_filter_nohtml_kses( $input['entry-meta-on'] ); 
    $input['entry-meta-in'] = wp_filter_nohtml_kses( $input['entry-meta-in'] ); 
    $input['entry-meta-comments'] = wp_filter_nohtml_kses( $input['entry-meta-comments'] ); 
    $input['entry-meta-tags'] = wp_filter_nohtml_kses( $input['entry-meta-tags'] );      
	
    return $input;
}
function a1_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'a1_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'a1_framework' );
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ));
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery' ) );		
}
add_action( 'admin_enqueue_scripts', 'a1_framework_load_scripts' );
function a1_framework_menu_settings() {
	$a1_menu = array(
				'page_title' => __( 'A1 Theme Options', 'a1_framework'),
				'menu_title' => __('Theme Options', 'a1_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'a1_framework',
				'callback' => 'a1_framework_page'
				);
	return apply_filters( 'a1_framework_menu', $a1_menu );
}
add_action( 'admin_menu', 'a1_theme_options_add_page' ); 
function a1_theme_options_add_page() {
	$a1_menu = a1_framework_menu_settings();
   	add_theme_page($a1_menu['page_title'],$a1_menu['menu_title'],$a1_menu['capability'],$a1_menu['menu_slug'],$a1_menu['callback']);
} 
function a1_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
			
?>

<div class="a1-themes">
  <form method="post" action="options.php" id="form-option" class="theme_option_ft">
    <div class="a1-header">
      <div class="logo">
        <?php
		$a1_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$a1_image."' alt='FasterThemes' /></a>";
		?>
      </div>
      <div class="header-right">
        <?php
			echo "<h1>". __( 'Theme Options', 'a1' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
      </div>
    </div>
    <div class="a1-details">
      <div class="a1-options">
        <div class="right-box">
          <div class="nav-tab-wrapper">
            <ul>
               <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a></li>
				<li><a id="options-group-2-tab" class="nav-tab headersettings-tab" title="Header Settings" href="#options-group-2">Top Header Settings</a></li>
				<li><a id="options-group-3-tab" class="nav-tab footersettings-tab" title="Footer Settings" href="#options-group-3">Footer Settings</a></li>
				<li><a id="options-group-4-tab" class="nav-tab homepagesettings-tab" title="Home Page Settings" href="#options-group-4">Home Page Settings</a></li>  
				<li><a id="options-group-5-tab" class="nav-tab blogpagesettings-tab" title="Blog Page Settings" href="#options-group-5">Blog Page Settings</a></li>
            </ul>
          </div>
        </div>
        <div class="right-box-bg"></div>
        <div class="postbox left-box"> 
          <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'a1_options' ); $a1_options = get_option( 'a1_theme_options' ); ?>
          
      <!-------------- Basic Settings----------------->
          <div id="options-group-1" class="group basicsettings a1-inner-tabs">
	  
            <div class="section theme-tabs theme-logo"> <a class="heading a1-inner-tab active" href="javascript:void(0)">Logo (Recommended Size : 100px * 62px)</a>
              <div class="a1-inner-tab-group active">
                <div class="ft-control">
                  <input id="logo-img" class="upload" type="text" name="a1_theme_options[logo]" value="<?php if(!empty($a1_options['logo'])) { echo esc_url($a1_options['logo']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="logo-image">
                    <?php if(!empty($a1_options['logo'])) { echo "<img src='".esc_url($a1_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-favicon"> <a class="heading a1-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="a1-inner-tab-group">
                <div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="a1_theme_options[favicon]" 
                    value="<?php if(!empty($a1_options['favicon'])) { echo esc_url($a1_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($a1_options['favicon'])) { echo "<img src='".esc_url($a1_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
              </div>
            </div>
	    <div id="section-remove-breadcrumbs" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)">Breadcrumbs</a>
		<div class="a1-inner-tab-group">
              <div class="ft-control">
		<input type="checkbox" id="a1-remove-breadcrumbs" name="a1_theme_options[remove-breadcrumbs]" <?php if(!empty($a1_options['remove-breadcrumbs'])) { ?> checked="checked" <?php } ?> value="yes">
		<label class="remove-breadcrumbs-class" for="a1-remove-breadcrumbs">Check this if you want to hide the breadcrumbs.</label>
               </div>
		</div>
            </div>     
	 </div>
	  
	  <!-------------- Top Header Settings----------------->
          <div id="options-group-2" class="group topheadersettings a1-inner-tabs">          
	    <div class="theme-tabs theme-colors theme-fonts">
	     <div style="display: block;">
     	       <div class="ft-control">
		<input type="checkbox" id="a1-remove-top-header" name="a1_theme_options[remove-top-header]" <?php if(!empty($a1_options['remove-top-header'])) { ?> checked="checked" <?php } ?> value="yes">
		<label class="remove-slider-class" for="a1-remove-top-header">Check this if you want to hide the top header.</label>
               </div>
	    </div>
	  </div>            
	  <div id="section-header-location" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)">Location</a>
              <div class="a1-inner-tab-group">
	      <div class="ft-control">
                  <div class="explain"></div>
                  <input type="text" id="header-location" class="of-input" name="a1_theme_options[header-location]" size="32"  value="<?php if(!empty($a1_options['header-location'])) { echo esc_attr($a1_options['header-location']); } ?>">
                </div>
              </div>
            </div>
	<div id="section-phone" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)">Phone</a>
              <div class="a1-inner-tab-group">
	      <div class="ft-control">
                  <div class="explain">Phone</div>
                  <input type="text" id="phone" class="of-input" name="a1_theme_options[phone]" size="32"  value="<?php if(!empty($a1_options['phone'])) { echo esc_attr($a1_options['phone']); } ?>">
                </div>
              </div>
            </div>
	  <div id="section-email" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)">E-mail</a>
              <div class="a1-inner-tab-group">
	      <div class="ft-control">
                  <div class="explain">E-mail</div>
                  <input type="text" id="email" class="of-input" name="a1_theme_options[email]" size="32"  value="<?php if(!empty($a1_options['email'])) { echo sanitize_email($a1_options['email']); } ?>">
                </div>
              </div>
            </div>
	  <div id="section-facebook" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Facebook Link</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Facebook profile or page URL like http://facebook.com/username/ </div>
                  <input id="facebook" class="of-input" name="a1_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($a1_options['fburl'])) { echo esc_url($a1_options['fburl']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Twitter Link</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Twitter profile or page URL like http://www.twitter.com/username/</div>
                  <input id="twitter" class="of-input" name="a1_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($a1_options['twitter'])) { echo esc_url($a1_options['twitter']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-pinterest" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Pinterest Link</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Pinterest profile or page URL like https://pinterest.com/username/</div>
                  <input id="pinterest" class="of-input" name="a1_theme_options[pinterest]" type="text" size="30" value="<?php if(!empty($a1_options['pinterest'])) { echo esc_url($a1_options['pinterest']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-googleplus" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Google+ Link</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Google plus profile or page URL like https://plus.google.com/username/</div>
                  <input id="googleplus" class="of-input" name="a1_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($a1_options['googleplus'])) { echo esc_url($a1_options['googleplus']); } ?>" />
                </div>
              </div>
            </div>
	   <div id="section-scroll-top-header" class="section theme-tabs theme-colors theme-fonts"> <a class="heading a1-inner-tab" href="javascript:void(0)">Display top header on scroll</a>
		<div class="a1-inner-tab-group">
              <div class="ft-control">
		<input type="checkbox" id="a1-scroll-top-header" name="a1_theme_options[scroll-top-header]" <?php if(!empty($a1_options['scroll-top-header'])) { ?> checked="checked" <?php } ?> value="yes">
		<label class="scroll-top-header-class" for="a1-scroll-top-header">Check this if you want to display top header on scroll.</label>
               </div>
		</div>
            </div>      
	  </div>

	  <!-------------- Footer Settings----------------->
          <div id="options-group-3" class="group footersettings a1-inner-tabs"> 
	    <div id="section-footertext" class="section theme-tabs"> <a class="heading a1-inner-tab active" href="javascript:void(0)">Copyright Text</a>
              <div class="a1-inner-tab-group active">
                <div class="ft-control">
                  <div class="explain">Copyright text for the footer of your website.</div>
                  <input type="text" id="footertext" class="of-input" name="a1_theme_options[footertext]" size="32"  value="<?php if(!empty($a1_options['footertext'])) { echo esc_attr($a1_options['footertext']); } ?>">
                </div>
              </div>
            </div>
	  <div class="section theme-tabs theme-content"> <a class="heading a1-inner-tab" href="javascript:void(0)">Content</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter content for your site , you would like to display in the Footer.</div>
                  <textarea name="a1_theme_options[footer-content]" rows="6" id="footer-content" class="of-input"><?php if(!empty($a1_options['footer-content'])) { echo esc_attr($a1_options['footer-content']); } ?></textarea>
                </div>
              </div>
            </div>
	  </div>
          
      <!-------------- Homepage settings ----------------->     
          <div id="options-group-4" class="group a1-inner-tabs">
            <br /><h3>Banner Slider</h3>
            <div class="theme-tabs theme-colors theme-fonts">
			<div style="display: block;">
				<div class="ft-control">
				<input type="checkbox" id="a1-remove-slider" name="a1_theme_options[remove-slider]" <?php if(!empty($a1_options['remove-slider'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="remove-slider-class" for="a1-remove-slider">Check this to remove slider section on the home page.</label>
                </div>          
              </div>
            </div>
            <?php for($a1_i=1; $a1_i <= 5 ;$a1_i++ ):?>
            <div class="section theme-tabs theme-slider-img"> <a class="heading a1-inner-tab" href="javascript:void(0)">Slider <?php echo $a1_i;?></a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <input id="slider-img-<?php echo $a1_i;?>" class="upload" type="text" name="a1_theme_options[slider-img-<?php echo $a1_i;?>]" 
                            value="<?php if(!empty($a1_options['slider-img-'.$a1_i])) { echo esc_url($a1_options['slider-img-'.$a1_i]); } ?>" placeholder="No file chosen" />
                  <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="slider-img-<?php echo $a1_i;?>">
                    <?php if(!empty($a1_options['slider-img-'.$a1_i])) { echo "<img src='".esc_url($a1_options['slider-img-'.$a1_i])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                <div class="ft-control">
                  <input type="text" placeholder="Slide<?php echo $a1_i; ?> Caption" id="slidecaption-<?php echo $a1_i;?>" class="of-input" name="a1_theme_options[slidecaption-<?php echo $a1_i;?>]" size="32"  value="<?php if(!empty($a1_options['slidecaption-'.$a1_i])) { echo esc_attr($a1_options['slidecaption-'.$a1_i]); } ?>">
                </div>
                <div class="ft-control">
                  <input type="text" placeholder="Slide<?php echo $a1_i; ?> Button Test" id="slidebuttontext-<?php echo $a1_i;?>" class="of-input" name="a1_theme_options[slidebuttontext-<?php echo $a1_i;?>]" size="32"  value="<?php if(!empty($a1_options['slidebuttontext-'.$a1_i])) { echo esc_attr($a1_options['slidebuttontext-'.$a1_i]); } ?>">
                </div>
                <div class="ft-control">
                  <input type="text" placeholder="Slide<?php echo $a1_i; ?> Button Link" id="slidebuttonlink-<?php echo $a1_i;?>" class="of-input" name="a1_theme_options[slidebuttonlink-<?php echo $a1_i;?>]" size="32"  value="<?php if(!empty($a1_options['slidebuttonlink-'.$a1_i])) { echo esc_url($a1_options['slidebuttonlink-'.$a1_i]); } ?>">
                </div>
              </div>
            </div>
            <?php endfor; ?>
            <h3>Core Features Section</h3>
            <div class="theme-tabs theme-colors theme-fonts">
			  <div style="display: block;">
				<div class="ft-control">
				<input type="checkbox" id="a1-remove-core-features" name="a1_theme_options[remove-core-features]" <?php if(!empty($a1_options['remove-core-features'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="a1-core-features-class" for="a1-remove-core-features">Check this to remove core features section on home page.</label>
                </div>          
              </div>
            </div>
            <div id="section-coretitle" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Title</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter core features title for your site , you would like to display in the Home Page.</div>
                  <input id="coretitle" class="of-input" name="a1_theme_options[coretitle]" type="text" size="50" value="<?php if(!empty($a1_options['coretitle'])) { echo esc_attr($a1_options['coretitle']); } ?>" />
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)">Caption</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter core features caption for your site , you would like to display in the Home Page.</div>
                  <textarea name="a1_theme_options[corecaption]" rows="6" id="corecaption1" class="of-input"><?php if(!empty($a1_options['corecaption'])) { echo esc_attr($a1_options['corecaption']); } ?>
</textarea>
                </div>
              </div>
            </div>
            
            <?php for($a1_section_i=1; $a1_section_i <=3 ;$a1_section_i++ ): ?>
            <div class="section theme-tabs theme-slider-img"> <a class="heading a1-inner-tab" href="javascript:void(0)">Tab <?php echo $a1_section_i; ?></a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <input id="first-image-<?php echo $a1_section_i;?>" class="upload" type="text" name="a1_theme_options[home-icon-<?php echo $a1_section_i;?>]" value="<?php if(!empty($a1_options['home-icon-'.$a1_section_i])) { echo esc_url($a1_options['home-icon-'.$a1_section_i]); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="first-img-<?php echo $a1_section_i;?>">
                    <?php if(!empty($a1_options['home-icon-'.$a1_section_i])) { echo "<img src='".esc_url($a1_options['home-icon-'.$a1_section_i])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                <div class="ft-control">
                  <div class="explain">Enter core features tab title for your home template , you would like to display in the Home Page.</div>
                  <input type="text" placeholder="Enter title here" id="title-<?php echo $a1_section_i;?>" class="of-input" name="a1_theme_options[section-title-<?php echo $a1_section_i;?>]" size="32"  value="<?php if(!empty($a1_options['section-title-'.$a1_section_i])) { echo esc_attr($a1_options['section-title-'.$a1_section_i]); } ?>">
                </div>
                <div class="ft-control">
                  <div class="explain">Enter score features tab content for home template , you would like to display in the Home Page.</div>
                  <textarea name="a1_theme_options[section-content-<?php echo $a1_section_i; ?>]" rows="6" id="content-<?php echo $a1_section_i; ?>" placeholder="Enter Content here" class="of-input"><?php if(!empty($a1_options['section-content-'.$a1_section_i])) { echo esc_attr($a1_options['section-content-'.$a1_section_i]); } ?>
</textarea>
                </div>
              </div>
            </div>
            <?php endfor; ?>
            <h3>Product Description</h3>
            <div class="theme-tabs theme-colors theme-fonts">
			  <div style="display: block;">
				<div class="ft-control">
				<input type="checkbox" id="a1-remove-product-description" name="a1_theme_options[remove-product-description]" <?php if(!empty($a1_options['remove-product-description'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="a1-core-features-class" for="a1-remove-product-description">Check this to remove product description section on home page.</label>
                </div>          
              </div>
            </div>
             <div id="section-producttitle" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Title</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter product title for your site , you would like to display in the Home Page.</div>
                  <input id="producttitle" class="of-input" name="a1_theme_options[producttitle]" type="text" size="50" value="<?php if(!empty($a1_options['producttitle'])) { echo esc_attr($a1_options['producttitle']); } ?>" />
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)">Caption</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter product caption for your site , you would like to display in the Home Page.</div>
                  <textarea name="a1_theme_options[productcaption]" rows="6" id="productcaption1" class="of-input"><?php if(!empty($a1_options['productcaption'])) { echo esc_attr($a1_options['productcaption']); } ?>
</textarea>
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)">Content</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter product content for your site , you would like to display in the Home Page.</div>
					<?php 				
						 $a1_content = $a1_options['productcontent'];
						 $a1_editor_id = 'productcontent';
						 $a1_settings = array('textarea_name' => 'a1_theme_options[productcontent]','textarea_rows' => 25);
						 wp_editor($a1_content, $a1_editor_id, $a1_settings);
					 ?> 
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading a1-inner-tab" href="javascript:void(0)">Form E-mail</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter e-mail id.</div>
                  <input id="product-form-email" class="of-input" name="a1_theme_options[product-form-email]" type="text" size="50" value="<?php if(!empty($a1_options['product-form-email'])) { echo sanitize_email($a1_options['product-form-email']); } ?>" />
                </div>
              </div>
            </div>
            
            <h3>Get in Touch</h3>
            <div class="theme-tabs theme-colors theme-fonts">
			  <div style="display: block;">
				<div class="ft-control">
				<input type="checkbox" id="a1-remove-getin-touch" name="a1_theme_options[remove-getin-touch]" <?php if(!empty($a1_options['remove-getin-touch'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="a1-our-portfolio-class" for="a1-remove-getin-touch">Check this to remove get in touch section on home page.</label>
                </div>          
              </div>
            </div>
            <div id="section-get-touch-title" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Title</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter get in touch title for your site , you would like to display in the Home Page.</div>
                  <input id="get-touch-title" class="of-input" name="a1_theme_options[get-touch-title]" type="text" size="50" value="<?php if(!empty($a1_options['get-touch-title'])) { echo esc_attr($a1_options['get-touch-title']); } ?>" />
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-get-touch"> <a class="heading a1-inner-tab" href="javascript:void(0)">Caption</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter get in touch caption for your site , you would like to display in the Home Page.</div>
                  <textarea name="a1_theme_options[get-touch-caption]" rows="6" id="get-touch-caption1" class="of-input"><?php if(!empty($a1_options['get-touch-caption'])) { echo esc_attr($a1_options['get-touch-caption']); } ?>
</textarea>
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-get-touch-logo"> <a class="heading a1-inner-tab" href="javascript:void(0)">Get in Touch Logo</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <input id="get-touch-logo-img" class="upload" type="text" name="a1_theme_options[get-touch-logo]" value="<?php if(!empty($a1_options['get-touch-logo'])) { echo esc_url($a1_options['get-touch-logo']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="get-touch-logo-image">
                    <?php if(!empty($a1_options['get-touch-logo'])) { echo "<img src='".esc_url($a1_options['get-touch-logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
              </div>
            </div>
            <div id="section-contactus-now" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Button Text</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter button text for your site , you would like to display in the button.</div>
                  <input id="contactus-now-text" class="of-input" name="a1_theme_options[contactus-now-text]" type="text" size="50" value="<?php if(!empty($a1_options['contactus-now-text'])) { echo esc_attr($a1_options['contactus-now-text']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-contactus-now" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Contact Link</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Contact link for your button.</div>
			<input type="text" class="of-input" size="50" name="a1_theme_options[get-touch-page]" value="<?php if(!empty($a1_options['get-touch-page'])) { echo $a1_options['get-touch-page']; } ?>" /> 
                </div>
              </div>
            </div>
          </div>
 	  <!-------------- Blog Settings----------------->
           <div id="options-group-5" class="group blogsettings a1-inner-tabs">
	    <div id="section-blogtitle" class="section theme-tabs"> <a class="heading a1-inner-tab active" href="javascript:void(0)">Blog Title</a>
              <div class="a1-inner-tab-group active">
                <div class="ft-control">
                  
                  <input type="text" id="blogtitle" class="of-input" name="a1_theme_options[blogtitle]" size="32"  value="<?php if(!empty($a1_options['blogtitle'])) { echo esc_attr($a1_options['blogtitle']); } ?>">
                </div>
              </div>
            </div>
             <div id="section-entry-meta-by" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Entry meta "by" word. E.g. "written by" can be used instead.</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter entry meta "by" word for your site , you would like to replace with current word.</div>
                  <input id="entry-meta-by" class="of-input" name="a1_theme_options[entry-meta-by]" type="text" size="50" value="<?php if(!empty($a1_options['entry-meta-by'])) { echo esc_attr($a1_options['entry-meta-by']); } ?>" />
                </div>
              </div>
            </div>
             <div id="section-entry-meta-in" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Entry meta "in" word</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter entry meta "in" word for your site , you would like to replace with current word.</div>
                  <input id="entry-meta-in" class="of-input" name="a1_theme_options[entry-meta-in]" type="text" size="50" value="<?php if(!empty($a1_options['entry-meta-in'])) { echo esc_attr($a1_options['entry-meta-in']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-entry-meta-on" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Entry meta "on" word</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter entry meta "on" word for your site , you would like to replace with current word.</div>
                  <input id="entry-meta-on" class="of-input" name="a1_theme_options[entry-meta-on]" type="text" size="50" value="<?php if(!empty($a1_options['entry-meta-on'])) { echo esc_attr($a1_options['entry-meta-on']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-entry-meta-comments" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Entry meta "comments" word</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter entry meta "comments" word for your site , you would like to replace with current word.</div>
                  <input id="entry-meta-comments" class="of-input" name="a1_theme_options[entry-meta-comments]" type="text" size="50" value="<?php if(!empty($a1_options['entry-meta-comments'])) { echo esc_attr($a1_options['entry-meta-comments']); } ?>" />
                </div>
              </div>
            </div>
            <div id="section-entry-meta-tags" class="section theme-tabs"> <a class="heading a1-inner-tab" href="javascript:void(0)">Entry meta "tags" word</a>
              <div class="a1-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter entry meta "tags" word for your site , you would like to replace with current word.</div>
                  <input id="entry-meta-tags" class="of-input" name="a1_theme_options[entry-meta-tags]" type="text" size="50" value="<?php if(!empty($a1_options['entry-meta-tags'])) { echo esc_attr($a1_options['entry-meta-tags']); } ?>" />
                </div>
              </div>
            </div>
	  </div>
      
      <!-------------- End group -----------------> 
        </div>
      </div>
    </div>
    <div class="a1-footer">
      <ul>
        <li>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></li>
        <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a></li>
        <li><a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a></li>
        <li class="btn-save">
          <input type="submit" class="button-primary" value="Save Options" />
        </li>
      </ul>
    </div>
  </form>
</div>
<div class="save-options"><h2>Options saved successfully.</h2></div>
<div class="newsletter"> 
  <!-- Begin MailChimp Signup Form -->
  <h1>Subscribe with us</h1>
  <p>Join our mailing list and we'll keep you updated on new themes as they're released and our exclusive special offers. <a href="http://eepurl.com/SP2nP" target="_blank">Click here to join</a></p>
  <!--End mc_embed_signup--> 
</div>
<?php }
