<?php
/**
 * functions and definitions
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'AYAWILD_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ayawild_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ayawild_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, AYAWILD_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ayawild_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function ayawild_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ayawild' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ayawild' ),
				PHP_VERSION,
				AYAWILD_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


if ( ! function_exists( 'ayawild_setup' ) ) :

	function ayawild_setup() {

		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

	

		add_theme_support( 'automatic-feed-links' );

		load_theme_textdomain( 'ayawild', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
		add_theme_support( 'custom-logo', $defaults );

		add_theme_support( 'title-tag' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'editor-styles' );

		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 ayawild_fonts_url()
						  ) );

		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption',	) );

		$GLOBALS['content_width'] = 900;

		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ayawild' ),
			'footer'    => __( 'Footer Menu', 'ayawild' ),
		) );
	}
endif; // ayawild_setup
add_action( 'after_setup_theme', 'ayawild_setup' );

if ( ! function_exists( 'ayawild_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function ayawild_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'ayawild'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'ayawild'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'ayawild' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'ayawild' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'ayawild' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'ayawild' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'ayawild' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'ayawild' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // ayawild_widgets_init
add_action( 'widgets_init', 'ayawild_widgets_init' );

if ( ! function_exists( 'ayawild_load_scripts' ) ) :
	function ayawild_load_scripts() {

		wp_enqueue_style( 'ayawild-fonts', ayawild_fonts_url(), array(), null );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'ayawild-style', get_stylesheet_uri(), array() );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'slippry', get_template_directory_uri() . '/js/slippry.min.js',
			array( 'jquery' ) );
		
		// Load Utilities JS Script
		wp_enqueue_script( 'ayawild-utilities',
			get_template_directory_uri() . '/js/utilities.js', array( 'jquery', 'slippry' ) );
	}
endif; // ayawild_load_scripts

add_action( 'wp_enqueue_scripts', 'ayawild_load_scripts' );

if ( ! function_exists( 'ayawild_fonts_url' ) ) :
	/**
	 *	Load google font url used in the ayawild theme
	 */
	function ayawild_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by PT Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'PT Sans font: on or off', 'ayawild' );

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
endif; // ayawild_fonts_url

if ( ! function_exists( 'ayawild_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function ayawild_show_copyright_text() {

		$footerText = get_theme_mod('ayawild_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // ayawild_show_copyright_text

if ( ! function_exists( 'ayawild_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses ayawild_header_style()
   */
  function ayawild_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'ayawild_header_style',
                      ) );
  }
endif; // ayawild_custom_header_setup
add_action( 'after_setup_theme', 'ayawild_custom_header_setup' );

if ( ! function_exists( 'ayawild_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see ayawild_custom_header_setup().
   */
  function ayawild_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="ayawild-custom-header-styles" type="text/css">

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
endif; // End of ayawild_header_style.


if ( ! function_exists( 'ayawild_display_slider' ) ) :
	/**
	 * Displays the slider
	 */
	function ayawild_display_slider() {
	?>
		<div id="slider-wrapper">
			<ul id="slider">
				<?php
					// display slides
					for ( $i = 1; $i <= 3; ++$i ) {

							$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

							$slideContent = get_theme_mod( 'ayawild_slide'.$i.'_content' );
							$slideImage = get_theme_mod( 'ayawild_slide'.$i.'_image', $defaultSlideImage );
						?>
							
						<?php if ( $slideImage ) : ?>
								<li>
									<a href="#slide<?php echo esc_attr($i); ?>">
									<img src="<?php echo esc_attr($slideImage); ?>" width="100%" alt="<?php echo str_replace('"', "'", $slideContent); ?>" class="slider-img" />
									</a>
								</li>
						<?php endif; ?>
		<?php		} ?>
			</ul>
		</div><!-- #slider-wrapper -->
	<?php 
	}
endif; // End of ayawild_display_slider.

if ( class_exists('WP_Customize_Section') ) {
	class ayawild_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'ayawild';

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
final class ayawild_Customize {

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
		$manager->register_section_type( 'ayawild_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ayawild_Customize_Section_Pro(
				$manager,
				'ayawild',
				array(
					'title'    => esc_html__( 'AyaWildPro', 'ayawild' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'ayawild' ),
					'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayawildpro' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ayawild-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ayawild-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ayawild_Customize::get_instance();

if ( ! function_exists( 'ayawild_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function ayawild_customize_register( $wp_customize ) {

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section(
			'ayawild_slider_section',
			array(
				'title'       => __( 'Slider', 'ayawild' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display slider option
		$wp_customize->add_setting(
				'ayawild_slider_display',
				array(
						'default'           => 0,
						'sanitize_callback' => 'ayawild_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayawild_slider_display',
								array(
									'label'          => __( 'Display Slider on a Static Front Page', 'ayawild' ),
									'section'        => 'ayawild_slider_section',
									'settings'       => 'ayawild_slider_display',
									'type'           => 'checkbox',
								)
							)
		);
		
		for ($i = 1; $i <= 3; ++$i) {
		
			$slideContentId = 'ayawild_slide'.$i.'_content';
			$slideImageId = 'ayawild_slide'.$i.'_image';
			$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
		
			// Add Slide Content
			$wp_customize->add_setting(
				$slideContentId,
				array(
					'sanitize_callback' => 'ayawild_sanitize_html',
				)
			);
			
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
										array(
											'label'          => sprintf( esc_html__( 'Slide #%s Content', 'ayawild' ), $i ),
											'section'        => 'ayawild_slider_section',
											'settings'       => $slideContentId,
											'type'           => 'textarea',
											)
										)
			);
			
			// Add Slide Background Image
			$wp_customize->add_setting( $slideImageId,
				array(
					'default' => $defaultSliderImagePath,
					'sanitize_callback' => 'ayawild_sanitize_url'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
					array(
						'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'ayawild' ), $i ),
						'section' 	 => 'ayawild_slider_section',
						'settings'   => $slideImageId,
					) 
				)
			);
		}

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'ayawild_footer_section',
			array(
				'title'       => __( 'Footer', 'ayawild' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'ayawild_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayawild_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'ayawild' ),
	            'section'        => 'ayawild_footer_section',
	            'settings'       => 'ayawild_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'ayawild_animations_display',
			array(
				'title'       => __( 'Animations', 'ayawild' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'ayawild_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'ayawild_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'ayawild_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'ayawild' ),
									'section'        => 'ayawild_animations_display',
									'settings'       => 'ayawild_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // ayawild_customize_register
add_action( 'customize_register', 'ayawild_customize_register' );


if ( ! function_exists( 'ayawild_sanitize_checkbox' ) ) :

	function ayawild_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif; // ayawild_sanitize_checkbox

if ( ! function_exists( 'ayawild_sanitize_html' ) ) :

	function ayawild_sanitize_html( $html ) {
		return wp_filter_post_kses( $html );
	}

endif; // ayawild_sanitize_html

if ( ! function_exists( 'ayawild_sanitize_url' ) ) :

	function ayawild_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // ayawild_sanitize_url

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ayawild_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ayawild_skip_link_focus_fix' );
