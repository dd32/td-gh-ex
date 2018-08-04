<?php
/**
 * fmuzz functions and definitions
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

if ( ! function_exists( 'fmuzz_setup' ) ) :
	/**
	 * fmuzz setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function fmuzz_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on fmuzz, use a find and replace
		 * to change 'fmuzz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fmuzz', get_template_directory() . '/languages' );

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

		add_image_size( 'fmuzz-thumbnail-avatar', 100, 100, true );

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
								 fmuzz_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'fmuzz' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );
	}
endif; // fmuzz_setup
add_action( 'after_setup_theme', 'fmuzz_setup' );

if ( ! function_exists( 'fmuzz_fonts_url' ) ) :
	/**
	 *	Load google font url used in the fmuzz theme
	 */
	function fmuzz_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Arimo, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Arimo font: on or off', 'fmuzz' );

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
endif; // fmuzz_fonts_url

if ( ! function_exists( 'fmuzz_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the fmuzz theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function fmuzz_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'fmuzz-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'fmuzz-fonts', fmuzz_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'fmuzz-utilities',
			get_template_directory_uri() . '/js/utilities.js', array( 'jquery', ) );

		wp_enqueue_script( 'jquery.mobile.customized',
			get_template_directory_uri() . '/js/jquery.mobile.customized.min.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'jquery.easing.1.3',
			get_template_directory_uri() . '/js/jquery.easing.1.3.js',
			array( 'jquery' ) );

		wp_enqueue_script( 'camera',
			get_template_directory_uri() . '/js/camera.min.js',
			array( 'jquery' ) );
	}
endif; // fmuzz_load_scripts
add_action( 'wp_enqueue_scripts', 'fmuzz_load_scripts' );

if ( ! function_exists( 'fmuzz_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function fmuzz_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'fmuzz'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'fmuzz'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		/**
		 * Add Homepage Columns Widget areas
		 */
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #1', 'fmuzz' ),
								'id' 			 =>  'homepage-column-1-widget-area',
								'description'	 =>  __( 'The Homepage Column #1 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );
							
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #2', 'fmuzz' ),
								'id' 			 =>  'homepage-column-2-widget-area',
								'description'	 =>  __( 'The Homepage Column #2 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #3', 'fmuzz' ),
								'id' 			 =>  'homepage-column-3-widget-area',
								'description'	 =>  __( 'The Homepage Column #3 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'fmuzz' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'fmuzz' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'fmuzz' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'fmuzz' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // fmuzz_widgets_init
add_action( 'widgets_init', 'fmuzz_widgets_init' );

if ( ! function_exists( 'fmuzz_display_slider' ) ) :
	/**
	 * Displays the slider
	 */
	function fmuzz_display_slider() {
	?>
		<div class="camera_wrap camera_emboss" id="camera_wrap">
			<?php
				// display slides
				for ( $i = 1; $i <= 3; ++$i ) {
						
						$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

						$slideContent = get_theme_mod( 'fmuzz_slide'.$i.'_content', html_entity_decode( $defaultSlideContent ) );
						$slideImage = get_theme_mod( 'fmuzz_slide'.$i.'_image', $defaultSlideImage );
					?>
						<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
							<?php if ($slideContent) : ?>
									<div class="camera_caption fadeFromBottom">
										<?php echo $slideContent; ?>
									</div>
							<?php endif; ?>
						</div>
	<?php		} ?>
		</div><!-- #camera_wrap -->
	<?php 
	}
endif; // fmuzz_display_slider

if ( ! function_exists( 'fmuzz_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function fmuzz_show_copyright_text() {

		$footerText = get_theme_mod('fmuzz_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // fmuzz_show_copyright_text


if ( ! function_exists( 'fmuzz_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses fmuzz_header_style()
   */
  function fmuzz_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'fmuzz_header_style',
                      ) );
  }
endif; // fmuzz_custom_header_setup
add_action( 'after_setup_theme', 'fmuzz_custom_header_setup' );


if ( ! function_exists( 'fmuzz_show_social_sites' ) ) :

	function fmuzz_show_social_sites() {

		$socialURL = get_theme_mod('fmuzz_social_facebook');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'fmuzz') . '" class="facebook16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_google');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Google+', 'fmuzz') . '" class="google16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_twitter');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'fmuzz') . '" class="twitter16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_linkedin');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkedIn', 'fmuzz') . '" class="linkedin16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_instagram');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'fmuzz') . '" class="instagram16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_rss');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'fmuzz') . '" class="rss16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_tumblr');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Tumblr', 'fmuzz') . '" class="tumblr16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_youtube');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'fmuzz') . '" class="youtube16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_pinterest');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Pinterest', 'fmuzz') . '" class="pinterest16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_vk');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on VK', 'fmuzz') . '" class="vk16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_flickr');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Flickr', 'fmuzz') . '" class="flickr16"></a>';
		}

		$socialURL = get_theme_mod('fmuzz_social_vine');
		if ( !empty($socialURL) ) {

			echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Vine', 'fmuzz') . '" class="vine16"></a>';
		}
	}

endif; // fmuzz_show_social_sites

