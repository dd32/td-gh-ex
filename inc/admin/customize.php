<?php

/*
 * Class MP_Artwork_Customizer
 *
 * add actions for default widgets if footer
 */
require get_template_directory() . '/inc/admin/customise-classes.php';

class MP_Profit_Customizer {

	private $prefix;

	public function __construct( $prefix ) {
		$this->prefix = $prefix;
		//Handles the theme's theme customizer functionality.
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );
	}


	/**
	 * Get prefix.
	 *
	 * @access public
	 * @return sting
	 */
	private function get_prefix() {
		return $this->prefix . '_';
	}


	/**
	 * Sets up the theme customizer sections, controls, and settings.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  object $wp_customize
	 *
	 * @return void
	 */
	function customize_register( $wp_customize ) {
		/*
		 * Enable live preview for WordPress theme features.
		 */
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->remove_section( "header_image" );


		/*
		 * Add 'gemeral' section
		 */
		$wp_customize->add_section(
			$this->get_prefix() . 'general_section', array(
				'title'      => esc_html__( 'General', 'artwork-lite' ),
				'priority'   => 20,
				'capability' => 'edit_theme_options'
			)
		);


		

		$color_scheme = $this->get_color_scheme();

		/*
		 * Brand Color
		 */

		$wp_customize->add_setting( $this->get_prefix() . 'color_text', array(
			'default'           => MP_ARTWORK_TEXT_COLOR,
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->get_prefix() . 'color_text', array(
			'label'    => __( 'Text Color', 'artwork-lite' ),
			'section'  => 'colors',
			'settings' => $this->get_prefix() . 'color_text'
		) ) );
		$wp_customize->add_setting( $this->get_prefix() . 'color_primary', array(
			'default'           => $color_scheme[0],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->get_prefix() . 'color_primary', array(
			'label'    => __( 'Accent Color', 'artwork-lite' ),
			'section'  => 'colors',
			'settings' => $this->get_prefix() . 'color_primary'
		) ) );

		$wp_customize->add_setting( $this->get_prefix() . 'color_second', array(
			'default'           => $color_scheme[1],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->get_prefix() . 'color_second', array(
			'label'    => __( 'Second Accent Color', 'artwork-lite' ),
			'section'  => 'colors',
			'settings' => $this->get_prefix() . 'color_second'
		) ) );

		$wp_customize->add_setting( $this->get_prefix() . 'color_third', array(
			'default'           => $color_scheme[2],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->get_prefix() . 'color_third', array(
			'label'    => __( 'Third Accent Color', 'artwork-lite' ),
			'section'  => 'colors',
			'settings' => $this->get_prefix() . 'color_third'
		) ) );
		$wp_customize->add_setting( $this->get_prefix() . 'color_fourth', array(
			'default'           => $color_scheme[3],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $this->get_prefix() . 'color_fourth', array(
			'label'    => __( 'Fourth Accent Color', 'artwork-lite' ),
			'section'  => 'colors',
			'settings' => $this->get_prefix() . 'color_fourth'
		) ) );

		/*
		 * Add 'logo' section
		 */

		$wp_customize->add_section(
			$this->get_prefix() . 'logo_section', array(
				'title'      => __( 'Logo', 'artwork-lite' ),
				'priority'   => 30,
				'capability' => 'edit_theme_options'
			)
		);

		/*
		 * Add the 'logo ' upload setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'logo', array(
				
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 * Add the upload control for the$this->get_prefix().'logo' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, $this->get_prefix() . 'logo', array(
					'label'    => esc_html__( 'Logo', 'artwork-lite' ),
					'section'  => $this->get_prefix() . 'logo_section',
					'settings' => $this->get_prefix() . 'logo',
				)
			)
		);
		/*
		 * Add the 'logo footer' upload setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'logo_footer', array(
				
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 * Add the upload control for the $this->get_prefix().'logo_footer' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, $this->get_prefix() . 'logo_footer', array(
					'label'    => esc_html__( 'Footer logo', 'artwork-lite' ),
					'section'  => $this->get_prefix() . 'logo_section',
					'settings' => $this->get_prefix() . 'logo_footer',
				)
			)
		);
		/*
		 * Add 'header_info' section
		 */
		$wp_customize->add_section(
			$this->get_prefix() . 'header_info', array(
				'title'      => esc_html__( 'Contact Information', 'artwork-lite' ),
				'priority'   => 60,
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_setting( $this->get_prefix() . 'location_info_label', array(
			'default'           => __( 'Opening hours', 'artwork-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		$wp_customize->add_control( $this->get_prefix() . 'location_info_label', array(
			'label'    => __( 'Title Contact Information 1', 'artwork-lite' ),
			'section'  => $this->get_prefix() . 'header_info',
			'settings' => $this->get_prefix() . 'location_info_label',
		) );
		$wp_customize->add_setting( $this->get_prefix() . 'location_info', array(
			'default'           => MP_ARTWORK_DEFAULT_ADDRESS,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		$wp_customize->add_control( new MP_Artwork_Customize_Textarea_Control( $wp_customize, $this->get_prefix() . 'location_info', array(
			'label'    => __( 'Contact Information 1', 'artwork-lite' ),
			'section'  => $this->get_prefix() . 'header_info',
			'settings' => $this->get_prefix() . 'location_info',
		) ) );
		$wp_customize->add_setting( $this->get_prefix() . 'hours_info_label', array(
			'default'           => __( 'Address', 'artwork-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		$wp_customize->add_control( $this->get_prefix() . 'hours_info_label', array(
			'label'    => __( 'Title Contact Information 2', 'artwork-lite' ),
			'section'  => $this->get_prefix() . 'header_info',
			'settings' => $this->get_prefix() . 'hours_info_label',
		) );
		$wp_customize->add_setting( $this->get_prefix() . 'hours_info', array(
			'default'           => MP_ARTWORK_DEFAULT_OPEN_HOURS,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
			'transport'         => 'postMessage'
		) );
		$wp_customize->add_control( new MP_Artwork_Customize_Textarea_Control( $wp_customize, $this->get_prefix() . 'hours_info', array(
			'label'    => __( 'Contact Information 2', 'artwork-lite' ),
			'section'  => $this->get_prefix() . 'header_info',
			'settings' => $this->get_prefix() . 'hours_info',
		) ) );


		/*
		 * Add 'header_socials' section
		 */
		$wp_customize->add_section(
			$this->get_prefix() . 'header_socials', array(
				'title'      => esc_html__( 'Social Links', 'artwork-lite' ),
				'priority'   => 80,
				'capability' => 'edit_theme_options'
			)
		);
		/*
		 *  Add the 'facebook link' setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'facebook_link', array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_text' ),
			)
		);

		/*
		 * Add the upload control for the 'facebook link' setting.
		 */
		$wp_customize->add_control(
			$this->get_prefix() . 'facebook_link', array(
				'label'    => esc_html__( 'Facebook link', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'facebook_link',
			)
		);
		/*
		 * Add the 'twitter link' setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'twitter_link', array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 *  Add the upload control for the 'twitter link' setting.
		 */
		$wp_customize->add_control(
			$this->get_prefix() . 'twitter_link', array(
				'label'    => esc_html__( 'Twitter link', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'twitter_link',
			)
		);

		/*
		 * Add the 'linkedin link' setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'linkedin_link', array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 * Add the upload control for the 'linkedin link' setting.
		 */
		$wp_customize->add_control(
			$this->get_prefix() . 'linkedin_link', array(
				'label'    => esc_html__( 'LinkedIn link', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'linkedin_link',
			)
		);
		/*
		 * Add the 'google plus link' setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'google_plus_link', array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 * Add the upload control for the 'google plus link' setting.
		 */
		$wp_customize->add_control(
			$this->get_prefix() . 'google_plus_link', array(
				'label'    => esc_html__( 'Google+ link', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'google_plus_link',
			)
		);

		/* Add the 'Instagram link' setting. */
		$wp_customize->add_setting(
			$this->get_prefix() . 'instagram_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		/* Add the upload control for the 'Instagram link' setting. */
		$wp_customize->add_control(
			$this->get_prefix() . 'instagram_link', array(
				'label'    => esc_html__( 'Instagram link', 'profit-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'instagram_link',
			)
		);

		/* Add the 'pinterest link' setting. */
		$wp_customize->add_setting(
			$this->get_prefix() . 'pinterest_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'pinterest link' setting. */
		$wp_customize->add_control(
			$this->get_prefix() . 'pinterest_link', array(
				'label'    => esc_html__( 'Pinterest link', 'profit-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'pinterest_link',
			)
		);
		/* Add the 'tumblrlink' setting. */
		$wp_customize->add_setting(
			$this->get_prefix() . 'tumblr_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'tumblr link' setting. */
		$wp_customize->add_control(
			$this->get_prefix() . 'tumblr_link', array(
				'label'    => esc_html__( 'Tumblr link', 'profit-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'tumblr_link',
			)
		);
		/* Add the 'youtube link' setting. */
		$wp_customize->add_setting(
			$this->get_prefix() . 'youtube_link', array(
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);
		/* Add the upload control for the 'google plus link' setting. */
		$wp_customize->add_control(
			$this->get_prefix() . 'youtube_link', array(
				'label'    => esc_html__( 'Youtube link', 'profit-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'youtube_link',
			)
		);
		/*
		 * Add the 'rss link' setting.
		 */
		$wp_customize->add_setting(
			$this->get_prefix() . 'rss_link', array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		/*
		 * Add the upload control for the 'rss link' setting.
		 */
		$wp_customize->add_control(
			$this->get_prefix() . 'rss_link', array(
				'label'    => esc_html__( 'Rss link', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'header_socials',
				'settings' => $this->get_prefix() . 'rss_link',
			)
		);
		/*
		 * Add 'header_socials' section
		 */
		$wp_customize->add_section(
			$this->get_prefix() . 'posts_settings', array(
				'title'      => esc_html__( 'Posts Settings', 'artwork-lite' ),
				'priority'   => 100,
				'capability' => 'edit_theme_options'
			)
		);
		/*
		 *  Add blog type.
		 */
		$wp_customize->add_setting( $this->get_prefix() . 'blog_style', array(
			'default'           => 'default',
			'sanitize_callback' => array( $this, 'sanitize_text' ),
		) );

		$wp_customize->add_control( $this->get_prefix() . 'blog_style', array(
			'label'   => __( 'Blog Layout', 'artwork-lite' ),
			'section' => $this->get_prefix() . 'posts_settings',
			'type'    => 'select',
			'choices' => $this->blog_list()
		) );
		/*
		 *  Add the 'Show meta' setting.
		 */
		$wp_customize->add_setting( $this->get_prefix() . 'show_meta', array(
			'default'           => '1',
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 * Add the upload control for the 'Show meta' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->get_prefix() . 'show_meta', array(
				'label'    => esc_html__( 'Show Meta', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'posts_settings',
				'settings' => $this->get_prefix() . 'show_meta',
				'type'     => 'checkbox',
			) )
		);
		/*
		 * Add the 'Show Categories' setting.
		 */
		$wp_customize->add_setting( $this->get_prefix() . 'show_categories', array(
			'default'           => '1',
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 * Add the upload control for the 'Show Categories'setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->get_prefix() . 'show_categories', array(
				'label'    => esc_html__( 'Show Categories', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'posts_settings',
				'settings' => $this->get_prefix() . 'show_categories',
				'type'     => 'checkbox',
			) )
		);
		/*
		 * Add the 'Show Tags' setting.
		 */
		$wp_customize->add_setting( $this->get_prefix() . 'show_tags', array(
			'default'           => '1',
			'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );
		/*
		 *  Add the upload control for the 'Show Tags' setting.
		 */
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, $this->get_prefix() . 'show_tags', array(
				'label'    => esc_html__( 'Show Tags', 'artwork-lite' ),
				'section'  => $this->get_prefix() . 'posts_settings',
				'settings' => $this->get_prefix() . 'show_tags',
				'type'     => 'checkbox',
			) )
		);


	}

	/**
	 * Sanitize text
	 *
	 * @since  1.0.1
	 * @access public
	 * @return sanitized output
	 */
	function sanitize_text( $txt ) {
		return wp_kses_post( force_balance_tags( $txt ) );
	}


	/**
	 * Sanitize checkbox
	 *
	 * @since  1.0.1
	 * @access public
	 * @return sanitized output
	 */
	function sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	/**
	 * Enqueue Javascript postMessage handlers for the Customizer.
	 *
	 * Binds JavaScript handlers to make the Customizer preview
	 * reload changes asynchronously.
	 *
	 * @since Artwork 1.0
	 */
	function customize_preview_js() {
		wp_enqueue_script( 'theme-customizer', get_template_directory_uri() . '/js/theme-customizer.min.js', array( 'customize-preview' ), $this->get_theme_vertion(), true );
	}

	/**
	 * Register color schemes for Artwork.
	 *
	 * Can be filtered with {@see $this->get_prefix().'color_schemes'}.
	 *
	 * The order of colors in a colors array:
	 * 1. Main Background Color.
	 * 2. Sidebar Background Color.
	 * 3. Box Background Color.
	 * 4. Main Text and Link Color.
	 * 5. Sidebar Text and Link Color.
	 * 6. Meta Box Background Color.
	 *
	 * @since Artwork 1.0
	 *
	 * @return array An associative array of color scheme options.
	 */
	function get_color_schemes() {
		return apply_filters( $this->get_prefix() . 'color_schemes', array(
			'default' => array(
				'label'  => __( 'Default', 'artwork-lite' ),
				'colors' => array(
					MP_ARTWORK_BRAND_COLOR,
					MP_ARTWORK_SECOND_BRAND_COLOR,
					MP_ARTWORK_THIRD_BRAND_COLOR,
					MP_ARTWORK_FOURTH_BRAND_COLOR,
					get_template_directory_uri() . '/images/headers/logo.png',
					get_template_directory_uri() . '/images/headers/logo2.png',
				),
			)
		) );
	}

	/**
	 * Get the current Artwork color scheme.
	 *
	 * @since Artwork 1.0
	 *
	 * @return array An associative array of either the current or default color scheme hex values.
	 */
	function get_color_scheme() {
		$color_scheme_option = esc_html( get_theme_mod( $this->get_prefix() . 'color_scheme', 'default' ) );
		$color_schemes       = $this->get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}

	/**
	 * Returns an array of color scheme choices registered for Artwork.
	 *
	 * @since Artwork 1.0
	 *
	 * @return array of color schemes.
	 */
	function get_color_scheme_choices() {
		$color_schemes                = $this->get_color_schemes();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}

	/**
	 * Returns an array of blog style registered for Profit.
	 *
	 * @since Artwork
	 *
	 * @return array of blog style.
	 */
	function blog_list() {
		$blog_list = array(
			'default'      => __( 'Full Width', 'artwork-lite' ),
			'with-sidebar' => __( 'With Sidebar', 'artwork-lite' )
		);

		return $blog_list;
	}

	/**
	 * Get theme vertion.
	 *
	 * @since Atrwork 1.1.2
	 * @access public
	 * @return string
	 */
	function get_theme_vertion() {
		$theme_info = wp_get_theme();

		return $theme_info->get( 'Version' );
	}
}
