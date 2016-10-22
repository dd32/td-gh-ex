<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
include_once('baztro.php');
include_once('includes/installs.php');
include_once('includes/core/core.php');
include_once('includes/ltposts.php');

// Implement the Custom Header feature.
require get_template_directory() . '/includes/custom-header.php';
require get_template_directory() . '/includes/customizer.php';

function optimize_scripts() {
	wp_enqueue_style( 'optimize-style', get_stylesheet_uri() );
	wp_enqueue_style( 'optimize-font-awesome', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
	if ( is_rtl() ) {
	wp_enqueue_style( 'optimize-rtl-css', get_template_directory_uri() . '/css/rtl.min.css' );
}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'optimize_scripts' );

/**
 * Enqueue script for custom customize control.
 */
function optimize_custom_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_stylesheet_directory_uri() . '/css/customizer-css.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'optimize_custom_customize_enqueue' );

 function optimize_googlemeta() {
       	if (of_get_option('optimize_headad') != '') {
            echo '' . of_get_option('optimize_headad') . '' . "\n";
        } 
    }
add_action('wp_head', 'optimize_googlemeta');

function optimize_post_meta_data() {
	printf( __( '%2$s  %4$s', 'optimize' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<span itemprop="datePublished" class="timestamp updated">%3$s</span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard" itemprop="author" itemtype="http://schema.org/Person"><span class="fn">%3$s</span></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'optimize' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}

function optimize_theme_setup() { 

		add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
		set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails, 200 pixels wide by 200 pixels tall, hard crop mode
		add_image_size( 'widgetthumb', 60, 60, true );

	    load_theme_textdomain('optimize', get_template_directory() . '/languages');
			 //woocommerce plugin support
		add_theme_support( 'woocommerce' );
        add_editor_style();
		add_theme_support( 'title-tag' );
        add_theme_support('automatic-feed-links');

		register_nav_menu( 'primary', __( 'Navigation Menu', 'optimize' ) );
		register_nav_menu( 'Footer-menu', __( 'Footer Menu', 'optimize' ) );
		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'esell_custom_background_args', array(
		'default-color' => 'F3F3F3',
		'default-image' => '',
		) ) );
// Sets up the content width value based on the theme's design.
		global $content_width;
		if ( ! isset( $content_width ) ){
		$content_width = 770;
		}

	}

	/* Excerpt ********************************************/

    function optimize_excerptlength_teaser($length) {
    return 10;
    }
    function optimize_excerptlength_index($length) {
    return 45;
    }
    function optimize_excerptmore($more) {
    return '...';
    }

    function optimize_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);

    add_filter('excerpt_more', $more_callback);

    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = ''.$output.'';
    echo $output;    }

add_action( 'after_setup_theme', 'optimize_theme_setup' );

/* Widgets ********************************************/

    function optimize_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	    'id' => 'opsidebar',
	));
	register_sidebar(array(
		'name' => __( 'Below Navigation', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	    'id' => 'belownavi',
	));
	register_sidebar(array(
		'name' => __( 'After Single Post', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	    'id' => 'afterpost',
	));
	register_sidebar(array(
		'name' => __( 'After Page', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	    'id' => 'afterpage',
	));
	register_sidebar(array(
		'name' => __( 'Footer 1', 'optimize' ),
	    'id' => 'opbottom1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer 2', 'optimize' ),
	    'id' => 'opbottom2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Footer 3', 'optimize' ),
	    'id' => 'opbottom3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));		
}
add_action('widgets_init', 'optimize_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//

function optimize_pagenavi() {
  global $wp_query;
	$big = 123456789;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="wp-pagenavi">';
	            echo '<span class="pages">'. $paged . ' of ' . $wp_query->max_num_pages .'</span>';
	            foreach ( $page_format as $page ) {
	                    echo "$page";
	            }
	           echo '</div>';
	 }
}

/* ----------------------------------------------------------------------------------- */
/* Customize Comment Form
/*----------------------------------------------------------------------------------- */
add_filter( 'comment_form_default_fields', 'optimize_comment_form_fields' );
function optimize_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-3 columns">' . '<span class="prefix"><i class="fa fa-user"></i>' . __( 'Name','optimize' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</span> </div>' .
                    '<div class="small-9 columns"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'email'  => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-3 columns">' . '<span class="prefix"><i class="fa fa-envelope-o"></i>' . __( 'Email','optimize' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</span></div> ' .
                    '<div class="small-9 columns"><input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'url'    => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-3 columns">' . '<span class="prefix"><i class="fa fa-external-link"></i>' . __( 'Website','optimize' ) . '</span> </div>' .
                    '<div class="small-9 columns"><input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div>'        
    );

    return $fields;

}

add_filter( 'comment_form_defaults', 'optimize_comment_form' );
function optimize_comment_form( $argsbutton ) {
        $argsbutton['class_submit'] = 'button'; 
    return $argsbutton;
}
?>