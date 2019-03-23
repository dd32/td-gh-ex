<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if ( ! function_exists( 'agency_ecommerce_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function agency_ecommerce_load_widgets() {

		// Social.
		register_widget( 'Agency_Ecommerce_Social_Widget' );

		// Latest news.
		register_widget( 'Agency_Ecommerce_Latest_News_Widget' );

		// CTA widget.
		register_widget( 'Agency_Ecommerce_CTA_Widget' );

		// Advertisement widget.
		register_widget( 'Agency_Ecommerce_Advertisement_Widget' );

		// Features widget.
		register_widget( 'Agency_Ecommerce_Features_Widget' );

		// Newsletter widget.
		register_widget( 'Agency_Ecommerce_Newsletter_Widget' );

		// Contact widget.
		register_widget( 'Agency_Ecommerce_Contact_Widget' );

	}

endif;

add_action( 'widgets_init', 'agency_ecommerce_load_widgets' );

//Social Links Widget
require get_template_directory() . '/core/widgets/ae-social-links-widget.php';

//Features Widget
require get_template_directory() . '/core/widgets/ae-features-widget.php';

//Latest News Widget
require get_template_directory() . '/core/widgets/ae-latest-news-widget.php';

//Call to action Widget
require get_template_directory() . '/core/widgets/ae-cta-widget.php';

//Advertisement Widget
require get_template_directory() . '/core/widgets/ae-advertisement-widget.php';

//Newsletter Widget
require get_template_directory() . '/core/widgets/ae-newsletter-widget.php';

//Contact Widget
require get_template_directory() . '/core/widgets/ae-contact-widget.php';

//Add widget if woocommerce is active
if( class_exists( 'WooCommerce' ) ){

	if ( ! function_exists( 'agency_ecommerce_load_woocommerce_widgets' ) ) :

		/**
		 * Load widgets for woocommerce.
		 *
		 * @since 1.0.0
		 */
		function agency_ecommerce_load_woocommerce_widgets() {

			// Latest Products widget
			register_widget( 'Agency_Ecommerce_Latest_Products_Widget' );

			// Featured Categories widget
			register_widget( 'Agency_Ecommerce_Featured_Categories_Widget' );

		}

	endif;

	add_action( 'widgets_init', 'agency_ecommerce_load_woocommerce_widgets' );

	/**
	 * Latest Products Widget
	 */
	require get_template_directory() . '/core/widgets/ae-latest-products-widget.php';

	/**
	 * Featured Categories Widget
	 */
	require get_template_directory() . '/core/widgets/ae-featured-categories-widget.php';

}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agency_ecommerce_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'agency-ecommerce' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in Sidebar.', 'agency-ecommerce' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    if( class_exists( 'WooCommerce' ) ){

        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'agency-ecommerce' ),
            'id'            => 'shop-sidebar',
            'description'   => esc_html__( 'Widgets added here will appear in sidebar of shop pages only.', 'agency-ecommerce' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

    }

    register_sidebar( array(
        'name'          => esc_html__( 'Advertisement (Below Slider)', 'agency-ecommerce' ),
        'id'            => 'advertisement-area',
        'description'   => esc_html__( 'Add widgets here to appear in advertisement area below main slider of home page', 'agency-ecommerce' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Homepage Widget Area', 'agency-ecommerce' ),
        'id'            => 'home-page-widget-area',
        'description'   => esc_html__( 'Add widgets here to appear in Home Page Widget Area.', 'agency-ecommerce' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="container">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => sprintf( esc_html__( 'Footer %d', 'agency-ecommerce' ), 1 ),
        'id'            => 'footer-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => sprintf( esc_html__( 'Footer %d', 'agency-ecommerce' ), 2 ),
        'id'            => 'footer-2',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => sprintf( esc_html__( 'Footer %d', 'agency-ecommerce' ), 3 ),
        'id'            => 'footer-3',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => sprintf( esc_html__( 'Footer %d', 'agency-ecommerce' ), 4 ),
        'id'            => 'footer-4',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'agency_ecommerce_widgets_init' );
