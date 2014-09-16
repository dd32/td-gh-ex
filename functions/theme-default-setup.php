<?php 
/*
 * thumbnail list
*/ 
function multishop_thumbnail_image($content) {

    if( has_post_thumbnail() )
         return the_post_thumbnail( 'thumbnail' ); 
}
/*
 * multishop Title
*/
function multishop_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$multishop_site_description = get_bloginfo( 'description', 'display' );
	if ( $multishop_site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $multishop_site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'multishop' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'multishop_wp_title', 10, 2 );

/**
 * Add default menu style if menu is not set from the backend.
 */
function multishop_add_menuid ($page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $multishop_matches);
$multishop_divclass = '';
if(!empty($multishop_matches)) { $multishop_divclass = $multishop_matches[1]; }
$multishop_toreplace = array('<div class="'.$multishop_divclass.' pull-right-res">', '</div>');
$multishop_replace = array('<div class="nav navbar-nav menu">', '</div>');
$multishop_new_markup = str_replace($multishop_toreplace,$multishop_replace, $page_markup);
$multishop_new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav multishop-menu pull-right"', $multishop_new_markup);
return $multishop_new_markup; }
add_filter('wp_page_menu', 'multishop_add_menuid');

/*
 * multishop Main Sidebar
*/
function multishop_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'multishop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'multishop' ),
		'before_widget' => '<aside id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="sidebar-title"><h3 class="aside-h3">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area One', 'multishop' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer Area One that appears on the left.', 'multishop' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget footer-widget-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="footer-blogs">',
		'after_title'   => '</h1><div class="footer-title-line"></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area Two', 'multishop' ),
		'id'            => 'footer-2',
		'description'   => __( 'Footer Area Two that appears on the left.', 'multishop' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="footer-blogs">',
		'after_title'   => '</h1><div class="footer-title-line"></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area Three', 'multishop' ),
		'id'            => 'footer-3',
		'description'   => __( 'Footer Area Three that appears on the left.', 'multishop' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget footer-widget-3 no-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="footer-blogs">',
		'after_title'   => '</h1><div class="footer-title-line"></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area Four', 'multishop' ),
		'id'            => 'footer-4',
		'description'   => __( 'Footer Area Four that appears on the left.', 'multishop' ),
		'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="footer-blogs">',
		'after_title'   => '</h1><div class="footer-title-line"></div>',
	) );
}
add_action( 'widgets_init', 'multishop_widgets_init' );

/*
 * multishop Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 */
function multishop_entry_meta() {

	$multishop_category_list = get_the_category_list( __( ', ', 'multishop' ) );

	$multishop_tag_list = get_the_tag_list( '', __( ', ', 'multishop' ) );

	$multishop_date = sprintf( '<time datetime="%3$s">%4$s</time>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$multishop_author = sprintf( '<i class="fa fa-user"></i><a href="%1$s" title="%2$s" >%3$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'multishop' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $multishop_tag_list ) {
		$multishop_utility_text = __( '<div class="multishop-entry-meta"> Posted in : %1$s  on %3$s by : %4$s </div>', 'multishop' );
	} elseif ( $multishop_category_list ) {
		$multishop_utility_text = __( '<div class="multishop-entry-meta"> Posted in : %1$s  on %3$s by : %4$s </div>', 'multishop' );
	} else {
		$multishop_utility_text = __( '<div class="multishop-entry-meta"> Posted on : %3$s by : %4$s </div>', 'multishop' );
	}

	printf(
		$multishop_utility_text,
		$multishop_category_list,
		$multishop_tag_list,
		$multishop_date,
		$multishop_author
	);
}



if ( ! function_exists( 'multishop_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own multishop_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function multishop_comment( $comment, $multishop_args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'multishop' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'multishop' ), '<span class="edit-link">', '</span>' ); ?>
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
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment col-md-12 multishop-inner-blog-comment">
    <figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
    <div class="multishop-comment-name txt-holder">
      <?php
                            printf( '<b class="fn">%1$s'.'</b>',
                                get_comment_author_link(),
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author ', 'multishop' ) . '</span>' : '' 
                            ); 
						?>
    </div>
    <div class="multishop-comment-datetime"> <?php echo get_comment_date('M j, Y \a\t g:i a'); ?> </div>
    <div class="multishop-comment-text blog-post-comment-text comment">
      <?php  comment_text(); ?>
    </div>
    <div class="multishop-comment-reply-link">
      <?php
                    echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $multishop_args, array( 'reply_text' => __( 'Reply', 'multishop' ), 'after' => '', 'depth' => $depth, 'max_depth' => $multishop_args['max_depth'] ) ) ).'</a>';
                     ?>
    </div>
    <div class="multishop-comment-hr"></div>
    <!-- .comment-content --> 
    
    <!-- .txt-holder --> 
  </article>
  <!-- #comment-## -->
  <?php
		}
		break;
	endswitch; // end comment_type check
}
endif;


function multishop_read_more( ) {
return ' ..<br /><div class="reading"><a class="readmore-btn" href="'. get_permalink() . '" >Continue Reading</a></div>';
 }
add_filter( 'excerpt_more', 'multishop_read_more' ); 

/**length post text**/
function multishop_custer_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'multishop_custer_excerpt_length', 999 );



// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}
 
add_filter('loop_shop_per_page','dl_sort_by_page');
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_page_ordering', 20 );