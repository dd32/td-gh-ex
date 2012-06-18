<?php
/**
 * Catch Box Theme Options
 *
 * @package WordPress
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @since Catch Box 1.0
 *
 */
function catchbox_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'catchbox-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-04-28' );
	wp_enqueue_script( 'catchbox-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'catchbox_admin_enqueue_scripts' );


/**
 * Register the form setting for our catchbox_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, catchbox_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 *
 * @since Catch Box 1.0
 */
function catchbox_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === catchbox_get_theme_options() )
		add_option( 'catchbox_theme_options', catchbox_get_default_theme_options() );

	register_setting(
		'catchbox_options',       // Options group, see settings_fields() call in catchbox_theme_options_render_page()
		'catchbox_theme_options', // Database option, see catchbox_get_theme_options()
		'catchbox_theme_options_validate' // The sanitization callback, see catchbox_theme_options_validate()
	);
	
	register_setting(
		'catchbox_options_slider',   // Options group, see settings_fields() call in catchbox_theme_options_render_page()
		'catchbox_options_slider',  // Database option, see catchbox_get_theme_options()			
		'catchbox_options_validation' // The sanitization callback, see catchbox_theme_options_validate()
	);
	
	register_setting(
		'catchbox_options_webmaster',   // Options group, see settings_fields() call in catchbox_theme_options_render_page()
		'catchbox_options_webmaster',  // Database option, see catchbox_get_theme_options()			
		'catchbox_options_webmaster_validation' // The sanitization callback, see catchbox_theme_options_validate()
	);
	
	register_setting(
		'catchbox_options_social_links',   // Options group, see settings_fields() call in catchbox_theme_options_render_page()
		'catchbox_options_social_links',  // Database option, see catchbox_get_theme_options()			
		'catchbox_options_social_links_validation' // The sanitization callback, see catchbox_theme_options_validate()
	);
	

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see catchbox_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field(
		'color_scheme',  // Unique identifier for the field for this section
		__( 'Color Scheme', 'catchbox' ), // Setting field label
		'catchbox_settings_field_color_scheme', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see catchbox_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);

	add_settings_field( 'link_color', __( 'Link Color',     'catchbox' ), 'catchbox_settings_field_link_color', 'theme_options', 'general' );
	add_settings_field( 'layout',     __( 'Default Layout', 'catchbox' ), 'catchbox_settings_field_layout',     'theme_options', 'general' );

	add_settings_field(
		'content_layout', // Unique identifier for the settings section
		__( 'Content layout', 'catchbox' ), // Setting field label
		'catchbox_settings_field_content_scheme', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see catchbox_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);
	
	add_settings_field(
		'feed_redirect', // Unique identifier for the settings section
		__( 'Feed redirect', 'catchbox' ), // Setting field label
		'catchbox_settings_field_feed_redirect', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see catchbox_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);
	
	add_settings_field(
		'custom_css', // Unique identifier for the settings section
		__( 'Custom CSS Styles', 'catchbox' ), // Setting field label
		'catchbox_settings_field_custom_css', // Function that renders the settings field
		'theme_options', // Menu slug, used to uniquely identify the page; see catchbox_theme_options_add_page()
		'general' // Settings section. Same as the first argument in the add_settings_section() above
	);
}
add_action( 'admin_init', 'catchbox_theme_options_init' );

/**
 * Change the capability required to save the 'catchbox_options' options group.
 *
 * @see catchbox_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see catchbox_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * By default, the options groups for all registered settings require the manage_options capability.
 * This filter is required to change our theme options page to edit_theme_options instead.
 * By default, only administrators have either of these capabilities, but the desire here is
 * to allow for finer-grained control for roles and users.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function catchbox_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_catchbox_options', 'catchbox_option_page_capability' );

/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Catch Box 1.0
 */
function catchbox_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'catchbox' ),   // Name of page
		__( 'Theme Options', 'catchbox' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'catchbox_theme_options_render_page' // Function that renders the options page
	);

	$slider_options = add_theme_page( 
		__( 'Featured Slider', 'catchbox' ),  // Name of page
		__( 'Featured Slider', 'catchbox' ),  // Label in menu
		'edit_theme_options', 						// Capability required
		'slider_options', 							// Menu slug, used to uniquely identify the page
		'catchbox_options_slider_page'		// Function that renders the options page
	);
	
	$social_link_options = add_theme_page( 
		__( 'Social Links', 'catchbox' ),  // Name of page
		__( 'Social Links', 'catchbox' ),  // Label in menu
		'edit_theme_options', 						// Capability required
		'social_links', 							// Menu slug, used to uniquely identify the page
		'catchbox_options_social_links'		// Function that renders the options page
	);
	
	$webmaster_tool_options = add_theme_page( 
		__( 'Webmaster Tools', 'catchbox' ),  // Name of page
		__( 'Webmaster Tools', 'catchbox' ),  // Label in menu
		'edit_theme_options', 				  // Capability required
		'webmaster_tools', 					  // Menu slug, used to uniquely identify the page
		'catchbox_options_webmaster_tools'	  // Function that renders the options page
	);
	
	if ( ! $theme_page )
		return;

	add_action( "load-$theme_page", 'catchbox_theme_options_help' );
	add_action( "load-$slider_options", 'catchbox_slider_options_help' );
}
add_action( 'admin_menu', 'catchbox_theme_options_add_page' );

