<?php

/**
 * Sampression Lite Theme Options
 *
 * @package Sampression-Lite
 * @since Sampression Lite 1.0
 */
 
// Bringing up Sampression Theme Option page after install
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	wp_redirect( 'themes.php?page=sampression-options' );
}

/*=======================================================================
 * Function to build theme options
 *=======================================================================*/
add_action('admin_menu', 'sampression_theme_options');
function sampression_theme_options() {
	add_theme_page('Sempression Theme Option', 'Theme Options', 'manage_options', 'sampression-options', 'build_sampression_options');
}

/*=======================================================================
 * Getting js and css files for theme options
 *=======================================================================*/
function sampression_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style( 'sampression-theme-options', get_template_directory_uri() . '/includes/theme-options/theme-options.css', false, '1.0' );
	wp_enqueue_style('thickbox', get_template_directory_uri() . 'wp-includes/js/thickbox/thickbox.css', false, false, 'screen');
	wp_enqueue_script( 'jquery-cookies', get_template_directory_uri() . '/includes/theme-options/jquery.cookies.js', array( 'jquery' ), '1.0' );
	wp_enqueue_script( 'sampression-theme-options', get_template_directory_uri() . '/includes/theme-options/theme-options.js', array( 'jquery' ), '1.0' );
}

add_action( 'admin_print_styles-appearance_page_sampression-options', 'sampression_admin_enqueue_scripts' );

/*=======================================================================
 * Building tabs for Theme Options
 *=======================================================================*/
function build_sampression_options() {
	?>
	<div id="icon-themes" class="icon32"></div>
	<div class="container">
	<h1><?php _e('Sampression Lite Options','sampression'); ?></h1>
	<?php
	if ( isset($_POST['sampression_theme_action']) && $_POST['sampression_theme_action'] == 'submit' ) {
		$options = array ( 'sam_logo', 'sam_use_logo', 'sam_favicons', 'sam_apple_icons_57', 'sam_apple_icons_72', 'sam_apple_icons_114', 'sam_header', 'sam_footer', 'get_facebook', 'get_twitter', 'get_gplus', 'google_site_verification', 'bing_site_verification', 'yahoo_site_verification' );
		foreach ( $options as $opt ) {
			if(isset($_POST[$opt])) {
				delete_option ( 'opt_'.$opt, $_POST[$opt] );
				add_option ( 'opt_'.$opt, $_POST[$opt] );
			}
		}
		// Theme Options setting message
		showMessage('Theme options have been successfully updated.', $errormsg = false);
	} else if ( isset($_POST['sampression_theme_action']) && $_POST['sampression_theme_action'] == 'restore' ) {
		$options = array ( 'sam_logo', 'sam_use_logo', 'sam_favicons', 'sam_apple_icons_57', 'sam_apple_icons_72', 'sam_apple_icons_114' );
		foreach ( $options as $opt ) {
			if(isset($_POST[$opt])) {
				delete_option ( 'opt_'.$opt, $_POST[$opt] );
			}
		}
		// Theme Options setting message: successfully restored.
		showMessage('Theme options have been successfully restored.', $errormsg = false);
		// Getting support form
	} else if ( isset($_POST['sampression_theme_action']) && $_POST['sampression_theme_action'] == 'support' ) {
		$fullname = $_POST['fullname'];
		$emailadd = $_POST['emailadd'];
		$userip = $_POST['userip'];
		$emailsubj = $_POST['emailsubj'];
		$emailmsg = $_POST['emailmsg'];
		$toemail = "themes@sampression.com";
		$text_message = "Dear Admin,<p>Support message have been received from ".get_bloginfo('wpurl').". Client IP address: $userip.</p><p>Message Body:</p><p>$emailmsg</p>";
		$headers='MIME-Version: 1.0' . "\r\n";
		$headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers.='From: '.$fullname.' <'.$emailadd.'>' . "\r\n";
		
		if(wp_mail($toemail, $emailsubj, $text_message, $headers)) {
			showMessage('Your message have been successfully sent to Sampression Support Team.', $errormsg = false);
		} else {
			showMessage('Your message could not be sent at the moment. Please try again later.', $errormsg = true);
		}
	}
	sampression_options_tabs();
}

/*=======================================================================
 * Site Verification and Webmaster Tools
 * If user sets the code we're going to display meta verification
 * And if left blank let's not display anything at all in case there is a plugin that does this
 *=======================================================================*/
