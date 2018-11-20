<?php
/**
 * Function describe for AyaHairSalon
 * 
 * @package ayahairsalon
 */

if ( ! function_exists( 'ayahairsalon_load_css_and_scripts' ) ) :

	function ayahairsalon_load_css_and_scripts() {

		wp_enqueue_style( 'allingrid-stylesheet',
			get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'ayahairsalon-child-style',
			get_stylesheet_uri(), array( 'ayahairsalon-stylesheet' ) );

		wp_enqueue_style( 'ayahairsalon-fonts',
			ayahairsalon_fonts_url(), array(), null );
	}
endif; // ayahairsalon_load_css_and_scripts

add_action( 'wp_enqueue_scripts', 'ayahairsalon_load_css_and_scripts' );

if ( ! function_exists( 'ayahairsalon_fonts_url' ) ) :
	/**
	 *	Load google font url used in the ayahairsalon theme
	 */
	function ayahairsalon_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Arimo, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Arimo font: on or off', 'ayahairsalon' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Arimo';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayahairsalon_fonts_url

if ( ! class_exists( 'ayahairsalon_Customize' ) ) :
	/**
	 * Singleton class for handling the theme's customizer integration.
	 */
	final class ayahairsalon_Customize {

		// Returns the instance.
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		// Constructor method.
		private function __construct() {}

		// Sets up initial actions.
		private function setup_actions() {

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'sections' ) );

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		}

		// Sets up the customizer sections.
		public function sections( $manager ) {

			// Load custom sections.

			// Register custom section types.
			$manager->register_section_type( 'ayaclub_Customize_Section_Pro' );

			// Register sections.
			$manager->add_section(
				new ayaclub_Customize_Section_Pro(
					$manager,
					'ayahairsalon',
					array(
						'title'    => esc_html__( 'AyaHairSalonPro', 'ayahairsalon' ),
						'pro_text' => esc_html__( 'Upgrade', 'ayahairsalon' ),
						'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayahairsalonpro' )
					)
				)
			);
		}

		// Loads theme customizer CSS.
		public function enqueue_control_scripts() {

			wp_enqueue_script( 'ayaclub-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

			wp_enqueue_style( 'ayaclub-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
		}
	}
endif; // ayahairsalon_Customize

// Doing this customizer thang!
ayahairsalon_Customize::get_instance();

/**
 * Remove Parent theme Customize Up-Selling Section
 */
if ( ! function_exists( 'ayahairsalon_remove_parent_theme_upsell_section' ) ) :

	function ayahairsalon_remove_parent_theme_upsell_section( $wp_customize ) {

		// Remove Parent-Theme Upsell section
		$wp_customize->remove_section('ayaclub');
	}
endif; // ayahairsalon_remove_parent_theme_upsell_section

add_action( 'customize_register', 'ayahairsalon_remove_parent_theme_upsell_section', 100 );


if ( ! function_exists( 'ayahairsalon_show_social_sites' ) ) :

	function ayahairsalon_show_social_sites() {

		$socialURL = get_theme_mod('ayahairsalon_social_facebook');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Facebook', 'ayahairsalon') ) . '" class="facebook16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_google');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Google+', 'ayahairsalon') ) . '" class="google16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_twitter');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Twitter', 'ayahairsalon') ) . '" class="twitter16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_linkedin');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on LinkedIn', 'ayahairsalon') ) . '" class="linkedin16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_instagram');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Instagram', 'ayahairsalon') ) . '" class="instagram16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_rss');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow our RSS Feeds', 'ayahairsalon') ) . '" class="rss16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_tumblr');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Tumblr', 'ayahairsalon') ) . '" class="tumblr16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_youtube');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Youtube', 'ayahairsalon') ) . '" class="youtube16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_pinterest');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Pinterest', 'ayahairsalon') ) . '" class="pinterest16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_vk');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on VK', 'ayahairsalon') ) . '" class="vk16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_flickr');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Flickr', 'ayahairsalon') ) . '" class="flickr16"></a>';
		}

		$socialURL = get_theme_mod('ayahairsalon_social_vine');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( __('Follow us on Vine', 'ayahairsalon') ) . '" class="vine16"></a>';
		}
	}
endif; // ayahairsalon_show_social_sites

