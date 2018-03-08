<?php
/**
 * AyaFreelance functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

if ( ! function_exists( 'ayafreelance_setup' ) ) :
	/**
	 * AyaFreelance setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ayafreelance_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on AyaFreelance, use a find and replace
		 * to change 'ayafreelance' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ayafreelance', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'ayafreelance-thumbnail-avatar', 100, 100, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ayafreelance_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayafreelance' ),
			'footer'    => __( 'Footer Menu', 'ayafreelance' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );
	}
endif; // ayafreelance_setup
add_action( 'after_setup_theme', 'ayafreelance_setup' );

if ( ! function_exists( 'ayafreelance_slider_images_exist' ) ) :
	/**
	 * Returns true if there is at least 2 recent posts with Feature Image set
	 */
	function ayafreelance_slider_images_exist() {

		$args = array( 'numberposts' => '5',
						'post_status'=>'publish',
					);

		$recent_posts = wp_get_recent_posts( $args );

		$postsWithFeatureImage = 0;

		for ( $i = 0; $i < sizeof($recent_posts); ++$i ) {

			$recent = $recent_posts[ $i ];

			if ( has_post_thumbnail( $recent['ID'] ) ) {

				++$postsWithFeatureImage;
			}
		}

		wp_reset_postdata();

		return ($postsWithFeatureImage >= 2);
	}
endif; // ayafreelance_slider_images_exist

if ( ! function_exists( 'ayafreelance_display_slider' ) ) :
	/**
	 * Displays Slider
	 */
	function ayafreelance_display_slider() { ?>
		 
		<div class="slider-wrapper">
		 <ul id="sb-slider" class="sb-slider">
			<?php
				// display slides
				$numberOfSlides = 0;
				for ( $i = 1; $i <= 3; ++$i ) {

					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';
					$slideImage = get_theme_mod( 'ayafreelance_slide'.$i.'_image', $defaultSlideImage );

					if ( $slideImage != '' ) :

						++$numberOfSlides;
			?>
						<li>
							<img src="<?php echo esc_url( $slideImage ); ?>" alt="<?php echo esc_attr( $i ); ?>" />
						</li>
			<?php
					endif;
				} ?>
		 </ul><!-- #sb-slider -->

		 <div id="shadow" class="shadow"></div>

		 <?php if ( $numberOfSlides > 1 ) : ?>

		 		<div id="nav-arrows" class="nav-arrows">
					<a href="#"><?php esc_html_e('Next', 'ayafreelance'); ?></a>
					<a href="#"><?php esc_html_e('Previous', 'ayafreelance'); ?></a>
				</div>

		 <?php endif; ?>

		 <div id="nav-dots" class="nav-dots">
			 <?php for ($i = 0; $i < $numberOfSlides; ++$i) { ?>
			 			<?php if ( $i == 0 ) { ?>

			 					<span class="nav-dot-current"></span>

			 			<?php } else { ?>

			 					<span></span>

			 			<?php } ?>
			 <?php } ?>
		 </div>
		</div><!-- .slider-wrapper -->
	<?php  


	}
endif; // ayafreelance_display_slider

if ( ! function_exists( 'ayafreelance_fonts_url' ) ) :
	/**
	 *	Load google font url used in the AyaFreelance theme
	 */
	function ayafreelance_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Hind, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Hind font: on or off', 'ayafreelance' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Hind';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayafreelance_fonts_url