function sampression_google_verification() {
    if (get_option('opt_google_site_verification')) {
		echo '<meta name="google-site-verification" content="' . get_option('opt_google_site_verification') . '" />' . "\n";
	}
}
add_action('wp_head', 'sampression_google_verification');

function sampression_bing_verification() {
    if (get_option('opt_bing_site_verification')) {
		echo '<meta name="msvalidate.01" content="' . get_option('opt_bing_site_verification') . '" />' . "\n";
	}
}
add_action('wp_head', 'sampression_bing_verification');

function sampression_yahoo_verification() {
    if (get_option('opt_yahoo_site_verification')) {
		echo '<meta name="y_key" content="' . get_option('opt_yahoo_site_verification') . '" />' . "\n";
	}
}
add_action('wp_head', 'sampression_yahoo_verification');

// Display Extra codes in Header
function sampression_header_code() {
    if (get_option('opt_sam_header')) {
		echo get_option('opt_sam_header') . "\n";
	}
}
add_action('wp_head', 'sampression_header_code');

// Display Extra codes in Footer
function sampression_footer_code() {
    if (get_option('opt_sam_footer')) {
		echo get_option('opt_sam_footer') . "\n";
	}
}
add_action('wp_footer', 'sampression_footer_code');



/*=======================================================================
 * Buiding different tabs cotent for Theme Options
 *=======================================================================*/
