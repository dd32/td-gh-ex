<?php
/**
 * topshop functions and definitions
 *
 * @package topshop
 */
define( 'TOPSHOP_THEME_VERSION' , '1.3.31' );

// Upgrade / Order Premium page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/topshop-pro/class-customize.php' );

if ( ! function_exists( 'topshop_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function topshop_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on topshop, use a find and replace
	 * to change 'topshop' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'topshop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'topshop_blog_img_side', 352, 230, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'topshop' ),
        'top-bar' => __( 'Top Bar Menu', 'topshop' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Gutenberg Support
	add_theme_support( 'align-wide' );
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'width'         => 280,
		'height'        => 91,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'topshop_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
    
    add_theme_support( 'title-tag' );
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // topshop_theme_setup
add_action( 'after_setup_theme', 'topshop_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function topshop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'topshop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	
	register_sidebar(array(
		'name' => __( 'TopShop Footer', 'topshop' ),
		'id' => 'topshop-site-footer',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'topshop' )
	));
}
add_action( 'widgets_init', 'topshop_widgets_init' );

/*
 * Change Widgets Title Tags for SEO
 */
function topshop_change_widget_titles( array $params ) {
	$widget_title_tag = get_theme_mod( 'topshop-seo-widget-title-tag', customizer_library_get_default( 'topshop-seo-widget-title-tag' ) );
    $widget =& $params[0];
    $widget['before_title'] = '<h'.esc_attr( $widget_title_tag ).' class="widget-title">';
    $widget['after_title'] = '</h'.esc_attr( $widget_title_tag ).'>';
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'topshop_change_widget_titles', 20 );

/**
 * Enqueue scripts and styles.
 */
function topshop_theme_scripts() {
	if ( !get_theme_mod( 'topshop-disable-google-fonts', customizer_library_get_default( 'topshop-disable-google-fonts' ) ) ) {
		wp_enqueue_style( 'topshop-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), TOPSHOP_THEME_VERSION );
		wp_enqueue_style( 'topshop-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), TOPSHOP_THEME_VERSION );
	}
	
	wp_enqueue_style( 'topshop-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/all.min.css', array(), '5.9.0' );
	wp_enqueue_style( 'topshop-style', get_stylesheet_uri(), array(), TOPSHOP_THEME_VERSION );
    wp_enqueue_style( 'topshop-woocommerce-style', get_template_directory_uri().'/templates/css/topshop-woocommerce-style.css', array(), TOPSHOP_THEME_VERSION );
	
	if ( get_theme_mod( 'topshop-header-layout' ) == 'topshop-header-layout-three' ) :
		wp_enqueue_style( 'topshop-header-style', get_template_directory_uri().'/templates/css/topshop-header-three.css', array(), TOPSHOP_THEME_VERSION );
	elseif ( get_theme_mod( 'topshop-header-layout' ) == 'topshop-header-layout-centered' ) :
		wp_enqueue_style( 'topshop-header-style', get_template_directory_uri().'/templates/css/topshop-header-centered.css', array(), TOPSHOP_THEME_VERSION );
	else :
		wp_enqueue_style( 'topshop-header-style', get_template_directory_uri().'/templates/css/topshop-header-standard.css', array(), TOPSHOP_THEME_VERSION );
	endif;

	wp_enqueue_script( 'topshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TOPSHOP_THEME_VERSION, true );
	wp_enqueue_script( 'topshop-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	
	if ( get_theme_mod( 'topshop-sticky-header' ) ) {
        if ( did_action( 'elementor/loaded' ) ) :
            if ( !wp_script_is( 'elementor-waypoints', 'registered' ) ) :
                wp_enqueue_script( 'topshop-waypoints', get_template_directory_uri() . '/js/waypoints/jquery.waypoints.min.js', array( 'jquery' ), TOPSHOP_THEME_VERSION, true );
            endif;
            wp_enqueue_script( 'topshop-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array( 'jquery', 'elementor-waypoints' ), TOPSHOP_THEME_VERSION, true );
            wp_enqueue_script( 'topshop-waypoints-custom', get_template_directory_uri() . '/js/waypoints-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
        else :
            wp_enqueue_script( 'topshop-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	        wp_enqueue_script( 'topshop-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
            wp_enqueue_script( 'topshop-waypoints-custom', get_template_directory_uri() . '/js/waypoints-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
        endif;
	}
	
	wp_enqueue_script( 'topshop-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );

	wp_enqueue_script( 'topshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), TOPSHOP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'topshop_theme_scripts' );

/**
 * Print TopShop styling settings.
 */
function topshop_print_styles() {
    $topshop_custom_css = '';
    if ( get_theme_mod( 'topshop-custom-css', false ) ) {
        $topshop_custom_css = get_theme_mod( 'topshop-custom-css' );
    } ?>
    <style type="text/css" media="screen">
        <?php echo htmlspecialchars_decode( $topshop_custom_css ); ?>
    </style>
<?php
}
add_action('wp_head', 'topshop_print_styles', 11);

/**
 * Enqueue topshop custom customizer styling.
 */
function topshop_load_customizer_script() {
	wp_enqueue_script( 'topshop-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
    wp_enqueue_style( 'topshop-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'topshop_load_customizer_script' );

/**
 * Enqueue admin styling.
 */
function topshop_load_admin_script() {
    wp_enqueue_style( 'topshop-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'topshop_load_admin_script' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'topshop_is_woocommerce_activated' ) ) :
    
function topshop_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // topshop_is_woocommerce_activated

if ( topshop_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-inc.php';
}

/**
 * Add classes to the blog list for styling.
 */
function topshop_blog_post_classes( $classes ) {
	global $topshop_current_class;
	
	if ( is_home() || is_archive() || is_search() ) :
		if ( 'blog-post-alt-layout' == get_theme_mod( 'topshop-blog-layout', customizer_library_get_default( 'topshop-blog-layout' ) ) ) :
			$classes[] = $topshop_current_class;
			$topshop_current_class = ( 'blog-alt-odd' == $topshop_current_class ) ? sanitize_html_class( 'blog-alt-even' ) : sanitize_html_class( 'blog-alt-odd' );
		endif;
    endif;
    
    if ( has_post_thumbnail() ) :
        $classes[] = sanitize_html_class( 'has-post-thumbnail' );
    endif;

	return $classes;
}
$topshop_current_class = sanitize_html_class( 'blog-alt-odd' );
add_filter ( 'post_class' , 'topshop_blog_post_classes' );

/**
 * Adjust is_home query if topshop-blog-cats is set
 */
function topshop_set_blog_queries( $query ) {
    $topshop_blog_query_set = '';
    if ( get_theme_mod( 'topshop-blog-cats', false ) ) {
        $topshop_blog_query_set = get_theme_mod( 'topshop-blog-cats' );
    }
    
    if ( $topshop_blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $topshop_blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'topshop_set_blog_queries' );

/**
 * Exclude the selected slider category from the categories widget
 */
function topshop_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'topshop-slider-cats', false ) ) {
        $exclude = get_theme_mod( 'topshop-slider-cats' );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'topshop_exclude_slider_categories_widget' );

/**
 * Display recommended plugins with the TGM class
 */
function topshop_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
            'name'      => __( 'Elementor Page Builder', 'topshop' ),
            'slug'      => 'elementor',
			'required'  => false,
        ),
		array(
			'name'      => __( 'WooCommerce', 'topshop' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'WooCustomizer', 'topshop' ),
			'slug'      => 'woocustomizer',
			'required'  => false,
		),
		array(
			'name'      => __( 'Contact Form by WPForms', 'topshop' ),
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'topshop' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'topshop',
		'menu'         => 'tgmpa-install-plugins',
		'strings'     => array(
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'TopShop recommends the following plugin: %1$s.',
				'TopShop recommends the following plugins: %1$s.',
				'topshop'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with TopShop: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with TopShop: %1$s.',
				'topshop'
			),
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'topshop_register_required_plugins' );

/**
 * Register a custom Post Categories ID column
 */
function topshop_edit_cat_columns( $topshop_cat_columns ) {
    $topshop_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $topshop_cat_columns = topshop_cat_columns_array_push_after( $topshop_cat_columns, $topshop_cat_in, 0 );
    return $topshop_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'topshop_edit_cat_columns' );

/**
 * Print the ID column
 */
function topshop_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'topshop_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function topshop_cat_columns_array_push_after( $src, $topshop_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $topshop_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $topshop_cat_in );
        }
    }
    return $R;
}

/**
 * Admin notice to enter a purchase license
 */
function topshop_add_license_notice() {
	global $pagenow;
	global $current_user;
	$topshop_user_id = $current_user->ID;
	$topshoppage = isset( $_GET['page'] ) ? $pagenow . '?page=' . $_GET['page'] : $pagenow;

	if ( !get_user_meta( $topshop_user_id, 'topshop_admin_notice_ignore' ) ) : ?>
		<div class="notice notice-info topshop-admin-notice topshop-notice-add <?php echo $topshoppage != 'themes.php?page=theme_info' ? sanitize_html_class( 'topshop-attract-notice' ) : ''; ?>">
			<h4>
				<?php esc_html_e( 'Thank you for using TopShop!', 'topshop' ); ?>
			</h4>
			<p class="topshop-admin-notice-top">
				<?php
				/* translators: 1: '5 star support', 2: 'help on getting started', 3: 'Get In Contact', 4:'Currently selling for only $25'. */
				printf( esc_html__( 'We promise %1$s with TopShop. Read our %2$s or for theme support on using TopShop - %3$s -- TopShop Pro is %4$s', 'topshop' ), wp_kses( '<a href="' . esc_url( 'https://wordpress.org/support/theme/topshop/reviews/?filter=5' ) . '" class="topshop-attract" target="_blank">' . __( '5 star support', 'topshop' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array(), 'class' => array() ) ) ), wp_kses( '<a href="' . admin_url( 'themes.php?page=theme_info' ) . '" class="topshop-admin-notice-btn">' . __( 'help on getting started', 'topshop' ) . '</a>', array( 'a' => array( 'href' => array(), 'class' => array() ) ) ), wp_kses( '<a href="' . esc_url( 'https://kairaweb.com/contact/' ) . '" target="_blank" class="topshop-admin-notice-btn">' . __( 'Get In Contact', 'topshop' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array(), 'class' => array() ) ) ), wp_kses( '<a href="' . esc_url( 'https://kairaweb.com/wordpress-theme/topshop/#purchase-premium' ) . '" class="topshop-attract" target="_blank">' . __( 'Currently selling for only $25', 'topshop' ) . '</a>', array( 'a' => array( 'href' => array(), 'target' => array(), 'class' => array() ) ) ) ); ?>
            </p><br />
            <p>
				<?php esc_html_e( 'TopShop Premium now includes a FREE shortcode slider... Easily add sliders to all or any pages you choose.', 'topshop' ); ?>
			</p>
			<?php if ( $topshoppage == 'themes.php?page=theme_info' ) : ?>
				<div class="topshop-admin-notice-blocks">
					<div class="topshop-admin-notice-block">
						<h5><?php esc_html_e( 'About TopShop:', 'topshop' ); ?></h5>
						<p>
							<?php esc_html_e( 'TopShop is a widely used and much loved WordPress theme which gives you lots of different customization settings... so you can easily change the look of your site any time.', 'topshop' ); ?>
						</p>
						<p>
							<?php
							/* translators: %s: 'Recommended Resources' */
							printf( esc_html__( 'Read through our %1$s and %2$s and we\'ll help you build a professional website easily.', 'topshop' ), wp_kses( __( '<a href="https://kairaweb.com/support/wordpress-recommended-resources/" target="_blank">Recommended Resources</a>', 'topshop' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( __( '<a href="https://kairaweb.com/documentation/" target="_blank">Kaira Documentation</a>', 'topshop' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) );
							?>
						</p>
						<a href="<?php echo esc_url( admin_url( 'themes.php?page=theme_info' ) ) ?>" class="topshop-admin-notice-btn">
							<?php esc_html_e( 'Read More About TopShop', 'topshop' ); ?>
						</a>
					</div>
					<div class="topshop-admin-notice-block">
						<h5><?php esc_html_e( 'Using TopShop:', 'topshop' ); ?></h5>
						<p>
							<?php
							/* translators: %s: 'set up your site in WordPress' */
							printf( esc_html__( 'See our recommended %1$s and how to get ready before you start building your website after you\'ve %2$s.', 'topshop' ), wp_kses( __( '<a href="https://kairaweb.com/documentation/our-recommended-wordpress-basic-setup/" target="_blank">WordPress basic setup</a>', 'topshop' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( __( '<a href="https://kairaweb.com/wordpress-hosting/" target="_blank">setup WordPress Hosting</a>', 'topshop' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) );
							?>
						</p>
						<a href="<?php echo esc_url( 'https://kairaweb.com/support/wordpress-recommended-resources/' ) ?>" class="topshop-admin-notice-btn-in" target="_blank">
							<?php esc_html_e( 'Recommended Resources', 'topshop' ); ?>
						</a>
						<p>
							<?php esc_html_e( 'We\'ve neatly built most of the TopShop settings into the WordPress Customizer so you can see all your changes happen as you built your site.', 'topshop' ); ?>
						</p>
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" class="topshop-admin-notice-btn-grey">
							<?php esc_html_e( 'Start Customizing Your Website', 'topshop' ); ?>
						</a>
					</div>
					<div class="topshop-admin-notice-block topshop-nomargin">
						<h5><?php esc_html_e( 'Popular FAQ\'s:', 'topshop' ); ?></h5>
						<p>
						<?php esc_html_e( 'See our list of popular help links for building your website and/or any issues you may have.', 'topshop' ); ?>
						</p>
						<ul>
							<li>
								<a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><?php esc_html_e( 'Setup the TopShop default slider', 'topshop' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/documentation/adding-custom-css-to-wordpress/" target="_blank"><?php esc_html_e( 'Adding Custom CSS to WordPress', 'topshop' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/documentation/mobile-menu-not-working/" target="_blank"><?php esc_html_e( 'Mobile Menu is not working', 'topshop' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/wordpress-theme/topshop/#premium-features" target="_blank"><?php esc_html_e( 'What does TopShop Premium offer extra', 'topshop' ); ?></a>
							</li>
						</ul>
						<a href="<?php echo esc_url( 'https://kairaweb.com/documentation/' ) ?>" class="topshop-admin-notice-btn-grey" target="_blank">
							<?php esc_html_e( 'See More Documentation', 'topshop' ); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>
			<a href="?topshop_add_license_notice_ignore=" class="topshop-notice-close"><?php esc_html_e( 'Dismiss Notice', 'topshop' ); ?></a>
		</div><?php
	endif;
}
add_action( 'admin_notices', 'topshop_add_license_notice' );
/**
 * Admin notice save dismiss to wp transient
 */
function topshop_add_license_notice_ignore() {
    global $current_user;
	$topshop_user_id = $current_user->ID;

    if ( isset( $_GET['topshop_add_license_notice_ignore'] ) ) {
		update_user_meta( $topshop_user_id, 'topshop_admin_notice_ignore', true );
    }
}
add_action( 'admin_init', 'topshop_add_license_notice_ignore' );
