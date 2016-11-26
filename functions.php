<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
include_once('baztro.php');
include_once('includes/installs.php');
include_once('includes/core/core.php');
include_once('includes/metaboxpage.php');
include_once('includes/metaboxsingle.php');
include_once('includes/template-tags.php');

// Implement the Custom Header feature.
require get_template_directory() . '/includes/custom-header.php';
require get_template_directory() . '/includes/customizer.php';

function promax_scripts() {
	wp_enqueue_style( 'promax-style', get_stylesheet_uri() );
	wp_enqueue_style( 'promax-font-awesome', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
		if (of_get_option('promax_favicon') != '') {
			echo '<link rel="shortcut icon" href="' . esc_url(of_get_option('promax_favicon')) . '"/>' . "\n";
	}
	if ( is_rtl() ) {
	wp_enqueue_style( 'promax-rtl-css', get_template_directory_uri() . '/css/rtl.css' );
}
		//Custom css output	
		$custom_css = html_entity_decode(of_get_option('promax_customcss'));
		wp_add_inline_style( 'promax-style', $custom_css );	  
}
add_action( 'wp_enqueue_scripts', 'promax_scripts' );

/**
 * Enqueue script for custom customize control.
 */
function promax_custom_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_stylesheet_directory_uri() . '/css/customizer-css.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'promax_custom_customize_enqueue' );


add_filter( 'wp_nav_menu_items', 'promax_home_link', 10, 2 );

function promax_home_link($items, $promax_args) {
	if ($promax_args->theme_location == 'primary')
	$class = 'class="current_page_item home-icon"';
	else
	$class = 'class="home-icon"';
	$homeMenuItem =
	'<li ' . $class . '>' .
	$promax_args->before .
	'<a href="' .esc_url(home_url( '/' )) . '" title="Home">' .
	$promax_args->link_before . '<i class="fa fa-home"></i>' . $promax_args->link_after .
	'</a>' .
	$promax_args->after .
	'</li>';
	$items = $homeMenuItem . $items;
	return $items;
	}

//function to call first uploaded image in functions file
function promax_main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}



	
function promax_theme_setup() { 
		if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
	}	
		add_image_size( 'defaultthumb', 262, 200, true);
		add_image_size( 'popularpost', 340, 154, true);
		add_image_size( 'latestpostthumb', 75, 75, true);
		add_image_size( 'promax_singlefull', 816, 500 );
		//woocommerce plugin support
		add_theme_support( 'woocommerce' );
global $content_width;
		if ( ! isset( $content_width ) ) {
		$content_width = 670;
	}
		add_theme_support('title-tag');
	//theme text domain for languages
	    load_theme_textdomain('promax', get_template_directory() . '/languages');
        add_editor_style();
        add_theme_support('automatic-feed-links');
		}
		// This theme uses wp_nav_menu() location.

		register_nav_menus(
			array(
 				'promax-navigation' => __('Navigation', 'promax'),
 				'primary' => __('Primary', 'promax'),
 				'footer-menu' => __('Footer Menu', 'promax'),
				)		
		);
		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'promax_custom_logo_args', array(
			'height' => 80,
			'width' => 460,
			'flex-height' => true,
			'flex-width' => true,
		) ) );
		// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'promax_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );
		
		
	add_action( 'after_setup_theme', 'promax_theme_setup' );
	


/* Excerpt ********************************************/

    function promax_excerptlength_teaser($length) {
    return 10;
    }
    function promax_excerptlength_index($length) {
    return 25;
    }
    function promax_excerptmore($more) {
    return '...';
    }
    
    
    function promax_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);
 
    add_filter('excerpt_more', $more_callback);
   
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = ''.$output.'';
    echo $output;
    }

	

/* Widgets ********************************************/

    function promax_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'promax' ),
	    'id' => 'prosidebar',
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'After Single Post Content', 'promax' ),
		'id' => 'aftersinglepost',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'After Page Content', 'promax' ),
		'id' => 'aftersinglepage',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	
	register_sidebar(array(
		'name' => __( 'Header Right Widget', 'promax' ),
		'id' => 'headerban',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => __( 'Below Navigation Widget', 'promax' ),
		'id' => 'belownaviwid',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	
	register_sidebar(array(
		'name' => __( 'Bottom Menu 1', 'promax' ),
		'id' => 'probottom1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Bottom Menu 2', 'promax' ),
		'id' => 'probottom2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Bottom Menu 3', 'promax' ),
		'id' => 'probottom3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	
}
add_action('widgets_init', 'promax_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//
function promax_pagenavi() {
	global $wp_query;
	$translated = __( 'Page', 'promax' ); // Supply translatable string
	$big = 999999999;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
		'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>',
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


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'promax_register_required_plugins' );

function promax_register_required_plugins() {

   $plugins = array(

	
		
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),
		array(
			'name'      => 'Menu Icons',
			'slug'      => 'menu-icons',
			'required'  => false,
		),

	);


	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


);	tgmpa( $plugins, $config );

}

/* ----------------------------------------------------------------------------------- */
/* Customize Comment Form
/*----------------------------------------------------------------------------------- */
add_filter( 'comment_form_default_fields', 'promax_comment_form_fields' );
function promax_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
     $fields   =  array(
        'author' => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns">' . '<span class="prefix"><i class="fa fa-user"></i>' . ( $req ? ' <span class="required">*</span>' : '' ) . '</span> </div>' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="' . __('Name','promax').'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'email'  => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns">' . '<span class="prefix"><i class="fa fa-envelope-o"></i>' . ( $req ? ' <span class="required">*</span>' : '' ) . '</span></div> ' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="' . __('Email','promax').'" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'url'    => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns">' . '<span class="prefix"><i class="fa fa-external-link"></i>' . '</span> </div>' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="' . __('Website','promax').'" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div>'        
    );
    
    return $fields;
    
    
}

add_filter( 'comment_form_defaults', 'promax_comment_form' );
function promax_comment_form( $argsbutton ) {
        $argsbutton['class_submit'] = 'button'; 
    
    return $argsbutton;
}


?>