function sampression_options_tabs() { ?>
    <form method="post" name="frm_theme_option" class="options-tab" action="<?php admin_url( 'themes.php?page=sampression-options' ); ?>">
    <ul class="tabs">
        <li><a href="#tab1"><?php _e('Logo &amp; Icons','sampression'); ?></a></li>
        <li><a href="#tab2"><?php _e('Social Media','sampression'); ?></a></li>
        <li><a href="#tab3"><?php _e('Advanced','sampression'); ?></a></li>
        <li><a href="#tab4"><?php _e('Get Support','sampression'); ?></a></li>
    </ul>

        <div class="tab_container">
        <!-- Tab: Logo & Icons -->
        <div style="display: none;" id="tab1" class="tab_content">
        <?php
			$use_logo = get_option('opt_sam_use_logo');
			$use_check = '';
			if($use_logo == 'yes') {
				$use_check = ' checked="checked" ';
			}
		?>
        <fieldset class="fieldset-1">
        	<legend><?php echo _e('Site Logo','sampression'); ?></legend>
            <div class="group logo-section">
            <div class="col col-1">
                <label><?php echo _e('Browse or enter logo URL','sampression'); ?></label>
                <input type="text" name="sam_logo" class="upload_image text-box" value="<?php echo get_option('opt_sam_logo'); ?>" />
                <input class= "upload_image_button button" type="button" value="Browse" />
                
                <p>
                	<input type="checkbox" id="logo_front_end" value="yes" <?php echo $use_check; ?> onclick="check_frontend_logo()"/>
                    <input type="hidden" name="sam_use_logo" id="sam_use_logo" value="<?php if(get_option('opt_sam_use_logo')) { echo get_option('opt_sam_use_logo'); } else { echo _e('no','sampression'); } ?>" />
                    <label for="logo_front_end" class="inline"><?php echo _e('I dont want to use Logo.','sampression'); ?></label>
                </p>
                
            </div>
            <div class="col col-2">
            <p class="title"><?php echo _e('Logo Preview', 'sampression'); ?></p>
            <?php if(get_option('opt_sam_use_logo') == 'no') { ?>
                <div class="col image-block image-holder logo-img">
                	
                	<?php if(get_option('opt_sam_logo')) { ?>
                    <img src="<?php echo get_option('opt_sam_logo'); ?>" alt="Logo" />
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sampression-logo.png" alt="Logo" />
                    <?php }?>
                </div>
                <?php } ?>
                <!-- .logo-img -->
                <div class="logo-txt">
                <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
          		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                </div>
                <!-- .logo-txt -->
             </div>
            </div>
        </fieldset>
        <fieldset class="fieldset-1">
        	<legend><?php echo _e('Favicon and apple touch icons','sampression'); ?></legend>
            <div class="group">
                <label><?php echo _e('Favicon','sampression'); ?></label>
                <input type="text" class="upload_image text-box" name="sam_favicons" value="<?php echo get_option('opt_sam_favicons'); ?>" />
                <input class= "upload_image_button button" type="button" value="Browse" />
                <div class="image-block image-holder">
                	<?php if(get_option('opt_sam_favicons')) { ?>
                    <img src="<?php echo get_option('opt_sam_favicons'); ?>" alt="<?php echo _e('Favicon','sampression'); ?>" width="16" />
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="<?php echo _e('Favicon','sampression'); ?>" width="16" />
                    <?php } ?>
                    <p class="note"><?php _e('file name should be "favicon.ico" and dimension should be 16x16', 'sampression'); ?></p>
                </div>
            </div>
            <div class="group">
                <label><?php echo _e('Apple Touch Icon (57x57)','sampression'); ?></label>
                <input type="text" class="upload_image text-box" name="sam_apple_icons_57" value="<?php echo get_option('opt_sam_apple_icons_57'); ?>" />
                <input class= "upload_image_button button" type="button" value="Browse" />
                <div class="image-block image-holder">
                	<?php if(get_option('opt_sam_apple_icons_57')) { ?>
                    <img src="<?php echo get_option('opt_sam_apple_icons_57'); ?>" alt="Apple Icon 57 x 57" width="57" />
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" alt="Apple Icon 57 x 57" width="57" />
                    <?php } ?>
                    <p class="note"><?php _e('file name should be "apple-touch-icon.png"', 'sampression'); ?></p>
                </div>
            </div>
            <div class="group">
                <label><?php echo _e('Apple Touch Icon for first and second generation iPad (72x72)','sampression'); ?></label>
                <input type="text" class="upload_image text-box" name="sam_apple_icons_72" value="<?php echo get_option('opt_sam_apple_icons_72'); ?>" />
                <input class= "upload_image_button button" type="button" value="Browse" />
                <div class="image-block image-holder">
                	<?php if(get_option('opt_sam_apple_icons_72')) { ?>
                    <img src="<?php echo get_option('opt_sam_apple_icons_72'); ?>" alt="Apple Icon 72 x 72" width="72" />
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png" alt="Apple Icon 72 x 72" width="72" />
                    <?php } ?>
                    <p class="note"><?php _e('file name should be "apple-touch-icon-72x72.png"', 'sampression'); ?></p>
                </div>
            </div>
            <div class="group">
                <label><?php echo _e('Apple Touch Icon for for high-resolution iPad and iPhone Retina displays (114x114)','sampression'); ?></label>
                <input type="text" class="upload_image text-box" name="sam_apple_icons_114" value="<?php echo get_option('opt_sam_apple_icons_114'); ?>" />
                <input class= "upload_image_button button" type="button" value="Browse" />
                <div class="image-block image-holder">
                	<?php if(get_option('opt_sam_apple_icons_114')) { ?>
                    <img src="<?php echo get_option('opt_sam_apple_icons_114'); ?>" alt="Apple Icon 114 x 114" width="114" />
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png" alt="Apple Icon 114 x 114" width="114" />
                    <?php } ?>
                    <p class="note"><?php _e('file name should be "apple-touch-icon-114x114.png"', 'sampression'); ?></p>
                </div>
            </div>
        </fieldset>
        <input type="hidden" name="sampression_theme_action" id="sampression_theme_action" value="" />
        <input class="button-primary" type="button" onclick="load_theme_action('submit')" value="Save" />
        <input class="button-primary" type="button" onclick="load_theme_action('restore')" value="Re-store Default" />
       </div>
       <!-- Tab: Social Media -->
        <div style="display: none;" id="tab2" class="tab_content">
        <ul class="admin-style-1 social-media">
        	<li class="group">
            <label for="get_facebook"><?php _e('Facebook','sampression'); ?></label>
            <input type="text" name="get_facebook" id="get_facebook" class="input-text" value="<?php echo get_option('opt_get_facebook'); ?>" />
            <p class="note"><em><?php _e('Insert your Facebook ID only, For eg. <strong>xyz</strong> from http://facebook.com/<strong>xyz</strong>', 'sampression'); ?></em></p>
        	</li>
            
            <li class="group">
            <label for="get_twitter"><?php _e('Twitter','sampression'); ?></label>
            <input type="text" name="get_twitter" id="get_twitter" class="input-text" value="<?php echo get_option('opt_get_twitter'); ?>" />
            <p class="note"><em><?php _e('Insert your Twitter ID only, For eg. <strong>xyz</strong> from http://twitter.com/<strong>xyz</strong>', 'sampression'); ?></em></p>
        	</li>
            
            <li class="group">
            <label for="get_gplus"><?php _e('Google Plus','sampression'); ?></label>
            <input type="text" name="get_gplus" id="get_gplus" class="input-text" value="<?php echo get_option('opt_get_gplus'); ?>" />
            <p class="note"><em><?php _e('Insert the full URL of your Google Plus ID, For eg. https://plus.google.com/u/0/123456789/posts', 'sampression'); ?></em></p>
        	</li>
            
            <li class="group">
        <input class="button-primary" type="button" onclick="load_theme_action('submit')" value="Save" />
            </li>
        </ul>
        </div>
        <!-- Tab: Advanced -->
        <div style="display: none;" id="tab3" class="tab_content">
         <fieldset class="fieldset-1">
        	<legend><?php _e('Webmaster Tools','sampression'); ?></legend>
            <ul class="admin-style-1 support-form webmaster-tool-form">
            <li class="group">
            <label class="description" for="google_site_verification"><?php _e('Google Site Verification', 'sampression'); ?></label>
            <input type="text" name="google_site_verification" id="google_site_verification" class="input-text" value="<?php echo get_option('opt_google_site_verification'); ?>" />               <p class="note"><?php _e('Enter your Google ID number only', 'sampression'); ?></p>
            </li>
            <li class="group">
            <label class="description" for="bing_site_verification"><?php _e('Bing Site Verification', 'sampression'); ?></label>
            <input type="text" name="bing_site_verification" id="bing_site_verification" class="input-text" value="<?php echo get_option('opt_bing_site_verification'); ?>" />               <p class="note"><?php _e('Enter your Bing ID number only', 'sampression'); ?></p>
            </li>
            <li class="group">
            <label class="description" for="yahoo_site_verification"><?php _e('Yahoo Site Verification', 'sampression'); ?></label>
            <input type="text" name="yahoo_site_verification" id="yahoo_site_verification" class="input-text" value="<?php echo get_option('opt_yahoo_site_verification'); ?>" />               <p class="note"><?php _e('Enter your Yahoo ID number only', 'sampression'); ?></p>
            </li>
		</ul>
		</fieldset>                               
        <fieldset class="fieldset-1">
        	<legend><?php _e('Codes to insert in Header','sampression'); ?></legend>
            <textarea name="sam_header" class="text-area" rows="10" cols="100"><?php echo get_option('opt_sam_header'); ?></textarea>
            <p class="note"><?php _e('Write/Paste the codes which you want to insert in Header.','sampression'); ?></p>
        </fieldset>
        <fieldset class="fieldset-1">
        	<legend><?php _e('Codes to insert in Footer','sampression'); ?></legend>
            <textarea name="sam_footer" class="text-area" rows="10" cols="100"><?php echo get_option('opt_sam_footer'); ?></textarea>
            <p class="note"><?php _e('Write/Paste the codes which you want to insert in Footer. For eg. Google Analytics Codes.','sampression'); ?></p>
        </fieldset>
        <input class="button-primary" type="button" onclick="load_theme_action('submit')" value="Save" />
        </div>
        <!-- Tab: Get Support -->
        <div style="display: none;" id="tab4" class="tab_content">
        <h2><?php _e('Any comments/feedbacks/questions?','sampression'); ?></h2>
        <div class="note support-note">
        <p><?php _e('Get support from Sampression Support Team!','sampression'); ?></p>
        </div>
        <!-- .support-note -->
        <ul class="admin-style-1 support-form">
                <li class="group">
                    <label for="fullname"><?php _e('Name','sampression'); ?></label>
                    <input type="text" name="fullname" id="fullname" class="input-text" />
                </li>
                <li class="group">
                    <label for="emailadd"><?php _e('Email','sampression'); ?></label>
                    <input type="text" name="emailadd" id="emailadd" class="input-text" />
                </li>
                <li class="group">
                    <label for="emailsubj"><?php _e('Subject','sampression'); ?></label>
                    <input type="text" name="emailsubj" id="emailsubj" class="input-text" />
                </li>
                <li class="group">
                    <label for="emailmsg"><?php _e('Message','sampression'); ?></label>
                    <textarea cols="100" rows="10" id="emailmsg" name="emailmsg" class="text-area"></textarea>
                </li>
                <li class="group">
                <input type="hidden" name="userip" value="<?php echo get_ip(); ?>" />
                	<input class="button-primary btn-send-support" type="button" onclick="load_theme_action('support')" value="<?php _e('Send Message','sampression'); ?>" />
                    <span id="support_error_msg"></span>
                </li>
            </ul>
        </div>
        </div>
    </form>
    </div>
    <?php
}
?>