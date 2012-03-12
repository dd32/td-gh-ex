<?php
/**
 * Theme Options
 *
 *
 * @file           theme-options.php
 * @package        WordPress 
 * @subpackage     responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/includes/theme-options.php
 * @link           http://themeshaper.com/2010/06/03/sample-theme-options/
 * @since          available since Release 1.0
 */
?>
<?php
add_action('admin_init', 'responsive_theme_options_init');
add_action('admin_menu', 'responsive_theme_options_add_page');

/**
 * A safe way of adding javascripts to a WordPress generated page.
 */
function responsive_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'responsive-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '1.0' );
	wp_enqueue_script( 'responsive-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array( 'jquery' ), '2011-06-10' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'responsive_admin_enqueue_scripts' );

/**
 * Init plugin options to white list our options
 */
function responsive_theme_options_init() {
    register_setting('responsive_options', 'responsive_theme_options', 'responsive_theme_options_validate');
}

/**
 * Load up the menu page
 */
function responsive_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'responsive'), __('Theme Options', 'responsive'), 'edit_theme_options', 'theme_options', 'responsive_theme_options_do_page');
}

/**
 * Redirect users to Theme Options after activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );

/**
 * Site Verification and Webmaster Tools
 * If user sets the code we're going to display meta verification
 * And if left blank let's not display anything at all in case there is a plugin that does this
 */
 