if ( ! function_exists( 'ayafreelance_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the AyaFreelance theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function ayafreelance_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
		wp_enqueue_style( 'ayafreelance-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ayafreelance-fonts', ayafreelance_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'viewportchecker',
			get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'ayafreelance-utilities',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

		wp_enqueue_script( 'modernizr.custom.46884',
			get_template_directory_uri() . '/js/modernizr.custom.46884.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'jquery.slicebox',
			get_template_directory_uri() . '/js/jquery.slicebox.js',
			array( 'jquery' ) );

		$data = array(
    		'loading_effect' => ( get_theme_mod('ayafreelance_animations_display', 1) == 1 ),
    	);
    	wp_localize_script('ayafreelance-utilities', 'ayafreelance_options', $data);
	}
endif; // ayafreelance_load_scripts
add_action( 'wp_enqueue_scripts', 'ayafreelance_load_scripts' );

if ( ! function_exists( 'ayafreelance_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayafreelance_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayafreelance'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayafreelance'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'ayafreelance' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'ayafreelance' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'ayafreelance' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'ayafreelance' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'ayafreelance' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'ayafreelance' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // ayafreelance_widgets_init
add_action( 'widgets_init', 'ayafreelance_widgets_init' );

if ( ! function_exists( 'ayafreelance_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ayafreelance_show_copyright_text() {

		$footerText = get_theme_mod('ayafreelance_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayafreelance_show_copyright_text

if ( ! function_exists( 'ayafreelance_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayafreelance_header_style()
   */
  function ayafreelance_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayafreelance_header_style',
                      ) );
  }
endif; // ayafreelance_custom_header_setup
add_action( 'after_setup_theme', 'ayafreelance_custom_header_setup' );

if ( ! function_exists( 'ayafreelance_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayafreelance_custom_header_setup().
   */
  function ayafreelance_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayafreelance-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo esc_attr( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of ayafreelance_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class ayafreelance_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayafreelance';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class ayafreelance_Customize {

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
		$manager->register_section_type( 'ayafreelance_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayafreelance_Customize_Section_Pro(
				$manager,
				'ayafreelance',
				array(
					'title'    => esc_html__( 'AyaFreelancePro', 'ayafreelance' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayafreelance' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayafreelancepro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayafreelance-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayafreelance-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayafreelance_Customize::get_instance();

if ( ! function_exists( 'ayafreelance_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayafreelance_customize_register( $wp_customize ) {

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'ayafreelance_slider_section',
			array(
				'title'       => __( 'Slider', 'ayafreelance' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add display slider option
		$wp_customize->add_setting(
				'ayafreelance_slider_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'esc_attr',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayafreelance_slider_display',
								array(
									'label'          => __( 'Display Slider', 'ayafreelance' ),
									'section'        => 'ayafreelance_slider_section',
									'settings'       => 'ayafreelance_slider_display',
									'type'           => 'checkbox',
								)
							)
		);
		
		// Add slide 1 background image
		$wp_customize->add_setting( 'ayafreelance_slide1_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '1.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayafreelance_slide1_image',
				array(
					'label'   	 => __( 'Slide 1 Image', 'ayafreelance' ),
					'section' 	 => 'ayafreelance_slider_section',
					'settings'   => 'ayafreelance_slide1_image',
				) 
			)
		);
		
		// Add slide 2 background image
		$wp_customize->add_setting( 'ayafreelance_slide2_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '2.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayafreelance_slide2_image',
				array(
					'label'   	 => __( 'Slide 2 Image', 'ayafreelance' ),
					'section' 	 => 'ayafreelance_slider_section',
					'settings'   => 'ayafreelance_slide2_image',
				) 
			)
		);
		
		// Add slide 3 background image
		$wp_customize->add_setting( 'ayafreelance_slide3_image',
			array(
				'default' => get_template_directory_uri().'/images/slider/' . '3.jpg',
	    		'sanitize_callback' => 'esc_url_raw'
			)
		);

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ayafreelance_slide3_image',
				array(
					'label'   	 => __( 'Slide 3 Image', 'ayafreelance' ),
					'section' 	 => 'ayafreelance_slider_section',
					'settings'   => 'ayafreelance_slide3_image',
				) 
			)
		);

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayafreelance_footer_section',
			array(
				'title'       => __( 'Footer', 'ayafreelance' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayafreelance_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayafreelance_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayafreelance' ),
	            'section'        => 'ayafreelance_footer_section',
	            'settings'       => 'ayafreelance_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayafreelance_animations_display',
			array(
				'title'       => __( 'Animations', 'ayafreelance' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayafreelance_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'esc_attr',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayafreelance_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayafreelance' ),
									'section'        => 'ayafreelance_animations_display',
									'settings'       => 'ayafreelance_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayafreelance_customize_register
add_action( 'customize_register', 'ayafreelance_customize_register' );

if ( ! function_exists( 'ayafreelance_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function ayafreelance_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // ayafreelance_sanitize_checkbox

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';
