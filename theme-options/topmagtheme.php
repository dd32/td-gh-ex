<?php
function top_mag_theme_options_init(){
 register_setting( 'top_mag_options', 'topmag_theme_options','theme_options_validate');
} 
add_action( 'admin_init', 'top_mag_theme_options_init' );
function theme_options_validate($input)
{
	$input['breaking-news'] = wp_filter_nohtml_kses( $input['breaking-news'] );
	$input['breaking-news-category'] = wp_filter_nohtml_kses( $input['breaking-news-category'] );
 	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['logo-tagline'] = wp_filter_nohtml_kses( $input['logo-tagline'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	
	$input['post-slider-category'] = wp_filter_nohtml_kses( $input['post-slider-category'] );
	$input['recent-post-number'] = wp_filter_nohtml_kses( $input['recent-post-number'] );
	$input['home-post-category'] = wp_filter_nohtml_kses( $input['home-post-category'] );
	$input['post-number'] = wp_filter_nohtml_kses( $input['post-number'] );	
	
	$input['banner-ads'] = esc_url_raw( $input['banner-ads'] );
	$input['banneradslink'] = esc_url_raw( $input['banneradslink'] ); 
    return $input;
}
function top_mag_theme_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'topmagtheme_framework', get_template_directory_uri(). '/theme-options/css/topmagtheme_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'topmagtheme_framework' );	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/topmagtheme-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'top_mag_theme_framework_load_scripts' );
function top_mag_theme_framework_menu_settings() {
	$top_mag_menu = array(
				'page_title' => __( 'topmagtheme Options', 'top_mag_framework'),
				'menu_title' => __('Theme Options', 'top_mag_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'top_mag_theme_framework',
				'callback' => 'top_mag_framework_page'
				);
	return apply_filters( 'top_mag_theme_framework_menu', $top_mag_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$top_mag_menu = top_mag_theme_framework_menu_settings();
   	add_theme_page($top_mag_menu['page_title'],$top_mag_menu['menu_title'],$top_mag_menu['capability'],$top_mag_menu['menu_slug'],$top_mag_menu['callback']);
} 
function top_mag_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
		$top_mag_image=get_template_directory_uri().'/theme-options/images/logo.png';		
?>
<div class="topmagtheme-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="topmagtheme-header">
    <div class="logo">
      <?php
		$top_mag_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$top_mag_image."' alt='fasterthemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'top-mag' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
    </div>
  </div>
  <div class="topmagtheme-details">
    <div class="topmagtheme-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab headersettings-tab" title="Header Settings" href="#options-group-1">Header Settings</a></li>
            <li><a id="options-group-2-tab" class="nav-tab footersettings-tab" title="Footer Settings" href="#options-group-2">Footer Settings</a></li>
            <li><a id="options-group-3-tab" class="nav-tab homepagesettings-tab" title="Home Page Settings" href="#options-group-3">Home Page Settings</a></li>
            <li><a id="options-group-4-tab" class="nav-tab bannersettings-tab" title="Banner Settings" href="#options-group-4">Banner Settings</a></li>
            <li><a id="options-group-5-tab" class="nav-tab prosettings-tab" title="Pro Theme Settings" href="#options-group-5">PRO Theme Features</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'top_mag_options' );  
		$top_mag_options = get_option( 'topmag_theme_options' ); ?>
          <!-------------- First group ----------------->
          <div id="options-group-1" class="group faster-inner-tabs">
            <div class="section theme-tabs theme-colors theme-fonts">
            	<a href="javascript:void(0)" class="heading faster-inner-tab active">Display Breaking News</a>
              <div class="faster-inner-tab-group active">
                <div class="option-group">                  
                 	<div class="ft-control">
              <input type="checkbox" id="credit-news" name="topmag_theme_options[breaking-news]" <?php if(!empty($top_mag_options['breaking-news'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="breaking-news" for="credit-news">Please check checkbox to display Breaking News.</label>
                </div>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-email">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Select Breaking News Category</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <div class="explain">Please Select Category for Breaking News.</div>
                <?php $top_mag_terms = get_terms('category'); ?>
                <select class="of-input" name="topmag_theme_options[breaking-news-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($top_mag_terms as $top_mag_news_term) { ?>
                    <option value="<?php echo $top_mag_news_term->name; ?>" <?php if(!empty($top_mag_options['breaking-news-category']) && $top_mag_options['breaking-news-category'] == $top_mag_news_term->name) { ?> selected="selected" <?php } ?>><?php echo $top_mag_news_term->name; ?></option>
                    <?php } ?>
                </select>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="topmag_theme_options[logo]" 
                            value="<?php if(!empty($top_mag_options['logo'])) { echo esc_url($top_mag_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($top_mag_options['logo'])) { echo "<img src='".esc_url($top_mag_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
              
            </div>
          </div>
          	<div class="section theme-tabs theme-colors theme-fonts">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Display Tagline</a>
              <div class="faster-inner-tab-group">
                <div class="option-group">                  
                 	<div class="ft-control">
              <input type="checkbox" id="credit-tagline" name="topmag_theme_options[logo-tagline]" <?php if(!empty($top_mag_options['logo-tagline'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="tagline" for="credit-tagline">Please check checkbox to display tagline in header.</label>
                </div>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="topmag_theme_options[favicon]" 
                            value="<?php if(!empty($top_mag_options['favicon'])) { echo esc_url($top_mag_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($top_mag_options['favicon'])) { echo "<img src='".esc_url($top_mag_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                
              </div>
            </div>
          </div>          
          <!-------------- Second group ----------------->
          <div id="options-group-2" class="group faster-inner-tabs">   
            <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext2" class="of-input" name="topmag_theme_options[footertext]" size="32"  value="<?php if(!empty($top_mag_options['footertext'])) { echo esc_attr($top_mag_options['footertext']); } ?>">
                </div>                
              </div>
            </div>
          </div>          
          <!-------------- Third group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs">            
            <div class="section theme-tabs theme-email">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Select Post Slider Category</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
                <div class="explain">Select Post Slider Category</div>
                <?php $top_mag_terms = get_terms('category'); ?>
                <select class="of-input" name="topmag_theme_options[post-slider-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($top_mag_terms as $top_mag_slider_term) { ?>
                    <option value="<?php echo $top_mag_slider_term->name; ?>" <?php if(!empty($top_mag_options['post-slider-category']) && $top_mag_options['post-slider-category'] == $top_mag_slider_term->name) { ?> selected="selected" <?php } ?>><?php echo $top_mag_slider_term->name; ?></option>
                    <?php } ?>
                </select>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs section-recent-post-slider">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Select recent post slider number</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <div class="explain">Please select number of post</div>
                 <select id="recent-post-number" class="of-input"  name="topmag_theme_options[recent-post-number]">
              		<option value="">--select number--</option>
                	<?php for($recent_post_number = 1; $recent_post_number <= 20; $recent_post_number++ ) { ?>
                	<option value="<?php echo $recent_post_number; ?>"<?php if($top_mag_options['recent-post-number'] == $recent_post_number) { echo 'selected="selected"'; } ?>><?php echo $recent_post_number; ?></option>
					<?php } ?>
              </select>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-post">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Select post category</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <div class="explain">Please select category for post slider.</div>
                <?php $top_mag_terms = get_terms('category'); ?>
                <select class="of-input" name="topmag_theme_options[home-post-category]">
                    <option value="">--Select Category--</option>
					<?php foreach($top_mag_terms as $top_mag_home_term) { ?>
                    <option value="<?php echo $top_mag_home_term->name; ?>" <?php if(!empty($top_mag_options['home-post-category']) && $top_mag_options['home-post-category'] == $top_mag_home_term->name) { ?> selected="selected" <?php } ?>><?php echo $top_mag_home_term->name; ?></option>
                    <?php } ?>
                </select>
                </div>                
              </div>
            </div>
            <div class="section theme-tabs section-recent-post-slider">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Select category post number</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <div class="explain">Please select number of post</div>
                 <select id="post-number" class="of-input"  name="topmag_theme_options[post-number]">
              		<option value="">--select number--</option>
                	<?php for($post_number = 1; $post_number <= 20; $post_number++ ) { ?>
                	<option value="<?php echo $post_number; ?>"<?php if($top_mag_options['post-number'] == $post_number) { echo 'selected="selected"'; } ?>><?php echo $post_number; ?></option>
					<?php } ?>
              </select>
                </div>                
              </div>
            </div>
          </div>    
          <!-------------- Fourth group ----------------->
          <div id="options-group-4" class="group faster-inner-tabs">  
			  <div class="section theme-tabs theme-colors theme-fonts">
            	<a href="javascript:void(0)" class="heading faster-inner-tab active">Settings of Top Banner header (Right Hand Side of the Logo)</a>
              <div class="faster-inner-tab-group active">
                <div class="option-group">                  
                 	<div class="ft-control">
              <input type="checkbox" id="display-banner" name="topmag_theme_options[display-banner]" <?php if(!empty($top_mag_options['display-banner'])) { ?> checked="checked" <?php } ?> value="yes">
               <label class="display-banner" for="display-banner">Please check this checkbox if you want to display banner in the right hand side of the logo.</label>
                </div>
                </div>                
              </div>
            </div>
            <div id="section-banneradd" class="section theme-tabs theme-logo">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">HTML Code for the Banner ad</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		 <textarea name="topmag_theme_options[banner-html]" class="of-input" id="banner-html"><?php if(!empty($top_mag_options['banner-html'])) { echo $top_mag_options['banner-html']; } ?></textarea>
                </div>  
                <h4 class="fasterthemes-or sub-heading">OR</h4>
               <h4 class="sub-heading">Image upload for the Banner ad (860px x 90px)</h4> 
                <div class="ft-control">
              		 <input id="banner-ads-image" class="upload" type="text" name="topmag_theme_options[banner-ads]" value="<?php if(!empty($top_mag_options['banner-ads'])) { echo esc_url($top_mag_options['banner-ads']); } ?>" placeholder="No file chosen" />
               <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                    <div class="screenshot" id="logo-img">
                      <?php if(!empty($top_mag_options['banner-ads'])) {  echo "<img src='".esc_url($top_mag_options['banner-ads'])."' /><a class='remove-image'>Remove</a>"; } ?></div>
                </div>
                <div class="ft-control">      
               <input type="text" id="bannerlink" class="of-input" name="topmag_theme_options[banneradslink]" size="32" value="<?php if(!empty($top_mag_options['banneradslink'])) { echo esc_url($top_mag_options['banneradslink']); } ?>" placeholder="Banner Link">
                </div>              
              </div>
            </div> 
		  </div>
          <!-------------- Fifth group ----------------->
          <div id="options-group-5" class="group faster-inner-tabs">            
			<div class="topmagtheme-pro-header">
              <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/theme-logo.png" class="topmagtheme-pro-logo" />
              <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=TopMag" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" class="topmagtheme-pro-buynow" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro_features.jpg" />
          </div>   
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="topmagtheme-footer">
      	<ul>
        	<li>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></li>
            <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a></li>
            <li><a href="https://twitter.com/fasterthemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a></li>
            <li class="btn-save"><input type="submit" class="button-primary" value="Save Options" /></li>
        </ul>
    </div>
    </form>    
</div>
<div class="save-options"><h2>Options saved successfully.</h2></div>
<div class="newsletter">    
      <!-- Begin MailChimp Signup Form -->
      <div id="mc_embed_signup">
        <form action="http://ommune.us2.list-manage.com/subscribe/post?u=9c754572be34858540694990b&amp;id=4ae2e7fd84" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <h2>Enter your email to join our mailing list and we'll keep you updated on new themes as they're
            released and our exclusive special offers.</h2>          
          <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address <span class="asterisk">*</span> </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;">
            <input type="text" name="b_9c754572be34858540694990b_4ae2e7fd84" value="">
          </div>
          <div class="clear">
            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
        </form>
      </div>
      <!--End mc_embed_signup--> 
    </div>
<?php } ?>
