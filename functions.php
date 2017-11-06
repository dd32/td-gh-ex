<?php
/**
 * bb wedding bliss functions and definitions
 *
 * @package bb wedding bliss
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'bb_wedding_bliss_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
/* Breadcrumb Begin */
function bb_wedding_bliss_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url(home_url());
		echo '">';
		bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(', ');
			if (is_single()) {
				echo "<span> ";
				the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}

/* Theme Setup */
function bb_wedding_bliss_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'bb-wedding-bliss', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-wedding-bliss-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-wedding-bliss' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', bb_wedding_bliss_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'bb_wedding_bliss_setup' );

/* Theme Widgets Setup */
function bb_wedding_bliss_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on page sidebar', 'bb-wedding-bliss' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'bb-wedding-bliss' ),
		'description'   => __( 'Appears on footer', 'bb-wedding-bliss' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_wedding_bliss_widgets_init' );

/* Theme Font URL */
function bb_wedding_bliss_font_url() {
	$font_url = '';
	
	/* Translators: If there are any character that are
	* not supported by PT Sans, translate this to off, do not
	* translate into your own language.
	*/
	$ptsans = _x('on','PT Sans font:on or off','bb-wedding-bliss');
	
	/* Translators: If there are any character that are
	* not supported by Roboto, translate this to off, do not
	* translate into your own language.
	*/
	$roboto = _x('on','Roboto font:on or off','bb-wedding-bliss');
	
	/* Translators: If there are any character that are
	* not supported by Roboto Condensed, translate this to off, do not
	* translate into your own language.
	*/
	$roboto_cond = _x('on','Roboto Condensed font:on or off','bb-wedding-bliss');

	/* Translators: If there are any character that are
	* not supported by Roboto Condensed, translate this to off, do not
	* translate into your own language.
	*/
	$Unica_One = _x('on','Unica_One:on or off','bb-wedding-bliss');
	
	/* Translators: If there are any character that are
	* not supported by Roboto Condensed, translate this to off, do not
	* translate into your own language.
	*/
	$Vollkorn = _x('on','Vollkorn:on or off','bb-wedding-bliss');
	
	if('off' !== $ptsans || 'off' !==  $roboto || 'off' !== $roboto_cond){
		$font_family = array();
		
		if('off' !== $ptsans){
			$font_family[] = 'PT Sans:300,400,600,700,800,900';
		}
		
		if('off' !== $roboto){
			$font_family[] = 'Roboto:400,700';
		}
		
		if('off' !== $roboto_cond){
			$font_family[] = 'Roboto Condensed:400,700';
		}

		if('off' !== $Unica_One){
			$font_family[] = 'Unica One';
		}

		if('off' !== $Vollkorn){
			$font_family[] = 'Vollkorn';
		}
		
		$query_args = array(
			'family'	=> urlencode(implode('|',$font_family)),
		);
		
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	}		
	return $font_url;
}
	
/* Theme enqueue scripts */
function bb_wedding_bliss_scripts() {
	wp_enqueue_style( 'bb-wedding-bliss-font', bb_wedding_bliss_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'bb-wedding-bliss-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bb-wedding-bliss-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'bb-wedding-bliss-customcss', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_style( 'jquery-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );
		wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
		wp_enqueue_script( 'bb-wedding-bliss-custom-front', get_template_directory_uri() . '/js/custom-front.js', array('jquery') ,'',true);
	}
	wp_enqueue_script( 'bb-wedding-bliss-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('bb-wedding-bliss-ie', get_template_directory_uri().'/css/ie.css', array('bb-wedding-bliss-ie-style'));
	wp_style_add_data( 'bb-wedding-bliss-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'bb_wedding_bliss_scripts' );



define('bb_wedding_bliss_CREDIT','https://www.themeshopy.com/','bb-wedding-bliss');

if ( ! function_exists( 'bb_wedding_bliss_credit' ) ) {
	function bb_wedding_bliss_credit(){
			echo "<a href=".esc_url(bb_wedding_bliss_CREDIT)." target='_blank' rel='nofollow'>ThemeShopy</a>";
	}
}

define('bb_wedding_bliss_CREDIT1','https://www.themeshopy.com/premium/bb-wedding-bliss-wordpress-theme/','bb-wedding-bliss');

if ( ! function_exists( 'bb_wedding_bliss_credit1' ) ) {
	function bb_wedding_bliss_credit1(){
			echo "<a href=".esc_url(bb_wedding_bliss_CREDIT1)." target='_blank' rel='nofollow'>Wedding WorPress Theme</a>";
	}
}

/*radio button sanitization*/

 function bb_wedding_bliss_sanitize_choices( $input, $setting ) {

    global $wp_customize; 

    $control = $wp_customize->get_control( $setting->id ); 

    if ( array_key_exists( $input, $control->choices ) ) {

        return $input;

    } else {

        return $setting->default;

    }
}


/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';
/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';
/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';
?>