<?php
/**
 * optimize functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package optimize
 */

if ( ! function_exists( 'optimize_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function optimize_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on optimize, use a find and replace
		 * to change 'optimize' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'optimize', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		//woocommerce plugin support
		add_theme_support( 'woocommerce' );
	
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'optimize-defaultthumb', 300, 275, true);
		add_image_size( 'optimize-latestthumb', 75, 60, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'optimize-navigation' => esc_html__( 'Primary', 'optimize' ),
			'footer-menu' => __('Footer Menu', 'optimize'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'optimize_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective optimize for widgets.
		add_theme_support( 'customize-selective-optimize-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 195,
			'width'       => 35,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
	
	function optimizepro_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'optimizepro_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '<a class="readmore btn btn-info" href="'.get_the_permalink().'" rel="nofollow">Read More...</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
	
	
endif;


add_action( 'after_setup_theme', 'optimize_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function optimize_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'optimize_content_width', 640 );
}
add_action( 'after_setup_theme', 'optimize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function optimize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'optimize' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'optimize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar(array(
		'name' => __( 'Header Widget', 'optimize' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	    'id' => 'headerwid',
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
		'name' => __( 'Footer 1', 'optimize' ),
	    'id' => 'opbottom1',
		'description'   => __('Footer widget area first from left','optimize'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name' => __( 'Footer 2', 'optimize' ),
	    'id' => 'opbottom2',
		'description'   => __('Footer widget area second from left','optimize'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));	

	register_sidebar(array(
		'name' => __( 'Footer 3', 'optimize' ),
	    'id' => 'opbottom3',
		'description'   => __('Footer widget area third from left','optimize'),		
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));	
}
add_action( 'widgets_init', 'optimize_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function optimize_scripts() {
	wp_enqueue_style( 'optimize-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-min-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-grid-min-css', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_script( 'optimize-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '431', true );
	wp_enqueue_script( 'optimize-backtotop', get_template_directory_uri() . '/js/scroll.js', array(), '3.2', true );
	wp_enqueue_script( 'bootstrap-bundle-min-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '431', true );

	wp_enqueue_script( 'optimize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'optimize_scripts' );

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

function optimize_pagenavigation() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer
	$translated = __( 'Page', 'optimize' ); // Supply translatable string

	echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
		'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
	) );
}
/**
 * Enqueue script for custom customize control.
 */
function optimize_custom_customize_enqueue() {
	wp_enqueue_style( 'optimize-customizer-css', get_stylesheet_directory_uri() . '/css/customizer-css.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'optimize_custom_customize_enqueue' );

if ( get_header_image() ) :
function optimize_footerscript() {
	$defaultprofilephoto = get_template_directory_uri() . '/images/header.png'; 	
	$custom_css = '
	#masthead{margin-bottom: 20px;background-size: cover;background-image:url('.esc_url( get_header_image() ).');}
	div#site-header{height:'.get_custom_header()->height.'px;}
	';

	wp_add_inline_style( 'optimize-style', $custom_css );
	
}
add_action('wp_enqueue_scripts', 'optimize_footerscript');
endif; 
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function optimize_backtotop_function() {
    echo '<a href="#" class="scrollup backtoup"><i class="fa fa-angle-up"></i></a>';
    
}
add_action( 'wp_footer', 'optimize_backtotop_function' );


/* ----------------------------------------------------------------------------------- */
/* Custom Search Form
  /*----------------------------------------------------------------------------------- */
function republic_search_form( $form ) {
	
	$form = '<div class="input-group"><form role="search" method="get" id="searchform" class="searchform" action="' .esc_url(home_url( '/' )). '" >
	<div><label class="screen-reader-text" for="s">' . _x( 'Search for:','Label','optimize' ) . '</label>
	<input type="text" class="input-group-field" placeholder="'. esc_attr_x( 'Search..','Placeholder','optimize' ) .'" value="' . get_search_query() . '" name="s" id="s" />
	<button type="submit" id="searchsubmit" class="input-group-button button"><i class="fa fa-search"></i></button>
	</div>
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'republic_search_form' );


/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */

function optimize_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = __('Home','optimize'); // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = esc_url(home_url('/'));
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . __('Archive by category','optimize').' "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . esc_html(get_the_title()) . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . esc_html(get_the_title()) . $after;
        }
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        //$cat = get_the_category($parent->ID); $cat = $cat[0];
        //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . __('Search results for','optimize').' "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . __('Posts tagged','optimize').' "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . __('Articles posted by ','optimize'). $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . __('Error 404','optimize') . $after;
    }

    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo 'Page' . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }

    echo '</div>';
}
add_action( 'optimize_before_single_posttitle', 'optimize_breadcrumbs' );



//---------------------------- [ Pagenavi Function ] ------------------------------//
 
function optimize_pagenavi() {
	global $wp_query;
	$big = 123456789;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array',
        'add_fragment' => ''
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<nav aria-label="Page navigation"><ul class="pagination">';
	            echo '<span class="page-item page-link disabled">'. $paged . ' of ' . $wp_query->max_num_pages .'</span>';
	            foreach ( $page_format as $page ) {
	                    echo '<li class="page-item page-link">'.$page.'</li>';
						
	            }
	           echo ' </ul></nav>';
	 }
}


/* ----------------------------------------------------------------------------------- */
/* About Author
/*----------------------------------------------------------------------------------- */
function optimize_author_profile(){
	?>
	<div id="author-bio">
	<h3><?php esc_attr_e('About ', 'optimize'); ?><?php the_author_posts_link(); ?></h3>
	<?php echo get_avatar( get_the_author_meta('ID'), 64 ); ?>
	<?php the_author_meta('description'); ?>                        
	</div>
	<?php
	}



/* ----------------------------------------------------------------------------------- */
/* Social Icons
/*----------------------------------------------------------------------------------- */
if ( ! function_exists( 'optimize_socialprofiles' ) ) :
	function optimize_socialprofiles(){		
			/*
			** Template to Render Social Icons on Top Bar
			*/
				echo '<div id="TopMenuSocial" class="socialfb">';
				for ($i = 1; $i < 8; $i++) : 
				$social = esc_attr(get_theme_mod('optimize_social_'.$i));
				if ( ($social != 'none') && ($social != '') ) : ?>
				<a class="hvr-ripple-out" href="<?php echo esc_url( get_theme_mod('optimize_social_url'.$i) ); ?>"><i class="fa fa-<?php echo esc_attr($social); ?>"></i></a>
				<?php endif; endfor;
				echo '</div>';
	}
endif;	

/* ------------------------------------------- */
/* Latest Posts
/*------------------------------------------- */
function optimize_latets_posts(){ ?>

<section id="latest-posts" class="widget widget_recent_entries">
<h2 class="widget-title"><?php esc_attr_e('Latest Posts', 'optimize'); ?></h2>
<?php 
$optimize_args = array( 
 'ignore_sticky_posts' => true,
 'showposts' => 5,
'orderby' => 'date',  );
$the_query = new WP_Query( $optimize_args );
 if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();
			 ?>
			 
 <div class="row latest-post">
    <div class="latest-img">
 <?php if ( has_post_thumbnail()) { ?>
         <?php optimize_latestpost_thumbnail(); ?>
	 <?php } ?>
	 </div>
	  <div class="latest-title">
	  <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
	 </div>
	 </div>
<?php endwhile; endif; wp_reset_postdata(); ?>
		</section>
<?php }