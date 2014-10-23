<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */

function optionsframework_option_name() {

	// Change this to use your theme slug
	return 'base';
}

function optionsframework_options() {
	
	// Background Defaults
	$upgrade_message = __('Only available in premium version', 'base');
	

	$options[] = array( "name" => __('General', 'base'),
		"type" => "heading" );
		
	$options['favicon_uploader'] = array(
		"name" => __('Add favicon', 'base'),
		"desc" => __('Upload your favicon', 'base'),
		"id" => "favicon_uploader",
		"type" => "upload" );	
	
	$options['logo_uploader'] = array(
		"name" => __('Logo Upload', 'base'),
		"desc" =>  __('Upload your logo', 'base'),
		"id" => "logo_uploader",
		"type" => "upload" );
	
	$options['icon_iphone'] = array(
		"name" => __('iPhone icon', 'base'),
		"desc" =>  __('Apple touch icon iphone (57x57 px)', 'base'),
		"id" => "icon_iphone",
		"type" => "upload" );
	
	$options['icon_ipad'] = array(
		"name" => __('iPad icon', 'base'),
		"desc" =>  __('Apple touch icon ipad (76x76 px)', 'base'),
		"id" => "icon_ipad",
		"type" => "upload" );
	
	$options['icon_iphone_retina'] = array(
		"name" => __('iPhone retina icon', 'base'),
		"desc" =>  __('Apple touch icon iphone retina (120x120 px)', 'base'),
		"id" => "icon_iphone_retina",
		"type" => "upload" );
	
	$options['icon_ipad_retina'] = array(
		"name" => __('iPad retina icon', 'base'),
		"desc" =>  __('Apple touch icon ipad retina (152x152 px)', 'base'),
		"id" => "icon_ipad_retina",
		"type" => "upload" );
	
	$options['win_tile_image'] = array(
		"name" => __('Windows 8 pinned image', 'base'),
		"desc" =>  __('Pinned site Windows 8 (144x144 px)', 'base'),
		"id" => "win_tile_image",
		"type" => "upload" );
	
	$options['win_tile_color'] = array(
		"name" => __('Windows 8 pinned image color', 'base'),
		"desc" =>  __('Pinned site Windows 8 color', 'base'),
		"id" => "win_tile_color",
		"type" => "color" );
	
	$options[] = array(
		'name' => __('Meta Slider', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array( "name" => __('Style', 'base'),
		"type" => "heading" );
	
	$options[] = array(
		'name' => __('Header background', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Menu background color', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');;
			
	$options[] = array(
		'name' => __('Link color', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Link color on hover', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Footer background', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array( "name" => __('Blog &amp; Pages', 'base'),
		"type" => "heading" );
	
	$options[] = array(
		'name' => __('Pages comments', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Show blog and archive featured image', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Show post featured image', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Display post meta', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Index sidebar', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Post sidebar', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array( "name" => __('Footer', 'base'),
		"type" => "heading" );
		
	$options[] = array(
		'name' => __('Footer text', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array(
		'name' => __('Display credits link', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
	
	$options[] = array( "name" => __('Social', 'base'),
		"type" => "heading" );
			
	$options[] = array(
		'name' => __('Facebook url', 'base'),
		'desc' => __('Add the url of your Facebook page', 'base'),
		'id' => 'facebook_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter url', 'base'),
		'desc' => __('Add the url of your Twitter page', 'base'),
		'id' => 'twitter_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Google plus url', 'base'),
		'desc' => __('Add the url of your Google Plus page', 'base'),
		'id' => 'google_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Pinterest url', 'base'),
		'desc' => __('Add the url of your Pinterest page', 'base'),
		'id' => 'pinterest_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Tumblr url', 'base'),
		'desc' => __('Add the url of your Tumblr page', 'base'),
		'id' => 'tumblr_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Instagram url', 'base'),
		'desc' => __('Add the url of your Instagram page', 'base'),
		'id' => 'instagram_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Linkedin url', 'base'),
		'desc' => __('Add the url of your Linkedin page', 'base'),
		'id' => 'linkedin_url',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Dribbble url', 'base'),
		'desc' => __('Add the url of your Dribbble page', 'base'),
		'id' => 'dribbble_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Vimeo url', 'base'),
		'desc' => __('Add the url of your Vimeo page', 'base'),
		'id' => 'vimeo_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Youtube url', 'base'),
		'desc' => __('Add the url of your Youtube page', 'base'),
		'id' => 'youtube_url',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('RSS url', 'base'),
		'desc' => __('Add the url of your RSS', 'base'),
		'id' => 'rss_url',
		'std' => '',
		'type' => 'text');
		
	$options[] = array( "name" => __('Advanced', 'base'),
		"type" => "heading" );	
	
	$options[] = array(
		'name' => __('Custom css', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');

	$options[] = array(
		'name' => __('Footer code', 'base'),
		'desc' => $upgrade_message,
		'type' => 'info');
		
return $options;
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */

add_action( 'customize_register', 'options_theme_customizer_register' );

function options_theme_customizer_register($wp_customize) {

	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = optionsframework_options();
	
	/* Logo upload */

	$wp_customize->add_section( 'options_theme_customizer_logo', array(
		'title' => __( 'Logo Upload', 'base' ),
		'priority' => 110
	) );
	
	$wp_customize->add_setting( 'options_theme_customizer[logo_uploader]', array(
		'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_uploader', array(
		'label' => $options['logo_uploader']['name'],
		'section' => 'options_theme_customizer_logo',
		'settings' => 'options_theme_customizer[logo_uploader]',
	) ) );	
	
	
	/* Add favicon */

	$wp_customize->add_section( 'options_theme_customizer_favicon', array(
		'title' => __( 'Favicon', 'base' ),
		'priority' => 110
	) );
	
	$wp_customize->add_setting( 'options_theme_customizer[favicon_uploader]', array(
		'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon_uploader', array(
		'label' => $options['favicon_uploader']['name'],
		'section' => 'options_theme_customizer_favicon',
		'settings' => 'options_theme_customizer[favicon_uploader]',
	) ) );
}


add_action('optionsframework_after','optionscheck_display_sidebar', 100);

function optionscheck_display_sidebar() { ?>
    <div class="metabox-holder upgrade">
        <div class="postbox">
            <h3><?php echo __('Upgrade to premium', "base"); ?></h3>
                <div class="inside">
                    <p><?php echo __('Upgrade to the premium version to get access to advanced options and priority support.', "base"); ?></p>
                    <a title="Upgrade to premium version" href="http://themes.iografica.it/downloads/base-wp-premium/" target="_blank">
                    <span class="upgrade-button">Upgrade to premium</span>
                    </a>
					<p><?php echo __('We offer a 7 day full refund if you are not happy with your purchase.',  "base"); ?></p>
                </div>
        </div>
         <div class="inside">
                    <h3><?php echo __('Iografica Themes', "base"); ?></h3>
                    <a title="Facebook" href="https://www.facebook.com/themes.iografica" target="_blank">
                    <span class="facebook"><?php echo __('Facebook', "base"); ?></span>
                    </a>
                    <?php echo __(' | ', "base"); ?>
					<a title="Twitter" href="https://twitter.com/iograficathemes" target="_blank">
                    <span class="twitter"><?php echo __('Twitter', "base"); ?></span>
                    </a>
                    <?php echo __(' | ', "base"); ?>
					<a title="Iografica Themes" href="http://themes.iografica.it/" target="_blank">
                    <span class="website"><?php echo __('Website', "base"); ?></span>
                    </a>
                    <?php echo __(' | ', "base"); ?>
					<a title="Themes Showcase" href="http://themes.iografica.it/showcase-submit/" target="_blank">
                    <span class="website"><?php echo __('Showcase', "base"); ?></span>
                    </a>
					<p><?php echo __('Sign up to our newsletter and get a discount coupon.',  "base"); ?></p>
                    <div id="mc_embed_signup">
					<form action="//iografica.us2.list-manage.com/subscribe/post?u=14e09f1fb92769d69dfd5ea17&amp;id=5fd8564ba4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</form>
                </div>
    </div>
<?php }
