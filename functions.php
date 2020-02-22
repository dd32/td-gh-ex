<?php
/**
* functions.php
*
* @author    Franchi Design
* @package   Atomy
* @version   1.0.5
*/


/* Setup
========================================================================== */

if ( ! function_exists( 'atomy_setup' ) ) : 
    function atomy_setup() {
		load_theme_textdomain( 'atomy');
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
        // Add theme support Title-tag
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		// Custom size images
		add_image_size('atomy_big', 4000, 2000, true); 
		add_image_size('atomy_article',1500,800,true);
		add_image_size('atomy_portfolio',1200,800,true);
		add_image_size('atomy_slide',400,500,true);
		add_image_size('atomy_archive',1000,550,true);
		// Add Menu location
		register_nav_menus( array(
			'menu-1' => esc_html__('Primary', 'atomy'),
		) );
		// Switch default core markup for search form, comment form, and comments
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		// Support for background Image
		add_theme_support( 'custom-background', apply_filters( 'atomy_custom_background_args', array(
			'default-color' => 'fafafa',
		) ) );
        // Support for Video
		add_theme_support( 'custom-header', array(
			'video' => true,
		));
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
add_action('after_setup_theme','atomy_setup');

/* Layout
========================================================================== */
function atomy_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('atomy_content_width',640);
}
add_action('after_setup_theme','atomy_content_width',0);

/* Widget Area
========================================================================== */

