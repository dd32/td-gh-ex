<?php
/**
 * WooCommerce Plugin Support.
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * WooCommerce plugin support.
 *
 * @since  1.0.1
 */
class WooCommerce {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Constructor method.
	 *
	 * @since  1.0.1
	 */
	public function __construct() {}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.1
	 *
	 * @return object Instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.1
	 */
	public static function init() {
		// Return if WooCommerce is not activated.
		if ( ! class_exists( 'WooCommerce' ) ) {
			return false;
		}
		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
		add_action( 'after_setup_theme', [ self::get_instance(), 'add_woo_support' ] );
		add_filter( 'aamla_register_sidebar', [ self::get_instance(), 'register_widget_areas' ] );
		add_filter( 'aamla_widgets_secondary', [ self::get_instance(), 'display_sidebar' ] );
		add_filter( 'aamla_markup_header_widgets', [ self::get_instance(), 'header_widgets' ] );
		add_filter( 'aamla_markup_header_items', [ self::get_instance(), 'header_cart_icon' ] );
		add_filter( 'woocommerce_add_to_cart_fragments', [ self::get_instance(), 'update_cart_on_ajax' ] );
		add_filter( 'woocommerce_cart_item_remove_link', [ self::get_instance(), 'mini_cart_remove_link' ] );
		add_filter( 'body_class', [ self::get_instance(), 'woocommerce_body_classes' ] );
		add_filter( 'post_class', [ self::get_instance(), 'woocommerce_product_classes' ] );
		add_filter( 'get_product_search_form', [ self::get_instance(), 'product_search_form' ] );
		add_action( 'woocommerce_after_shop_loop_item_title', [ self::get_instance(), 'out_of_stock' ] );
		add_action( 'woocommerce_before_main_content', [ self::get_instance(), 'woocommerce_before_start' ], 8 );
		add_action( 'woocommerce_sidebar', [ self::get_instance(), 'woocommerce_after_sidebar' ], 12 );
		add_filter( 'aamla_custom_widget_metabox', [ self::get_instance(), 'widget_metabox' ], 10, 2 );
		add_filter( 'aamla_theme_sections', [ self::get_instance(), 'customizer_section' ] );
		add_filter( 'aamla_theme_controls', [ self::get_instance(), 'customizer_controls' ] );
		add_filter( 'aamla_theme_defaults', [ self::get_instance(), 'customizer_defaults' ] );
	}

	/**
	 * Declare WooCommerce & its features support.
	 *
	 * @since 1.0.1
	 */
	public function add_woo_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	/**
	 * WooCommerce markup before opening wrapper.
	 *
	 * @since 1.0.1
	 */
	public function woocommerce_before_start() {
		?>
		<div id="content"<?php aamla_attr( 'site-content' ); ?>>
		<?php
		// This hook is documented in index.php.
		do_action( 'aamla_on_top_of_site_content', 'on_top_of_site_content' );
	}

	/**
	 * WooCommerce markup after sidebar.
	 *
	 * @since 1.0.1
	 */
	public function woocommerce_after_sidebar() {
		// This hook is documented in index.php.
		do_action( 'aamla_bottom_of_site_content', 'bottom_of_site_content' );
		?>
		</div><!-- #content -->
		<?php
	}

	/**
	 * Register widget area.
	 *
	 * @since 1.0.1
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 *
	 * @param array $widgets Array of arguments for the sidebar being registered.
	 * @return array Array of arguments for the sidebar being registered.
	 */
	public function register_widget_areas( $widgets ) {
		return array_merge( $widgets,
			[
				[
					'name'          => esc_html__( 'WooCommerce - Archive Filters', 'aamla' ),
					'id'            => 'wc-archive-filters',
					'before_widget' => '<section id="%1$s" class="widget wc-filter %2$s">',
				],
			]
		);
	}

	/**
	 * Whether to display sidebar on a wooCommerce page or not.
	 *
	 * @since 1.0.1
	 *
	 * @param false $return Retrun true will short circuit calling function.
	 * @return bool
	 */
	public function display_sidebar( $return ) {
		// No sidebar required on Single product, cart and checkout pages.
		if ( is_product() || is_cart() || is_checkout() ) {
			return true;
		}

		// Replace default sidebar with Filters sidebar on Product archive pages.
		if ( is_shop() || is_product_taxonomy() ) {
			aamla_widgets(
				'wc-archive-filters',
				'wc-archive-filters sidebar-widget-area',
				esc_html( 'WooCommerce - Procuct Archive Filters' ),
				'wc-archive-filters'
			);
			return true;
		}
		return $return;
	}