if ( ! function_exists( 'ayahairsalon_customize_register' ) ) :

	/**
	 * Register theme settings in the customizer
	 */
	function ayahairsalon_customize_register( $wp_customize ) {

		/**
		 * Add Social Sites Section
		 */
		$wp_customize->add_section(
			'ayahairsalon_social_section',
			array(
				'title'       => __( 'Social Sites', 'ayahairsalon' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add facebook url
		$wp_customize->add_setting(
			'ayahairsalon_social_facebook',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_facebook',
	        array(
	            'label'          => __( 'Facebook Page URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_facebook',
	            'type'           => 'text',
	            )
	        )
		);

		// Add google+ url
		$wp_customize->add_setting(
			'ayahairsalon_social_google',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_google',
	        array(
	            'label'          => __( 'Google+ Page URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_google',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Twitter url
		$wp_customize->add_setting(
			'ayahairsalon_social_twitter',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_twitter',
	        array(
	            'label'          => __( 'Twitter URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_twitter',
	            'type'           => 'text',
	            )
	        )
		);

		// Add LinkedIn url
		$wp_customize->add_setting(
			'ayahairsalon_social_linkedin',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_linkedin',
	        array(
	            'label'          => __( 'LinkedIn URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_linkedin',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Instagram url
		$wp_customize->add_setting(
			'ayahairsalon_social_instagram',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_instagram',
	        array(
	            'label'          => __( 'LinkedIn URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_instagram',
	            'type'           => 'text',
	            )
	        )
		);

		// Add RSS Feeds url
		$wp_customize->add_setting(
			'ayahairsalon_social_rss',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_rss',
	        array(
	            'label'          => __( 'RSS Feeds URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_rss',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Tumblr url
		$wp_customize->add_setting(
			'ayahairsalon_social_tumblr',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_tumblr',
	        array(
	            'label'          => __( 'Tumblr URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_tumblr',
	            'type'           => 'text',
	            )
	        )
		);

		// Add YouTube channel url
		$wp_customize->add_setting(
			'ayahairsalon_social_youtube',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_youtube',
	        array(
	            'label'          => __( 'YouTube channel URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_youtube',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Pinterest url
		$wp_customize->add_setting(
			'ayahairsalon_social_pinterest',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_pinterest',
	        array(
	            'label'          => __( 'Pinterest URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_pinterest',
	            'type'           => 'text',
	            )
	        )
		);

		// Add VK url
		$wp_customize->add_setting(
			'ayahairsalon_social_vk',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_vk',
	        array(
	            'label'          => __( 'VK URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_vk',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Flickr url
		$wp_customize->add_setting(
			'ayahairsalon_social_flickr',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_flickr',
	        array(
	            'label'          => __( 'Flickr URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_flickr',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Vine url
		$wp_customize->add_setting(
			'ayahairsalon_social_vine',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahairsalon_social_vine',
	        array(
	            'label'          => __( 'Vine URL', 'ayahairsalon' ),
	            'section'        => 'ayahairsalon_social_section',
	            'settings'       => 'ayahairsalon_social_vine',
	            'type'           => 'text',
	            )
	        )
		);
	}
endif; // ayahairsalon_customize_register

add_action('customize_register', 'ayahairsalon_customize_register');

if ( ! function_exists( 'ayaclub_widgets_init' ) ) :

	function ayahairsalon_disable_parent_widgets_init() {
		remove_action( 'widgets_init', 'ayaclub_widgets_init', 10); 
	}
endif;
add_action('init', 'ayahairsalon_disable_parent_widgets_init');

if ( ! function_exists( 'ayaclub_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayaclub_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayahairsalon'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayahairsalon'),
							'before_widget'	 =>  '<div class="badge-wrapper">',
							'after_widget'	 =>  '</div>',
							'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
						) );

		/**
		 * Add Homepage Columns Widget areas
		 */
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #1', 'ayahairsalon' ),
								'id' 			 =>  'homepage-column-1-widget-area',
								'description'	 =>  __( 'The Homepage Column #1 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );
							
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #2', 'ayahairsalon' ),
								'id' 			 =>  'homepage-column-2-widget-area',
								'description'	 =>  __( 'The Homepage Column #2 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );

		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #3', 'ayahairsalon' ),
								'id' 			 =>  'homepage-column-3-widget-area',
								'description'	 =>  __( 'The Homepage Column #3 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'ayahairsalon' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'ayahairsalon' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'ayahairsalon' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'ayahairsalon' ),
								'before_widget'	 =>  '<div class="badge-wrapper">',
								'after_widget'	 =>  '</div>',
								'before_title'	 =>  '<div class="badge"><h3 class="sidebar-title">',
								'after_title'	 =>  '</h3></div><div class="badge-spacer"></div>',
							) );
	}
endif; // ayaclub_widgets_init
add_action( 'widgets_init', 'ayaclub_widgets_init' );
