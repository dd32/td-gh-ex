<?php 
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'booster_setup' ) ) :
function booster_setup() {
	
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}
	/*
	 * Make booster theme available for translation.
	 */
	load_theme_textdomain( 'booster', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', booster_font_url() ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme uses wp_nav_menu() in two locations.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'booster-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'booster' ),
		'secondary' => __( 'Footer Secondary menu', 'booster' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
	add_theme_support( 'custom-background', apply_filters( 'booster_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'booster_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}

endif; // booster_setup
add_action( 'after_setup_theme', 'booster_setup' );
// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

/**
 * Add default menu style if menu is not set from the backend.
 */
function booster_add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
$booster_divclass = '';
if(!empty($matches)) { $booster_divclass = $matches[1]; }
$booster_toreplace = array('<div class="'.$booster_divclass.' pull-right-res">', '</div>');
$booster_replace = array('<div class="navbar-collapse collapse pull-right-res">', '</div>');
$booster_new_markup = str_replace($booster_toreplace,$booster_replace, $page_markup);
$booster_new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav booster-menu"', $booster_new_markup);
return $booster_new_markup; }
add_filter('wp_page_menu', 'booster_add_menuid');

// thumbnail list 
function booster_thumbnail_image($content) {

    if( has_post_thumbnail() )
         return the_post_thumbnail( 'thumbnail' ); 
}
/**
 * Register Lato Google font for booster.
 */
function booster_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'booster' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}
/*
 * Header Title
*/
function booster_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'booster' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'booster_wp_title', 10, 2 );

/*********** Register Sidebar **************/
function booster_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'booster' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'booster' ),
		'before_widget' => '<aside id="%1$s" class="widget blog-categories %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'booster_widgets_init' );

/*********** Enqueue File **************/

add_action( 'wp_footer', 'booster_datetime_picker');
function booster_datetime_picker() {
	wp_enqueue_style('picker-css',get_template_directory_uri().'/css/jquery-ui.css',array(),'','');
    wp_enqueue_script('timepicker',get_template_directory_uri().'/js/jquery-timepicker.js',array(),'','');
    wp_enqueue_script('picker-addon-js',get_template_directory_uri().'/js/jquery-ui-timepicker-addon.js',array(),'','');
}

add_filter( 'wp_title', 'booster_wp_title', 10, 2 );

function booster_enqueue()
{
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'','');
	wp_enqueue_style('custom',get_template_directory_uri().'/css/custom.css',array(),'','');
	wp_enqueue_style('style',get_stylesheet_uri(),array(),'','');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'','');	
	wp_enqueue_script('default',get_template_directory_uri().'/js/default.js');	
	wp_localize_script( 'default', 'booster_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
}
add_action('wp_enqueue_scripts', 'booster_enqueue');
/********* Table create for Appointment book  ***********/	
global $wpdb;
 
$appointment_table_name = $wpdb->prefix . "book_an_appointment";
if($wpdb->get_var("show tables like '$appointment_table_name'") != $appointment_table_name) {
 
$plumbin_sql = "CREATE TABLE " . $appointment_table_name . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name VARCHAR(50) NOT NULL,
		email VARCHAR(50) NOT NULL,
		phone VARCHAR(25) NOT NULL,
		datetime VARCHAR(25) NOT NULL,
		comment VARCHAR(1500) NOT NULL,
		UNIQUE KEY id (id)
);";
 
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($plumbin_sql);
 
}
/********* Appointment Book data insert ***********/	