	/**
	 * Add shopping cart to site header widgets area.
	 *
	 * @since  1.0.1
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 * @return string
	 */
	public function header_widgets( $callbacks ) {
		if ( aamla_get_mod( 'aamla_woo_mini_cart', 'none' ) ) {
			array_unshift( $callbacks, [ [ $this, 'add_cart_icon' ] ] );
		}
		return $callbacks;
	}

	/**
	 * Add shopping cart to site header widgets area.
	 *
	 * @since  1.0.1
	 *
	 * @param arrray $callbacks Array of callback functions (may be with args).
	 * @return string
	 */
	public function header_cart_icon( $callbacks ) {
		if ( ! is_active_sidebar( 'header' ) && aamla_get_mod( 'aamla_woo_mini_cart', 'none' ) ) {
			array_push( $callbacks, [ 'aamla_markup', 'header-widgets', [ [ $this, 'add_cart_icon' ] ] ] );
		}
		return $callbacks;
	}

	/**
	 * Header Cart markup.
	 *
	 * @since 1.0.1
	 */
	public function add_cart_icon() {
		$cart_contents_count = WC()->cart->get_cart_contents_count();
		$cart_class          = $cart_contents_count ? '' : ' screen-reader-text';

		// Shopping Text.
		$cart_text = $cart_contents_count ? esc_html__( 'Continue Shopping', 'aamla' ) : esc_html__( 'Start Shopping', 'aamla' );

		// Markup for number of items added to the cart (if any).
		$display_items_count = sprintf( '<span class="wc-cart-items %1$s">%2$s</span>',
			$cart_class, absint( $cart_contents_count )
		);

		// Shop page link markup.
		$shopping_page_link = sprintf( '<a class="wc-shop-pagelink" href="%1$s">%2$s <span class="long-arrow-right">%3$s</span></a>',
			esc_url( wc_get_page_permalink( 'shop' ) ),
			$cart_text,
			aamla_get_icon( [ 'icon' => 'long-arrow-right' ] )
		);

		// Shop cart widget toggle button.
		printf( '<button aria-expanded="false" class="wc-cart-toggle" %1$s>%2$s<span class="screen-reader-text">%3$s</span>%4$s</button>',
			is_cart() || is_checkout() ? 'disabled' : '',
			aamla_get_icon( [ 'icon' => 'cart' ] ),
			esc_html__( 'View shopping cart', 'aamla' ),
			$display_items_count
		); // WPCS xss ok. We get escaped values from aamla_get_icon() and $display_items_count.

		// Display woocommerce cart widget.
		the_widget( 'WC_Widget_Cart', [ 'title' => '' ], [
			'before_widget' => '<div id="wc-cart-widget" class="widget %s">',
			'after_widget'  => $shopping_page_link . '</div>',
		] );
	}

	/**
	 * Cart Fragments to be updated.
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	public function update_cart_on_ajax( $fragments ) {
		$cart_contents_count = WC()->cart->get_cart_contents_count();
		$cart_class          = $cart_contents_count ? '' : ' screen-reader-text';

		// Text to display for 'Shop' page link.
		$cart_text = $cart_contents_count ? esc_html__( 'Continue Shopping', 'aamla' ) : esc_html__( 'Start Shopping', 'aamla' );

		// Update number of items in the cart.
		$fragments['span.wc-cart-items'] = '<span class="wc-cart-items' . $cart_class . '">' . absint( $cart_contents_count ) . '</span>';

		// Update shop page link text.
		$fragments['a.wc-shop-pagelink'] = '<a class="wc-shop-pagelink" href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">' . $cart_text . ' <span class="long-arrow-right">' . aamla_get_icon( [ 'icon' => 'long-arrow-right' ] ) . '</span></a>';

		return $fragments;
	}

	/**
	 * Modify mini cart remove link button. Add delete icon inplace of 'x'.
	 *
	 * @since  1.0.1
	 *
	 * @param string $markup Cart remove link markup.
	 * @return string
	 */
	public function mini_cart_remove_link( $markup ) {
		return str_replace( '&times;', aamla_get_icon( [ 'icon' => 'trash' ] ), $markup );
	}

	/**
	 * Extend the default WooCommerce product classes.
	 *
	 * @since 1.0.1
	 *
	 * @param array $classes Classes for the WooCommerce Product.
	 * @return array
	 */
	public function woocommerce_product_classes( $classes ) {
		if ( ! is_woocommerce() ) {
			return $classes;
		}
		global $product;
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids && is_array( $attachment_ids ) && count( $attachment_ids ) ) {
			$classes[] = 'multiple-product-images';
		}

