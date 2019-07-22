<?php
/**
 * Academic Education functions and definitions
 * @package Academic Education
 */


/* Theme Setup */
if ( ! function_exists( 'academic_education_setup' ) ) :

function academic_education_setup() {

	$GLOBALS['content_width'] = apply_filters( 'academic_education_content_width', 640 );

	load_theme_textdomain( 'academic-education', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('academic-education-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'academic-education' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		)
	);

	add_editor_style( array( 'assets/css/editor-style.css', academic_education_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'academic_education_activation_notice' );
	}
}
endif; // academic_education_setup
add_action( 'after_setup_theme', 'academic_education_setup' );

// Notice after Theme Activation
function academic_education_activation_notice() {
	echo '<div class="welcomepage notice notice-success is-dismissible">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'academic-education' ) .'</h3>';
		echo '<p>'. esc_html__( ' Our sincere thanks for choosing our academic education theme. We assure you a high performing theme for your academic business. Please proceed towards welcome section to start an amazing journey with us. ', 'academic-education' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=academic_education_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'academic-education' ) .'</a></p>';
	echo '</div>';
}

/*Site URL*/
define('ACADEMIC_EDUCATION_FREE_THEME_DOC','https://logicalthemes.com/docs/free-academic-education/','academic-education');
define('ACADEMIC_EDUCATION_SUPPORT','https://wordpress.org/support/theme/academic-education/','academic-education');
define('ACADEMIC_EDUCATION_BUY_NOW','https://www.logicalthemes.com/themes/premium-academic-education-wordpress-theme/','academic-education');
define('ACADEMIC_EDUCATION_LIVE_DEMO','https://logicalthemes.com/academic-education-pro/','academic-education');
define('ACADEMIC_EDUCATION_PRO_DOC','https://logicalthemes.com/docs/academic-education-pro/','academic-education');
define('ACADEMIC_EDUCATION_CREDIT','https://www.logicalthemes.com/themes/free-academic-education-wordpress-theme/','academic-education');
if ( ! function_exists( 'academic_education_credit' ) ) {
	function academic_education_credit(){
		echo "<a href=".esc_url(ACADEMIC_EDUCATION_CREDIT)." target='_blank'>".esc_html__('Education WordPress Theme','academic-education')."</a>";
	}
}

/*radio button sanitization*/
function academic_education_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function academic_education_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'academic_education_loop_columns');
	if (!function_exists('academic_education_loop_columns')) {
		function academic_education_loop_columns() {
		return 3; // 3 products per row
	}
}

function academic_education_sanitize_dropdown_pages($page_id, $setting) {
	// Ensure $input is an absolute integer.
	$page_id = absint($page_id);
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ('publish' == get_post_status($page_id)?$page_id:$setting->default);
}

/* Theme Widgets Setup */
function academic_education_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'academic-education' ),
		'description'   => __( 'Appears on blog page sidebar', 'academic-education' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'academic-education' ),
		'description'   => __( 'Appears on posts and pages', 'academic-education' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'academic-education' ),
		'description'   => __( 'Appears on posts and pages', 'academic-education' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'academic-education' ),
		'description'   => __( 'Appears in footer', 'academic-education' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'academic_education_widgets_init' );