function booster_ajax_callback_function() {
	global $wpdb;
	$appointment_table_name = $wpdb->prefix.'book_an_appointment';
	$wpdb->insert(  
	$appointment_table_name,  
	array(  
		'name' 		=> $_POST['name'],  
		'email' 	=> $_POST['email'],
		'phone' 	=> $_POST['phone'],
		'datetime' 	=> $_POST['datetime'],
		'comment' 	=> $_POST['comment']
	),  
	array(  
		'%s',  
		'%s',
		'%s',
		'%s',
		'%s',
	));
	echo json_encode(array('flag'=>'1'));
	die;
}
add_action( 'wp_ajax_my_appointment', 'booster_ajax_callback_function' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_my_appointment', 'booster_ajax_callback_function' ); 

/********* Start admin menu for appointment book  ***********/
	
if(is_admin())
	{
		new booster_wp_list_table();
	}
 
/**
* booster_wp_list_table class will create the page to load the table
*/
	class booster_wp_list_table
	{
/**
* Constructor will create the menu item
*/
public function __construct()
{
add_action( 'admin_menu', array($this, 'booster_add_menu_table_page' ));
}
 
/**
* Menu item will allow us to load the page to display the table
*/
public function booster_add_menu_table_page()
{
add_theme_page( 'Appointments', 'Appointments', 'manage_options', 'appointment-list.php', array($this, 'booster_list_table') );
}
 
/**
* Display the list table page
*
* @return Void
*/
public function booster_list_table()
{
$booster_list_table = new booster_list_table();
$booster_list_table->prepare_items();
?>

<div class="wrap">
  <div id="icon-users" class="icon32"></div>
  <h2>Appointment Booking Table</h2>
  <?php $booster_list_table->display(); ?>
</div>
<?php
}
}
 
// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
 
/**
* Create a new table class that will extend the WP_List_Table
*/
	class booster_list_table extends WP_List_Table
	{
/**
* Prepare the items for the table to process
*
* @return Void
*/
public function prepare_items()
{
	$booster_columns = $this->get_columns();
	$booster_hidden = $this->get_hidden_columns();
	$booster_sortable = $this->get_sortable_columns();
	 
	$booster_data = $this->table_data();
 
	$booster_perpage = 10;
	$booster_currentpage = $this->get_pagenum();
	$booster_total_items = count($booster_data);
	 
	$this->set_pagination_args( array(
	'total_items' => $booster_total_items,
	'per_page' => $booster_perpage
	) );
 
$booster_data = array_slice($booster_data,(($booster_currentpage-1)*$booster_perpage),$booster_perpage);
 
$this->_column_headers = array($booster_columns, $booster_hidden, $booster_sortable);
$this->items = $booster_data;
}
 
/**
* Override the parent columns method. Defines the columns to use in your listing table
*
* @return Array
*/
public function get_columns()
	{
	$booster_columns = array(
					'id' => 'ID',
					'name' => 'Name',
					'email' => 'Email',
					'phone' => 'Phone',
					'datetime' => 'Date & Time',
					'comment' => 'Comment',
					'delete' => 'Delete'
				);
	 
return $booster_columns;
}
 
/**
* Define which columns are hidden
*
* @return Array
*/
public function get_hidden_columns()
	{
	return array();
	}
 
/**
* Define the sortable columns
*
* @return Array
*/
public function get_sortable_columns()
	{
	return array('title' => array('title', false));
	}
	 
/**
* Get the table data
*
* @return Array
*/
private function table_data()
	{
	$booster_data = array();
	 global $wpdb;
	$booster_appointment = $wpdb->get_results( "SELECT * FROM wp_book_an_appointment" );
	if(isset($_GET['id'])){
		$wpdb->delete( 'wp_book_an_appointment', array( 'ID' =>$_GET['id'] ), array( '%d' ) );
		echo"<script>window.location='".$_SERVER['HTTP_REFERER']."';</script>";
		}
	foreach ($booster_appointment as $booster_appointment_detail){
	$booster_data[] = array(
				'id' => $booster_appointment_detail->id,
				'name' => $booster_appointment_detail->name,
				'email' => $booster_appointment_detail->email,
				'phone' => $booster_appointment_detail->phone,
				'datetime' => $booster_appointment_detail->datetime,
				'comment' => $booster_appointment_detail->comment,
				'delete' => '<a href="http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'&id='.$booster_appointment_detail->id.'">Delete</a>'
	);
	}
	return $booster_data;
	}
 
/**
* Define what data to show on each column of the table
*
* @param Array $booster_item Data
* @param String $booster_column_name - Current column name
*
* @return Mixed
*/
public function column_default( $booster_item, $booster_column_name )
	{
		switch( $booster_column_name ) {
		case 'id':
		case 'name':
		case 'email':
		case 'phone':
		case 'datetime':
		case 'comment':
		case 'delete':
		return $booster_item[ $booster_column_name ];
		 
		default:
		return print_r( $booster_item, true ) ;
	}}
}
/***************** Theme Option **********************/

require_once('theme-option/fasterthemes.php');

/***************** Breadcrumbs **********************/

function booster_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '/'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span>'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  global $post;
  $homeLink = home_url();

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div id="crumbs" class="font-14 color-fff conter-text booster-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';

  } else {

    echo '<div id="crumbs" class="font-14 color-fff conter-text booster-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','booster') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end booster_custom_breadcrumbs()

/********* home page slider ***********/	

function booster_homeslider_init() {
	$labels = array(
		'name' => 'Home Slider',
		'singular_name' => 'homeslider',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slider',
		'edit_item' => 'Edit Slider',
		'new_item' => 'New Slider',
		'all_items' => 'All Slider',
		'view_item' => 'View Slider',
		'search_items' => 'Search Slider',
		'not_found' => 'No plans found',
		'not_found_in_trash' => 'No plans found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Home Slider'
	);
	$booster_args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'homeslider' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'homeslider', $booster_args );
}
add_action( 'init', 'booster_homeslider_init' );

/********* Post Type for Services ***********/	

function booster_service_init() {
	$labels = array(
		'name' => 'Service',
		'singular_name' => 'service',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Service',
		'edit_item' => 'Edit Service',
		'new_item' => 'New Service',
		'all_items' => 'All Services',
		'view_item' => 'View Service',
		'search_items' => 'Search Service',
		'not_found' => 'No plans found',
		'not_found_in_trash' => 'No plans found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Service'
	);
	$booster_args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'service' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'service', $booster_args );
}
add_action( 'init', 'booster_service_init' );

/********* Post Type for Our team ***********/	