function atomy_widgets_init() {

	// Widget primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__('Sidebar Blog','atomy'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Card With Sidebar Section
	register_sidebar( array(
		'name'          => esc_html__('Card With Sidebar Section/Sidebar Store','atomy'), 
		'id'            => 'sidebar-3',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-featured %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-featured-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact Header
	register_sidebar( array(
		'name'          => esc_html__('Contact Header','atomy'),
		'id'            => 'sidebar-8',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact
	register_sidebar( array(
		'name'          => esc_html__('Contact Body','atomy'),
		'id'            => 'sidebar-9',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Contact Sidebar
	register_sidebar( array(
		'name'          => esc_html__('Contact Sidebar','atomy'),
		'id'            => 'sidebar-10',
		'description'   => esc_html__('Add widgets here.','atomy'),
		'before_widget' => '<section id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-footer-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services One
	register_sidebar( array(
		'name'          => esc_html__('Services One','atomy'),
		'id'            => 'sidebar-15',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services Two
	register_sidebar( array(
		'name'          => esc_html__('Services Two','atomy'),
		'id'            => 'sidebar-16',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
		'after_title'   => '</h2>',
	) );

	// Widget Services Three
	register_sidebar( array(
		'name'          => esc_html__('Services Three','atomy'),
		'id'            => 'sidebar-17',
		'description'   => esc_html__('Enter a Widget','atomy'),
		'before_widget' => '<div id="%1$s" class="badge-promo-widget-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-popup-title">',
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
	// AOS Animate
	wp_enqueue_script('aos-js',get_template_directory_uri() . '/js/aos.min.js', array(), '2.0.0', false );
	wp_enqueue_style('aos-css', get_template_directory_uri(). '/css/aos.min.css');
	// Atom Script
	wp_enqueue_script('atomy-custom-script-js', get_template_directory_uri() . '/js/atomy-custom-script.js', array(), 'v1.0.5', true );
	wp_enqueue_script('skip-link-focus-fix-js', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// Comments
	if ( is_singular() && comments_open() && get_theme_mod( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomy_scripts' );

/* Require
========================================================================== */

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Implement the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';

// Functions which enhance the theme by hooking into WordPress
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-controls.php';


/* Woocommerce
========================================================================== */

// Add thema Support 
function atomy_add_woocommerce_support() {
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'atomy_add_woocommerce_support');

// Ensure cart contents update when products are added to the cart via AJAX
function atomy_header_add_to_cart_fragment( $fragments ) {
 
	ob_start();
	$count = WC()->cart->cart_contents_count;
	?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" data-tooltip="<?php esc_html_e('Go to the cart','atomy');?>"> <i class="<?php echo esc_html( get_theme_mod( 'at_icon_cart_change','fas fa-shopping-cart')); ?>"></i><?php
	if ( $count > 0 ) {
			?>
			<span class="cart-contents-count"><?php echo esc_html( $count,'atomy' ); ?></span>
			<?php            
	}
			?></a><?php

	$fragments['a.cart-contents'] = ob_get_clean();
	 
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'atomy_header_add_to_cart_fragment' );

//Hide category product count in product archives
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

//Display product category descriptions under category image/title on woocommerce shop page */

add_action( 'woocommerce_after_subcategory_title', 'atomy_add_cat_description', 12);
function atomy_add_cat_description ($category) {
$cat_id=$category->term_id;
$prod_term=get_term($cat_id,'product_cat');
$description=$prod_term->description;
echo '<div class="shop_cat_desc"><p>'.$description.'</p></div>';
}

// Change the breadcrumb separator
add_filter( 'woocommerce_breadcrumb_defaults', 'atomy_change_breadcrumb_delimiter' );
function atomy_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}

// Script custom select
function atomy_select_dropdown() {
	wp_enqueue_script( 'select2js', get_stylesheet_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '4.0.6', true );
	wp_enqueue_style( 'atomy-select2css', get_stylesheet_directory_uri() . '/css/atomy-select2.css' , array(), '4.0.6', 'all' );
	wp_enqueue_script( 'selectinit', get_stylesheet_directory_uri() . '/js/select2-init.js', array( 'select2js' ), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'atomy_select_dropdown');


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


/* Add Menu Fallback
========================================================================== */

function atomy_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' .admin_url( 'nav-menus.php' ) . '">' . $before .__('Add a menu','atomy') . $after . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}


/* Include script and styles for class add Panel
========================================================================== */

function atomy_pe_customize_controls_scripts() {

	wp_enqueue_script( 'atomy-pe-customize-controls', get_theme_file_uri( '/assets/js/atomy-pe-customize-controls.js' ), array(), '1.0', true );
}

add_action( 'customize_controls_enqueue_scripts', 'atomy_pe_customize_controls_scripts' );

function atomy_pe_customize_controls_styles() {

	wp_enqueue_style( 'atomy-pe-customize-controls', get_theme_file_uri( '/assets/css/atomy-pe-customize-controls.css' ), array(), '1.0' );
}

add_action( 'customize_controls_print_styles', 'atomy_pe_customize_controls_styles' );

function atomy_pe_customize_register( $wp_customize ) {

$wp_customize->register_panel_type( 'Atomy_WP_Customize_Panel' );
$wp_customize->register_section_type( 'Atomy_WP_Customize_Section' );

}

add_action( 'customize_register', 'atomy_pe_customize_register' );

/* Custom Navigation
========================================================================== */

function atomy_the_post_navigation( $args = array() ) {
	$args = wp_parse_args( $args, array(
			'prev_text'          => '<i class="far fa-arrow-alt-circle-left mr-2"></i>' . __( 'Previous Post:','atomy').'<br><span class="at-span-link-blog">'.'%title'.'</span>',
			'next_text'          =>  __( 'Next Post:','atomy') . '<i class="far fa-arrow-alt-circle-right ml-2"></i>'.'<br><span class="at-span-link-blog">'.'%title'.'</span>',
			'in_same_term'       => false,
			'excluded_terms'     => '',
			'taxonomy'           => 'category',
			'screen_reader_text' => __('Post navigation','atomy'),
	) );

	$navigation = '';

	$previous = get_previous_post_link(
			'<div class="nav-previous">%link</div>',
			$args['prev_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
	);

	$next = get_next_post_link(
			'<div class="nav-next">%link</div>',
			$args['next_text'],
			$args['in_same_term'],
			$args['excluded_terms'],
			$args['taxonomy']
	);

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
			$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

	return $navigation;
}

/* Google Font site
========================================================================== */

function atomy_custom_add_google_fonts() {
	wp_enqueue_style( 'atomy-custom-google-fonts', 'https://fonts.googleapis.com/css?family=Inconsolata:200,300,400,500,600,700,800,900|Indie+Flower:200,300,400,500,600,700,800,900|Lato:200,300,400,500,600,700,800,900|Montserrat:200,300,400,500,600,700,800,900|Roboto:200,300,400,500,600,700,800,900|Text+Me+One:200,300,400,500,600,700,800,900|Titillium+Web:200,300,400,500,600,700,800,900|Ubuntu:200,300,400,500,600,700,800,900',false );
	
}
add_action( 'wp_enqueue_scripts', 'atomy_custom_add_google_fonts' );


/* Custom button Pause/Play
========================================================================== */

add_filter( 'header_video_settings', 'atomy_video_settings');
function atomy_video_settings( $settings ) {
  $settings['l10n'] = array(
    'pause'      => '<i class="fas fa-pause"></i>',
    'play'       => '<i class="fas fa-play"></i>',
  );
  return $settings;
}

/* Breadcrumbs
========================================================================== */

function atomy_custom_breadcrumbs() {
       
	// Settings
	$separator          = '&gt;';
	$breadcrums_id      = 'breadcrumbs';
	$breadcrums_class   = 'breadcrumbs';
	$home_title         = 'Home';
		
	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';
		 
	// Get the query & post information
	global $post,$wp_query;
		 
	// Do not display on the homepage
	if ( !is_front_page() ) {
		 
			// Build the breadcrums
			echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
				 
			// Home page
			echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
			echo '<li class="separator separator-home"> ' . $separator . ' </li>';
				 
			if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
						
					echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
						
			} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
						
					// If post is a custom post type
					$post_type = get_post_type();
						
					// If it is a custom post type display name and link
					if($post_type != 'post') {
								
							$post_type_object = get_post_type_object($post_type);
							$post_type_archive = get_post_type_archive_link($post_type);
						
							echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
							echo '<li class="separator"> ' . $separator . ' </li>';
						
					}
						
					$custom_tax_name = get_queried_object()->name;
					echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
						
			} else if ( is_single() ) {
						
					// If post is a custom post type
					$post_type = get_post_type();
						
					// If it is a custom post type display name and link
					if($post_type != 'post') {
								
							$post_type_object = get_post_type_object($post_type);
							$post_type_archive = get_post_type_archive_link($post_type);
						
							echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
							echo '<li class="separator"> ' . $separator . ' </li>';
						
					}
						
					// Get post category info
					$category = get_the_category();
					 
					if(!empty($category)) {
						
							// Get last category post is in
							$last_category = end(array_values($category));
								
							// Get parent any categories and create array
							$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
							$cat_parents = explode(',',$get_cat_parents);
								
							// Loop through parent categories and store in variable $cat_display
							$cat_display = '';
							foreach($cat_parents as $parents) {
									$cat_display .= '<li class="item-cat">'.$parents.'</li>';
									$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
							}
					 
					}
						
					// If it's a custom post type within a custom taxonomy
					$taxonomy_exists = taxonomy_exists($custom_taxonomy);
					if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
								 
							$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
							$cat_id         = $taxonomy_terms[0]->term_id;
							$cat_nicename   = $taxonomy_terms[0]->slug;
							$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
							$cat_name       = $taxonomy_terms[0]->name;
						 
					}
						
					// Check if the post is in a category
					if(!empty($last_category)) {
							echo $cat_display;
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
								
					// Else if post is in a custom taxonomy
					} else if(!empty($cat_id)) {
								
							echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
							echo '<li class="separator"> ' . $separator . ' </li>';
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
						
					} else {
								
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
								
					}
						
			} else if ( is_category() ) {
						 
					// Category page
					echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
						 
			} else if ( is_page() ) {
						 
					// Standard page
					if( $post->post_parent ){
								 
							// If child page, get parents 
							$anc = get_post_ancestors( $post->ID );
								 
							// Get parents in the right order
							$anc = array_reverse($anc);
								 
							// Parent page loop
							if ( !isset( $parents ) ) $parents = null;
							foreach ( $anc as $ancestor ) {
									$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
									$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
							}
								 
							// Display parent pages
							echo $parents;
								 
							// Current page
							echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
								 
					} else {
								 
							// Just display current page if not parents
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
								 
					}
						 
			} else if ( is_tag() ) {
						 
					// Tag page
						 
					// Get tag information
					$term_id        = get_query_var('tag_id');
					$taxonomy       = 'post_tag';
					$args           = 'include=' . $term_id;
					$terms          = get_terms( $taxonomy, $args );
					$get_term_id    = $terms[0]->term_id;
					$get_term_slug  = $terms[0]->slug;
					$get_term_name  = $terms[0]->name;
						 
					// Display the tag name
					echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
				 
			} elseif ( is_day() ) {
						 
					// Day archive
						 
					// Year link
					echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives</a></li>','atomy');
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
						 
					// Month link
					echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__('Archives</a></li>','atomy');
					echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
						 
					// Day display
					echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . (' Archives</strong></li>');
						 
			} else if ( is_month() ) {
						 
					// Month Archive
						 
					// Year link
					echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('Archives</a></li>','atomy');
					echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
						 
					// Month display
					echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__('Archives</strong></li>','atomy');
						 
			} else if ( is_year() ) {
						 
					// Display year archive
					echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives</strong></li>','atomy');
						 
			} else if ( is_author() ) {
						 
					// Auhor archive
						 
					// Get the author information
					global $author;
					$userdata = get_userdata( $author );
						 
					// Display author name
					echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' .esc_html__('Author:','atomy') . $userdata->display_name . '</strong></li>';
				 
			} else if ( get_query_var('paged') ) {
						 
					// Paginated archives
					echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page','atomy') . ' ' . get_query_var('paged') . '</strong></li>';
						 
			} else if ( is_search() ) {
				 
					// Search results page
					echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
				 
			} elseif ( is_404() ) {
						 
					// 404 page
					echo '<li>' . esc_html__('Error 404','atomy') . '</li>';
			}
		 
			echo '</ul>';
				 
	}
		 
}

/* Magnific popup - https://dimsemenov.com/plugins/magnific-popup/
========================================================================== */

add_action('wp_enqueue_scripts', 'atomy_enqueue_magnificpopup_styles');
	function atomy_enqueue_magnificpopup_styles() {
				 wp_enqueue_style('magnific_popup_style', get_stylesheet_directory_uri().'/magnific-popup/magnific-popup.css', array());
	}
	 
add_action('wp_enqueue_scripts', 'atomy_enqueue_magnificpopup_scripts');
	function atomy_enqueue_magnificpopup_scripts() {
				wp_enqueue_script('magnific_popup_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup.min.js', array('jquery'));
	 
				 wp_enqueue_script('magnific_init_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup-init.js', array('jquery'));
	}


/* Include Plugin
========================================================================== */

require_once get_template_directory() . '/atomy-functionality-plugin/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'atomy_register_required_plugins' );


function atomy_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Contact Form 7
		array(
			'name'      => __('Contact Form 7','atomy'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		// WooCommerce
		array(
			'name'      => __('WooCommerce','atomy'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// YITH WooCommerce Quick View
		array(
			'name'      => __('YITH WooCommerce Quick View','atomy'),
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => false,
		),
		// I WooCommerce Wishlist
		array(
			'name'      => __('TI WooCommerce Wishlist','atomy'),
			'slug'      => 'ti-woocommerce-wishlist',
			'required'  => false,
		),
		// YITH WooCommerce Zoom Magnifier
		array(
			'name'      => __('YITH WooCommerce Zoom Magnifier','atomy'),
			'slug'      => 'yith-woocommerce-zoom-magnifier',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'atomy',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title'                      => __('Install Required Plugins','atomy'),
			'menu_title'                      => __('Install Plugins','atomy' ),
			/* translators: %s: search term */
			'installing'                      => __('Installing Plugin: %s','atomy'),
			/* translators: %s: search term */
			'updating'                        => __('Updating Plugin: %s','atomy'),
			'oops'                            => __('Something went wrong with the plugin API.','atomy'),
			/* translators: %1: search term */
			'notice_can_install_required'     => _n_noop(

				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'atomy'
			),
			/* translators: %1: search term */
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'atomy'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'atomy'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'atomy'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'atomy'
			),
			'return'                          => __('Return to Required Plugins Installer','atomy'),
			'plugin_activated'                => __('Plugin activated successfully.','atomy'),
			'activated_successfully'          => __('The following plugin was activated successfully:','atomy'),
			/* translators: %1: search term */
			'plugin_already_active'           => __('No action taken. Plugin %1$s was already active.','atomy'),
			/* translators: %s: search term */
			'plugin_needs_higher_version'     => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.','atomy'),
			/* translators: %1: search term */
			'complete'                        => __('All plugins installed and activated successfully. %1$s','atomy'),
			'dismiss'                         => __('Dismiss this notice','atomy'),
			'notice_cannot_install_activate'  => __('There are one or more required or recommended plugins to install, update or activate.','atomy'),
			'contact_admin'                   => __('Please contact the administrator of this site for help.','atomy'),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);


	tgmpa( $plugins, $config );
}

/* Atomy Admin Page
========================================================================== */

 function atomy_page_create() {
     add_theme_page('Atomy', 'ATOMY', 'edit_theme_options', 'atomy_page', 'atomy_page_display',1);

 }

 add_action('admin_menu', 'atomy_page_create');

 require get_template_directory() . '/atomy-admin/atomy-support.php';
 

//Include Admin Style
function atomy_load_admin_style($hook) {
	if( $hook == 'appearance_page_atomy_page' ) {
	 wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/atomy-admin/css/atomy-admin-style.css', false, '1.0.0' );
	 wp_enqueue_script( 'admin_script', get_template_directory_uri() . '/atomy-admin/js/atomy-admin-script.js', false, '1.0.0' );
	 wp_enqueue_style( 'atomy-font-awesome-admin', get_template_directory_uri() . '/css/fontawesome-all.min.css' );

	}
}
add_action( 'admin_enqueue_scripts', 'atomy_load_admin_style' );


/* Url Admin Support / Copyright
========================================================================== */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define('atomy_url_go_pro_theme','https://www.denisfranchi.com/atomy/');// Go Pro
define('atomy_url_updates_theme','https://www.denisfranchi.com/updates/');// Update Theme
define('atomy_url_documentation_theme','https://www.denisfranchi.com/community/index.php?forums/guides.20/');// Documentation Theme
define('atomy_url_support_theme','https://www.denisfranchi.com/community/index.php?forums/support.22/');// Support Theme
define('atomy_url_faq_1_support','https://www.denisfranchi.com/community/index.php?threads/initial-settings-atomy-free.29/#post-40');// Faq 1 Support
define('atomy_url_faq_2_support','https://www.denisfranchi.com/community/index.php?threads/plugin-settings.18/');// Faq 2 Support
define('atomy_url_faq_3_support','https://www.denisfranchi.com/community/index.php?threads/atomy-customize.17/');// Faq 3 Support
define('atomy_url_faq_4_support','https://www.denisfranchi.com/community/index.php?threads/image-size.20/');// Faq 4 Support
define('atomy_url_copyright_theme','https://www.denisfranchi.com/');// Franchi Design Copyright