function responsive_google_verification() {
    $options = get_option('responsive_theme_options');
    if ($options['google_site_verification']) {
		echo '<meta name="google-site-verification" content="' . $options['google_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_google_verification');

function responsive_bing_verification() {
    $options = get_option('responsive_theme_options');
    if ($options['bing_site_verification']) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_bing_verification');

function responsive_yahoo_verification() {
    $options = get_option('responsive_theme_options');
    if ($options['yahoo_site_verification']) {
        echo '<meta name="y_key" content="' . $options['yahoo_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_yahoo_verification');

function responsive_site_statistics_tracker() {
    $options = get_option('responsive_theme_options');
    if ($options['site_statistics_tracker']) {
        echo $options['site_statistics_tracker'];
	}
}

add_action('wp_head', 'responsive_site_statistics_tracker');
	
/**
 * Create the options page
 */
function responsive_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
    <div class="wrap">
        <?php screen_icon();
        echo "<h2>" . get_current_theme() . __(' Theme Elements', 'responsive') . "</h2>"; ?>

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'responsive'); ?></strong></p></div>
		<?php endif; ?>

        <form method="post" action="options.php">
            <?php settings_fields('responsive_options'); ?>
            <?php $options = get_option('responsive_theme_options'); ?>
            
            <div id="wf" class="grid col-940">

            <h3 class="wf-toggle"><a href="#">Theme Elements</a></h3>
            <div class="wf-container">
                <div class="wf-block"> 
                               
                <?php
                /**
                 * Breadcrumb Lists
                 */
                ?>
                <div class="grid col-300"><?php _e('Show Breadcrumb Lists?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[breadcrumb]" name="responsive_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($options['breadcrumb']) ? checked( '1', $options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[breadcrumb]"><?php _e('Check to disable', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * CTA Button
                 */
                ?>
                <div class="grid col-300"><?php _e('Show CTA Button?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[cta_button]" name="responsive_theme_options[cta_button]" type="checkbox" value="1" <?php isset($options['cta_button']) ? checked( '1', $options['cta_button'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[cta_button]"><?php _e('Check to disable', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <?php
                /**
                 * Search Box
                 */
                ?>
                <div class="grid col-300"><?php _e('Show Header Search Box?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[search_box]" name="responsive_theme_options[search_box]" type="checkbox" value="1" <?php isset($options['search_box']) ? checked( '1', $options['search_box'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[search_box]"><?php _e('Check to disable', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
                        </p>			
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .wf-block -->
            </div><!-- end of .wf-container -->

            <h3 class="wf-toggle"><a href="#">Logo Upload</a></h3>
            <div class="wf-container">
                <div class="wf-block">
                <?php
                /**
                 * Logo Upload
                 */
                ?>
                <div class="grid col-300"><?php _e('Custom Header', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        
                        <p><?php printf(__('Need to replace or remove default logo? <a href="%s">Click here</a>.', 'responsive'), admin_url('themes.php?page=custom-header')); ?></p>
                     			
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .wf-block -->
            </div><!-- end of .wf-container -->
                        
            <h3 class="wf-toggle"><a href="#">Homepage</a></h3>
            <div class="wf-container">
                <div class="wf-block">
                <?php
                /**
                 * Homepage Headline
                 */
                ?>
                <div class="grid col-300"><?php _e('Headline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_headline]" class="regular-text" type="text" name="responsive_theme_options[home_headline]" value="<?php if (!empty($options['home_headline'])) esc_attr_e($options['home_headline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_headline]"><?php _e('Enter your headline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Content Area
                 */
                ?>
                <div class="grid col-300"><?php _e('Content Area', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[home_content_area]" class="large-text" cols="50" rows="10" name="responsive_theme_options[home_content_area]"><?php if (!empty($options['home_content_area'])) esc_attr_e($options['home_content_area']); ?></textarea>
                        <label class="description" for="responsive_theme_options[home_content_area]"><?php _e('Enter your content', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Subheadline
                 */
                ?>
                <div class="grid col-300"><?php _e('Subheadline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_subheadline]" class="regular-text" type="text" name="responsive_theme_options[home_subheadline]" value="<?php if (!empty($options['home_subheadline'])) esc_attr_e($options['home_subheadline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_subheadline]"><?php _e('Enter your subheadline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                                
                <?php
                /**
                 * Homepage Featured Button Link
                 */
                ?>
                <div class="grid col-300"><?php _e('Featured Button (Link)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[featured_button_link]" class="regular-text" type="text" name="responsive_theme_options[featured_button_link]" value="<?php if (!empty($options['featured_button_link'])) esc_attr_e($options['featured_button_link']); ?>" />
                        <label class="description" for="responsive_theme_options[featured_button_link]"><?php _e('Enter your featured button link', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Homepage Featured Button Text
                 */
                ?>
                <div class="grid col-300"><?php _e('Featured Button (Text)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[featured_button_text]" class="regular-text" type="text" name="responsive_theme_options[featured_button_text]" value="<?php if (!empty($options['featured_button_text'])) esc_attr_e($options['featured_button_text']); ?>" />
                        <label class="description" for="responsive_theme_options[featured_button_text]"><?php _e('Enter your featured button text', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Featured Content
                 */
                ?>
                <div class="grid col-300"><?php _e('Featured Content', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[featured_content]" class="large-text" cols="50" rows="10" name="responsive_theme_options[featured_content]"><?php if (!empty($options['featured_content'])) esc_attr_e($options['featured_content']); ?></textarea>
                        <label class="description" for="responsive_theme_options[featured_content]"><?php _e('Paste your video or image source', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .wf-block -->
            </div><!-- end of .wf-container -->

            <h3 class="wf-toggle"><a href="#">Webmaster Tools</a></h3>
            <div class="wf-container">
                <div class="wf-block"> 
                               
                <?php
                /**
                 * Google Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Google Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[google_site_verification]" class="regular-text" type="text" name="responsive_theme_options[google_site_verification]" value="<?php if (!empty($options['google_site_verification'])) esc_attr_e($options['google_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Bing Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Bing Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[bing_site_verification]" class="regular-text" type="text" name="responsive_theme_options[bing_site_verification]" value="<?php if (!empty($options['bing_site_verification'])) esc_attr_e($options['bing_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Yahoo Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Yahoo Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[yahoo_site_verification]" class="regular-text" type="text" name="responsive_theme_options[yahoo_site_verification]" value="<?php if (!empty($options['yahoo_site_verification'])) esc_attr_e($options['yahoo_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[yahoo_site_verification]"><?php _e('Enter your Yahoo ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <?php
                /**
                 * Site Statistics Tracker
                 */
                ?>
                <div class="grid col-300"><?php _e('Site Statistics Tracker', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[site_statistics_tracker]" class="large-text" cols="50" rows="10" name="responsive_theme_options[site_statistics_tracker]"><?php if (!empty($options['site_statistics_tracker'])) esc_attr_e($options['site_statistics_tracker']); ?></textarea>
                        <label class="description" for="responsive_theme_options[site_statistics_tracker]"><?php _e('Google Analytics, StatCounter, any other or all of them.', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->
                
                </div><!-- end of .wf-block -->
            </div><!-- end of .wf-container -->

            <h3 class="wf-toggle"><a href="#">Social Icons</a></h3>
            <div class="wf-container">
                <div class="wf-block"> 
                            
                <?php
                /**
                 * Social Media
                 */
                ?>
                <div class="grid col-300"><?php _e('Twitter', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[twitter_uid]" class="regular-text" type="text" name="responsive_theme_options[twitter_uid]" value="<?php if (!empty($options['twitter_uid'])) esc_attr_e($options['twitter_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <div class="grid col-300"><?php _e('Facebook', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[facebook_uid]" class="regular-text" type="text" name="responsive_theme_options[facebook_uid]" value="<?php if (!empty($options['facebook_uid'])) esc_attr_e($options['facebook_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('LinkedIn', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[linkedin_uid]" class="regular-text" type="text" name="responsive_theme_options[linkedin_uid]" value="<?php if (!empty($options['linkedin_uid'])) esc_attr_e($options['linkedin_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('YouTube', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[youtube_uid]" class="regular-text" type="text" name="responsive_theme_options[youtube_uid]" value="<?php if (!empty($options['youtube_uid'])) esc_attr_e($options['youtube_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('StumbleUpon', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[stumble_uid]" class="regular-text" type="text" name="responsive_theme_options[stumble_uid]" value="<?php if (!empty($options['stumble_uid'])) esc_attr_e($options['stumble_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your StumbleUpon URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('RSS Feed', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[rss_uid]" class="regular-text" type="text" name="responsive_theme_options[rss_uid]" value="<?php if (!empty($options['rss_uid'])) esc_attr_e($options['rss_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('Google+', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[google_plus_uid]" class="regular-text" type="text" name="responsive_theme_options[google_plus_uid]" value="<?php if (!empty($options['google_plus_uid'])) esc_attr_e($options['google_plus_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .wf-block -->
            </div><!-- end of .wf-container -->
            
            </div><!-- end of .grid col-940 -->

            <div class="grid col-940">

            </div>
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function responsive_theme_options_validate($input) {

	// checkbox value is either 0 or 1
	foreach (array(
		'breadcrumb',
		'cta_button',
		'search_box'
		) as $checkbox) {
		if (!isset( $input[$checkbox]))
			$input[$checkbox] = null;
		$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
	}
	
    $input['home_headline'] = wp_kses_stripslashes($input['home_headline']);
    $input['home_content_area'] = wp_kses_stripslashes($input['home_content_area']);
	$input['home_subheadline'] = wp_kses_stripslashes($input['home_subheadline']);
    $input['featured_button_text'] = wp_kses_stripslashes($input['featured_button_text']);
    $input['featured_button_link'] = wp_filter_post_kses($input['featured_button_link']);
    $input['featured_content'] = wp_kses_stripslashes($input['featured_content']);
    $input['google_site_verification'] = wp_filter_post_kses($input['google_site_verification']);
    $input['bing_site_verification'] = wp_filter_post_kses($input['bing_site_verification']);
    $input['yahoo_site_verification'] = wp_filter_post_kses($input['yahoo_site_verification']);
    $input['site_statistics_tracker'] = wp_kses_stripslashes($input['site_statistics_tracker']);
	$input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
	$input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
    $input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
	$input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
	$input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
	$input['rss_uid'] = esc_url_raw($input['rss_uid']);
	$input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
	
    return $input;
}