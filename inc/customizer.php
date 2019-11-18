<?php
/**
 * ansia Theme Customizer
 *
 * @package ansia
 */

/**
 * Register Custom Settings
 */
function ansia_custom_settings_register( $wp_customize ) {
	/* Add Panels */
	$wp_customize->add_panel( 'cresta_ansia_themeoptions', array(
	  'priority'       => 50,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => esc_html__('Ansia Theme Options', 'ansia')
	) );
	/* Add Sections Theme Options */
	$wp_customize->add_section( 'cresta_ansia_theme_options_general', array(
	     'title'    => esc_html__( 'General Settings', 'ansia' ),
	     'priority' => 10,
		 'panel'  => 'cresta_ansia_themeoptions',
	) );
	$wp_customize->add_section( 'cresta_ansia_theme_options_postpage', array(
	     'title'    => esc_html__( 'Posts and pages settings', 'ansia' ),
	     'priority' => 10,
		 'panel'  => 'cresta_ansia_themeoptions',
	) );
	$wp_customize->add_section( 'cresta_ansia_theme_options_social', array(
	     'title'    => esc_html__( 'Social Buttons', 'ansia' ),
	     'priority' => 50,
		 'panel'  => 'cresta_ansia_themeoptions',
	) );
	/**
	* ################ SECTION GENERAL SETTINGS
	*/
	/* Show Page Loader */
	$wp_customize->add_setting('ansia_theme_options[_show_loader]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_show_loader]', array(
        'label'      => __( 'Show page loader', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_show_loader]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Site structure */
	$wp_customize->add_setting('ansia_theme_options[_site_structure]', array(
        'default'    => 'fullwidth',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_select',
    ) );
	$wp_customize->add_control('ansia_theme_options[_site_structure]', array(
        'label'      => __( 'Website structure', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_site_structure]',
        'type'       => 'select',
		'priority' => 2,
		'choices' => array(
			'fullwidth' => __( 'Full Width', 'ansia'),
			'boxed' => __( 'Boxed', 'ansia'),
		),
    ) );
	/* Show Search Button */
	$wp_customize->add_setting('ansia_theme_options[_search_button]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_search_button]', array(
        'label'      => __( 'Show search button in the bar', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_search_button]',
        'type'       => 'checkbox',
		'priority' => 2,
    ) );
	/* Enable Smooth Scroll */
	$wp_customize->add_setting('ansia_theme_options[_smooth_scroll]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_smooth_scroll]', array(
        'label'      => __( 'Enable Smooth Scroll', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_smooth_scroll]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Scroll to top also in mobile */
	$wp_customize->add_setting('ansia_theme_options[_scroll_top]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_scroll_top]', array(
        'label'      => __( 'Show scroll to top button also on mobile view', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_scroll_top]',
        'type'       => 'checkbox',
		'priority' => 3,
    ) );
	/* Custom Excerpt More */
	$wp_customize->add_setting('ansia_theme_options[_excerpt_more]', array(
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default'    => '&hellip;'
    ) );
	$wp_customize->add_control('ansia_theme_options[_excerpt_more]', array(
        'label'      => __( 'Custom Excerpt Final', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_excerpt_more]',
        'type'       => 'text',
		'priority' => 4,
    ) );
	/* Text lenght for blog */
	$wp_customize->add_setting('ansia_theme_options[_lenght_blog]', array(
        'default'    => '55',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control('ansia_theme_options[_lenght_blog]', array(
        'label'      => __( 'Text lenght for blog excerpt (number of words)', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_general',
        'settings'   => 'ansia_theme_options[_lenght_blog]',
        'type'       => 'number',
		'priority' => 5,
    ) );
	/* Copyright Text */
	$wp_customize->add_setting('ansia_theme_options[_copyright_text]', array(
		'sanitize_callback' => 'ansia_sanitize_text',
		'default'    => '&copy; '.date('Y').' '. get_bloginfo('name'),
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_control('ansia_theme_options[_copyright_text]', array(
		'label'      => __( 'Copyright Text', 'ansia' ),
		'description' => __( 'Get the PRO version to remove CrestaProject Credits', 'ansia'),
		'section'    => 'cresta_ansia_theme_options_general',
		'settings'   => 'ansia_theme_options[_copyright_text]',
		'type'       => 'text',
		'priority' => 6,
	) );
	/**
	* ################ POSTS AND PAGES SETTINGS
	*/
	/* Show excerpt or full post */
	$wp_customize->add_setting('ansia_theme_options[_showpost_type]', array(
        'default'    => 'excerpt',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_select',
    ) );
	$wp_customize->add_control('ansia_theme_options[_showpost_type]', array(
        'label'      => __( 'Show excerpt or full post in the blog page', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_postpage',
        'settings'   => 'ansia_theme_options[_showpost_type]',
        'type'       => 'select',
		'priority' => 1,
		'choices' => array(
			'excerpt' => __( 'Show excerpt', 'ansia'),
			'fullpost' => __( 'Show full post', 'ansia'),
		),
    ) );
	/* Show previous and next post */
	$wp_customize->add_setting('ansia_theme_options[_show_prevnext]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_show_prevnext]', array(
        'label'      => __( 'Show previous and next post', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_postpage',
        'settings'   => 'ansia_theme_options[_show_prevnext]',
        'type'       => 'checkbox',
		'priority' => 2,
    ) );
	/**
	* ################ SECTION COLORS
	*/
	/* Custom Colors */
	$colors = array();
	
	$colors[] = array(
	'slug'=>'_main_background_color', 
	'default' => '#ffffff',
	'label' => __('Inner Background Color', 'ansia'),
	'priority' => 10,
	);
	$colors[] = array(
	'slug'=>'_main_text_color', 
	'default' => '#413e4a',
	'label' => __('Text Color', 'ansia'),
	'priority' => 20,
	);
	$colors[] = array(
	'slug'=>'_main_accent_color', 
	'default' => '#b2dbbf',
	'label' => __('Accent Color', 'ansia'),
	'priority' => 30,
	);
	$colors[] = array(
	'slug'=>'_main_border_color', 
	'default' => '#e0e0e0',
	'label' => __('Border Color', 'ansia'),
	'priority' => 40,
	);
	$colors[] = array(
	'slug'=>'_footer_background_color', 
	'default' => '#202020',
	'label' => __('Footer Background Color', 'ansia'),
	'priority' => 50,
	);
	$colors[] = array(
	'slug'=>'_footer_text_color', 
	'default' => '#f3f3f3',
	'label' => __('Footer Text Color', 'ansia'),
	'priority' => 60,
	);
	$colors[] = array(
	'slug'=>'_footer_accent_color', 
	'default' => '#f3ffbd',
	'label' => __('Footer Accent Color', 'ansia'),
	'priority' => 70,
	);
	foreach( $colors as $ansia_theme_options_colors ) {
		$wp_customize->add_setting(
			'ansia_theme_options[' . $ansia_theme_options_colors['slug'] . ']', array(
				'default' => $ansia_theme_options_colors['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'ansia_theme_options[' . $ansia_theme_options_colors['slug'] . ']', array(
					'label' => $ansia_theme_options_colors['label'], 
					'section' => 'colors',
					'settings' =>'ansia_theme_options[' . $ansia_theme_options_colors['slug'] . ']',
					'priority' => $ansia_theme_options_colors['priority'],
				)
			)
		);
	}
	/**
	* ################ SECTION SOCIAL NETWORK
	*/	
	/* Show social in push sidebar */
	$wp_customize->add_setting('ansia_theme_options[_social_show_push]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_social_show_push]', array(
        'label'      => __( 'Show social buttons in push sidebar', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_social',
        'settings'   => 'ansia_theme_options[_social_show_push]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	/* Show social in footer */
	$wp_customize->add_setting('ansia_theme_options[_social_show_footer]', array(
        'default'    => '1',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_checkbox'
    ) );
	$wp_customize->add_control('ansia_theme_options[_social_show_footer]', array(
        'label'      => __( 'Show social buttons in footer', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_social',
        'settings'   => 'ansia_theme_options[_social_show_footer]',
        'type'       => 'checkbox',
		'priority' => 1,
    ) );
	
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'_facebookurl', 
	'default' => '',
	'label' => __('Facebook URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_twitterurl', 
	'default' => '',
	'label' => __('Twitter URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_googleplusurl', 
	'default' => '',
	'label' => __('Google Plus URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_linkedinurl', 
	'default' => '',
	'label' => __('Linkedin URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_instagramurl', 
	'default' => '',
	'label' => __('Instagram URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_youtubeurl', 
	'default' => '',
	'label' => __('YouTube URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_pinteresturl', 
	'default' => '',
	'label' => __('Pinterest URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_tumblrurl', 
	'default' => '',
	'label' => __('Tumblr URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_flickrurl', 
	'default' => '',
	'label' => __('Flickr URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_vkurl', 
	'default' => '',
	'label' => __('VK URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_xingurl', 
	'default' => '',
	'label' => __('Xing URL', 'ansia')
	);
	$socialmedia[] = array(
	'slug'=>'_redditurl', 
	'default' => '',
	'label' => __('Reddit URL', 'ansia')
	);
	foreach( $socialmedia as $ansia_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'ansia_theme_options[' . $ansia_theme_options['slug']. ']', array(
				'default' => $ansia_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'option',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			'ansia_theme_options[' . $ansia_theme_options['slug']. ']', 
			array('label' => $ansia_theme_options['label'], 
			'section'    => 'cresta_ansia_theme_options_social',
			'settings' =>'ansia_theme_options[' . $ansia_theme_options['slug']. ']',
			)
		);
	}
	/* Open social links */
	$wp_customize->add_setting('ansia_theme_options[_social_open_links]', array(
        'default'    => '_self',
        'type'       => 'option',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ansia_sanitize_select',
    ) );
	$wp_customize->add_control('ansia_theme_options[_social_open_links]', array(
        'label'      => __( 'Open social links', 'ansia' ),
        'section'    => 'cresta_ansia_theme_options_social',
        'settings'   => 'ansia_theme_options[_social_open_links]',
        'type'       => 'select',
		'priority' => 4,
		'choices' => array(
			'_self' => __( 'Same window', 'ansia'),
			'_blank' => __( 'New Window', 'ansia'),
		),
    ) );
}
add_action( 'customize_register', 'ansia_custom_settings_register' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ansia_customize_register( $wp_customize ) {
	//$wp_customize->remove_section('colors');
	$wp_customize->get_section( 'colors' )->panel = 'cresta_ansia_themeoptions';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ansia_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ansia_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ansia_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ansia_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ansia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ansia_customize_preview_js() {
	wp_enqueue_script( 'ansia-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ansia_customize_preview_js' );

if( ! function_exists('ansia_options')){
	function ansia_options($name, $default = false) {
		$options = ( get_option( 'ansia_theme_options' ) ) ? get_option( 'ansia_theme_options' ) : null;
		// return the option if it exists
		if ( isset( $options[ $name ] ) ) {
			return apply_filters( "ansia_theme_options_{$name}", $options[ $name ] );
		}
		// return default if nothing else
		return apply_filters( "ansia_theme_options_{$name}", $default );
	}
}

/**
 * Delete font size style from tag cloud widget
 */
if( ! function_exists('ansia_fix_tag_cloud')){
	function ansia_fix_tag_cloud($tag_string){
	   return preg_replace('/ style=("|\')(.*?)("|\')/','',$tag_string);
	}
}
add_filter('wp_generate_tag_cloud', 'ansia_fix_tag_cloud',10,1);

/**
 * Replace Excerpt More
 */
if( ! function_exists('ansia_new_excerpt_more')){
	function ansia_new_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		$customMore = ansia_options('_excerpt_more', '&hellip;');
		return esc_html($customMore);
	}
}
add_filter('excerpt_more', 'ansia_new_excerpt_more');

/**
 * Custom Excerpt Length
 */
if( ! function_exists('ansia_custom_excerpt_length')){
	function ansia_custom_excerpt_length( $length ) {
		if ( ! is_admin() ) {
			$textBlog = ansia_options('_lenght_blog', '55');
			return intval($textBlog);
		} else {
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'ansia_custom_excerpt_length', 999 );

function ansia_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function ansia_sanitize_text( $input ) {
	return wp_kses($input, ansia_allowed_html());
}

function ansia_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

if( ! function_exists('ansia_loadingPage')){
	function ansia_loadingPage () {
		echo '<div class="aLoader1"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>';
	}
}

if( ! function_exists('ansia_allowed_html')){
	function ansia_allowed_html() {
		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'id'    => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'i' => array(),
			'br' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
			),
			'iframe' => array(
				'width' => array(),
				'height' => array(),
				'src' => array(),
				'frameborder' => array(),
				'allow' => array(),
				'style' => array(),
				'name' => array(),
				'id' => array(),
				'class' => array(),
			),
		);
		return $allowed_tags;
	}
}

if( ! function_exists('ansia_show_social_network')){
	function ansia_show_social_network($position) {
		$openLinks = ansia_options('_social_open_links', '_self');
		if ($openLinks == '_blank') {
			$attribute = 'rel=noopener';
		} else {
			$attribute = '';
		}
		$facebookURL = ansia_options('_facebookurl', '');
		$twitterURL = ansia_options('_twitterurl', '');
		$googleplusURL = ansia_options('_googleplusurl', '');
		$linkedinURL = ansia_options('_linkedinurl', '');
		$instagramURL = ansia_options('_instagramurl', '');
		$youtubeURL = ansia_options('_youtubeurl', '');
		$pinterestURL = ansia_options('_pinteresturl', '');
		$tumblrURL = ansia_options('_tumblrurl', '');
		$flickrURL = ansia_options('_flickrurl', '');
		$vkURL = ansia_options('_vkurl', '');
		$xingURL = ansia_options('_xingurl', '');
		$redditURL = ansia_options('_redditurl', '');
		?>
		<div class="ansia-social-button <?php echo $position == 'sidebar' ? 'inSidebar' : 'inFooter' ?>">
			<?php if ($position == 'float') : ?>
			<?php endif; ?>
			<?php if ($facebookURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($facebookURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Facebook', 'ansia' ); ?>"><i class="fa fa-facebook spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($twitterURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($twitterURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Twitter', 'ansia' ); ?>"><i class="fa fa-twitter spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($googleplusURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($googleplusURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Google Plus', 'ansia' ); ?>"><i class="fa fa-google-plus spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($linkedinURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($linkedinURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Linkedin', 'ansia' ); ?>"><i class="fa fa-linkedin spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($instagramURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($instagramURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Instagram', 'ansia' ); ?>"><i class="fa fa-instagram spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($youtubeURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($youtubeURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'YouTube', 'ansia' ); ?>"><i class="fa fa-youtube spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($pinterestURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($pinterestURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Pinterest', 'ansia' ); ?>"><i class="fa fa-pinterest spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($tumblrURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($tumblrURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Tumblr', 'ansia' ); ?>"><i class="fa fa-tumblr spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($flickrURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($flickrURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Flickr', 'ansia' ); ?>"><i class="fa fa-flickr spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Flickr', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($vkURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($vkURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'VK', 'ansia' ); ?>"><i class="fa fa-vk spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($xingURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($xingURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Xing', 'ansia' ); ?>"><i class="fa fa-xing spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Xing', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
			<?php if ($redditURL) : ?>
				<a class="ansia-social" href="<?php echo esc_url($redditURL); ?>" target="<?php echo esc_attr($openLinks); ?>" <?php echo esc_attr($attribute); ?> title="<?php esc_attr_e( 'Reddit', 'ansia' ); ?>"><i class="fa fa-reddit-alien spaceLeftRight" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Reddit', 'ansia' ); ?></span></i></a>
			<?php endif; ?>
		</div>
		<?php
	}
}

/**
 * Backwards Compatibility for wp_body_open() function in WP 5.2
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Add Custom CSS to Header 
 */
function ansia_custom_css_styles() {
	echo '<style id="ansia-custom-css">';
		$backgroundColor = ansia_options('_main_background_color', '#ffffff');
		$textColor = ansia_options('_main_text_color', '#404040');
		$accentColor = ansia_options('_main_accent_color', '#b2dbbf');
		$borderColor = ansia_options('_main_border_color', '#e0e0e0');
		$footerBackgroundColor = ansia_options('_footer_background_color', '#202020');
		$footerTextColor = ansia_options('_footer_text_color', '#f3f3f3');
		$footerAccentColor = ansia_options('_footer_accent_color', '#f3ffbd');
		/* Accent Color */ 
		list($r, $g, $b) = sscanf($accentColor, '#%02x%02x%02x');
		?>
		blockquote::before,
		a,
		a:visited,
		.main-navigation > div > ul > li:hover > a,
		.main-navigation > div > ul > li:focus > a,
		.main-navigation > div > ul > .current_page_item > a,
		.main-navigation > div > ul > .current-menu-item > a,
		.main-navigation > div > ul > .current_page_ancestor > a,
		.main-navigation > div > ul > .current-menu-ancestor > a,
		.nav-links .post-title,
		.entry-meta span i,
		.woocommerce ul.products > li .price,
		.woocommerce div.product .summary .price {
			color: <?php echo esc_html($accentColor); ?>;
		}
		.crestaMenuButton,
		#wp-calendar > caption,
		.ansia-subbar,
		.ansia-subbar .search-container input[type="search"],
		.entry-featuredImg .ansia-the-effect,
		.entry-wooImage .ansia-the-effect,
		.nano > .nano-pane > .nano-slider,
		.content-area .onsale,
		.widget_price_filter .ui-slider .ui-slider-range,
		.widget_price_filter .ui-slider .ui-slider-handle,
		header.site-header,
		body:before {
			background-color: <?php echo esc_html($accentColor); ?>;
		}
		.nano > .nano-pane {
			background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.15);
		}
		.nano > .nano-pane > .nano-slider {
			background-color: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.3);
		}
		blockquote,
		#wp-calendar tbody td#today,
		.tagcloud a:hover,
		.tagcloud a:focus,
		.tagcloud a:active,
		.tags-links a:hover,
		.tags-links a:focus,
		.tags-links a:active,
		.edit-link a:hover,
		.edit-link a:focus,
		.edit-link a:active,
		.woocommerce ul.products > li:hover,
		.woocommerce ul.products > li:focus,
		.woocommerce ul.products > li h2:after {
			border-color: <?php echo esc_html($accentColor); ?>;
		}
		footer.site-footer {
			border-top-color: <?php echo esc_html($accentColor); ?>;
		}
		.tagcloud a:hover,
		.tagcloud a:focus,
		.tagcloud a:active,
		.tags-links a:hover,
		.tags-links a:focus,
		.tags-links a:active,
		.edit-link a:hover,
		.edit-link a:focus,
		.edit-link a:active,
		.woocommerce ul.products > li:hover,
		.woocommerce ul.products > li:focus {
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($accentColor); ?>;
		}
		<?php 
		/* Footer Accent Color */
		?>
		footer.site-footer a {
			color: <?php echo esc_html($footerAccentColor); ?>;
		}
		footer.site-footer .tagcloud a:hover,
		footer.site-footer .tagcloud a:focus,
		footer.site-footer .tagcloud a:active {
			border-color: <?php echo esc_html($footerAccentColor); ?>;
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($footerAccentColor); ?>;
		}
		<?php
		/* Background Color */
		?>
		.ansia-big-content,
		input[type="text"],
		input[type="email"],
		input[type="url"],
		input[type="password"],
		input[type="search"],
		input[type="number"],
		input[type="tel"],
		input[type="range"],
		input[type="date"],
		input[type="month"],
		input[type="week"],
		input[type="time"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="color"],
		textarea,
		select,
		.ansia-menu,
		#tertiary.widget-area,
		.hamburger-inner,
		.hamburger-inner::before,
		.hamburger-inner::after,
		.asbutton:after,
		.ansiaLoader,
		#toTop {
			background-color: <?php echo esc_html($backgroundColor); ?>;
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.navigation.pagination .nav-links span.current,
		.woocommerce-pagination > ul.page-numbers li span,
		.page-links .current,
		.navigation.pagination .nav-links a:hover,
		.navigation.pagination .nav-links a:focus,
		.navigation.pagination .nav-links a:active,
		.woocommerce-pagination > ul.page-numbers li a:hover,
		.woocommerce-pagination > ul.page-numbers li a:focus,
		.woocommerce-pagination > ul.page-numbers li a:active,
		footer.entry-footer .read-more a:hover,
		footer.entry-footer .read-more a:focus,
		footer.entry-footer .read-more a:active,
		.cat-links a:hover,
		.cat-links a:focus,
		.cat-links a:active,
		.page-links a:hover,
		.page-links a:focus,
		.page-links a:active,
		#wp-calendar > caption,
		.ansia-subbar,
		.ansia-subbar .search-container input[type="search"],
		.ansia-social-button.inSidebar .ansia-social,
		.content-area .onsale,
		.woocommerce .wooImage .button:hover,
		.woocommerce .wooImage .added_to_cart:hover,
		.woocommerce-error li a:hover,
		.woocommerce-message a:hover,
		.return-to-shop a:hover,
		.wc-proceed-to-checkout .button.checkout-button:hover,
		.widget_shopping_cart p.buttons a:hover,
		.widget_price_filter .price_slider_amount .button,
		.woocommerce div.product form.cart .button {
			color: <?php echo esc_html($backgroundColor); ?>;
		}
		.search-container ::-webkit-input-placeholder {
			color: <?php echo esc_html($backgroundColor); ?>;
		}
		.search-container ::-moz-placeholder {
			color: <?php echo esc_html($backgroundColor); ?>;
		}
		.search-container :-ms-input-placeholder {
			color: <?php echo esc_html($backgroundColor); ?>;
		}
		.search-container :-moz-placeholder {
			color: <?php echo esc_html($backgroundColor); ?>;
		}
		.crestaMenuButton a,
		.crestaMenuButton:hover a,
		.crestaMenuButton:focus a,
		.crestaMenuButton:active a {
			color: <?php echo esc_html($backgroundColor); ?> !important;
		}
		.asbutton,
		.ansia-subbar .search-container {
			border-color: <?php echo esc_html($backgroundColor); ?>;
		}
		.ansia-subbar .search-container {
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($backgroundColor); ?>;
		}
		<?php
		/* Text Color */
		list($r, $g, $b) = sscanf($textColor, '#%02x%02x%02x');
		?>
		.ansia-menu, .ansia-subbar, .ansia-big-content.boxed .ansia-content, body:before {
			box-shadow: 2px 3px 16px 4px rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>,0.07);
		}
		body,
		input,
		select,
		optgroup,
		textarea,
		input[type="text"],
		input[type="email"],
		input[type="url"],
		input[type="password"],
		input[type="search"],
		input[type="number"],
		input[type="tel"],
		input[type="range"],
		input[type="date"],
		input[type="month"],
		input[type="week"],
		input[type="time"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="color"],
		textarea,
		a:hover, a:focus, a:active,
		.post-navigation .nav-links a,
		.main-navigation a,
		.main-navigation ul ul a,
		.navigation.pagination .nav-links a,
		.woocommerce-pagination > ul.page-numbers li a,
		.page-links a,
		.navigation.pagination .nav-links .next,
		.woocommerce-pagination > ul.page-numbers li a.next,
		.navigation.pagination .nav-links .prev,
		.woocommerce-pagination > ul.page-numbers li a.prev,
		.tagcloud a, .tags-links a, .edit-link a,
		.entry-meta span a, .entry-meta span,
		.cat-links a,
		footer.entry-footer .read-more a,
		#toTop,
		.woocommerce .wooImage .button,
		.woocommerce .wooImage .added_to_cart,
		.woocommerce-error li a,
		.woocommerce-message a,
		.return-to-shop a,
		.wc-proceed-to-checkout .button.checkout-button,
		.widget_shopping_cart p.buttons a,
		.woocommerce .wishlist_table td.product-add-to-cart a,
		.woocommerce .content-area .woocommerce-tabs .tabs li.active a,
		.woocommerce .content-area .woocommerce-tabs .tabs li a {
			color: <?php echo esc_html($textColor); ?>;
		}
		body ::-webkit-input-placeholder {
			color: <?php echo esc_html($textColor); ?>;
		}
		body ::-moz-placeholder {
			color: <?php echo esc_html($textColor); ?>;
		}
		body :-ms-input-placeholder {
			color: <?php echo esc_html($textColor); ?>;
		}
		body :-moz-placeholder {
			color: <?php echo esc_html($textColor); ?>;
		}
		.woocommerce ul.products > li .price {
			color: <?php echo esc_html($textColor); ?> !important;
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.navigation.pagination .nav-links span.current,
		.woocommerce-pagination > ul.page-numbers li span,
		.page-links .current,
		.navigation.pagination .nav-links a:hover,
		.navigation.pagination .nav-links a:focus,
		.navigation.pagination .nav-links a:active,
		.woocommerce-pagination > ul.page-numbers li a:hover,
		.woocommerce-pagination > ul.page-numbers li a:focus,
		.woocommerce-pagination > ul.page-numbers li a:active,
		footer.entry-footer .read-more a:hover,
		footer.entry-footer .read-more a:focus,
		footer.entry-footer .read-more a:active,
		.cat-links a:hover,
		.cat-links a:focus,
		.cat-links a:active,
		.page-links a:hover,
		.page-links a:focus,
		.page-links a:active,
		.nav-links .nav-previous .meta-nav:after,
		.nav-links .nav-next .meta-nav:before,
		.widget .widget-title:before,
		.widget .widget-title:after,
		.woocommerce .wooImage .button:hover,
		.woocommerce .wooImage .added_to_cart:hover,
		.woocommerce-error li a:hover,
		.woocommerce-message a:hover,
		.return-to-shop a:hover,
		.wc-proceed-to-checkout .button.checkout-button:hover,
		.widget_shopping_cart p.buttons a:hover {
			background-color: <?php echo esc_html($textColor); ?>;
		}
		button:hover,button:active, button:focus,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		input[type="button"]:active,
		input[type="button"]:focus,
		input[type="reset"]:active,
		input[type="reset"]:focus,
		input[type="submit"]:active,
		input[type="submit"]:focus,
		.navigation.pagination .nav-links span.current,
		.woocommerce-pagination > ul.page-numbers li span,
		.page-links .current,
		.navigation.pagination .nav-links a,
		.woocommerce-pagination > ul.page-numbers li a,
		.page-links a,
		.nav-links .meta-nav,
		.widget .widget-title h3,
		.cat-links a,
		footer.entry-footer .read-more,
		header.page-header,
		#toTop,
		.woocommerce .wooImage .button,
		.woocommerce .wooImage .added_to_cart,
		.woocommerce-error li a,
		.woocommerce-message a,
		.return-to-shop a,
		.wc-proceed-to-checkout .button.checkout-button,
		.widget_shopping_cart p.buttons a,
		.woocommerce .wishlist_table td.product-add-to-cart a,
		.woocommerce .content-area .woocommerce-tabs .tabs li.active a {
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($textColor); ?>;
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		select:focus,
		.navigation.pagination .nav-links span.current,
		.woocommerce-pagination > ul.page-numbers li span,
		.page-links .current,
		.navigation.pagination .nav-links a,
		.woocommerce-pagination > ul.page-numbers li a,
		.page-links a,
		.nav-links .meta-nav,
		.widget .widget-title h3,
		.cat-links a,
		footer.entry-footer .read-more,
		header.page-header,
		#toTop,
		.woocommerce .wooImage .button,
		.woocommerce .wooImage .added_to_cart,
		.woocommerce-error li a,
		.woocommerce-message a,
		.return-to-shop a,
		.wc-proceed-to-checkout .button.checkout-button,
		.widget_shopping_cart p.buttons a,
		.woocommerce .wishlist_table td.product-add-to-cart a,
		.woocommerce .content-area .woocommerce-tabs .tabs li.active a,
		.woocommerce .wooImage .button:hover,
		.woocommerce .wooImage .added_to_cart:hover,
		.woocommerce-error li a:hover,
		.woocommerce-message a:hover,
		.return-to-shop a:hover,
		.wc-proceed-to-checkout .button.checkout-button:hover,
		.widget_shopping_cart p.buttons a:hover {
			border-color: <?php echo esc_html($textColor); ?>;
		}
		.path {
			stroke: <?php echo esc_html($textColor); ?>;
		}
		<?php
		/* Border Color */
		?>
		hr,
		.main-navigation ul ul a,
		#wp-calendar th,
		.wp-caption .wp-caption-text,
		.woocommerce .content-area .woocommerce-tabs .tabs,
		.woocommerce table.shop_attributes tr,
		.woocommerce table.shop_attributes tr th,
		.woocommerce-page .entry-content table thead th,
		.woocommerce-page .entry-content table tr:nth-child(even),
		#payment .payment_methods li .payment_box,
		.widget_price_filter .price_slider_wrapper .ui-widget-content {
			background-color: <?php echo esc_html($borderColor); ?>;
		}
		input[type="text"],
		input[type="email"],
		input[type="url"],
		input[type="password"],
		input[type="search"],
		input[type="number"],
		input[type="tel"],
		input[type="range"],
		input[type="date"],
		input[type="month"],
		input[type="week"],
		input[type="time"],
		input[type="datetime"],
		input[type="datetime-local"],
		input[type="color"],
		textarea,
		select,
		#wp-calendar tbody td,
		aside ul.menu .indicatorBar,
		aside ul.product-categories .indicatorBar,
		.tagcloud a, .tags-links a, .edit-link a,
		#comments ol .pingback,
		#comments ol article,
		#comments .reply,
		.woocommerce ul.products > li,
		body.woocommerce form.cart,
		.woocommerce .product_meta,
		.woocommerce .single_variation,
		.woocommerce .woocommerce-tabs,
		.woocommerce #reviews #comments ol.commentlist li .comment-text,
		.woocommerce p.stars a.star-1,
		.woocommerce p.stars a.star-2,
		.woocommerce p.stars a.star-3,
		.woocommerce p.stars a.star-4,
		.single-product div.product .woocommerce-product-rating,
		.woocommerce-page .entry-content table,
		.woocommerce-page .entry-content table thead th,
		#order_review, #order_review_heading,
		#payment,
		#payment .payment_methods li,
		.widget_shopping_cart p.total {
			border-color: <?php echo esc_html($borderColor); ?>;
		}
		.site-main .comment-navigation, .site-main
		.posts-navigation, .site-main
		.post-navigation,
		.site-main .navigation.pagination,
		aside ul li,
		aside ul.menu li a,
		aside ul.product-categories li a,
		footer.entry-footer {
			border-bottom-color: <?php echo esc_html($borderColor); ?>;
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.tagcloud a, .tags-links a, .edit-link a,
		#comments article footer img,
		#comments .reply,
		.woocommerce ul.products > li,
		.woocommerce .content-area .images figure div a,
		.woocommerce #reviews .commentlist li .avatar,
		.product_list_widget li img {
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($borderColor); ?>;
		}
		.entry-featuredImg,
		.woocommerce .content-area .images figure div:first-child a {
			box-shadow: 8px 8px 0px 0px <?php echo esc_html($borderColor); ?>;
		}
		.star-rating:before {
			color: <?php echo esc_html($borderColor); ?>;
		}
		<?php
		/* Footer Background Color */
		?>
		footer.site-footer {
			background-color: <?php echo esc_html($footerBackgroundColor); ?>;
		}
		<?php
		/* Footer Text Color */
		?>
		footer.site-footer {
			color: <?php echo esc_html($footerTextColor); ?>;
		}
		footer.site-footer .widget .widget-title h3 {
			border-color: <?php echo esc_html($footerTextColor); ?>;
			box-shadow: 3px 3px 0px 0px <?php echo esc_html($footerTextColor); ?>;
		}
		footer.site-footer .widget .widget-title:before,
		footer.site-footer .widget .widget-title:after {
			background-color: <?php echo esc_html($footerTextColor); ?>;
		}
		<?php
	echo '</style>';
}
add_action('wp_head', 'ansia_custom_css_styles');
