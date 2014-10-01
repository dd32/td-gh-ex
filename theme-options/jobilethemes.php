<?php
function jobiletheme_options_init(){
 register_setting( 'theme_options', 'jobile_theme_options','theme_options_validate');
} 
add_action( 'admin_init', 'jobiletheme_options_init' );
function theme_options_validate($input)
{
	$input['logo'] = esc_url_raw( $input['logo'] );
	$input['favicon'] = esc_url_raw( $input['favicon'] );
	$input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	
	$input['front-lefttitle'] = wp_filter_nohtml_kses( $input['front-lefttitle'] );
	$input['front-righttitle'] = wp_filter_nohtml_kses( $input['front-righttitle'] );
	$input['google-map-address'] = wp_filter_nohtml_kses( $input['google-map-address'] );
    return $input;
}
function jobiletheme_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'jobiletheme_framework', get_template_directory_uri(). '/theme-options/css/jobiletheme_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'jobiletheme_framework' );	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/jobiletheme-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'jobiletheme_framework_load_scripts' );
function jobiletheme_framework_menu_settings() {
	$jobile_menu = array(
				'page_title' => __( 'jobiletheme Options', 'jobile_framework'),
				'menu_title' => __('Theme Options', 'jobile_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'jobiletheme_framework',
				'callback' => 'jobile_framework_page'
				);
	return apply_filters( 'jobiletheme_framework_menu', $jobile_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$jobile_menu = jobiletheme_framework_menu_settings();
   	add_theme_page($jobile_menu['page_title'],$jobile_menu['menu_title'],$jobile_menu['capability'],$jobile_menu['menu_slug'],$jobile_menu['callback']);
} 
function jobile_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
		$jobile_image=get_template_directory_uri().'/theme-options/images/logo.png';		
?>
<div class="jobiletheme-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="jobiletheme-header">
    <div class="logo">
      <?php
		$jobile_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$jobile_image."' alt='jobiletheme' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'jobile' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
    </div>
  </div>
  <div class="jobiletheme-details">
    <div class="jobiletheme-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab generalsettings-tab" title="General Settings" href="#options-group-1">General Settings</a></li>
            <li><a id="options-group-2-tab" class="nav-tab frontpagesettings-tab" title="Front Page Settings" href="#options-group-2">Front Page Settings</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'theme_options' );  
		$jobile_options = get_option( 'jobile_theme_options' ); ?>
            <!-------------- First group ----------------->
          <div id="options-group-1" class="group jobile-inner-tabs">
			<div class="section theme-tabs theme-logo">
            <a class="heading jobile-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="jobile-inner-tab-group active">
            	<div class="explain">Size of logo should be exactly 245x25px for best results. Leave blank to use text heading.</div>
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="jobile_theme_options[logo]" 
                            value="<?php if(!empty($jobile_options['logo'])) { echo esc_url($jobile_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($jobile_options['logo'])) { echo "<img src='".esc_url($jobile_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
          	<div class="section theme-tabs theme-favicon">
              <a class="heading jobile-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="jobile-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="jobile_theme_options[favicon]" 
                            value="<?php if(!empty($jobile_options['favicon'])) { echo esc_url($jobile_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($jobile_options['favicon'])) { echo "<img src='".esc_url($jobile_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
              </div>
            </div>
            	<div id="section-footertext" class="section theme-tabs"> <a class="heading jobile-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="jobile-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>
                  <input type="text" id="footertext" class="of-input" name="jobile_theme_options[footertext]" size="46"  value="<?php if(!empty($jobile_options['footertext'])) { echo esc_attr($jobile_options['footertext']); } ?>">
                </div>
              </div>
            </div>
          </div>
          <!-------------- First group ----------------->
          <div id="options-group-2" class="group jobile-inner-tabs">
			  <div id="section-left-title" class="section theme-tabs"> <a class="heading jobile-inner-tab active" href="javascript:void(0)">Left title text</a>
              <div class="jobile-inner-tab-group active">
                <div class="ft-control">
                  <div class="explain">Some text regarding front page left title, you would like to display in the frontpage.</div>
                  <input type="text" id="front-lefttitle" class="of-input" name="jobile_theme_options[front-lefttitle]" size="46"  value="<?php if(!empty($jobile_options['front-lefttitle'])) { echo esc_attr($jobile_options['front-lefttitle']); } ?>">
                </div>
              </div>
            </div>
			<div id="section-right-title" class="section theme-tabs"> <a class="heading jobile-inner-tab" href="javascript:void(0)">Right title text</a>
              <div class="jobile-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Some text regarding front page right title, you would like to display in the frontpage.</div>
                  <input type="text" id="front-righttitle" class="of-input" name="jobile_theme_options[front-righttitle]" size="46"  value="<?php if(!empty($jobile_options['front-righttitle'])) { echo esc_attr($jobile_options['front-righttitle']); } ?>">
                </div>
              </div>
            </div>
            <div id="section-google-address" class="section theme-tabs"> <a class="heading jobile-inner-tab" href="javascript:void(0)">Google map address</a>
              <div class="jobile-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Some text regarding front page right title, you would like to display in the frontpage.</div>
                  <textarea id="google-map-address" class="of-input" name="jobile_theme_options[google-map-address]"><?php if(!empty($jobile_options['google-map-address'])) { echo esc_attr($jobile_options['google-map-address']); } ?></textarea>
                </div>
              </div>
            </div>
		  </div>						
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="jobiletheme-footer">
      	<ul>
        	<li>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></li>
            <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png"/> </a></li>
            <li><a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png"/> </a></li>
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
