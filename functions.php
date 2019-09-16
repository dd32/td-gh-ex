<?php
/**
 * ayaairport functions and definitions
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'AYAAIRPORT_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ayaairport_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ayaairport_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, AYAAIRPORT_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ayaairport_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function ayaairport_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ayaairport' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ayaairport' ),
				PHP_VERSION,
				AYAAIRPORT_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


if ( ! function_exists( 'ayaairport_widgets_init' ) ) :
	function ayaairport_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
			'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayaairport'),
			'id'		 	 =>	 'sidebar-widget-area',
			'description'	 =>  __( 'The sidebar widget area', 'ayaairport'),
			'before_widget'	 =>  '',
			'after_widget'	 =>  '',
			'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
			'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
		) );

		register_sidebar( array (
			'name'			 =>  __( 'Homepage', 'ayaairport' ),
			'id'			 =>  'homepage-top-widget-area',
			'description' 	 =>  __( 'A widget area above homepage columns', 'ayaairport' ),
			'before_widget'	 =>  '<div>',
			'after_widget'	 =>  '</div>',
			'before_title'	 =>  '<h2 class="sidebar-title">',
			'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
		) );

		register_sidebar( array (
			'name'			 =>  __( 'Footer Column #1', 'ayaairport' ),
			'id' 			 =>  'footer-column-1-widget-area',
			'description'	 =>  __( 'The Footer Column #1 widget area', 'ayaairport' ),
			'before_widget'  =>  '',
			'after_widget'	 =>  '',
			'before_title'	 =>  '<h2 class="footer-title">',
			'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
		) );
		
		register_sidebar( array (
			'name'			 =>  __( 'Footer Column #2', 'ayaairport' ),
			'id' 			 =>  'footer-column-2-widget-area',
			'description'	 =>  __( 'The Footer Column #2 widget area', 'ayaairport' ),
			'before_widget'  =>  '',
			'after_widget'	 =>  '',
			'before_title'	 =>  '<h2 class="footer-title">',
			'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
		) );
		
		register_sidebar( array (
			'name'			 =>  __( 'Footer Column #3', 'ayaairport' ),
			'id' 			 =>  'footer-column-3-widget-area',
			'description'	 =>  __( 'The Footer Column #3 widget area', 'ayaairport' ),
			'before_widget'  =>  '',
			'after_widget'	 =>  '',
			'before_title'	 =>  '<h2 class="footer-title">',
			'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
		) );
	}
endif; // ayaairport_widgets_init
add_action( 'widgets_init', 'ayaairport_widgets_init' );

if ( ! function_exists( 'ayaairport_setup' ) ) :
	/**
	 * ayaairport setup.
	 */
	function ayaairport_setup() {
 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayaairport' ),
			'footer'    => __( 'Footer Menu', 'ayaairport' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );

		add_theme_support( 'title-tag' );

		load_theme_textdomain( 'ayaairport', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );


		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );

		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ayaairport_fonts_url()
						  ) );
	}
endif; // ayaairport_setup
add_action( 'after_setup_theme', 'ayaairport_setup' );

if ( ! function_exists( 'ayaairport_fonts_url' ) ) :
	function ayaairport_fonts_url() {

	    $fonts_url = '';
	 
	    $questrial = _x( 'on', 'PT Sans font: on or off', 'ayaairport' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'PT Sans';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayaairport_fonts_url

if ( ! function_exists( 'ayaairport_load_scripts' ) ) :
	function ayaairport_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
		wp_enqueue_style( 'ayaairport-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'ayaairport-fonts', ayaairport_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );

		wp_enqueue_script( 'ayaairport-utilities',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

		$data = array(
    		'ayaairport_loading_effect' => ( get_theme_mod('ayaairport_animations_display', 1) == 1 ),
    	);
    	wp_localize_script('ayaairport-utilities', 'ayaairport_options', $data);
	}
endif; // ayaairport_load_scripts
add_action( 'wp_enqueue_scripts', 'ayaairport_load_scripts' );

if ( ! function_exists( 'ayaairport_show_copyright_text' ) ) :
	function ayaairport_show_copyright_text() {

		$footerText = get_theme_mod('ayaairport_footer_copyright', null);
		if ( !empty( $footerText ) ) {
			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayaairport_show_copyright_text

if ( ! function_exists( 'ayaairport_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayaairport_custom_header_setup().
   */
  function ayaairport_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayaairport-custom-header-styles" type="text/css">

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
endif; // End of ayaairport_header_style.

if ( ! function_exists( 'ayaairport_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayaairport_header_style()
   */
  function ayaairport_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayaairport_header_style',
                      ) );
  }
endif; // ayaairport_custom_header_setup
add_action( 'after_setup_theme', 'ayaairport_custom_header_setup' );

if ( class_exists('WP_Customize_Section') ) {
	class ayaairport_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayaairport';

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
final class ayaairport_Customize {

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
		$manager->register_section_type( 'ayaairport_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayaairport_Customize_Section_Pro(
				$manager,
				'ayaairport',
				array(
					'title'    => esc_html__( 'AyaAirPortPro', 'ayaairport' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayaairport' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayaairportpro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayaairport-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayaairport-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayaairport_Customize::get_instance();

if ( ! function_exists( 'ayaairport_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayaairport_customize_register( $wp_customize ) {

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayaairport_footer_section',
			array(
				'title'       => __( 'Footer', 'ayaairport' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayaairport_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaairport_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayaairport' ),
	            'section'        => 'ayaairport_footer_section',
	            'settings'       => 'ayaairport_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayaairport_animations_display',
			array(
				'title'       => __( 'Animations', 'ayaairport' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayaairport_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'ayaairport_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayaairport_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayaairport' ),
									'section'        => 'ayaairport_animations_display',
									'settings'       => 'ayaairport_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayaairport_customize_register
add_action( 'customize_register', 'ayaairport_customize_register' );


if ( ! function_exists( 'ayaairport_sanitize_checkbox' ) ) :

	function ayaairport_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif; // ayaairport_sanitize_checkbox

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ayaairport_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ayaairport_skip_link_focus_fix' );