		return $classes;
	}

	/**
	 * Extend the default WooCommerce body classes.
	 *
	 * @since 1.0.1
	 *
	 * @param array $classes Classes for the WooCommerce Pages.
	 * @return array
	 */
	public function woocommerce_body_classes( $classes ) {

		if ( is_shop() || is_product_category() || is_product_tag() ) {

			// Remove default sidebar layout classes.
			$vals = [ 'no-sidebar', 'sidebar-left', 'sidebar-right' ];
			foreach ( $vals as $val ) {
				$key = array_search( $val, $classes, true );
				if ( false !== $key ) {
					unset( $classes[ $key ] );
				}
			}

			// Add Shop page specific classes.
			if ( ! is_active_sidebar( 'wc-archive-filters' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = aamla_get_mod( 'aamla_woo_shop_layout', 'attr' );
			}
		}

		return $classes;
	}

	/**
	 * Replace wooCommerce default product searchform.
	 *
	 * @since  1.0.1
	 *
	 * @param str $form Product Searchform markup.
	 * @return string
	 */
	public function product_search_form( $form ) {
		ob_start();
		aamla_get_template_partial( 'add-on/woocommerce', 'searchform' );
		$form = ob_get_clean();
		return $form;
	}

	/**
	 * Add out of stock text on archive pages.
	 *
	 * @since  1.0.1
	 */
	public function out_of_stock() {
		$classes = get_post_class();
		// Check if 'outofstock' class exist for current product.
		if ( in_array( 'outofstock', $classes, true ) ) {
			printf( '<span class="woo-sold-out">%s</span>', esc_html__( 'Out of stock', 'aamla' ) );
		}
	}

	/**
	 * Remove custom widget metabox on certain edit screen.
	 *
	 * @since  1.0.1
	 *
	 * @param false $false   Boolean false.
	 * @param int   $page_id Page ID.
	 * @return bool
	 */
	public function widget_metabox( $false, $page_id ) {
		// Do not add Metabox on WooCommerce Shop Page.
		if ( wc_get_page_id( 'shop' ) === $page_id ) {
			return true;
		}
		return $false;
	}

	/**
	 * Set theme customizer sections.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $sections array of theme customizer sections.
	 * @return array Returns array of theme customizer sections.
	 */
	public function customizer_section( $sections = [] ) {
		return array_merge( $sections,
			[
				'aamla_woocommerce_section' =>
				[
					'title' => esc_html__( 'Theme Options', 'aamla' ),
					'panel' => 'woocommerce',
				],
			]
		);
	}

	/**
	 * Set theme customizer controls and settings.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $controls array of theme controls and settings.
	 * @return array Returns array of theme controls and settings.
	 */
	public function customizer_controls( $controls = [] ) {
		return array_merge( $controls,
			[
				[
					'label'   => esc_html__( 'Shop Page Sidebar Layout', 'aamla' ),
					'section' => 'aamla_woocommerce_section',
					'setting' => 'aamla_woo_shop_layout',
					'type'    => 'select',
					'choices' => [
						'sidebar-left'  => esc_html__( 'Sidebar-Content', 'aamla' ),
						'sidebar-right' => esc_html__( 'Content-Sidebar', 'aamla' ),
					],
				],
				[
					'label'   => esc_html__( 'Show WooCommerce mini cart in Site Header.', 'aamla' ),
					'section' => 'aamla_woocommerce_section',
					'setting' => 'aamla_woo_mini_cart',
					'type'    => 'checkbox',
				],
			]
		);
	}

	/**
	 * Set default values for theme customization options.
	 *
	 * @since 1.0.1
	 *
	 * @param  array $defaults Array of customizer option default values.
	 * @return array Returns Array of customizer option default values.
	 */
	public function customizer_defaults( $defaults = [] ) {
		return array_merge( $defaults, [
			'aamla_woo_shop_layout' => 'sidebar-left',
			'aamla_woo_mini_cart'   => 1,
		] );
	}

	/**
	 * Enqueue scripts and styles to front end.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_front() {
		wp_enqueue_script(
			'aamla_woocommerce_script',
			get_template_directory_uri() . '/add-on/woocommerce/assets/woocommerce.js',
			[],
			'1.0.0',
			true
		);

		wp_enqueue_style(
			'aamla_woocommerce_style',
			get_template_directory_uri() . '/add-on/woocommerce/assets/woocommerce.css',
			[],
			false,
			'all'
		);
		wp_style_add_data( 'aamla_woocommerce_style', 'rtl', 'replace' );
	}
}

WooCommerce::init();