if ( ! function_exists( 'fmuzz_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see fmuzz_custom_header_setup().
   */
  function fmuzz_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="fmuzz-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of fmuzz_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class fmuzz_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'fmuzz';

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
final class fmuzz_Customize {

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
		$manager->register_section_type( 'fmuzz_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new fmuzz_Customize_Section_Pro(
				$manager,
				'fmuzz',
				array(
					'title'    => esc_html__( 'tMuzz', 'fmuzz' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'fmuzz' ),
					'pro_url'  => esc_url( 'https://tishonator.com/product/tmuzz' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fmuzz-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fmuzz-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

if ( ! function_exists( 'fmuzz_sanitize_checkbox' ) ) :

	function fmuzz_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

// Doing this customizer thang!
fmuzz_Customize::get_instance();

if ( ! function_exists( 'fmuzz_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function fmuzz_customize_register( $wp_customize ) {

		/**
		 * Add Social Sites Section
		 */
		$wp_customize->add_section(
			'fmuzz_social_section',
			array(
				'title'       => __( 'Social Sites', 'fmuzz' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add facebook url
		$wp_customize->add_setting(
			'fmuzz_social_facebook',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_facebook',
	        array(
	            'label'          => __( 'Facebook Page URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_facebook',
	            'type'           => 'text',
	            )
	        )
		);

		// Add google+ url
		$wp_customize->add_setting(
			'fmuzz_social_google',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_google',
	        array(
	            'label'          => __( 'Google+ Page URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_google',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Twitter url
		$wp_customize->add_setting(
			'fmuzz_social_twitter',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_twitter',
	        array(
	            'label'          => __( 'Twitter URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_twitter',
	            'type'           => 'text',
	            )
	        )
		);

		// Add LinkedIn url
		$wp_customize->add_setting(
			'fmuzz_social_linkedin',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_linkedin',
	        array(
	            'label'          => __( 'LinkedIn URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_linkedin',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Instagram url
		$wp_customize->add_setting(
			'fmuzz_social_instagram',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_instagram',
	        array(
	            'label'          => __( 'LinkedIn URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_instagram',
	            'type'           => 'text',
	            )
	        )
		);

		// Add RSS Feeds url
		$wp_customize->add_setting(
			'fmuzz_social_rss',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_rss',
	        array(
	            'label'          => __( 'RSS Feeds URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_rss',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Tumblr url
		$wp_customize->add_setting(
			'fmuzz_social_tumblr',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_tumblr',
	        array(
	            'label'          => __( 'Tumblr URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_tumblr',
	            'type'           => 'text',
	            )
	        )
		);

		// Add YouTube channel url
		$wp_customize->add_setting(
			'fmuzz_social_youtube',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_youtube',
	        array(
	            'label'          => __( 'YouTube channel URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_youtube',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Pinterest url
		$wp_customize->add_setting(
			'fmuzz_social_pinterest',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_pinterest',
	        array(
	            'label'          => __( 'Pinterest URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_pinterest',
	            'type'           => 'text',
	            )
	        )
		);

		// Add VK url
		$wp_customize->add_setting(
			'fmuzz_social_vk',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_vk',
	        array(
	            'label'          => __( 'VK URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_vk',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Flickr url
		$wp_customize->add_setting(
			'fmuzz_social_flickr',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_flickr',
	        array(
	            'label'          => __( 'Flickr URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_flickr',
	            'type'           => 'text',
	            )
	        )
		);

		// Add Vine url
		$wp_customize->add_setting(
			'fmuzz_social_vine',
			array(
			    'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_social_vine',
	        array(
	            'label'          => __( 'Vine URL', 'fmuzz' ),
	            'section'        => 'fmuzz_social_section',
	            'settings'       => 'fmuzz_social_vine',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'fmuzz_slider_section',
			array(
				'title'       => __( 'Slider', 'fmuzz' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display slider option
		$wp_customize->add_setting(
				'fmuzz_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'fmuzz_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_slider_display',
								array(
									'label'          => __( 'Display Slider', 'fmuzz' ),
									'section'        => 'fmuzz_slider_section',
									'settings'       => 'fmuzz_slider_display',
									'type'           => 'checkbox',
								)
							)
		);
		
		for ($i = 1; $i <= 3; ++$i) {
		
			$slideContentId = 'fmuzz_slide'.$i.'_content';
			$slideImageId = 'fmuzz_slide'.$i.'_image';
			$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
		
			// Add Slide Content
			$wp_customize->add_setting(
				$slideContentId,
				array(
					'sanitize_callback' => 'force_balance_tags',
				)
			);
			
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
										array(
											'label'          => sprintf( esc_html__( 'Slide #%s Content', 'fmuzz' ), $i ),
											'section'        => 'fmuzz_slider_section',
											'settings'       => $slideContentId,
											'type'           => 'textarea',
											)
										)
			);
			
			// Add Slide Background Image
			$wp_customize->add_setting( $slideImageId,
				array(
					'default' => $defaultSliderImagePath,
					'sanitize_callback' => 'esc_url_raw'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
					array(
						'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'fmuzz' ), $i ),
						'section' 	 => 'fmuzz_slider_section',
						'settings'   => $slideImageId,
					) 
				)
			);
		}

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'fmuzz_footer_section',
			array(
				'title'       => __( 'Footer', 'fmuzz' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'fmuzz_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fmuzz_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'fmuzz' ),
	            'section'        => 'fmuzz_footer_section',
	            'settings'       => 'fmuzz_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);
	}
endif; // fmuzz_customize_register
add_action( 'customize_register', 'fmuzz_customize_register' );
