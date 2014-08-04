<?php
/*
 * global variable for get option.
*/
 $topmag_options = get_option( 'topmag_theme_options' ); 
 global $topmag_options;
/*
 * thumbnail list
*/ 
function topmag_thumbnail_image($content) {

    if( has_post_thumbnail() )
         return the_post_thumbnail( 'thumbnail' ); 
}
/**
 * Register Lato Google font for topmag.
 */
function topmag_font_url() {
	$topmag_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, trantopmag this to 'off'. Do not trantopmag into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'topmag' ) ) {
		$topmag_font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $topmag_font_url;
}
/*
 * topmag Title
*/
function topmag_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$topmag_site_description = get_bloginfo( 'description', 'display' );
	if ( $topmag_site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $topmag_site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'topmag' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'topmag_wp_title', 10, 2 );

/**
 * Add default menu style if menu is not set from the backend.
 */
function topmag_add_menuid ($topmag_page_markup) {
preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $topmag_page_markup, $matches);
if(!empty($matches)) { $topmag_divclass = $matches[1]; } else { $topmag_divclass = ''; }
$topmag_toreplace = array('<div class="'.$topmag_divclass.'">', '</div>');
$topmag_replace = array('<div class="menu-header-menu-container">', '</div>');
$topmag_new_markup = str_replace($topmag_toreplace,$topmag_replace, $topmag_page_markup);
$topmag_new_markup= preg_replace('/<ul/', '<ul class="nav navbar-nav topmag-menu"', $topmag_new_markup);
return $topmag_new_markup; }
add_filter('wp_page_menu', 'topmag_add_menuid');

/*
 * topmag Main Sidebar
*/
function topmag_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'topmag' ),
		'id'            => 'main-sidebar',
		'description'   => __( 'Main sidebar that appears on the left.', 'topmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer area one', 'topmag' ),
		'id'            => 'footer-area-one',
		'description'   => __( 'Footer area one that appears in the footer.', 'topmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer area two', 'topmag' ),
		'id'            => 'footer-area-two',
		'description'   => __( 'Footer area two that appears in the footer.', 'topmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer area three', 'topmag' ),
		'id'            => 'footer-area-three',
		'description'   => __( 'Footer area threee that appears in the footer.', 'topmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );			
}
add_action( 'widgets_init', 'topmag_widgets_init' );

/*
 * topmag Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 */
function topmag_entry_meta() {

	$topmag_category_list = get_the_category_list( __( ', ', 'topmag' ) );

	$topmag_tag_list = get_the_tag_list( '', __( ', ', 'topmag' ) );

	$topmag_date = sprintf( '<time datetime="%3$s">%4$s</time>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$topmag_author = sprintf( '<span><a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'topmag' ), get_the_author() ) ),
		get_the_author()
	);


	if ( $topmag_tag_list ) {
		$topmag_utility_text = __( '<span><i class="fa fa-user"></i> %4$s</span><span><i class="fa fa-folder-open"></i> %1$s</span><span><i class="fa fa-comments-o"></i> '.get_comments_number().'</span>', 'topmag' );
	} elseif ( $topmag_category_list ) {
		$topmag_utility_text = __( '<span><i class="fa fa-user"></i> %4$s</span><span><i class="fa fa-folder-open"></i> %1$s</span><span><i class="fa fa-comments-o"></i> '.get_comments_number().'</span> ', 'topmag' );
	} else {
		$topmag_utility_text = __( '<span><i class="fa fa-user"></i> %4$s</span><span><i class="fa fa-comments-o"></i> '.get_comments_number().'</span> ', 'topmag' );
	}

	printf(
		$topmag_utility_text,
		$topmag_category_list,
		$topmag_tag_list,
		$topmag_date,
		$topmag_author
	);
}

if ( ! function_exists( 'topmag_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own topmag_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function topmag_comment( $comment, $topmag_args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'topmag' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'topmag' ), '<span class="edit-link">', '</span>' ); ?>
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
    
<div <?php comment_class('col-md-12 no-padding post-comments'); ?> id="li-comment-<?php comment_ID(); ?>">
  <?php echo get_avatar( get_the_author_meta('ID'),'52'); ?>
  <div class="comment-content">
  <?php printf( '<h1>%1$s</h1>', get_comment_author_link(), ( $comment->user_id === $post->post_author ) ? __( 'Post author ', 'topmag' ) : ''); ?>
      <h6><?php echo get_comment_date().' at '.get_the_time(); ?></h6>
      <p><?php comment_text(); ?></p>
      <div class="reply-comment">
          <?php echo '<a href="#">'.comment_reply_link( array_merge( $topmag_args, array( 'reply_text' => __( 'Reply', 'topmag' ), 'after' => '', 'depth' => $depth, 'max_depth' => $topmag_args['max_depth'] ) ) ).'</a>'; ?>
       </div>
   </div>   
</div>
  <!-- #comment-## -->
  <?php
		}
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Function for breaking news in home page.
 */
function topmag_breaking_news() {
	
	global $topmag_options;
	if(!empty($topmag_options['breaking-news'])) { ?>
        <div class="col-md-12 breaking-news">
        	<div class="col-md-2 news-title" id="mf118"><?php _e('BREAKING NEWS','topmag');?></div>
				<?php $topmag_news =0;
                    if(!empty($topmag_options['breaking-news-category'])) {
                    $topmag_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'category_name' => wp_filter_nohtml_kses($topmag_options['breaking-news-category']),
                        );
                    } else {
                    $topmag_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        );
                    }
                    $topmag_post = new WP_Query( $topmag_args );
                    while ( $topmag_post->have_posts() ) { $topmag_post->the_post();
                    $topmag_news++;
                    if($topmag_news!=1) { $topmag_class ="breaking-news-hidden"; } else { $topmag_class = ""; }
                ?>
            
                <ul id="js-news" class="js-hidden">
                <li class="news-item"><?php echo '<a href="'.get_permalink().'">'.get_the_title().'</a>'; ?></li>
            </ul>
            <?php } ?> 
        </div>
	<?php } 
}

function topmag_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'topmag_excerpt_length');