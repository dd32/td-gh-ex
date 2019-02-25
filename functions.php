<?php
/**
* functions.php
*
* @author    Franchi Design
* @package   atomy
* @version   1.0.0
*/


/* Setup
	 ========================================================================== */

if ( ! function_exists( 'atomy_setup' ) ) :
	
	function atomy_setup() {
		
		load_theme_textdomain( 'atomy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

    // Add theme support Title-tag
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		// Custom size images
		add_image_size('atomy_big', 2600, 2000, true);
		

		// Add Menu location
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'atomy' ),
			'menu-2' => esc_html__( 'Language', 'atomy' ),
		) );

		// Add Custom Editor Style
		function atomy_add_editor_styles() {
			add_editor_style( 'custom-editor-style.css' );
		}
		add_action( 'init', 'atomy_add_editor_styles' );
		

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'atomy_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'atomy_setup' );

/* Layout
	 ========================================================================== */
function atomy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'atomy_content_width', 640 );
}
add_action( 'after_setup_theme', 'atomy_content_width', 0 );

/* Widget Area
	 ========================================================================== */


function atomy_widgets_init() {

	// Widget primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'atomy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'atomy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

// Widget Product Featured
	register_sidebar( array(
		'name'          => esc_html__( 'Featured Product', 'atomy' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'atomy' ),
		'before_widget' => '<section id="%1$s" class="widget-featured %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-featured-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'atomy_widgets_init' );



/* Enqueue scripts and styles
	 ========================================================================== */

function atomy_scripts() {

	// Style
	wp_enqueue_style('atomy-style', get_stylesheet_uri() );
	// Bootstrap
	wp_enqueue_script('popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),'v1.14.3' ,true );
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),'v4.3.1' ,true );
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
  // Font Awesome
  wp_enqueue_style('font-awesome-css', get_template_directory_uri(). '/css/fontawesome-all.min.css');
  // Jquery
	wp_enqueue_script('atomy-jquery-js', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), 'v3.3.1', true );
	// atomy Script
	wp_enqueue_script('atomy-custom-script-js', get_template_directory_uri() . '/js/atomy-custom-script.js', array(), 'v1.0.0', true );
	wp_enqueue_script('atomy-skip-link-focus-fix-js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('atomy-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  // Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomy_scripts' );

/* Require
	 ========================================================================== */

// Implement the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

//Load Jetpack compatibility file
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Woocommerce
	 ========================================================================== */

// Add thema Support 
function atomy_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'atomy_add_woocommerce_support' );

// Ensure cart contents update when products are added to the cart via AJAX
function atomy_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','atomy' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'atomy_header_add_to_cart_fragment' );

//Hide category product count in product archives
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

/* Class Navigation Menu
	 ========================================================================== */

// Add Class -li-
function atomy_add_classes_on_li($classes, $item, $args) {
	$classes[] = 'nav-item dropdown submenu';
	return $classes;

}
add_filter('nav_menu_css_class','atomy_add_classes_on_li',1,3);

// Add class -a-
function atomy_add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
}
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'atomy_add_menu_link_class', 1, 3 );

// Add Class -Sub-menu-
function atomy_some_function( $classes, $args, $depth ){
    foreach ( $classes as $key => $class ) {
    if ( $class == 'sub-menu' ) {
        $classes[ $key ] = 'dropdown-menu';
    }
}

return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'atomy_some_function', 10, 3 );

// Add filter dropdown-toggle
function atomy_add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
    $atts['class'] = 'dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
    $atts['data-target'] = '#';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'atomy_add_class_to_items_link', 10, 3 );



add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_display_yith_wishlist_loop', 97 );
 
function bbloomer_display_yith_wishlist_loop() {
echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
}



  






 


