<?php
/**
 * The theme option name is set as 'options-theme-customizer' here.
 * In your own project, you should use a different option name.
 * I'd recommend using the name of your theme.
 *
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'options_theme_customizer';
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */

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
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_uploader', array(
		'label' => $options['logo_uploader']['name'],
		'section' => 'options_theme_customizer_logo',
		'settings' => 'options_theme_customizer[logo_uploader]'
	) ) );	
	
	
	/* Add favicon */

	$wp_customize->add_section( 'options_theme_customizer_favicon', array(
		'title' => __( 'Favicon', 'base' ),
		'priority' => 110
	) );
	
	$wp_customize->add_setting( 'options_theme_customizer[favicon_uploader]', array(
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon_uploader', array(
		'label' => $options['favicon_uploader']['name'],
		'section' => 'options_theme_customizer_favicon',
		'settings' => 'options_theme_customizer[favicon_uploader]'
	) ) );	
}


add_action('optionsframework_after','optionscheck_display_sidebar', 100);

function optionscheck_display_sidebar() { ?>
    <div class="metabox-holder upgrade">
        <div class="postbox">
            <h3><?php echo __('Upgrade to premium version', "base"); ?></h3>
                <div class="inside">
                    <p><?php echo __('Upgrade to the premium version to get access to advanced options.', "base"); ?></p>
                    <a title="Upgrade to premium version" href="http://themes.iografica.it/downloads/base-wp-premium/" target="_blank">
                    <span class="upgrade-button">Upgrade to premium</span>
                    </a>
					<p><?php echo __('With premium version you have access to priority support.',  "base"); ?></p>
					<p><?php echo __('We offer a 7 day full refund if you are not happy with your purchase.',  "base"); ?></p>
                </div>
        </div>
    </div>
<?php }