function catchbox_theme_options_help() {

	$help = '<p>' . __( 'Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Catch Box, provides the following Theme Options:', 'catchbox' ) . '</p>' .
			'<ol>' .
				'<li>' . __( '<strong>Color Scheme</strong>: You can choose a color palette of "Light" (light background with dark text) or "Dark" (dark background with light text) for your site.', 'catchbox' ) . '</li>' .
				'<li>' . __( '<strong>Link Color</strong>: You can choose the color used for text links on your site. You can enter the HTML color or hex code, or you can choose visually by clicking the "Select a Color" button to pick from a color wheel.', 'catchbox' ) . '</li>' .
				'<li>' . __( '<strong>Default Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.', 'catchbox' ) . '</li>' .
			'</ol>' .
			'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'catchbox' ) . '</p>';

	$sidebar = '<p><strong>' . __( 'For more information:', 'catchbox' ) . '</strong></p>' .
		'<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'catchbox' ) . '</p>' .
		'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'catchbox' ) . '</p>';

	$screen = get_current_screen();

	if ( method_exists( $screen, 'add_help_tab' ) ) {
		// WordPress 3.3
		$screen->add_help_tab( array(
			'title' => __( 'Overview', 'catchbox' ),
			'id' => 'theme-options-help',
			'content' => $help,
			)
		);

		$screen->set_help_sidebar( $sidebar );
	} 
}

function catchbox_slider_options_help() {

	$help = '<p>' . __( 'Slider Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Catch Box, provides the following Theme Options:', 'catchbox' ) . '</p>' .
			'<ol>' .
				'<li>' . __( '<strong>Color Scheme</strong>: You can choose a color palette of "Light" (light background with dark text) or "Dark" (dark background with light text) for your site.', 'catchbox' ) . '</li>' .
				'<li>' . __( '<strong>Link Color</strong>: You can choose the color used for text links on your site. You can enter the HTML color or hex code, or you can choose visually by clicking the "Select a Color" button to pick from a color wheel.', 'catchbox' ) . '</li>' .
				'<li>' . __( '<strong>Default Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.', 'catchbox' ) . '</li>' .
			'</ol>' .
			'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'catchbox' ) . '</p>';

	$screen = get_current_screen();

	if ( method_exists( $screen, 'add_help_tab' ) ) {
		// WordPress 3.3
		$screen->add_help_tab( array(
			'title' => __( 'Overview', 'catchbox' ),
			'id' => 'slider-options-help',
			'content' => $help,
			)
		);
	}
}

/**
 * Returns an array of color schemes registered for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' => 'light',
			'label' => __( 'Light', 'catchbox' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/light.png',
			'default_link_color' => '#1b8be0',
		),
		'dark' => array(
			'value' => 'dark',
			'label' => __( 'Dark', 'catchbox' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/dark.png',
			'default_link_color' => '#e4741f',
		),
	);

	return apply_filters( 'catchbox_color_schemes', $color_scheme_options );
}

/**
 * Returns an array of layout options registered for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_layouts() {
	$layout_options = array(
		'content-sidebar' => array(
			'value' => 'content-sidebar',
			'label' => __( 'Content on left', 'catchbox' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/content-sidebar.png',
		),
		'sidebar-content' => array(
			'value' => 'sidebar-content',
			'label' => __( 'Content on right', 'catchbox' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/sidebar-content.png',
		),
		'content' => array(
			'value' => 'content',
			'label' => __( 'One-column, no sidebar', 'catchbox' ),
			'thumbnail' => get_template_directory_uri() . '/inc/images/content.png',
		),
	);

	return apply_filters( 'catchbox_layouts', $layout_options );
}

/**
 * Returns an array of content layout options registered for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_content_layout() {
	$content_options = array(
		'excerpt' => array(
			'value' => 'excerpt',
			'label' => __( 'Show excerpt', 'catchbox' ),
		),	 
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show full content', 'catchbox' ),
		)
	);

	return apply_filters( 'catchbox_content_layouts', $content_options );
}


/**
 * Returns the default options for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_get_default_theme_options() {
	$default_theme_options = array(
		'color_scheme' => 'light',
		'link_color'   => catchbox_get_default_link_color( 'light' ),
		'theme_layout' => 'content-sidebar',
		'content_layout' => 'excerpt',
	);

	if ( is_rtl() )
 		$default_theme_options['theme_layout'] = 'sidebar-content';

	return apply_filters( 'catchbox_default_theme_options', $default_theme_options );
}

/**
 * Returns the default link color for Catch Box, based on color scheme.
 *
 * @since Catch Box 1.0
 *
 * @param $string $color_scheme Color scheme. Defaults to the active color scheme.
 * @return $string Color.
*/
function catchbox_get_default_link_color( $color_scheme = null ) {
	if ( null === $color_scheme ) {
		$options = catchbox_get_theme_options();
		$color_scheme = $options['color_scheme'];
	}

	$color_schemes = catchbox_color_schemes();
	if ( ! isset( $color_schemes[ $color_scheme ] ) )
		return false;

	return $color_schemes[ $color_scheme ]['default_link_color'];
}

