<?php
function batik_admin_enqueue_scripts( $hook_suffix ) {
wp_enqueue_style( 'batik-theme-options', get_template_directory_uri() . '/options/batik-options.css', '0.0.3' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'batik_admin_enqueue_scripts' );
function batik_theme_options_init() {
    register_setting('batik_options', 'batik_theme_options', 'batik_theme_options_validate');
}
function batik_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'batik'), __('Theme Options', 'batik'), 'edit_theme_options', 'theme_options', 'batik_theme_options_do_page');
}
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
function batik_google_verification() {
    $options = get_option('batik_theme_options');
    if ($options['google_site_verification']) {
    echo '<meta name="google-site-verification" content="' . $options['google_site_verification'] . '" />' . "\n";
	}
}
function batik_bing_verification() {
    $options = get_option('batik_theme_options');
    if ($options['bing_site_verification']) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_site_verification'] . '" />' . "\n";
	}
}
function batik_theme_options_do_page() {
	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
<?php if (false !== $_REQUEST['settings-updated']) : ?>
<div class="updated fade"><p><strong><?php _e('Options Saved', 'batik'); ?></strong></p></div>
<?php endif; ?>
        <form method="post" action="options.php">
 <?php settings_fields('batik_options'); ?>
   <?php $options = get_option('batik_theme_options'); ?>
<div class="row">
<div class="sembilan">
<h1 class="tengah"><?php _e('Welcome to batik theme', 'batik'); ?></h1>
<p><?php _e('This your options page, you can choice and put your adds code, social media URL google site verification', 'batik'); ?></p>
</div>
</div>
<div class="clear"></div>
<div class="row">
            <h2 class="rwd-toggle"><a href="#">Adds</a></h2>
<div class="clear"></div>
<div class="dua">
<h3><?php _e('adds one', 'batik'); ?></h3>
</div>

                    <div class="empat">
                        <textarea id="batik_theme_options[adds_area_one]" class="large-text" cols="50" rows="10" name="batik_theme_options[adds_area_one]"><?php if (!empty($options['adds_area_one'])) echo esc_attr_e($options['adds_area_one']); ?></textarea>
                        <label class="description" for="batik_theme_options[adds_area_one]"><?php _e('Enter your adds content', 'batik'); ?></label>
                    </div>
<div class="dua">
<h3><?php _e('adds two', 'batik'); ?></h3>
</div>

                    <div class="empat">
                        <textarea id="batik_theme_options[adds_area_two]" class="large-text" cols="50" rows="10" name="batik_theme_options[adds_area_two]"><?php if (!empty($options['adds_area_two'])) echo esc_attr_e($options['adds_area_two']); ?></textarea>
                        <label class="description" for="batik_theme_options[adds_area_two]"><?php _e('Enter your adds content', 'batik'); ?></label>
                   
                    </div>

<div class="dua">
<h3><?php _e('adds three', 'batik'); ?></h3>
</div>

                    <div class="empat">
                        <textarea id="batik_theme_options[adds_area_three]" class="large-text" cols="50" rows="10" name="batik_theme_options[adds_area_three]"><?php if (!empty($options['adds_area_three'])) echo esc_attr_e($options['adds_area_three']); ?></textarea>
                        <label class="description" for="batik_theme_options[adds_area_three]"><?php _e('Enter your adds content', 'batik'); ?></label>
                      
                    </div>
<div class="dua">
<h3><?php _e('adds four', 'batik'); ?></h3>
</div>

                    <div class="empat">
                        <textarea id="batik_theme_options[adds_area_four]" class="large-text" cols="50" rows="10" name="batik_theme_options[adds_area_four]"><?php if (!empty($options['adds_area_four'])) echo esc_attr_e($options['adds_area_four']); ?></textarea>
                        <label class="description" for="batik_theme_options[adds_area_four]"><?php _e('Enter your adds content', 'batik'); ?></label>
                       
                    </div>
 <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'batik'); ?>" />
                        </p>
</div>
          

           <div id="rwd" class="row">
            <h2 class="rwd-toggle"><a href="#">Webmaster Tools</a></h2>
<div class="clear"></div>                                           
<div class="tiga">
<?php _e('Google Site Verification', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[google_site_verification]" class="regular-text" type="text" name="batik_theme_options[google_site_verification]" value="<?php if (!empty($options['google_site_verification'])) echo esc_attr_e($options['google_site_verification']); ?>" />
                        <label class="description" for="batik_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'batik'); ?></label>
                    </div>

                
                
                <div class="tiga">
<?php _e('Bing Site Verification', 'batik'); ?>
</div>
                    <div class="sembilan">
                        <input id="batik_theme_options[bing_site_verification]" class="regular-text" type="text" name="batik_theme_options[bing_site_verification]" value="<?php if (!empty($options['bing_site_verification'])) echo esc_attr_e($options['bing_site_verification']); ?>" />
                        <label class="description" for="batik_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'batik'); ?></label>
               

</div>                                                   
                      
<p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'batik'); ?>" />
                        </p>     
                </div>

            <div class="row">
            <h2 class="rwd-toggle"><a href="#">Social Icons</a></h2> 
<div class="clear"></div>                                                     
 <div class="tiga">
