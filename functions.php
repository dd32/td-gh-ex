<?php
/**
 * Function describe for AyaBioStoreLite
 * 
 * @package ayabiostorelite
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'AYABIOSTORELITE_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ayabiostorelite_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ayabiostorelite_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, AYABIOSTORELITE_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ayabiostorelite_min_php_not_met_notice' );
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
function ayabiostorelite_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ayabiostorelite' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ayabiostorelite' ),
				PHP_VERSION,
				AYABIOSTORELITE_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}



/**
 * Display the Owl Carousel
 */
if ( ! function_exists( 'ayabiostorelite_display_slider' ) ) :

	function ayabiostorelite_display_slider() {
	?>
		<div class="owl-carousel owl-theme">
			<?php
				// display slides
				for ( $i = 1; $i <= 3; ++$i ) {
						
						$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

						$slideContent = get_theme_mod( 'ayaclub_slide'.$i.'_content' );
						$slideImage = get_theme_mod( 'ayaclub_slide'.$i.'_image', $defaultSlideImage );

					?>
						<div class="item" <?php if ( $slideImage != '' ) : ?>
								style="background-image: url('<?php echo esc_attr($slideImage); ?>');"
						<?php endif; ?>>
						<div class="slider-content-wrapper">
							<div class="slider-content-container">
								<?php echo esc_html($slideContent); ?>
							</div>
						</div>
					</div>
	<?php		} /**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ayabiostorelite_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ayabiostorelite_skip_link_focus_fix' );

?>
		</div><!-- .owl-carousel -->
	<?php 
	}
endif; // ayabiostorelite_display_slider

if ( ! function_exists( 'ayabiostorelite_nav_wrap' ) ) :

	function ayabiostorelite_nav_wrap() {

		// open the <ul>, set 'menu_class' and 'menu_id' values
  		$wrap  = '<ul id="%1$s" class="%2$s">';
  
	  	// get nav items as configured in /wp-admin/
	  	$wrap .= '%3$s';

	  	if ( class_exists( 'WooCommerce' ) ) {

	  		global $woocommerce;

			$wrap .= '<li><a class="cart-contents-icon" href="'. esc_attr( wc_get_cart_url() ).'" title="'.__('View Your Cart', 'ayabiostorelite')
					   .'"></a><div id="cart-popup-content"><div class="widget_shopping_cart_content"></div></div></li>';
		}
  
  		// close the <ul>
  		$wrap .= '</ul>';
  
  		// return the result
  		return $wrap;
	}

endif; // ayabiostorelite_nav_wrap

/**
 * Declare WooCommerce Plugin Support
 */
if ( ! function_exists( 'ayabiostorelite_setup' ) ) :

	function ayabiostorelite_setup() {
		add_theme_support( 'woocommerce' );
	}

endif; // ayabiostorelite
add_action( 'after_setup_theme', 'ayabiostorelite_setup' );

/**
 * Load theme JavaScript and CSS
 */
if ( ! function_exists( 'ayabiostorelite_load_css_and_scripts' ) ) :

	function ayabiostorelite_load_css_and_scripts() {

		wp_enqueue_style( 'allingrid-stylesheet',
			get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'ayabiostorelite-child-style',
			get_stylesheet_uri(), array( 'ayabiostorelite-stylesheet' ) );

		wp_enqueue_style( 'ayabiostorelite-fonts',
			ayabiostorelite_fonts_url(), array(), null );

		wp_enqueue_script( 'owl.carousel',
			get_stylesheet_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ) );

		wp_enqueue_script( 'ayabiostorelite',
			get_stylesheet_directory_uri() . '/js/ayabiostorelite.js', array( 'jquery', 'owl.carousel' ) );
	}
endif; // ayabiostorelite_load_css_and_scripts
add_action( 'wp_enqueue_scripts', 'ayabiostorelite_load_css_and_scripts' );

/**
 * Load google font url used in the ayabiostorelite theme
 */
if ( ! function_exists( 'ayabiostorelite_fonts_url' ) ) :
	function ayabiostorelite_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Arimo, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Work Sans font: on or off', 'ayabiostorelite' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Work+Sans';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // ayabiostorelite_fonts_url

/**
 * Singleton class for handling the theme's customizer integration.
 */
if ( ! class_exists( 'ayabiostorelite_Customize' ) ) :
	final class ayabiostorelite_Customize {

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
					'ayabiostorelite',
					array(
						'title'    => esc_html__( 'AyaBioStore', 'ayabiostorelite' ),
						'pro_text' => esc_html__( 'Upgrade', 'ayabiostorelite' ),
						'pro_url'  => esc_url( 'https://ayatemplates.com/product/ayabiostore' )
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
endif; // ayabiostorelite_Customize

// Doing this customizer thang!
ayabiostorelite_Customize::get_instance();

/**
 * Remove Parent theme Customize Up-Selling Section
 */
if ( ! function_exists( 'ayabiostorelite_remove_parent_theme_upsell_section' ) ) :

	function ayabiostorelite_remove_parent_theme_upsell_section( $wp_customize ) {

		// Remove Parent-Theme Upsell section
		$wp_customize->remove_section('ayaclub');
	}
endif; // ayabiostorelite_remove_parent_theme_upsell_section

add_action( 'customize_register', 'ayabiostorelite_remove_parent_theme_upsell_section', 100 );