function academic_education_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */
function academic_education_scripts() {
	wp_enqueue_style( 'academic-education-font', academic_education_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'academic-education-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'academic-education-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );	 

		// Slider
		$academic_education_slider_heading_color = get_theme_mod('academic_education_slider_heading_color', '');
	    $academic_education_slider_heading_font_family = get_theme_mod('academic_education_slider_heading_font_family', '');
	    $academic_education_slider_heading_font_size = get_theme_mod('academic_education_slider_heading_font_size', '');
	    // "a" tag
		$academic_education_slider_atag_color = get_theme_mod('academic_education_slider_atag_color', '');
	    $academic_education_slider_atag_font_family = get_theme_mod('academic_education_slider_atag_font_family', '');
	    // Paragraph
	    $academic_education_slider_paragraph_color = get_theme_mod('academic_education_slider_paragraph_color', '');
	    $academic_education_slider_paragraph_font_family = get_theme_mod('academic_education_slider_paragraph_font_family', '');
	    $academic_education_slider_paragraph_font_size = get_theme_mod('academic_education_slider_paragraph_font_size', '');
	    // Topbar section
	    // topbar
	    $academic_education_topbar_paragraph_color = get_theme_mod('academic_education_topbar_paragraph_color', '');
	    $academic_education_topbar_paragraph_font_size = get_theme_mod('academic_education_topbar_paragraph_font_size', '');
	    //logo
	    $academic_education_topbar_atag_color = get_theme_mod('academic_education_topbar_atag_color', '');
	    //logo heading
	    $academic_education_topbar_heading_font_family = get_theme_mod('academic_education_topbar_heading_font_family', '');
	    $academic_education_topbar_heading_font_size = get_theme_mod('academic_education_topbar_heading_font_size', '');
	    //description
	    $academic_education_description_color = get_theme_mod('academic_education_description_color', '');
	    $academic_education_description_font_family = get_theme_mod('academic_education_description_font_family', '');
	    $academic_education_description_font_size = get_theme_mod('academic_education_description_font_size', '');
	    //Contact
	    $academic_education_contact_color = get_theme_mod('academic_education_contact_color', '');
	    $academic_education_contact_font_size = get_theme_mod('academic_education_contact_font_size', '');

	    // Our course
	    $academic_education_course_heading_color = get_theme_mod('academic_education_course_heading_color', '');
	    $academic_education_course_heading_font_family = get_theme_mod('academic_education_course_heading_font_family', '');
	    $academic_education_course_heading_font_size = get_theme_mod('academic_education_course_heading_font_size', '');
	    // "a" tag
		$academic_education_course_atag_color = get_theme_mod('academic_education_course_atag_color', '');
	    $academic_education_course_atag_font_family = get_theme_mod('academic_education_course_atag_font_family', '');
	    $academic_education_course_atag_font_size = get_theme_mod('academic_education_course_atag_font_size', '');
	    // Paragraph
	    $academic_education_course_paragraph_color = get_theme_mod('academic_education_course_paragraph_color', '');
	    $academic_education_course_paragraph_font_family = get_theme_mod('academic_education_course_paragraph_font_family', '');
	    $academic_education_course_paragraph_font_size = get_theme_mod('academic_education_course_paragraph_font_size', '');


	    $custom_css ='
			#slider .inner_carousel h2{
			    color:'.esc_html($academic_education_slider_heading_color).'!important;
			    font-family: '.esc_html($academic_education_slider_heading_font_family).'!important;
			    font-size: '.esc_html($academic_education_slider_heading_font_size).'!important;
			}
			.more-btn a span{
				color:'.esc_html($academic_education_slider_atag_color).'!important;
			    font-family: '.esc_html($academic_education_slider_atag_font_family).'!important;
			}
			#slider .inner_carousel p{
			    color:'.esc_html($academic_education_slider_paragraph_color).'!important;
			    font-family: '.esc_html($academic_education_slider_paragraph_font_family).'!important;
			    font-size: '.esc_html($academic_education_slider_paragraph_font_size).'!important;
			}
			.timebox span,.social-media i,.timebox i{
			    color:'.esc_html($academic_education_topbar_paragraph_color).'!important;
			    font-size: '.esc_html($academic_education_topbar_paragraph_font_size).'!important;
			}
			.logo a{
				color:'.esc_html($academic_education_topbar_atag_color).'!important;
			}
			.logo h1{
				font-family: '.esc_html($academic_education_topbar_heading_font_family).'!important;
			    font-size: '.esc_html($academic_education_topbar_heading_font_size).'!important;
			}
			.logo p{
			    color:'.esc_html($academic_education_description_color).'!important;
			    font-family: '.esc_html($academic_education_description_font_family).'!important;
			    font-size: '.esc_html($academic_education_description_font_size).'!important;
			}
			.call i, .email i,p.infotext,.call p, .email p{
			    color:'.esc_html($academic_education_contact_color).'!important;
			    font-size: '.esc_html($academic_education_contact_font_size).'!important;
			}
			.single-layout h3{
			    color:'.esc_html($academic_education_course_heading_color).'!important;
			    font-family: '.esc_html($academic_education_course_heading_font_family).'!important;
			    font-size: '.esc_html($academic_education_course_heading_font_size).'!important;
			}
			.button a{
				color:'.esc_html($academic_education_course_atag_color).'!important;
			    font-family: '.esc_html($academic_education_course_atag_font_family).'!important;
			    font-size: '.esc_html($academic_education_course_atag_font_size).'!important;
			}
			.single-layout p{
			    color:'.esc_html($academic_education_course_paragraph_color).'!important;
			    font-family: '.esc_html($academic_education_course_paragraph_font_family).'!important;
			    font-size: '.esc_html($academic_education_course_paragraph_font_size).'!important;
			}
			';

	wp_add_inline_style( 'academic-education-basic-style',$custom_css );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'academic-education-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'academic_education_scripts' );

function academic_education_ie_stylesheet(){
	wp_enqueue_style('academic-education-ie', get_template_directory_uri().'/assets/css/ie.css', array('academic-education-basic-style'));
	wp_style_add_data( 'academic-education-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','academic_education_ie_stylesheet');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/get-started/get-started.php';
require get_template_directory() . '/inc/custom-header.php';