<?php _e('Twitter', 'batik'); ?>
</div>
                    <div class="sembilan">
                        <input id="batik_theme_options[twitter_uid]" class="regular-text" type="text" name="batik_theme_options[twitter_uid]" value="<?php if (!empty($options['twitter_uid'])) echo esc_attr_e($options['twitter_uid']); ?>" />
                        <label class="description" for="batik_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'batik'); ?></label>
                    </div>

                <div class="tiga">
<?php _e('Facebook', 'batik'); ?>
</div>
                    <div class="sembilan">
                        <input id="batik_theme_options[facebook_uid]" class="regular-text" type="text" name="batik_theme_options[facebook_uid]" value="<?php if (!empty($options['facebook_uid'])) echo esc_attr_e($options['facebook_uid']); ?>" />
                        <label class="description" for="batik_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'batik'); ?></label>
                    </div>

                
                <div class="tiga">
<?php _e('LinkedIn', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[linkedin_uid]" class="regular-text" type="text" name="batik_theme_options[linkedin_uid]" value="<?php if (!empty($options['linkedin_uid'])) echo esc_attr_e($options['linkedin_uid']); ?>" /> 
                        <label class="description" for="batik_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'batik'); ?></label>
                    </div>

                    
                <div class="tiga">
<?php _e('YouTube', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[youtube_uid]" class="regular-text" type="text" name="batik_theme_options[youtube_uid]" value="<?php if (!empty($options['youtube_uid'])) echo esc_attr_e($options['youtube_uid']); ?>" /> 
                        <label class="description" for="batik_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'batik'); ?></label>
                    </div>



                    
                <div class="tiga">
<?php _e('StumbleUpon', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[stumble_uid]" class="regular-text" type="text" name="batik_theme_options[stumble_uid]" value="<?php if (!empty($options['stumble_uid'])) echo esc_attr_e($options['stumble_uid']); ?>" /> 
                        <label class="description" for="batik_theme_options[stumble_uid]"><?php _e('Enter your StumbleUpon URL', 'batik'); ?></label>
                    </div>

                    
                <div class="tiga">
<?php _e('RSS Feed', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[rss_uid]" class="regular-text" type="text" name="batik_theme_options[rss_uid]" value="<?php if (!empty($options['rss_uid'])) echo esc_attr_e($options['rss_uid']); ?>" /> 
                        <label class="description" for="batik_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'batik'); ?></label>
                    </div>

                <div class="tiga">
<?php _e('Google+', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[google_plus_uid]" class="regular-text" type="text" name="batik_theme_options[google_plus_uid]" value="<?php if (!empty($options['google_plus_uid'])) echo esc_attr_e($options['google_plus_uid']); ?>" />  
                        <label class="description" for="batik_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'batik'); ?></label>
                        
                    </div>
<div class="tiga">
<?php _e('blogger', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[blogger_uid]" class="regular-text" type="text" name="batik_theme_options[blogger_uid]" value="<?php if (!empty($options['blogger_uid'])) echo esc_attr_e($options['blogger_uid']); ?>" /> 
                        <label class="description" for="batik_theme_options[blogger_uid]"><?php _e('Enter your blogspot URL', 'batik'); ?></label>
                    </div>
  <div class="tiga">
<?php _e('Deviantart', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[deviantart_uid]" class="regular-text" type="text" name="batik_theme_options[deviantart_uid]" value="<?php if (!empty($options['deviantart_uid'])) echo esc_attr_e($options['deviantart_uid']); ?>" />  
                        <label class="description" for="batik_theme_options[deviantart_uid]"><?php _e('Enter your Deviantart URL', 'batik'); ?></label>
                        
                    </div>
<div class="tiga">
<?php _e('delicious', 'batik'); ?>
</div>

                    <div class="sembilan">
                        <input id="batik_theme_options[delicious_uid]" class="regular-text" type="text" name="batik_theme_options[delicious_uid]" value="<?php if (!empty($options['delicious_uid'])) echo esc_attr_e($options['delicious_uid']); ?>" />  
                        <label class="description" for="batik_theme_options[delicious_uid]"><?php _e('Enter your Delicious URL', 'batik'); ?></label>
                       
                    </div>
 <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'batik'); ?>" />
                        </p>
                </div>

</form>
<?php
}
function batik_theme_options_validate($input) {
$input['adds_area_one'] = wp_kses_stripslashes($input['adds_area_one']);
$input['adds_area_two'] = wp_kses_stripslashes($input['adds_area_two']);
$input['adds_area_three'] = wp_kses_stripslashes($input['adds_area_three']);
$input['adds_area_four'] = wp_kses_stripslashes($input['adds_area_four']);
$input['google_site_verification'] = wp_filter_post_kses($input['google_site_verification']);
$input['bing_site_verification'] = wp_filter_post_kses($input['bing_site_verification']);
$input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
$input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
$input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
$input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
$input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
$input['blogger_uid'] = esc_url_raw($input['blogger_uid']);
$input['rss_uid'] = esc_url_raw($input['rss_uid']);
$input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
$input['deviantart_uid'] = esc_url_raw($input['deviantart_uid']);
$input['delicious_uid'] = esc_url_raw($input['delicious_uid']);
return $input;
}