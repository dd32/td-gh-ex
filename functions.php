<?php
/**
* Theming Strap FUNCTIONS FILE
*
*@subpackage ThemingStrap 
*
*/
	//  ThemingStrap Width Based on Size
	if ( ! isset( $content_width ) )
	$content_width = 780; // pixels

	/*** ThemingStrap Included Files ***/
	// ThemingStrap Bootstrap Nav Walker

	require_once('inc/bootstrap_navwalker.php');
	require_once('framework/functions.php');
	// ThemingStrap template-tags.php
	require_once('inc/template-tags.php');

	// ThemingStrap Custom Header
	
	// ThemingStrap Custom Background
	$avon_bg = array(
		'default-image' => get_template_directory_uri() . '/images/pattern.png',
	);
	add_theme_support( 'custom-background', $avon_bg );

	// ThemingStrap RSS feed links
	add_theme_support( 'automatic-feed-links' );

	// ThemingStrap Theme Title
	add_filter( 'wp_title', 'filter_wp_title' );
	function filter_wp_title( $title ) {
		global $page, $paged;
		if ( is_feed() )
			return $title;
		$site_description = get_bloginfo( 'description' );
		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'ThemingStrap' ), max( $paged, $page ) ) : '';
		return $filtered_title;
	}
	// ThemingStrap Post Thumbnails
    add_theme_support('post-thumbnails');
    add_image_size ( 'slide-image', 850, 380, true );
	add_image_size ( 'home-blog-thumb', 150, 150, true );
	// ThemingStrap Post Formats
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status', 'gallery', 'video', 'audio', 'chat' ) );
    // ThemingStrap Registering Menu
	register_nav_menu( 'primary', __( 'Main Menu', 'ThemingStrap' ) );
	// ThemingStrap Scipts and Style Files
	function ThemingStrap_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	// ThemingStrap Main Js File
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( '', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.0', true );	
	// ThemingStrap Main Bootstrap Css File
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.0', false );
	wp_enqueue_style( 'iconfont', get_template_directory_uri() . '/css/font-awesome.css', array());
	// ThemingStrap Theme Main Stylesheet
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );
	}
	add_action( 'wp_enqueue_scripts', 'ThemingStrap_scripts_styles' );
	
	// ThemingStrap Comments/Pingbacks
	if ( ! function_exists( 'ThemingStrap_comment' ) ) :
	function ThemingStrap_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body">
				<?php _e( 'Pingback:', 'ThemingStrap' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'ThemingStrap' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		<?php else : ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', 'ThemingStrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->
					<div class="comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'ThemingStrap' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'ThemingStrap' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .comment-metadata -->
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'ThemingStrap' ); ?></p>
					<?php endif; ?>
				</footer><!-- .comment-meta -->
				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
				?>
			</article><!-- .comment-body -->
		<?php
		endif;
	}
	endif; // ends check for ThemingStrap_comment()
	if ( ! function_exists( 'ThemingStrap_comment_reply_link' ) ):
	// Style comment reply links as buttons
	function ThemingStrap_comment_reply_link( $link ) {
		return str_replace( 'comment-reply-link', 'btn btn-default btn-xs', $link );
	}
	add_filter( 'comment_reply_link', 'ThemingStrap_comment_reply_link' );
	endif;
	// ThemingStrap Pagination
	function ThemingStrap_pagination_nav($pages = '', $range = 2)
	{  
	     $showitems = ($range * 2)+1;  
	     global $paged;
	     if(empty($paged)) $paged = 1;
	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }   
	    if(1 != $pages) {
			echo "<div class='pagination-wrap'><ul class='pagination'>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
				echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
			if($paged > 1 && $showitems < $pages) 
				echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
				}
			}
			if ($paged < $pages && $showitems < $pages) 
				echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
			if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) 
				echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
			echo "</ul></div>";
		}
	}
	// ThemingStrap Sidebar
	if ( ! function_exists( 'sidebar_widgets' ) ) :
	function sidebar_widgets() {
		register_sidebar( array(
				'id' => 'main_sidebar',
				'name' => __( 'Sidebar Right', 'ThemingStrap' ),
				'description' => __( 'This sidebar is located on the right-hand side of each page.', 'ThemingStrap' ),
				'before_widget' => '<aside class="well widget %2$s" id="%1$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
			
			register_sidebar( array(
				'id' => 'header_sidebar',
				'name' => __( 'Header Right', 'ThemingStrap' ),
				'description' => __( 'This sidebar is located on the right-hand side of the header.', 'ThemingStrap' ),
				'before_widget' => '<aside class="%2$s" id="%1$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
			
		}
	add_action( 'widgets_init', 'sidebar_widgets' );
	endif;

	// ThemingStrap WP Link Pages
	$ThemingStrap_wp_link_pages = array(
			'before'           => '<p>' . __( 'Pages:', 'ThemingStrap' ),
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => __( 'Next page', 'ThemingStrap' ),
			'previouspagelink' => __( 'Previous page', 'ThemingStrap' ),
			'pagelink'         => '%',
			'echo'             => 1
		);