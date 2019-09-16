<?php
/**
 * ayahandmade functions and definitions
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

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'AYAHANDMADE_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ayahandmade_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ayahandmade_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, AYAHANDMADE_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ayahandmade_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function ayahandmade_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ayahandmade' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ayahandmade' ),
				PHP_VERSION,
				AYAHANDMADE_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


if ( ! function_exists( 'ayahandmade_setup' ) ) :
	/**
	 * ayahandmade setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ayahandmade_setup() {

		// Add theme support for Custom Logo.
		$defaults = array(
				        'flex-height' => false,
				        'flex-width'  => false,
				        'header-text' => array( 'site-title',
				        						'site-description'
				        				),
	    				);
		
	    add_theme_support( 'custom-logo', $defaults );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Make theme available for translation.
		load_theme_textdomain( 'ayahandmade', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );

		// This theme styles the visual editor to resemble the theme style, specifically font, colors, and column width.
		add_editor_style( array( 'assets/css/editor-style.css', 
								 get_template_directory_uri() . '/assets/css/font-awesome.css',
								 ayahandmade_fonts_url()
						  ) );

		// Set Custom Background				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayahandmade' ),
			'footer'    => __( 'Footer Menu', 'ayahandmade' ),
		) );
	}
endif; // ayahandmade_setup
add_action( 'after_setup_theme', 'ayahandmade_setup' );

if ( ! function_exists( 'ayahandmade_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the ayahandmade theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function ayahandmade_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.css', array( ) );
		wp_enqueue_style( 'ayahandmade-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ayahandmade-fonts', ayahandmade_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/viewportchecker.js', array( 'jquery' ) );

		wp_enqueue_script( 'ayahandmade-utilities',
			get_template_directory_uri() . '/assets/js/ayahandmade.js',
			array( 'jquery',
				   'viewportchecker'
				 )
		);

		$data = array(
    		'ayahandmade_loading_effect' => ( get_theme_mod('ayahandmade_animations_display', 1) == 1 ),
    	);
    	wp_localize_script( 'ayahandmade-utilities', 'ayahandmade_options', $data);
	}
endif; // ayahandmade_load_scripts
add_action( 'wp_enqueue_scripts', 'ayahandmade_load_scripts' );

if ( ! function_exists( 'ayahandmade_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ayahandmade_show_copyright_text() {

		$footerText = get_theme_mod('ayahandmade_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayahandmade_show_copyright_text

if ( ! function_exists( 'ayahandmade_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayahandmade_header_style()
   */
  function ayahandmade_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayahandmade_header_style',
                      ) );
  }
endif; // ayahandmade_custom_header_setup
add_action( 'after_setup_theme', 'ayahandmade_custom_header_setup' );

if ( ! function_exists( 'ayahandmade_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayahandmade_custom_header_setup().
   */
  function ayahandmade_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayahandmade-custom-header-styles" type="text/css">

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
endif; // End of ayahandmade_header_style.

if ( ! function_exists( 'ayahandmade_fonts_url' ) ) :
	
	// Load google font url used in the ayahandmade theme
	function ayahandmade_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by PT Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Dosis font: on or off', 'ayahandmade' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Dosis';
	 
	        $query_args = array(
		            'family' => urlencode( implode( '|', $font_families ) ),
		            'subset' => urlencode( 'latin,latin-ext' ),
		        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayahandmade_fonts_url

if ( ! function_exists( 'ayahandmade_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayahandmade_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayahandmade'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayahandmade'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		// Add Homepage Columns Widget areas
		register_sidebar( array (
							'name'			 =>  __( 'Homepage Above Columns', 'ayahandmade' ),
							'id'			 =>  'homepage-top-widget-area',
							'description' 	 =>  __( 'A widget area above homepage columns', 'ayahandmade' ),
							'before_widget'	 =>  '<div>',
							'after_widget'	 =>  '</div>',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );

		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #1', 'ayahandmade' ),
								'id' 			 =>  'homepage-column-1-widget-area',
								'description'	 =>  __( 'The Homepage Column #1 widget area', 'ayahandmade' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );
							
		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #2', 'ayahandmade' ),
								'id' 			 =>  'homepage-column-2-widget-area',
								'description'	 =>  __( 'The Homepage Column #2 widget area', 'ayahandmade' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );

		register_sidebar( array (
								'name'			 =>  __( 'Homepage Column #3', 'ayahandmade' ),
								'id' 			 =>  'homepage-column-3-widget-area',
								'description'	 =>  __( 'The Homepage Column #3 widget area', 'ayahandmade' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="sidebar-title">',
								'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
							) );
	}
endif; // ayahandmade_widgets_init
add_action( 'widgets_init', 'ayahandmade_widgets_init' );

if ( class_exists('WP_Customize_Section') ) {
	class ayahandmade_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayahandmade';

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
		protected function render_template() {
?>

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
final class ayahandmade_Customize {

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
		$manager->register_section_type( 'ayahandmade_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayahandmade_Customize_Section_Pro(
				$manager,
				'ayahandmade',
				array(
					'title'    => esc_html__( 'AyaHandmadePro', 'ayahandmade' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayahandmade' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayahandmadepro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayahandmade-customize-controls', trailingslashit( get_template_directory_uri() ) . 'assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayahandmade-customize-controls', trailingslashit( get_template_directory_uri() ) . 'assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayahandmade_Customize::get_instance();

if ( ! function_exists( 'ayahandmade_sanitize_checkbox' ) ) :

	function ayahandmade_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif; // ayahandmade_sanitize_checkbox

if ( ! function_exists( 'ayahandmade_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayahandmade_customize_register( $wp_customize ) {

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayahandmade_footer_section',
			array(
				'title'       => __( 'Footer', 'ayahandmade' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayahandmade_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayahandmade_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayahandmade' ),
	            'section'        => 'ayahandmade_footer_section',
	            'settings'       => 'ayahandmade_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayahandmade_animations_display',
			array(
				'title'       => __( 'Animations', 'ayahandmade' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayahandmade_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'ayahandmade_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayahandmade_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayahandmade' ),
									'section'        => 'ayahandmade_animations_display',
									'settings'       => 'ayahandmade_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayahandmade_customize_register
add_action( 'customize_register', 'ayahandmade_customize_register' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ayahandmade_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ayahandmade_skip_link_focus_fix' );
