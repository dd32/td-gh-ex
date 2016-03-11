<?php
/**
 * Namespace prefix abc_ = Alphabet Themes
 */

// Defining constants
$abc_theme_data = wp_get_theme( 'abacus' );
define( 'ABC_THEME_URL', get_template_directory_uri() );
define( 'ABC_THEME_TEMPLATE', get_template_directory() );
define( 'ABC_THEME_VERSION', trim( $abc_theme_data->Version ) );
define( 'ABC_THEME_NAME', $abc_theme_data->Name );

if ( ! isset( $content_width ) )
	$content_width = 860;

add_action( 'after_setup_theme', 'abc_setup' );
if ( ! function_exists( 'abc_setup' ) ) {
	function abc_setup() {
		load_theme_textdomain( 'abacus', ABC_THEME_TEMPLATE . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption'
		) );
		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'flex-height' => true,
			'flex-width' => true,
			'random-default' => true,
			'width' => apply_filters( 'abc_header_image_width', 1400 ),
			'height' => apply_filters( 'abc_header_image_height', 600 ),
		) );
		add_theme_support( 'custom-background', apply_filters( 'abc_custom_background_args', array(
			'default-color' => '2E3739',
		) ) );
		add_theme_support( 'jetpack-testimonial' );

		add_editor_style( array( 'css/admin/editor-style.css', '/css/font-awesome.css', abc_fonts_url() ) );

		register_nav_menu( 'top', __( 'Top Menu', 'abacus' ) );
		register_nav_menu( 'primary', __( 'Primary Menu', 'abacus' ) );

		add_image_size( 'abacus-testimonial-thumbnail', 60, 60, true );

		add_filter( 'use_default_gallery_style', '__return_false' );

		foreach ( glob( ABC_THEME_TEMPLATE . '/inc/*' ) as $filename ) {
			include $filename;
		}
	}
}

add_action( 'wp_enqueue_scripts', 'abc_enqueue' );
if ( ! function_exists( 'abc_enqueue' ) ) {
	function abc_enqueue() {
		wp_enqueue_script( 'jquery-mobile', ABC_THEME_URL .'/js/jquery.mobile.custom.js', array( 'jquery' ), '4.1.2', true );
		wp_enqueue_script( 'theme', ABC_THEME_URL .'/js/theme.js', array( 'jquery', 'jquery-mobile' ), '', true );

		wp_enqueue_style( 'theme-stylesheet', get_stylesheet_uri() );
		wp_enqueue_style( 'abc-google-fonts', abc_fonts_url(), array(), null );
		wp_enqueue_style( 'font-awesome', ABC_THEME_URL .'/css/font-awesome.css', false, '4.4.0', 'all' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
}

if ( ! function_exists( 'abc_fonts_url' ) ) {
	function abc_fonts_url() {
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Roboto, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'abacus' ) ) {
			$fonts[] = 'Roboto:300,400italic,700italic,400,700';
		}

		/*
		 * Translators: To add an additional character subset specific to your language,
		 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'abacus' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		return ( $fonts ) ? add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' ) : '';
	}
}

add_action( 'widgets_init', 'abc_widgets_init' );
if ( ! function_exists( 'abc_widgets_init' ) ) {
	function abc_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'abacus' ),
			'id' => 'sidebar',
			'description' => __( 'This section appears on the right of the main content on every page.', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Jumbo Headline', 'abacus' ),
			'id' => 'jumbo-headline',
			'description' => __( 'This section appears on the front page in the centre of the header image. Designed specifically for one Text widget. ', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="jumbo-headline %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Shop Categories', 'abacus' ),
			'id' => 'shop-categories',
			'description' => __( 'This section appears on the Front Page template below the featured section. Designed specifically for three widgets. ', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="cols cols-3 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Shop Banner', 'abacus' ),
			'id' => 'shop-banner',
			'description' => __( 'This section appears on the Front Page template above the tranding section. Designed specifically for one widget. ', 'abacus' ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}
}

add_filter( 'abc_custom_color_defaults', 'abacus_custom_color_defaults' );
function abacus_custom_color_defaults() {
	return array(
		'page_background_color' => '#ffffff',
		'site_title_color' => '#000',
		'site_description_color' => '##282828',
		'headers_color' => '#282828',
		'main_text_color' => '#282828',
		'post_title_color' => '#282828',
		'post_meta_color' => '#282828',
		'link_color' => '#0054a6',
		'link_hover_color' => '#003a73',
	);
}

add_filter( 'abc_fonts_manager_defaults', 'abacus_fonts_manager_defaults' );
function abacus_fonts_manager_defaults() {
	return array(
		'site_title_font' => 'Roboto||"Roboto", sans-serif',
		'site_title_font_size' => '32',
		'site_description_font' => 'Roboto||"Roboto", sans-serif',
		'site_description_font_size' => '16',
		'main_text_font' => 'Roboto||"Roboto", sans-serif',
		'main_text_font_size' => '16',
		'headers_font' => 'Roboto||"Roboto", sans-serif',
		'post_title_font' => 'Roboto||"Roboto", sans-serif',
		'post_title_font_size' => '32',
		'post_meta_font' => '"Georgia", serif',
		'post_meta_font_size' => '12',
	);
}

function abc_pagination() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>

	<div id="posts-pagination" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'abacus' ); ?></h1>
		<div class="previous">&nbsp;<?php next_posts_link( __( '&larr; Older posts', 'abacus' ) ); ?></div>
		<div class="next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'abacus' ) ); ?>&nbsp;</div>
	</div>

	<?php
	wp_reset_query();
}

function abc_search_title( $query  ) {
    $num = $query->found_posts;
    $type = ( isset( $query->query['post_type'] ) ) ? $query->query['post_type'] : 'post';
	$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
	$posts_per_page = $query->query_vars['posts_per_page'];

	$current_page_count = ( 1 == $paged ) ?  '1-' . $paged * $posts_per_page : ( $paged - 1 ) * $posts_per_page + 1 . '-' . $paged * $posts_per_page;
	$current_page_count = ( $query->max_num_pages == $paged ) ? ( $paged - 1 ) * $posts_per_page + 1 . '-' . $query->found_posts : $current_page_count;

	printf( __( '<span class="pull-left">%1$s</span><span class="displaying pull-right">%2$s of %3$s results for "%4$s"</span>', 'abacus'),
	    esc_attr( ucfirst( $type . 's' ) ),
	    $current_page_count,
	    absint( $query->found_posts ),
	    esc_html( get_search_query() )
	);
}

function abc_word_count() {
	return sprintf(
		__( '%s words', 'abacus' ),
		str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) )
	);
}

function abc_cart_link() {
	if ( is_cart() ) {
		$class = ' current-menu-item';
	} else {
		$class = '';
	}
	?>
	<li class="site-header-cart<?php echo esc_attr( $class ); ?>">
		<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'abacus' ); ?>">
			<?php echo wp_kses_data( WC()->cart->get_cart_total() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d Item', '%d Items', WC()->cart->get_cart_contents_count(), 'abacus' ), WC()->cart->get_cart_contents_count() ) );?></span>
		</a>
		<ul><li><?php the_widget( 'WC_Widget_Cart', 'title=' ); ?></li></ul>
	</li>
	<?php
}