/**
 * Returns the options array for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_get_theme_options() {
	return get_option( 'catchbox_theme_options', catchbox_get_default_theme_options() );
}

/**
 * Renders the Color Scheme setting field.
 *
 * @since Catch Box 1.0
 */
function catchbox_settings_field_color_scheme() {
	$options = catchbox_get_theme_options();

	foreach ( catchbox_color_schemes() as $scheme ) {
	?>
	<div class="layout image-radio-option color-scheme">
	<label class="description">
		<input type="radio" name="catchbox_theme_options[color_scheme]" value="<?php echo esc_attr( $scheme['value'] ); ?>" <?php checked( $options['color_scheme'], $scheme['value'] ); ?> />
		<input type="hidden" id="default-color-<?php echo esc_attr( $scheme['value'] ); ?>" value="<?php echo esc_attr( $scheme['default_link_color'] ); ?>" />
		<span>
			<img src="<?php echo esc_url( $scheme['thumbnail'] ); ?>" width="136" height="122" alt="" />
			<?php echo $scheme['label']; ?>
		</span>
	</label>
	</div>
	<?php
	}
}

/**
 * Renders the Link Color setting field.
 *
 * @since Catch Box 1.0
 */
function catchbox_settings_field_link_color() {
	$options = catchbox_get_theme_options();
	?>
	<input type="text" name="catchbox_theme_options[link_color]" id="link-color" value="<?php echo esc_attr( $options['link_color'] ); ?>" />
	<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>
	<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'catchbox' ); ?>" />
	<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
	<br />
	<span><?php printf( __( 'Default color: %s', 'catchbox' ), '<span id="default-color">' . catchbox_get_default_link_color( $options['color_scheme'] ) . '</span>' ); ?></span>
	<?php
}
/**
 * Renders the feed redirect setting field.
 *
 * @since Catch Box 1.0
 */
function catchbox_settings_field_feed_redirect() {
	$options = catchbox_get_theme_options();
	?>
	<input type="text" name="catchbox_theme_options[feed_url]" id="feed-url" size="65" value="<?php if ( isset( $options[ 'feed_url' ] ) ) echo esc_attr( $options[ 'feed_url'] ); ?>" />
	<?php
}

/**
 * Renders the Custom CSS styles setting fields
 *
 * @since Catch Box 1.0
 */
function catchbox_settings_field_custom_css() {
	$options = catchbox_get_theme_options();
	?>
     <textarea id="custom-css" cols="90" rows="12" name="catchbox_theme_options[custom_css]">
     
     <?php if (!empty($options['custom_css'])) esc_attr($options['custom_css']); ?>
     
     </textarea>

	<?php
}

/**
 * Renders the Layout setting field.
 *
 * @since Catch Box 1.0
 */
function catchbox_settings_field_layout() {
	$options = catchbox_get_theme_options();
	foreach ( catchbox_layouts() as $layout ) {
		?>
		<div class="layout image-radio-option theme-layout">
		<label class="description">
			<input type="radio" name="catchbox_theme_options[theme_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['theme_layout'], $layout['value'] ); ?> />
			<span>
				<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
				<?php echo $layout['label']; ?>
			</span>
		</label>
		</div>
		<?php
	}
}

/**
 * Renders the Content layout setting fields.
 *
 * @since Catch Box 1.0 
 */
function catchbox_settings_field_content_scheme() {
	$options = catchbox_get_theme_options();
	foreach ( catchbox_content_layout() as $content ) {
		?>
		<div class="layout image-radio-option theme-layout">
            <label class="description">
                <input type="radio" name="catchbox_theme_options[content_layout]" value="<?php echo esc_attr( $content['value'] ); ?>" <?php checked( $options['content_layout'], $content['value'] ); ?> />
                <span>
                    <?php echo $content['label']; ?>
                </span>
			</label>
		</div>
		<?php
	}
}


