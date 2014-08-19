<?php 
add_action( 'wp_enqueue_scripts', 'mywiki_theme_setup' );
function mywiki_theme_setup(){
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.0.1', 'all' );
wp_enqueue_style('style', get_stylesheet_uri());
wp_enqueue_script( 'bootstrap',  get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.0.1');
wp_enqueue_script( 'nicescroll',  get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), '1.0.0');
wp_enqueue_script( 'ajaxsearch',  get_template_directory_uri() . '/js/ajaxsearch.js', array(), '1.0.0');
wp_enqueue_script( 'general',  get_template_directory_uri() . '/js/general.js');
wp_localize_script( 'general', 'my_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
/* content width */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}
/* mywiki theme starts */
if ( ! function_exists( 'mywiki_setup' ) ) :
function mywiki_setup() {
	/*
	 * Make mywiki theme available for translation.
	 *
	 */
	 load_theme_textdomain( 'mywiki', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( 'css/editor-style.css' );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Enable support for Post Formats.
	 */
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'mywiki_custom_background_args', array(
		'default-color' => '048eb0',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'mywiki_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // redpro_setup
// Implement Custom Header features.
require get_template_directory() . '/function/custom-header.php';
add_action( 'after_setup_theme', 'mywiki_setup' );

if ( ! function_exists( 'mywiki_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 **/
function mywiki_entry_meta() {
	$category_list = get_the_category_list( __( ', ', 'mywiki' ) );
	$tag_list = get_the_tag_list( '', __( ', ', 'mywiki' ) );
	$date = sprintf( '<a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'mywiki' ), get_the_author() ) ),
		get_the_author()
	);
	if ( $tag_list ) {
		$utility_text = __( 'Posted %3$s by %4$s & filed under %1$s Comments: '.get_comments_number().'.', 'mywiki' );
	} elseif ( $category_list ) {
		$utility_text = __( 'Posted %3$s by %4$s & filed under %1$s Comments: '.get_comments_number().'.', 'mywiki' );
	} else {
		$utility_text = __( 'Posted %3$s by %4$s Comments: <a href="#">'.get_comments_number().'</a>.', 'mywiki' );
	}
	printf(
		$utility_text,
		$category_list,
		$tag_list,
		$date,
		$author
	);
}
endif;
/**
 * Add default menu style if menu is not set from the backend.
 */
function mywiki_add_menuclass ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
$toreplace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$replace = array('<div class="navbar-collapse collapse top-gutter">', '</div>');
$new_markup = str_replace($toreplace,$replace, $page_markup);
$new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav navbar-right mywiki-header-menu"', $new_markup);
return $new_markup; } //}
add_filter('wp_page_menu', 'mywiki_add_menuclass');
register_nav_menus(
		array(
			'primary' => __( 'The Main Menu', 'MyWiki' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'MyWiki' ) // secondary nav in footer
		)
	);
function mywiki_category_widget_function($args) {
   extract($args);
   echo $before_widget;
   echo $before_title . '<p class="wid-category"><span>Categories</span></p>' . $after_title;
   echo $after_widget;
   // print some HTML for the widget to display here
  $cat = array(
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
                        'exclude'                  => '',			
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false
			 );
	 
	 $cat = get_categories( $cat );
	 echo "<div class='wid-cat-container'><ul>";
	 foreach ($cat as $categories) {
		 ?>
<li><a href="<?php echo get_category_link( $categories->term_id );?>" class="wid-cat-title"><?php echo $categories->name ;?>
</a></li>
<?php }
echo "</ul></div>";
}
wp_register_sidebar_widget(
    'Category Widget',        // your unique widget id
    'Category Widget',          // widget name
    'mywiki_category_widget_function',  // callback function
    array(                  // options
        'description' => 'Category Widget Shows Category'
    )
);
add_action( 'widgets_init', 'mywiki_popular_load_widgets' );
function mywiki_popular_load_widgets() {
register_widget( 'mywiki_popular_widget' );
register_widget( 'mywiki_recentpost_widget' );
}
 
/** Define the Widget as an extension of WP_Widget **/
class mywiki_popular_widget extends WP_Widget {
function mywiki_popular_widget() {
/* Widget settings. */
$widget_ops = array( 'classname' => 'widget_popular', 'description' => 'Displays most popular posts by comment count' );
 
/* Widget control settings. */
$control_ops = array( 'id_base' => 'popular-widget' );
 
/* Create the widget. */
$this->WP_Widget( 'popular-widget', 'Popular Posts', $widget_ops, $control_ops );
}
 
// Limit to last 30 days
function filter_where( $where = '' ) {
// posts in the last 30 days
$where .= " AND post_date > '" . date('Y-m-d', strtotime('-' . $instance['days'] .' days')) . "'";
return $where;
}
function widget( $args, $instance ) {
extract( $args );
echo $before_widget;
if( !empty( $instance['title'] ) ) echo $before_title .'<p class="wid-category"><span>'.$instance['title'].'</span></p>' . $after_title;
$loop_args = array(
'posts_per_page' => (int) $instance['count'],
'orderby' => 'comment_count'
);
if( 0 == $instance['days'] ) {
$loop = new WP_Query( $loop_args );
}else{
add_filter( 'posts_where', array( $this, 'filter_where' ) );
$loop = new WP_Query( $loop_args );
remove_filter( 'posts_where', array( $this, 'filter_where' ) );
}echo "<div class='wid-cat-container'><ul>";
if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); global $post;
?><li>
<a href="<?php echo get_permalink();?>" class="wid-cat-title wid-popular-post">
  <?php the_title() ;?>
</a></li>
<?php endwhile; endif; wp_reset_query();
echo "</ul></div>";
echo $after_widget;
}
 
function update( $new_instance, $old_instance ) {
$instance = $old_instance;
 
/* Strip tags (if needed) and update the widget settings. */
$instance['title'] = esc_attr( $new_instance['title'] );
$instance['count'] = (int) $new_instance['count'];
$instance['days'] = (int) $new_instance['days'];
return $instance;
}
 
function form( $instance ) {
/* Set up some default widget settings. */
$defaults = array( 'title' => '', 'count' => 5, 'days' => 30 );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'count' ); ?>">Number of Posts:</label>
  <input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" size="3" value="<?php echo $instance['count']; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'days' ); ?>">Posted in the past X days:</label>
  <input id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" size="3" value="<?php echo $instance['days']; ?>" />
</p>
<p class="description">Use 0 for no time limit.</p>
<?php
}
 
}
class mywiki_recentpost_widget extends WP_Widget {
function mywiki_recentpost_widget() {
/* Widget settings. */
$widget_ops = array( 'classname' => 'widget_recentpost', 'description' => 'Displays most recent posts by post count' );
 
/* Widget control settings. */
$control_ops = array( 'id_base' => 'recent-widget' );
 
/* Create the widget. */
$this->WP_Widget( 'recent-widget', 'Recent Posts', $widget_ops, $control_ops );
}
 
function widget( $args, $instance ) {
extract( $args );
echo $before_widget;
if( !empty( $instance['title'] ) ) echo $before_title .'<p class="wid-category"><span>'.$instance['title'].'</span></p>' . $after_title;
$loop_args = array(
'posts_per_page' => (int) $instance['count'],
'orderby' => 'DESC'
);
$loop = new WP_Query( $loop_args );
echo "<div class='wid-cat-container'><ul>";
if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); global $post;
?><li>
<a href="<?php echo get_permalink();?>" class="wid-cat-title wid-popular-post"><?php the_title() ;?></a></li>
<?php endwhile; endif; wp_reset_query();
echo "</ul></div>";
echo $after_widget;
}
 
function update( $new_instance, $old_instance ) {
$instance = $old_instance;
 
/* Strip tags (if needed) and update the widget settings. */
$instance['title'] = esc_attr( $new_instance['title'] );
$instance['count'] = (int) $new_instance['count'];
return $instance;
}
 
function form( $instance ) {
/* Set up some default widget settings. */
$defaults = array( 'title' => '', 'count' => 5, 'days' => 30 );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'count' ); ?>">Number of Posts:</label>
  <input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" size="3" value="<?php echo $instance['count']; ?>" />
</p>
<?php
} 
}
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
	    register_sidebar(array(
    	'id' => 'footer1',
    	'name' => 'Footer Content Area 1',
    	'description' => 'Used on Footer.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
	    register_sidebar(array(
    	'id' => 'footer2',
    	'name' => 'Footer Content Area 2',
    	'description' => 'Used on Footer.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
	    register_sidebar(array(
    	'id' => 'footer3',
    	'name' => 'Footer Content Area 3',
    	'description' => 'Used on Footer.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}
if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
		add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
}
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
function mywiki_custom_breadcrumbs() {
  
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  
  global $post;
  $homeLink = esc_url( home_url( '/' ) );
  
  if (is_home() || is_front_page()) {
  
    if ($showOnHome == 1) echo '<div id="crumbs" class="mywiki_breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
  
  } else {
  
    echo '<div id="crumbs" class="mywiki_breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
  
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
      echo'paged'. ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</div>';
  
  }
} // end qt_custom_breadcrumbs()
/**
 * Filter the page title.
 **/
function mywiki_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mywiki' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'mywiki_wp_title', 10, 2 );
/* ===========================================================
				T H E M E  O P T I O N S
=============================================================*/
require_once('theme-option/fasterthemes.php'); 
/**
 * Wikki search
 */
function mywiki_search() {
	global $wpdb;
	$title=trim($_POST['queryString']);
	$args = array('posts_per_page' => -1, 'order'=> 'ASC', "orderby"=> "title", "post_type" => "post",'post_status'=>'publish', "s" => $title);
    $posts = get_posts( $args );
	$output='';
	if($posts){
		 $h=0;
		/* $output.=' <div class="scrollbar" id="style-1">';*/
		 $output.='<ul id="search-result">';
		 foreach ( $posts as $p ) 
		 { 
		     //echo $posts[$h]->post_title;
			 $output.='<li class="que-icn">';
             $output.='<a href="'.$posts[$h]->guid.'">'.$posts[$h]->post_title.'</a>';
             $output.='</li>';
			 $h++;
		 }
		 $output.='</ul>';
		 /*$output.='<div class="force-overflow"></div>
    </div>';*/
		 echo $output;
	}else{
	     $output.='no';
        echo $output;
	}
	die();
}
add_action('wp_ajax_mywiki_search', 'mywiki_search');
add_action('wp_ajax_nopriv_mywiki_search', 'mywiki_search' );

if ( ! function_exists( 'mywiki_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own mywiki_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function mywiki_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
		// Proceed with normal comments.
		global $post;
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
    	<article class="div-comment-<?php comment_ID(); ?>" id="div-comment-1">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>
                    </div><!-- .comment-author -->
					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( __( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( _( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .comment-metadata -->
				</footer><!-- .comment-meta -->
				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
               </div><!-- .reply -->
			</article>
	<?php
}
endif;


add_action('wp_ajax_mywiki_header', 'mywiki_header_image_function');
add_action('wp_ajax_nopriv_mywiki_header', 'mywiki_header_image_function' );
function mywiki_header_image_function(){
	$return['header'] = get_header_image();
	echo json_encode($return);
	die;
}

/* 
Adding Read More
*/
function mywiki_trim_excerpt($text) {
 $text = substr($text,0,-10); 
 return $text.'..<div class="clear-fix"></div><a href="'.get_permalink().'" title="read more....">Read more</a>';
}
add_filter('get_the_excerpt', 'mywiki_trim_excerpt');

?>