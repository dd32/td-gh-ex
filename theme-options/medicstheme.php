<?php
function medicstheme_options_init(){
 register_setting( 'medics_options', 'medics_theme_options', 'medics_options_validate');
} 
add_action( 'admin_init', 'medicstheme_options_init' );
function medics_options_validate( $input ) {
 
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 $input['email'] = is_email( $input['email'] );
	 $input['phone'] = wp_filter_nohtml_kses( $input['phone'] );
	 $input['helpline'] = wp_filter_nohtml_kses( $input['helpline'] );
	 
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['fburl'] = esc_url_raw( $input['fburl'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	 
	 $input['home-title'] = wp_filter_nohtml_kses( $input['home-title'] );
	 $input['home-content'] = wp_filter_nohtml_kses( $input['home-content'] );
	 $input['homeblogtitle'] = wp_filter_nohtml_kses( $input['homeblogtitle'] );
     $input['home-download-text'] = wp_filter_nohtml_kses( $input['home-download-text'] );
	 $input['home-download-link'] = esc_url_raw( $input['home-download-link'] );
	 		 
	 for($medics_section_i=1; $medics_section_i <=3 ;$medics_section_i++ ):
	 $input['home-icon-'.$medics_section_i] = esc_url_raw( $input['home-icon-'.$medics_section_i]);
	 $input['section-title-'.$medics_section_i] = wp_filter_nohtml_kses($input['section-title-'.$medics_section_i]);
	 $input['section-content-'.$medics_section_i] = wp_filter_nohtml_kses($input['section-content-'.$medics_section_i]);
	 endfor;
	 
    return $input;
}
function medicstheme_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'medicstheme_framework', get_template_directory_uri(). '/theme-options/css/medicstheme_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'medicstheme_framework' );	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/medicstheme-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'medicstheme_framework_load_scripts' );
function medicstheme_framework_menu_settings() {
	$medics_menu = array(
				'page_title' => __( 'Medicstheme Options', 'medicstheme_framework'),
				'menu_title' => __('Theme Options', 'medicstheme_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'medicstheme_framework',
				'callback' => 'medicstheme_framework_page'
				);
	return apply_filters( 'medicstheme_framework_menu', $medics_menu );
}
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_add_page() {
	$medics_menu = medicstheme_framework_menu_settings();
   	add_theme_page($medics_menu['page_title'],$medics_menu['menu_title'],$medics_menu['capability'],$medics_menu['menu_slug'],$medics_menu['callback']);
} 
function medicstheme_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		
		$medics_image=get_template_directory_uri().'/theme-options/images/logo.png';		
?>
<div class="medicstheme-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="medicstheme-header">
    <div class="logo">
      <?php
		$medics_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$medics_image."' alt='medicstheme' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'medics' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
    </div>
  </div>
  <div class="medicstheme-details">
    <div class="medicstheme-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab generalsettings-tab" title="General Settings" href="#options-group-1">Basic Settings</a></li>
            <li><a id="options-group-2-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-2">Social Settings</a></li>
            <li><a id="options-group-3-tab" class="nav-tab homesettings-tab" title="Home Post Settings" href="#options-group-3">Home Page Settings</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
        <?php settings_fields( 'medics_options' );  
		$medics_options = get_option( 'medics_theme_options' ); ?>
		<!--========= First Group ========-->
          <div id="options-group-1" class="group faster-inner-tabs">
          	<div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group active">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="medics_theme_options[logo]" value="<?php if(!empty($medics_options['logo'])) { echo esc_url($medics_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($medics_options['logo'])) { echo "<img src='".esc_url($medics_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="medics_theme_options[favicon]" 
                            value="<?php if(!empty($medics_options['favicon'])) { echo esc_url($medics_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($medics_options['favicon'])) { echo "<img src='".esc_url($medics_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>              
              </div>
            </div>
           <div id="section-footertext2" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext2" class="of-input" name="medics_theme_options[footertext]" size="32"  value="<?php if(!empty($medics_options['footertext'])) { echo esc_attr($medics_options['footertext']); } ?>">
                </div>                
              </div>
            </div> 
            <div id="section-email" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">E-mail</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter e-mail id for your site , you would like to display in the Top Header.</div>                
                  	<input type="text" id="email" class="of-input" name="medics_theme_options[email]" size="32"  value="<?php if(!empty($medics_options['email'])) { echo is_email($medics_options['email']); } ?>">
                </div>                
              </div>
            </div> 
            <div id="section-phone" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Phone</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter phone number for your site , you would like to display in the Top Header.</div>                
                  	<input type="text" id="phone" class="of-input" name="medics_theme_options[phone]" size="32"  value="<?php if(!empty($medics_options['phone'])) { echo esc_attr($medics_options['phone']); } ?>">
                </div>                
              </div>
            </div> 
            <div id="section-helpline" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Phone Title</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter title to display before phone number , you would like to display in the Top Header.</div>                
                  	<input type="text" id="helpline" class="of-input" name="medics_theme_options[helpline]" size="32"  value="<?php if(!empty($medics_options['helpline'])) { echo esc_attr($medics_options['helpline']); } ?>">
                </div>                
              </div>
            </div>           
          </div>          
          <!--========= Second Group ========-->
          <div id="options-group-2" class="group faster-inner-tabs"> 
			<div id="section-fburl" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Facebook</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/</div>                <input id="fburl" class="of-input" name="medics_theme_options[fburl]" size="30" type="text" value="<?php if(!empty($medics_options['fburl'])) { echo esc_url($medics_options['fburl']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Twitter</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Twitter profile or page URL i.e. http://twitter.com/username/</div>                
              		<input id="twitter" class="of-input" name="medics_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($medics_options['twitter'])) { echo esc_url($medics_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-google" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google +</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Google plus profile or page URL i.e. https://plus.google.com/username/</div>
              		<input id="googleplus" class="of-input" name="medics_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($medics_options['googleplus'])) { echo esc_url($medics_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
          </div>          
          <!--========= Third Group ========-->
          <div id="options-group-3" class="group faster-inner-tabs">  
          <h3>Title Bar</h3>
          <div id="section-home-title" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Title</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Enter home page title for your site , you would like to display in the Home Page.</div>                
                  	<input type="text" id="home-title" class="of-input" name="medics_theme_options[home-title]" size="32"  value="<?php if(!empty($medics_options['home-title'])) { echo esc_attr($medics_options['home-title']); } ?>">
                </div>                
              </div>
            </div>
            <div id="section-home-content" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Short Description</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter home content for your site , you would like to display in the Home Page.</div> <textarea id="home-content" class="of-input" name="medics_theme_options[home-content]"><?php if(!empty($medics_options['home-content'])) { echo esc_attr($medics_options['home-content']); } ?></textarea>
                </div>                
              </div>
            </div>
            <h3>First Section</h3>
            <?php for($medics_section_i=1; $medics_section_i <=3 ;$medics_section_i++ ): ?>
            <div class="section theme-tabs theme-<?php echo $medics_section_i; ?>">
				<a class="heading faster-inner-tab" href="javascript:void(0)">Tab <?php echo $medics_section_i; ?></a>
				<div class="faster-inner-tab-group">
              	<div class="ft-control">
					<input id="icon-<?php echo $medics_section_i; ?>" class="upload" type="text" name="medics_theme_options[home-icon-<?php echo $medics_section_i; ?>]" value="<?php if(!empty($medics_options['home-icon-'.$medics_section_i])) { echo esc_url($medics_options['home-icon-'.$medics_section_i]); } ?>" placeholder="Icone <?php echo $medics_section_i; ?>" />
					<input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
					<div class="screenshot" id="icon-image-<?php echo $medics_section_i; ?>">
					  <?php if(!empty($medics_options['home-icon-'.$medics_section_i])) { echo "<img src='".esc_url($medics_options['home-icon-'.$medics_section_i])."' /><a class='remove-image'>Remove</a>"; } ?>
					</div>
               </div>
               <div class="ft-control">
					<div class="explain">Enter <?php echo $medics_section_i; ?> Section title for your home template , you would like to display in the Home Page.</div>                
                  	<input type="text" id="home-title-<?php echo $medics_section_i; ?>" class="of-input" name="medics_theme_options[section-title-<?php echo $medics_section_i; ?>]" size="32"  value="<?php if(!empty($medics_options['section-title-'.$medics_section_i])) { echo esc_attr($medics_options['section-title-'.$medics_section_i]); } ?>" placeholder ="Title <?php echo $medics_section_i; ?>">
			   </div>
			   <div class="ft-control">
              		<div class="explain">Enter <?php echo $medics_section_i; ?> Section title for your home template , you would like to display in the Home Page.</div> <textarea id="section-content-<?php echo $medics_section_i; ?>" class="of-input" name="medics_theme_options[section-content-<?php echo $medics_section_i; ?>]"><?php if(!empty($medics_options['section-content-'.$medics_section_i])) { echo esc_attr($medics_options['section-content-'.$medics_section_i]); } ?></textarea>
                </div> 
            </div>
          </div>
			<?php endfor; ?>
			<h3>Post Settings</h3>
			<div id="section-home-blog" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Home Blog Title</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Enter Blog title for your site , you would like to display in Home page.</div> 
              		<input type="text" id="home-blog-title" class="of-input" name="medics_theme_options[homeblogtitle]" size="32"  value="<?php if(!empty($medics_options['homeblogtitle'])) { echo esc_attr($medics_options['homeblogtitle']); } ?>">
                </div>                
              </div>
            </div>
            <div class="section theme-tabs theme-post">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Category</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
                <div class="explain">Please select category to display post on Home page.</div>
                <select name="medics_theme_options[post-category]" id="category">
                  <option value=""><?php echo esc_attr(__('Select Category','medics')); ?></option>
                  <?php 
				 $medics_args = array(
				  'orderby' => 'name',
				  'parent' => 0
				  );
                  $medics_categories = get_categories($medics_args); 
                  foreach ($medics_categories as $medics_category) {
					  if($medics_category->term_id == $medics_options['post-category'])
					  	$medics_selected="selected=selected";
					  else
					  	$medics_selected='';
                    $medics_option = '<option value="'.$medics_category->term_id .'" '.$medics_selected.'>';
                    $medics_option .= $medics_category->cat_name;
                    $medics_option .= '</option>';
                    echo $medics_option;
                  }
                 ?>
                </select>
                </div>                
              </div>
            </div>
          <h3>Download Settings</h3>
           <div class="section theme-tabs theme-download">
				<a class="heading faster-inner-tab" href="javascript:void(0)">Download Text</a>
				<div class="faster-inner-tab-group">
				   <div class="ft-control">
						<div class="explain">Enter Download Link for your site , you would like to display in the Home Page.</div> 
						<textarea id="home-download-text" class="of-input" name="medics_theme_options[home-download-text]"><?php if(!empty($medics_options['home-download-text'])) { echo esc_attr($medics_options['home-download-text']); } ?></textarea>
					</div> 
				</div>
			</div>		
          <div id="section-home-download" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Home Download Link</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain"></div>                
                  	<input type="text" id="home-title" class="of-input" name="medics_theme_options[home-download-link]" size="32"  value="<?php if(!empty($medics_options['home-download-link'])) { echo esc_url($medics_options['home-download-link']); } ?>">
                </div>                
              </div>
            </div>
        </div>  
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="medicstheme-footer">
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