/**
 * Returns the options array for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options By', 'catchbox' ), wp_get_theme() ); ?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchbox' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'catchbox' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'catchbox' ); ?></a></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'catchbox_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Renders the slider options for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_options_slider_page() {
	?>
	<div class="wrap">
    	<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Featured Slider By', 'catchbox' ), wp_get_theme() ); ?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchbox' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'catchbox' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'catchbox' ); ?></a></h2>
    	
        <form method="post" action="options.php">
			<?php
               	settings_fields( 'catchbox_options_slider' );
                $options = get_option( 'catchbox_options_slider' );
                
                if( is_array( $options ) && ( !array_key_exists( 'slider_qty', $options ) || !is_numeric( $options[ 'slider_qty' ] ) ) ) $options[ 'slider_qty' ] = 4;
                elseif( !is_array( $options ) ) $options = array( 'slider_qty' => 4);
				
            ?>   
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                <div class="updated" id="message">
                    <p><strong><?php _e( 'Settings saved.', 'catchbox' );?></strong></p>
                </div>
            <?php endif; ?> 
           	<div id="featuredslider">
                <table class="form-table">
                    <tr>
                        <th scope="row"><h4><?php _e( 'Number of Slides', 'catchbox' ); ?></h4></th>
                        <td><input type="text" name="catchbox_options_slider[slider_qty]" value="<?php if ( array_key_exists ( 'slider_qty', $options ) ) echo intval( $options[ 'slider_qty' ] ); ?>" /></td>
                    </tr>
                    <tbody class="sortable">
                        <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                        <tr>
                            <th scope="row"><label class="handle"><?php _e( 'Featured Col #', 'catchbox' ); ?><span class="count"><?php echo absint( $i ); ?></span></label></th>
                            <td><input type="text" name="catchbox_options_slider[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
                            <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider', $options ) && array_key_exists ( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'catchbox' ); ?></a>
                            </td>
                        </tr> 							
                        <?php endfor; ?>
                    </tbody>
                </table>
                <p><?php _e( 'Note: Here You can put your Post IDs which displays on Homepage as slider.', 'catchbox' ); ?> </p>
            </div> <!-- #featuredslider -->           
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catchbox' ); ?>" /></p> 
		</form>
	</div><!-- .wrap -->
<?php
}

/**
 * Renders the social links options for Catch Box.
 *
 * @since Catch Box 1.0
 */
