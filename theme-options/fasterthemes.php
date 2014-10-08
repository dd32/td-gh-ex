<?php
function laurels_options_init(){
 register_setting( 'laurels_options', 'laurels_theme_options','laurels_options_validate');
} 
add_action( 'admin_init', 'laurels_options_init' );
function laurels_options_validate($input)
{
	 $input['logo'] = esc_url_raw( $input['logo'] );
	 $input['favicon'] = esc_url_raw( $input['favicon'] );
	 $input['footertext'] = wp_filter_nohtml_kses( $input['footertext'] );
	 
	 	
	 $input['facebook'] = esc_url_raw( $input['facebook'] );
	 $input['twitter'] = esc_url_raw( $input['twitter'] );
	 $input['pinterest'] = esc_url_raw( $input['pinterest'] );
	 $input['googleplus'] = esc_url_raw( $input['googleplus'] );
	 $input['rss'] = esc_url_raw( $input['rss'] );
	 $input['linkedin'] = esc_url_raw( $input['linkedin'] );

	for($laurels_i=1; $laurels_i <=5 ;$laurels_i++ ):
	 $input['slider-img-'.$laurels_i] = esc_url( $input['slider-img-'.$laurels_i] );
	 $input['slidelink-'.$laurels_i] = esc_url( $input['slidelink-'.$laurels_i]);
	 endfor;
	 
	 $input['home-title'] = wp_filter_nohtml_kses( $input['home-title'] );
	 $input['home-content'] = wp_filter_nohtml_kses( $input['home-content'] );
	 
	 for($laurels_section_i=1; $laurels_section_i <=4 ;$laurels_section_i++ ):
	 $input['home-icon-'.$laurels_section_i] = esc_url_raw( $input['home-icon-'.$laurels_section_i]);
	 $input['section-title-'.$laurels_section_i] = wp_filter_nohtml_kses($input['section-title-'.$laurels_section_i]);
	 $input['section-content-'.$laurels_section_i] = wp_filter_nohtml_kses($input['section-content-'.$laurels_section_i]);
	 endfor;
	 
	 
    return $input;
}
function laurels_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'laurels_framework', get_template_directory_uri(). '/theme-options/css/fasterthemes_framework.css' ,false, '1.0.0');
	wp_enqueue_style( 'laurels_framework' );	
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/fasterthemes-custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
	wp_enqueue_script('media-uploader');
}
add_action( 'admin_enqueue_scripts', 'laurels_framework_load_scripts' );
function laurels_framework_menu_settings() {
	$laurels_menu = array(
				'page_title' => __( 'FasterThemes Options', 'laurels_framework'),
				'menu_title' => __('Theme Options', 'laurels_framework'),
				'capability' => 'edit_theme_options',
				'menu_slug' => 'laurels_framework',
				'callback' => 'laurels_framework_page'
				);
	return apply_filters( 'fasterthemes_framework_menu', $laurels_menu );
}
add_action( 'admin_menu', 'laurels_options_add_page' ); 
function laurels_options_add_page() {
	$laurels_menu = laurels_framework_menu_settings();
   	add_theme_page($laurels_menu['page_title'],$laurels_menu['menu_title'],$laurels_menu['capability'],$laurels_menu['menu_slug'],$laurels_menu['callback']);
} 
function laurels_framework_page(){ 
		global $select_options; 
		if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false;		

?>
<div class="fasterthemes-themes">
	<form method="post" action="options.php" id="form-option" class="theme_option_ft">
  <div class="fasterthemes-header">
    <div class="logo">
      <?php
		$laurels_image=get_template_directory_uri().'/theme-options/images/logo.png';
		echo "<a href='http://fasterthemes.com' target='_blank'><img src='".$laurels_image."' alt='FasterThemes' /></a>";
		?>
    </div>
    <div class="header-right">
      <?php
			echo "<h1>". __( 'Theme Options', 'laurels' ) . "</h1>"; 			
			echo "<div class='btn-save'><input type='submit' class='button-primary' value='Save Options' /></div>";			
			?>
    </div>
  </div>
  <div class="fasterthemes-details">
    <div class="fasterthemes-options">
      <div class="right-box">
        <div class="nav-tab-wrapper">
          <ul>
            <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="Basic Settings" href="#options-group-1">Basic Settings</a></li>
            <li><a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="Social Settings" href="#options-group-3">Social Settings</a></li>
            <li><a id="options-group-2-tab" class="nav-tab homepagesettings-tab" title="Homepage Settings" href="#options-group-2">Home page Settings</a></li>
  		  </ul>
        </div>
      </div>
      <div class="right-box-bg"></div>
      <div class="postbox left-box"> 
        <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'laurels_options' );  
		$laurels_options = get_option( 'laurels_theme_options' );
		 ?>
        
            <!-------------- Header group ----------------->
          <div id="options-group-1" class="group faster-inner-tabs">   
          	<div class="section theme-tabs theme-logo">
            <a class="heading faster-inner-tab active" href="javascript:void(0)">Site Logo</a>
            <div class="faster-inner-tab-group active">
              	<div class="ft-control">
                <input id="logo-img" class="upload" type="text" name="laurels_theme_options[logo]" 
                            value="<?php if(!empty($laurels_options['logo'])) { echo esc_url($laurels_options['logo']); } ?>" placeholder="No file chosen" />
                <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                <div class="screenshot" id="logo-image">
                  <?php if(!empty($laurels_options['logo'])) { echo "<img src='".esc_url($laurels_options['logo'])."' /><a class='remove-image'>Remove</a>"; } ?>
                </div>
              </div>
            </div>
          </div>
            <div class="section theme-tabs theme-favicon">
              <a class="heading faster-inner-tab" href="javascript:void(0)">Favicon</a>
              <div class="faster-inner-tab-group">
              	<div class="explain">Size of favicon should be exactly 32x32px for best results.</div>
                <div class="ft-control">
                  <input id="favicon-img" class="upload" type="text" name="laurels_theme_options[favicon]" 
                            value="<?php if(!empty($laurels_options['favicon'])) { echo esc_url($laurels_options['favicon']); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button1" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="favicon-image">
                    <?php  if(!empty($laurels_options['favicon'])) { echo "<img src='".esc_url($laurels_options['favicon'])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
              </div>
            </div>     
            <div id="section-footertext" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Copyright Text</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Some text regarding copyright of your site, you would like to display in the footer.</div>                
                  	<input type="text" id="footertext" class="of-input" name="laurels_theme_options[footertext]" size="32"  value="<?php if(!empty($laurels_options['footertext'])) { echo esc_attr($laurels_options['footertext']); } ?>">
                </div>                
              </div>
            </div>
          </div>    
            
                   
          
          <!-- HOME PAGE -->
<div id="options-group-2" class="group faster-inner-tabs">  
	
	
	<h3>Banner Slider</h3>
            <?php for($laurels_i=1; $laurels_i <= 5 ;$laurels_i++ ):?>
            <div class="section theme-tabs theme-slider-img"> <a class="heading faster-inner-tab" href="javascript:void(0)">Slider <?php echo $laurels_i;?></a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <input id="slider-img-<?php echo $laurels_i;?>" class="upload" type="text" name="laurels_theme_options[slider-img-<?php echo $laurels_i;?>]" 
                            value="<?php if(!empty($laurels_options['slider-img-'.$laurels_i])) { echo esc_url($laurels_options['slider-img-'.$laurels_i]); } ?>" placeholder="No file chosen" />
                  <input id="1upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="slider-img-<?php echo $laurels_i;?>">
                    <?php if(!empty($laurels_options['slider-img-'.$laurels_i])) { echo "<img src='".esc_url($laurels_options['slider-img-'.$laurels_i])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                <div class="ft-control">
                  <input type="text" placeholder="Slide<?php echo $laurels_i; ?> Link" id="slidelink-<?php echo $laurels_i;?>" class="of-input" name="laurels_theme_options[slidelink-<?php echo $laurels_i;?>]" size="32"  value="<?php if(!empty($laurels_options['slidelink-'.$laurels_i])) { echo esc_url($laurels_options['slidelink-'.$laurels_i]); } ?>">
                </div>
              </div>
            </div>
            <?php endfor; ?>
	
	
	
	<h3>Title Bar</h3>	
	<div id="section-title" class="section theme-tabs"> <a class="heading faster-inner-tab" href="javascript:void(0)">Title</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter home page title for your site , you would like to display in the Home Page.</div>
                  <input id="title" class="of-input" name="laurels_theme_options[home-title]" type="text" size="50" value="<?php if(!empty($laurels_options['home-title'])) { echo esc_attr($laurels_options['home-title']); } ?>" />
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading faster-inner-tab" href="javascript:void(0)">Short Description</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter home content for your site , you would like to display in the Home Page.</div>
                  <textarea name="laurels_theme_options[home-content]" rows="6" id="home-content1" class="of-input"><?php if(!empty($laurels_options['home-content'])) { echo esc_attr($laurels_options['home-content']); } ?></textarea>
                </div>
              </div>
            </div>


   <h3>First Section</h3>
            <?php for($laurels_section_i=1; $laurels_section_i <=4 ;$laurels_section_i++ ): ?>
            <div class="section theme-tabs theme-slider-img"> <a class="heading faster-inner-tab" href="javascript:void(0)">Tab <?php echo $laurels_section_i; ?></a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <input id="first-image-<?php echo $laurels_section_i;?>" class="upload" type="text" name="laurels_theme_options[home-icon-<?php echo $laurels_section_i;?>]" 
                            value="<?php if(!empty($laurels_options['home-icon-'.$laurels_section_i])) { echo esc_url($laurels_options['home-icon-'.$laurels_section_i]); } ?>" placeholder="No file chosen" />
                  <input id="upload_image_button" class="upload-button button" type="button" value="Upload" />
                  <div class="screenshot" id="first-img-<?php echo $laurels_section_i;?>">
                    <?php if(!empty($laurels_options['home-icon-'.$laurels_section_i])) { echo "<img src='".esc_url($laurels_options['home-icon-'.$laurels_section_i])."' /><a class='remove-image'>Remove</a>"; } ?>
                  </div>
                </div>
                <div class="ft-control">
                  <div class="explain">Enter secion title for your home template , you would like to display in the Home Page.</div>
                  <input type="text" placeholder="Enter title here" id="title-<?php echo $laurels_section_i;?>" class="of-input" name="laurels_theme_options[section-title-<?php echo $laurels_section_i;?>]" size="32"  value="<?php if(!empty($laurels_options['section-title-'.$laurels_section_i])) { echo esc_attr($laurels_options['section-title-'.$laurels_section_i]); } ?>">
                </div>
                <div class="ft-control">
                  <div class="explain">Enter secion post for your home template , you would like to display in the Home Page.</div>
                  <input type="text" placeholder="Enter post here" id="post-<?php echo $laurels_section_i;?>" class="of-input" name="laurels_theme_options[section-post-<?php echo $laurels_section_i;?>]" size="32"  value="<?php if(!empty($laurels_options['section-post-'.$laurels_section_i])) { echo esc_attr($laurels_options['section-post-'.$laurels_section_i]); } ?>">
                </div>
                <div class="ft-control">
                  <div class="explain">Enter section content for home template , you would like to display in the Home Page.</div>
                  <textarea name="laurels_theme_options[section-content-<?php echo $laurels_section_i; ?>]" rows="6" id="content-<?php echo $laurels_section_i; ?>" placeholder="Enter Content here" class="of-input"><?php if(!empty($laurels_options['section-content-'.$laurels_section_i])) { echo esc_attr($laurels_options['section-content-'.$laurels_section_i]); } ?></textarea>
                </div>
              </div>
            </div>
            <?php endfor; ?>

            <h3>Second Section</h3>
            <div id="section-recent-title" class="section theme-tabs"> <a class="heading faster-inner-tab" href="javascript:void(0)">Category post title</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter category post title for your site , you would like to display in the Home Page.</div>
                  <input id="post" class="of-input" name="laurels_theme_options[post-title]" type="text" size="50" value="<?php if(!empty($laurels_options['post-title'])) { echo esc_attr($laurels_options['post-title']); } ?>" />
                </div>
              </div>
            </div>
            <div class="section theme-tabs theme-short_description"> <a class="heading faster-inner-tab" href="javascript:void(0)">Category</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <select name="laurels_theme_options[post-category]" id="category">
                    <option value=""><?php echo esc_attr(__('Select Category','laurels')); ?></option>
                    <?php 
				$laurels_args = array(
				'meta_query' => array(
									array(
									'key' => '_thumbnail_id',
									'compare' => 'EXISTS'
										),
									)
								);  
				$laurels_post = new WP_Query( $laurels_args );
				$laurels_cat_id=array();
				while($laurels_post->have_posts()){
				$laurels_post->the_post();
				$laurels_post_categories = wp_get_post_categories( get_the_id());   
				$laurels_cat_id[]=$laurels_post_categories[0];
				}
				$laurels_cat_id=array_unique($laurels_cat_id);
				$laurels_args = array(
				'orderby' => 'name',
				'parent' => 0,
				'include'=>$laurels_cat_id
				);
				
				$laurels_categories = get_categories($laurels_args); 
			
                  foreach ($laurels_categories as $laurels_category) {
					  if($laurels_category->term_id == $laurels_options['post-category'])
					  	$laurels_selected="selected=selected";
					  else
					  	$laurels_selected='';
                    $laurels_option = '<option value="'.$laurels_category->term_id .'" '.$laurels_selected.'>';
                    $laurels_option .= $laurels_category->cat_name;
                    $laurels_option .= '</option>';
                    echo $laurels_option;
                  }
                 ?>
                  </select>
                </div>
              </div>
            </div>
            
            <h3>Third Section</h3>
            <div id="section-latespost-title" class="section theme-tabs"> <a class="heading faster-inner-tab" href="javascript:void(0)">Latest Post Title</a>
              <div class="faster-inner-tab-group">
                <div class="ft-control">
                  <div class="explain">Enter Latest post title for your site , you would like to display in the Home Page.</div>
                  <input id="post" class="of-input" name="laurels_theme_options[latestpost-title]" type="text" size="50" value="<?php if(!empty($laurels_options['latestpost-title'])) { echo esc_attr($laurels_options['latestpost-title']); } ?>" />
                </div>
              </div>
            </div>
          
          
</div>             
          <!-- END HOME PAGE -->
          
          <!-------------- Social group ----------------->
          <div id="options-group-3" class="group faster-inner-tabs">            
            <div id="section-facebook" class="section theme-tabs">
            	<a class="heading faster-inner-tab active" href="javascript:void(0)">Facebook</a>
              <div class="faster-inner-tab-group active">
              	<div class="ft-control">
              		<div class="explain">Facebook profile or page URL i.e. http://facebook.com/username/ </div>                
                  	<input id="facebook" class="of-input" name="laurels_theme_options[facebook]" size="30" type="text" value="<?php if(!empty($laurels_options['facebook'])) { echo esc_url($laurels_options['facebook']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-twitter" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Twitter</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Twitter profile or page URL i.e. http://www.twitter.com/username/</div>                
                  	<input id="twitter" class="of-input" name="laurels_theme_options[twitter]" type="text" size="30" value="<?php if(!empty($laurels_options['twitter'])) { echo esc_url($laurels_options['twitter']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-pinterest" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Pinterest</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Pinterest profile or page URL i.e. https://pinterest.com/username/</div>                
                  	 <input id="pinterest" class="of-input" name="laurels_theme_options[pinterest]" type="text" size="30" value="<?php if(!empty($laurels_options['pinterest'])) { echo esc_url($laurels_options['pinterest']); } ?>" />
                </div>                
              </div>
            </div>
			<div id="section-googleplus" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Google plus</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Google plus profile or page URL i.e. https://googleplus.com/username/</div>                
                  	 <input id="googleplus" class="of-input" name="laurels_theme_options[googleplus]" type="text" size="30" value="<?php if(!empty($laurels_options['googleplus'])) { echo esc_url($laurels_options['googleplus']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-rss" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">RSS</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">RSS profile or page URL i.e. https://www.rss.com/username/</div>                
                  	<input id="rss" class="of-input" name="laurels_theme_options[rss]" type="text" size="30" value="<?php if(!empty($laurels_options['rss'])) { echo esc_url($laurels_options['rss']); } ?>" />
                </div>                
              </div>
            </div>
            <div id="section-linkedin" class="section theme-tabs">
            	<a class="heading faster-inner-tab" href="javascript:void(0)">Linkedin</a>
              <div class="faster-inner-tab-group">
              	<div class="ft-control">
              		<div class="explain">Linkedin profile or page URL i.e. https://www.linkedin.com/username/</div>                
                  	<input id="rss" class="of-input" name="laurels_theme_options[linkedin]" type="text" size="30" value="<?php if(!empty($laurels_options['linkedin'])) { echo esc_url($laurels_options['linkedin']); } ?>" />
                </div>                
              </div>
            </div>
          </div>
          <!-------------- Social group ----------------->          
          <div id="options-group-4" class="group faster-inner-tabs fasterthemes-pro-image">
          	<div class="fasterthemes-pro-header">
              <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/theme-logo.png" class="fasterthemes-pro-logo" />
              <a href="http://fasterthemes.com/checkout/get_checkout_details?theme=Laurels" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/buy-now.png" class="fasterthemes-pro-buynow" /></a>
              </div>
          	<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/pro_features.png" />
          </div>   
        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
      </div>
     </div>
	</div>
	<div class="fasterthemes-footer">
      	<ul>
        	<li>&copy; <a href="http://fasterthemes.com" target="_blank">fasterthemes.com</a></li>
            <li><a href="https://www.facebook.com/faster.themes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/fb.png" alr="..." /> </a></li>
            <li><a href="https://twitter.com/FasterThemes" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/tw.png" alr="..."/> </a></li>
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
