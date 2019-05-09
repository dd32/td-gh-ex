<?php
/**
 * Star functions and definitions
 *
 * @package Star
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'star_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function star_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'jetpack-responsive-videos' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_editor_style();
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'star-featured-posts-thumb', 360, 300 );
		add_theme_support( 'title-tag' );
		register_nav_menus(
			array(
				'header' => __( 'Primary Menu', 'star' ),
				'social' => __( 'Social Menu', 'star' ),
			)
		);
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		add_theme_support(
			'custom-header',
			apply_filters(
				'star_custom_header_args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'flex-height'        => true,
					'wp-head-callback'   => 'star_customize_css',
				)
			)
		);

		add_theme_support( 'wp-block-styles' );

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Star pale blue', 'star' ),
					'slug'  => 'star-blue',
					'color' => '#95b8cf',
				),
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'star_setup' );


if ( ! get_theme_mod( 'star_hide_search' ) ) {
	/**
	 * Star_hide_search
	 *
	 * Unless the option is hidden in the customizer, display a search form in the header menu.
	 *
	 * @param string $items Nav menu items.
	 * @param string $args Menu location.
	 */
	function star_menu_search( $items, $args ) {
		if ( 'header' === $args->theme_location ) {
			$items = $items . '<li class="topsearch" >' . get_search_form( false ) . '</li>';
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'star_menu_search', 10, 2 );
}


if ( ! get_theme_mod( 'star_hide_title' ) ) {
	/**
	 * Star_hide_title
	 *
	 * Unless the option is hidden in the customizer, display the site title (with link) in the header menu.
	 *
	 * @param string $items Nav menu items.
	 * @param string $args Menu location.
	 */
	function star_menu_title( $items, $args ) {
		if ( 'header' === $args->theme_location ) {
			$new_item    = array( '<li class="toptitle"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></li>' );
			$items       = preg_replace( '/<\/li>\s<li/', '</li>, <li', $items );
			$array_items = explode( ',', $items );
			array_splice( $array_items, 0, 0, $new_item );
			$items = implode( '', $array_items );
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'star_menu_title', 10, 2 );
}

/**
 * Register widget areas.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function star_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'star' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer widget area', 'star' ),
			'id'            => 'sidebar-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'star_widgets_init' );

if ( ! function_exists( 'star_fonts_url' ) ) :
	/**
	 * Add the Montserrat font.
	 */
	function star_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'star' ) ) {
			$fonts[] = 'Montserrat';
		}

		/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'star' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => rawurlencode( implode( '|', $fonts ) ),
					'subset' => rawurlencode( $subsets ),
				),
				'//fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function star_scripts() {
	wp_enqueue_style( 'star-style', get_stylesheet_uri(), array( 'dashicons' ) );
	wp_style_add_data( 'star-style', 'rtl', 'replace' );
	wp_enqueue_style( 'star-fonts', star_fonts_url(), array(), null );
	wp_enqueue_style( 'open-sans' );

	wp_enqueue_script( 'star-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'star-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'star_scripts' );

/**
 * Add styles and fonts for the Gutenberg editor.
 */
function star_gutenberg_assets() {
	wp_enqueue_style( 'open-sans' );
	wp_enqueue_style( 'star-fonts-gutenberg', star_fonts_url(), array(), null );
	wp_enqueue_style( 'star-gutenberg', get_theme_file_uri( '/inc/gutenberg-editor.css' ), false );
	wp_enqueue_script( 'star-block-styles-script', get_theme_file_uri( '/js/block-styles.js' ), array( 'wp-blocks', 'wp-i18n' ) );
	wp_set_script_translations( 'star-block-styles-script', 'star' );
}
add_action( 'enqueue_block_editor_assets', 'star_gutenberg_assets' );

/**
 * Add custom block styles.
 */
function star_block_styles() {
	wp_enqueue_style( 'star-block-styles', get_theme_file_uri( '/inc/custom-block-styles.css' ), false );
}
add_action( 'enqueue_block_assets', 'star_block_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *  Add a title to posts that are missing titles
 *
 * @param string $title Post title.
 */
function star_post_title( $title ) {
	if ( $title == '' ) {
		return __( '(Untitled)', 'star' );
	} else {
		return $title;
	}
}
add_filter( 'the_title', 'star_post_title' );

/**
 * Check if the sidebar is active.
 *
 * @param string $classes css classes to be added to Body.
 */
function star_no_sidebars( $classes ) {
	/*
	 * Are sidebars hidden on the frontpage?
	 * Is the sidebar activated?
	 * Add 'no-sidebar' to the $classes array
	 */
	if ( is_front_page() && ! get_theme_mod( 'star_front_sidebar' ) || is_page() && ! get_theme_mod( 'star_show_sidebar_on_pages' ) || ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'star_no_sidebars' );

/**
 * Custom Css
 */
function star_customize_css() {
	echo '<style type="text/css">';
	if ( is_admin_bar_showing() ) {
		?>
		.main-navigation{top:32px;}

		@media screen and ( max-width: 782px ) {
			.main-navigation{top:46px;}
		}

		@media screen and ( max-width: 600px ) {
			.main-navigation{top:0px;}
		}
		<?php
	}
	echo '.site-title, .site-title a, .site-description {color:#' . esc_attr( get_header_textcolor() ) . "; }\n";

	$header_image = get_header_image();
	if ( ! empty( $header_image ) ) {
		?>
		.site-header {
		background: url(<?php header_image(); ?>) no-repeat bottom;
		-webkit-background-size: cover;
		-moz-background-size:    cover;
		-o-background-size:      cover;
		background-size:         cover;
		}
		<?php
	} else {
		/* No image has been chosen, check for background color. */
		echo '.site-header { background:' . esc_attr( get_theme_mod( 'star_header_bgcolor', '#95b8cf' ) ) . ';}';
		echo '#action:hover, #action:focus{text-shadow:none;}';
	}

	if ( ! get_theme_mod( 'star_hide_icon' ) ) {
		echo '.header-icon::before{content: "\\' . esc_attr( get_theme_mod( 'star_header_icon', 'f005' ) ) . '";}';
	}

	if ( ! display_header_text() ) {
		echo '#action{margin-top:160px;}';
	}

	echo '</style>' . "\n";
}
add_action( 'wp_head', 'star_customize_css' );