function catchbox_options_social_links() {
	?>
	<div class="wrap">
    	<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Social Links By', 'catchbox' ), wp_get_theme() ); ?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchbox' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'catchbox' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'catchbox' ); ?></a></h2>
        
		<form method="post" action="options.php">
			<?php
                settings_fields( 'catchbox_options_social_links' );
                $options = get_option( 'catchbox_options_social_links' );           
            ?>               
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                <div class="updated" id="message">
                    <p><strong><?php _e( 'Settings saved.', 'catchbox' );?></strong></p>
                </div>
            <?php endif; ?>  
            <?php _e( 'Note: Enter the url for correponding social networking website', 'catchbox' ); ?> 
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label><?php _e( 'Facebook', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_facebook]" value="<?php if( isset( $options[ 'social_facebook' ] ) ) echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                        </td>
                    </tr>
                    <tr> 
                        <th scope="row"><label><?php _e( 'Twitter', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_twitter]" value="<?php if ( isset( $options[ 'social_twitter' ] ) ) echo esc_url( $options[ 'social_twitter'] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Google +', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_google]" value="<?php if ( isset( $options[ 'social_google' ] ) ) echo esc_url( $options[ 'social_google' ] ); ?>" />
                        </td>
                    </tr>
                    
                     <tr>
                        <th scope="row"><label><?php _e( 'LinkedIn', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_linkedin]" value="<?php if ( isset( $options[ 'social_linkedin' ] ) ) echo esc_url( $options[ 'social_linkedin' ] ); ?>" />
                        </td>
                    </tr>
                    
                     <tr>
                        <th scope="row"><label><?php _e( 'Pinterest', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_pinterest]" value="<?php if ( isset( $options[ 'social_pinterest' ] ) ) echo esc_url( $options[ 'social_pinterest' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Youtube', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_youtube]" value="<?php if ( isset( $options[ 'social_youtube' ] ) ) echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                        </td>
                    </tr>
                   
                    <tr>
                        <th scope="row"><label><?php _e( 'RSS Feed', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_rss]" value="<?php if ( isset( $options[ 'social_rss' ] ) ) echo esc_url( $options[ 'social_rss' ] ); ?>" />
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label><?php _e( 'Deviantart', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_deviantart]" value="<?php if ( isset( $options[ 'social_deviantart' ] ) ) echo esc_url( $options[ 'social_deviantart' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Tumblr', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_tumblr]" value="<?php if ( isset( $options[ 'social_tumblr' ] ) ) echo esc_url( $options[ 'social_tumblr' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Viemo', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_viemo]" value="<?php if ( isset( $options[ 'social_viemo' ] ) ) echo esc_url( $options[ 'social_viemo' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Dribbble', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_dribbble]" value="<?php if ( isset( $options[ 'social_dribbble' ] ) ) echo esc_url( $options[ 'social_dribbble' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'MySpace', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_myspace]" value="<?php if ( isset( $options[ 'social_myspace' ] ) ) echo esc_url( $options[ 'social_myspace' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Aim', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_aim]" value="<?php if ( isset( $options[ 'social_aim' ] ) ) echo esc_url( $options[ 'social_aim' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Flicker', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_social_links[social_flickr]" value="<?php if ( isset( $options[ 'social_flickr' ] ) ) echo esc_url( $options[ 'social_flickr' ] ); ?>" />
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catchbox' ); ?>" /></p> 
  		</form>
	</div><!-- .wrap -->
<?php
}

/**
* Returns the options array for Catch Box.
*
* @since Catch Box 1.0
*/
function catchbox_options_webmaster_tools() { 
	?>
    <div class="wrap">
    	<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Webmaster Tools By', 'catchbox' ), wp_get_theme() ); ?> <a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'catchbox' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'catchbox' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'catchbox' ); ?></a></h2>

		<form method="post" action="options.php">
			<?php
                settings_fields( 'catchbox_options_webmaster' );
                $options = get_option( 'catchbox_options_webmaster' );
                        
            ?>   
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                <div class="updated" id="message">
                    <p><strong><?php _e( 'Settings saved.', 'catchbox' );?></strong></p>
                </div>
            <?php endif; ?>  
    
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label><?php _e( 'Google Site Verification ID', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_webmaster[google_verification]" value="<?php if( isset( $options[ 'google_verification' ] ) ) echo esc_attr( $options[ 'google_verification' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr> 
                        <th scope="row"><label><?php _e( 'Yahoo Site Verification ID', 'catchbox' ); ?> </label></th>
                        <td><input type="text" size="45" name="catchbox_options_webmaster[yahoo_verification]" value="<?php if ( isset( $options[ 'yahoo_verification' ] ) ) echo esc_attr( $options[ 'yahoo_verification'] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e( 'Bing Site Verification ID', 'catchbox' ); ?></label></th>
                        <td><input type="text" size="45" name="catchbox_options_webmaster[bing_verification]" value="<?php if ( isset( $options[ 'bing_verification' ] ) ) echo esc_attr( $options[ 'bing_verification' ] ); ?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e('Analytics, site stats Header code', 'catchbox' ); ?></label></th>
                        <td>
                         <textarea name="catchbox_options_webmaster[tracker_header]" rows="7" cols="80" ><?php if ( isset( $options [ 'tracker_header' ] ) )  echo esc_attr( $options[ 'tracker_header' ] ); ?></textarea>
             
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row"><label><?php _e('Analytics, site stats footer code', 'catchbox' ); ?></label></th>
                        <td>
                         <textarea name="catchbox_options_webmaster[tracker_footer]" rows="7" cols="80" ><?php if ( isset( $options [ 'tracker_footer' ] ) )  echo esc_attr( $options[ 'tracker_footer' ] ); ?></textarea>
             
                        </td>
                    </tr>
                </tbody>
           	</table>
        	<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'catchbox' ); ?>" /></p> 
    	</form>
  	</div><!-- .wrap -->
	<?php 
 }


/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @since Catch Box 1.0
 */
function catchbox_options_validation($options) {
	$options_validated = array();
	//data validation for Featured Slider
	if ( isset( $options[ 'slider_qty' ] ) ) {
		$options_validated[ 'slider_qty' ] = absint( $options[ 'slider_qty' ] ) ? $options [ 'slider_qty' ] : 4;
	}
	if ( isset( $options[ 'featured_slider' ] ) ) {
		$options_validated[ 'featured_slider' ] = array();
	}
		
 	if( isset( $options[ 'slider_qty' ] ) )	
	for ( $i = 1; $i <= $options [ 'slider_qty' ]; $i++ ) {
		if ( absint( $options[ 'featured_slider' ][ $i ] ) ) 
			$options_validated[ 'featured_slider' ][ $i ] = absint($options[ 'featured_slider' ][ $i ] );
	}
	//Clearing the theme option cache
	if( function_exists( 'catchbox_themeoption_invalidate_caches' ) )  { catchbox_themeoption_invalidate_caches(); }
	
	return $options_validated;
}

/**
 * Sanitize and validate forms for webmaster tools options. Accepts an array, return a sanitized array.
 *
 * @since Catch Box 1.0
 */
function catchbox_options_webmaster_validation( $options ) {
	$options_validated = array();
	
	// data validation for verification id
	if( isset( $options[ 'google_verification' ] ) ) {
		$options_validated[ 'google_verification' ] = wp_filter_post_kses( $options[ 'google_verification' ] );
	}
	if( isset( $options[ 'yahoo_verification' ] ) )
		$options_validated[ 'yahoo_verification' ] = wp_filter_post_kses( $options[ 'yahoo_verification' ] );
	if( isset( $options[ 'bing_verification' ] ) )
		$options_validated[ 'bing_verification' ] = wp_filter_post_kses( $options[ 'bing_verification' ] );
		
	// data validation for tracking code
	if( isset( $options[ 'tracker_header' ] ) )
		$options_validated[ 'tracker_header' ] = wp_kses_stripslashes( $options[ 'tracker_header' ] );
	if( isset( $options[ 'tracker_footer' ] ) )
		$options_validated[ 'tracker_footer' ] = wp_kses_stripslashes( $options[ 'tracker_footer' ] );
	
	return $options_validated;
}

/**
 * Sanitize and validate social links options form. Accepts an array, return a sanitized array.
 *
 * @since Catch Box 1.0
 */
function catchbox_options_social_links_validation( $options ) {
	$options_validated = array();
	
	// data validation for Sociallinks
	//Facebook
	if( isset( $options[ 'social_facebook' ] ) )
		$options_validated[ 'social_facebook' ] = esc_url_raw( $options[ 'social_facebook' ] );
	//Twitter	
	if( isset( $options[ 'social_twitter' ] ) )
		$options_validated[ 'social_twitter' ] = esc_url_raw( $options[ 'social_twitter' ] );
	//Youtube	
	if( isset( $options[ 'social_youtube' ] ) )
		$options_validated[ 'social_youtube' ] = esc_url_raw( $options[ 'social_youtube' ] );
	//Google+
	if( isset( $options[ 'social_google' ] ) )
		$options_validated[ 'social_google' ] = esc_url_raw( $options[ 'social_google' ] );
	//RSS
	if( isset( $options[ 'social_rss' ] ) )
		$options_validated[ 'social_rss' ] = esc_url_raw( $options[ 'social_rss' ] );
	//Linkedin
	if( isset( $options[ 'social_linkedin' ] ) )
		$options_validated[ 'social_linkedin' ] = esc_url_raw( $options[ 'social_linkedin' ] );
	//Pinterest
	if( isset( $options[ 'social_pinterest' ] ) )
		$options_validated[ 'social_pinterest' ] = esc_url_raw( $options[ 'social_pinterest' ] );
	//Deviantart
	if( isset( $options[ 'social_deviantart' ] ) )
		$options_validated[ 'social_deviantart' ] = esc_url_raw( $options[ 'social_deviantart' ] );
	//Tumblr
	if( isset( $options[ 'social_tumblr' ] ) )
		$options_validated[ 'social_tumblr' ] = esc_url_raw( $options[ 'social_tumblr' ] );
	//Viemo
	if( isset( $options[ 'social_viemo' ] ) )
		$options_validated[ 'social_viemo' ] = esc_url_raw( $options[ 'social_viemo' ] );
	//Dribble
	if( isset( $options[ 'social_dribbble' ] ) )
		$options_validated[ 'social_dribbble' ] = esc_url_raw( $options[ 'social_dribbble' ] );
	//Myspace
	if( isset( $options[ 'social_myspace' ] ) )
		$options_validated[ 'social_myspace' ] = esc_url_raw( $options[ 'social_myspace' ] );
	//Aim
	if( isset( $options[ 'social_aim' ] ) )
		$options_validated[ 'social_aim' ] = esc_url_raw( $options[ 'social_aim' ] );
	//Flickr
	if( isset( $options[ 'social_flickr' ] ) )
		$options_validated[ 'social_flickr' ] = esc_url_raw( $options[ 'social_flickr' ] );
	
	//Clearing the theme option cache
	if( function_exists( 'catchbox_themeoption_invalidate_caches' ) )  { catchbox_themeoption_invalidate_caches(); }
	
	return $options_validated;
}
/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see catchbox_theme_options_init()
 * @todo set up Reset Options action
 *
 * @since Catch Box 1.0
 */
function catchbox_theme_options_validate( $input ) {
	$output = $defaults = catchbox_get_default_theme_options();

	// Color scheme must be in our array of color scheme options
	if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], catchbox_color_schemes() ) )
		$output['color_scheme'] = $input['color_scheme'];

	// Our defaults for the link color may have changed, based on the color scheme.
	$output['link_color'] = $defaults['link_color'] = catchbox_get_default_link_color( $output['color_scheme'] );

	// Link color must be 3 or 6 hexadecimal characters
	if ( isset( $input['link_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['link_color'] ) )
		$output['link_color'] = '#' . strtolower( ltrim( $input['link_color'], '#' ) );

	// Theme layout must be in our array of theme layout options
	if ( isset( $input['theme_layout'] ) && array_key_exists( $input['theme_layout'], catchbox_layouts() ) )
		$output['theme_layout'] = $input['theme_layout'];

	// Theme layout must be in our array of theme layout options
	if ( isset( $input['content_layout'] ) && array_key_exists( $input['content_layout'], catchbox_content_layout() ) )
		$output['content_layout'] = $input['content_layout'];
	
	if ( isset( $input['feed_url'] ) )	
		$output['feed_url'] = esc_url_raw($input['feed_url']);
			
	if ( isset( $input['custom_css'] ) )	
		$output['custom_css'] = wp_kses_stripslashes($input['custom_css']);
		
	return apply_filters( 'catchbox_theme_options_validate', $output, $input, $defaults );
}

/**
 * Enqueue the styles for the current color scheme.
 *
 * @since Catch Box 1.0
 */
function catchbox_enqueue_color_scheme() {
	$options = catchbox_get_theme_options();
	$color_scheme = $options['color_scheme'];

	if ( 'dark' == $color_scheme )
		wp_enqueue_style( 'dark', get_template_directory_uri() . '/colors/dark.css', array(), null );

	do_action( 'catchbox_enqueue_color_scheme', $color_scheme );
}
add_action( 'wp_enqueue_scripts', 'catchbox_enqueue_color_scheme' );

/**
 * Hooks the css to head section
 *
 * @since Catch Box 1.0
 */
function catchbox_inline_css() {
    $options = get_option('catchbox_get_theme_options');
    if ($options['custom_css']) {
		echo '<!-- '.get_bloginfo('name').' Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		echo $options['custom_css'] . "\n";
		echo '</style>' . "\n";
	}	
}
add_action('wp_head', 'catchbox_inline_css');

/**
 * Site Verification codes are hooked to wp_head if any value exists
 */
 
function catchbox_verification() {
    $options = get_option('catchbox_options_webmaster');
	//google
    if ($options['google_verification']) {
		echo '<meta name="google-site-verification" content="' . $options['google_verification'] . '" />' . "\n";
	}
	
	//bing
	if ($options['bing_verification']) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_verification'] . '" />' . "\n";
	}
	
	//yahoo
	 if ($options['yahoo_verification']) {
        echo '<meta name="y_key" content="' . $options['yahoo_verification'] . '" />' . "\n";
	}
	
	//site stats, analytics code
	if ($options['tracker_header']) {
        echo $options['tracker_header'];
	}
}

add_action('wp_head', 'catchbox_verification');

/**
 * Analytic, site stat code hooked in footer
 * @uses wp_footer
 */
function catchbox_site_stats() {
    $options = get_option('catchbox_options_webmaster');
    if ($options['tracker_footer']) {
        echo $options['tracker_footer'];
	}
}

add_action('wp_footer', 'catchbox_site_stats');

/**
 * Add a style block to the theme for the current link color.
 *
 * This function is attached to the wp_head action hook.
 *
 * @since Catch Box 1.0
 */
function catchbox_print_link_color_style() {
	$options = catchbox_get_theme_options();
	$link_color = $options['link_color'];

	$default_options = catchbox_get_default_theme_options();

	// Don't do anything if the current link color is the default.
	if ( $default_options['link_color'] == $link_color )
		return;
?>
	<style>
		/* Link color */
		a,
		#site-title a:focus,
		#site-title a:hover,
		#site-title a:active,
		.entry-title a:hover,
		.entry-title a:focus,
		.entry-title a:active,
		.widget_catchbox_ephemera .comments-link a:hover,
		section.recent-posts .other-recent-posts a[rel="bookmark"]:hover,
		section.recent-posts .other-recent-posts .comments-link a:hover,
		.format-image footer.entry-meta a:hover,
		#site-generator a:hover {
			color: <?php echo $link_color; ?>;
		}
		section.recent-posts .other-recent-posts .comments-link a:hover {
			border-color: <?php echo $link_color; ?>;
		}
		article.feature-image.small .entry-summary p a:hover,
		.entry-header .comments-link a:hover,
		.entry-header .comments-link a:focus,
		.entry-header .comments-link a:active,
		.feature-slider a.active {
			background-color: <?php echo $link_color; ?>;
		}
	</style>
<?php
}
add_action( 'wp_head', 'catchbox_print_link_color_style' );

/**
 * Adds Catch Box layout classes to the array of body classes.
 *
 * @since Catch Box 1.0
 */
function catchbox_layout_classes( $existing_classes ) {
	$options = catchbox_get_theme_options();
	$current_layout = $options['theme_layout'];

	if ( in_array( $current_layout, array( 'content-sidebar', 'sidebar-content' ) ) )
		$classes = array( 'two-column' );
	else
		$classes = array( 'one-column' );

	if ( 'content-sidebar' == $current_layout )
		$classes[] = 'right-sidebar';
	elseif ( 'sidebar-content' == $current_layout )
		$classes[] = 'left-sidebar';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'catchbox_layout_classes', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
add_filter( 'body_class', 'catchbox_layout_classes' );


/**
 * Social Profles are hooked to catchbox_startgenerator_open if any value exists
 *
 * @since Catch Box 1.0
 */
function catchbox_socialprofile() {

	//delete_transient( 'catchbox_socialprofile' );
	
    $options = get_option('catchbox_options_social_links');
	$flag = 0;
	foreach( $options as $option ) {
		if( $option ) {
			$flag = 1;
		}
		else { 
			$flag = 0;
		}
		if( $flag == 1) {
			break;
		}
	}
				
	if( ( !$catchbox_socialprofile = get_transient( 'catchbox_socialprofile' ) ) && ($flag == 1) ) {
		echo '<!-- refreshing cache -->';
		
		$catchbox_socialprofile = '
			<div class="social-profile">
 		 		<ul>';
					//Facebook
					if ($options['social_facebook']) {
						$catchbox_socialprofile .= '<li class="facebook"><a href="'.$options['social_facebook'].'" title="Facebook" target="_blank">Facebook</a></li>';
					}
				
					//Twitter
					if ($options['social_twitter']) {
						$catchbox_socialprofile .= '<li class="twitter"><a href="'.$options['social_twitter'].'" title="Twitter" target="_blank">Twitter</a></li>';
					}
					
					//Google+
					if ($options['social_google']) {
						$catchbox_socialprofile .= '<li class="google-plus"><a href="'.$options['social_google'].'" title="Google Plus" target="_blank">Google Plus</a></li>';
					}
				
					//Linkedin
					if ($options['social_linkedin']) {
						$catchbox_socialprofile .= '<li class="linkedin"><a href="'.$options['social_linkedin'].'" title="Linkedin" target="_blank">Linkedin</a></li>';
					}
					
					//Pinterest
					if ($options['social_pinterest']) {
						$catchbox_socialprofile .= '<li class="pinterest"><a href="'.$options['social_pinterest'].'" title="Pinterest" target="_blank">Pinterest</a></li>';
					}
					
					//Youtube
					if ($options['social_youtube']) {
						$catchbox_socialprofile .= '<li class="you-tube"><a href="'.$options['social_youtube'].'" title="YouTube" target="_blank">YouTube</a></li>';
					}
					
					//RSS Feed
					if ($options['social_rss']) {
						$catchbox_socialprofile .= '<li class="rss"><a href="'.$options['social_rss'].'" title="RSS Feed" target="_blank">RSS Feed</a></li>';
					}
					
					//Deviantart
					if ($options['social_deviantart']) {
						$catchbox_socialprofile .= '<li class="deviantart"><a href="'.$options['social_deviantart'].'" title="Deviantart" target="_blank">Deviantart</a></li>';
					}		
					
					//Tumblr
					if ($options['social_tumblr']) {
						$catchbox_socialprofile .= '<li class="tumblr"><a href="'.$options['social_tumblr'].'" title="Tumblr" target="_blank">Tumblr</a></li>';
					}	
					
					//Viemo
					if ($options['social_viemo']) {
						$catchbox_socialprofile .= '<li class="viemo"><a href="'.$options['social_viemo'].'" title="Viemo" target="_blank">Viemo</a></li>';
					}	
					
					//Dribbble
					if ($options['social_dribbble']) {
						$catchbox_socialprofile .= '<li class="dribbble"><a href="'.$options['social_dribbble'].'" title="Dribbble" target="_blank">Dribbble</a></li>';
					}	
					
					//MySpace
					if ($options['social_myspace']) {
						$catchbox_socialprofile .= '<li class="my-space"><a href="'.$options['social_myspace'].'" title="MySpace" target="_blank">MySpace</a></li>';
					}	
					
					//Aim
					if ($options['social_aim']) {
						$catchbox_socialprofile .= '<li class="aim"><a href="'.$options['social_aim'].'" title="Aim" target="_blank">Aim</a></li>';
					}	
					
					//Flicker
					if ($options['social_flickr']) {
						$catchbox_socialprofile .= '<li class="flickr"><a href="'.$options['social_flickr'].'" title="Flicker" target="_blank">Flicker</a></li>';
					}	
					
					$catchbox_socialprofile .= '
				</ul>
			</div>';
		set_transient( 'catchbox_socialprofile', $catchbox_socialprofile, 604800 );		
	}
	echo $catchbox_socialprofile;	
} // catchbox_socialprofile	
add_action('catchbox_startgenerator_open', 'catchbox_socialprofile');


/**
 * Redirect WordPress Feeds To FeedBurner
 */
function catchbox_rss_redirect() {
	$options = get_option('catchbox_get_theme_options');
    if ($options['feed_url']) {
		$url = 'Location: '.$options['feed_url'];
		if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT']))
		{
			header($url);
			header('HTTP/1.1 302 Temporary Redirect');
		}
	}
}
add_action('template_redirect', 'catchbox_rss_redirect');

/* Clearing Theme Option Cache 
 *
 * uses delete_transient
 */
function catchbox_themeoption_invalidate_caches() {
	delete_transient( 'catchbox_sliders' ); // Featured Slider
	delete_transient( 'catchbox_socialprofile' ); //Social Profile
}

/* Clearing Theme Option Cache 
 *
 * uses delete_transient and action publish_post
 */
function catchbox_posts_invalidate_caches() {
	delete_transient( 'catchbox_sliders' ); // Featured Slider
}
add_action( 'publish_post', 'catchbox_posts_invalidate_caches' ); // publish posts runs whenever posts are published or published posts are edited