function booster_ourteam_init() {
	$labels = array(
		'name' => 'Our Team',
		'singular_name' => 'ourteam',
		'add_new' => 'Add New Member',
		'add_new_item' => 'Add New Member',
		'edit_item' => 'Edit Member',
		'new_item' => 'New Member',
		'all_items' => 'All Members',
		'view_item' => 'View Member',
		'search_items' => 'Search Member',
		'not_found' => 'No plans found',
		'not_found_in_trash' => 'No plans found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Our Team'
	);
	$booster_args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'member' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'member', $booster_args );
}
add_action( 'init', 'booster_ourteam_init' );

/**************** Custom Meta Box in Page ******************/

add_action( 'add_meta_boxes', 'booster_meta_box_content_title' );
function booster_meta_box_content_title()
{
add_meta_box( 'booster_meta_box_id', 'Content Title', 'booster_content_title', 'page', 'normal', 'high' );
}

function booster_content_title( $post )
{

$values = get_post_custom( $post->ID );
$content_title = isset( $values['content_title'] ) ? esc_attr( $values['content_title'][0] ) : '';

wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

?>
<input type="text" name="content_title" value="<?php echo $content_title; ?>" />
<?php

}

add_action( 'save_post', 'booster_meta_box_save' );
function booster_meta_box_save( $post_id )
{

// Bail if we're doing an auto save
if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

// if our nonce isn't there, or we can't verify it, bail
if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

// if our current user can't edit this post, bail
if( !current_user_can( 'edit_page' ,$post_id) ) return;

if( isset( $_POST['content_title'] ) )
update_post_meta( $post_id, 'content_title', esc_attr( $_POST['content_title'] ) );
}

/**
 * Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 **/
function booster_entry_meta() {

	$booster_category_list = get_the_category_list( __( ', ', 'booster' ) );

	$booster_tag_list = get_the_tag_list( '', __( ', ', 'booster' ) );

	$booster_date = sprintf( '<a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$booster_author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'booster' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $booster_tag_list ) {
		$booster_utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: '.get_comments_number().'.</div>', 'booster' );
	} elseif ( $booster_category_list ) {
		$booster_utility_text = __( '<div class="post-category"> Posted in : %1$s  on %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: '.get_comments_number().'.</div>', 'booster' );
	} else {
		$booster_utility_text = __( '<div class="post-category"> Posted on : %3$s </div><div class="post-author"> by : %4$s </div> <div class="post-comment"> Comments: '.get_comments_number().'.</div>', 'booster' );
	}

	printf(
		$booster_utility_text,
		$booster_category_list,
		$booster_tag_list,
		$booster_date,
		$booster_author
	);
}

if ( ! function_exists( 'booster_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own booster_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function booster_comment( $comment, $booster_args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'booster' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'booster' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
</li>
<?php
			break;
		default :
		// Proceed with normal comments.
		if($comment->comment_approved==1)
		{
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" class="commentlist">
  		<article id="comment-<?php comment_ID(); ?>" class="comment col-md-12 margin-top-bottom">
    		<figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
    			<div class="txt-holder">
      					<?php
                            printf( '<b class="fn">%1$s',
                                get_comment_author_link(),
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author ', 'booster' ) . '</span>' : ''
                            );
						?>
      					<?php
                            
                            echo ' '.get_comment_date().'</b>';
							echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $booster_args, array( 'reply_text' => __( 'Reply', 'booster' ), 'after' => '', 'depth' => $depth, 'max_depth' => $booster_args['max_depth'] ) ) ).'</a>';
							
                        ?>
     				 <div class="blog-post-comment-text comment">
      					  <?php comment_text(); ?>
     				 </div>
      <!-- .comment-content --> 
    </div>
    <!-- .txt-holder --> 
  </article>
  <!-- #comment-## -->
  <?php
		}
		break;
	endswitch; // end comment_type check
}
endif;

/**********************************/


function booster_pagination($pages = '', $range = 1)
{
	$booster_showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '')
	{
	global $wp_query;
	$pages = wp_count_posts()->publish;
	if(!$pages)
	{
	$pages = 1;
	}
	}
	
	if(1 != $pages)
	{
	echo "<div class='booster-pagination-color list-inline text-center'>";
	if($paged > 2 && $paged > $range+1 && $booster_showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><span class='sprite prev-all-icon'> First </span></a></li>";
	if($paged > 1 && $booster_showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><span class='sprite prev-icon'> Prev </span></a></li>";
	
	for ($i=1; $i <= $pages; $i++)
	{
	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $booster_showitems ))
	{
	echo ($paged == $i)? "<li><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
	}
	}
	
	if ($paged < $pages && $booster_showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><span class='sprite next-icon'> Next </span></a></li>";
	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $booster_showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'> Last <span class='sprite next-all-icon'></span></a></li>";
	echo "</div>\n";
	}
}
/*
 * Replace Excerpt [...] with Read More
 */
 
function booster_read_more( ) {
return ' ..<br /><a href="'. get_permalink() . '">Read More...</a>';
 }
add_filter( 'excerpt_more', 'booster_read_more' ); 
